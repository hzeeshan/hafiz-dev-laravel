<?php

namespace App\Services\LeadFinder;

use App\Models\DiscoveredLead;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LeadFinderService
{
    public function __construct(
        protected NotificationService $notifications
    ) {}

    /**
     * Discover leads from configured sources.
     *
     * @param  string[]  $sourceNames  Sources to check (empty = all enabled)
     * @param  bool  $notify  Send Telegram notifications for high-scoring leads
     * @return array{discovered: array, notified: array, errors: array}
     */
    public function discover(array $sourceNames = [], bool $notify = false): array
    {
        $discovered = [];
        $notified = [];
        $errors = [];

        // Use all enabled sources if none specified
        if (empty($sourceNames)) {
            $sourceNames = array_keys(array_filter(
                config('lead_finder.sources', []),
                fn ($config) => $config['enabled'] ?? true
            ));
        }

        foreach ($sourceNames as $sourceName) {
            try {
                // Create source using factory
                $source = LeadSourceFactory::make($sourceName);
                $config = config("lead_finder.sources.{$sourceName}", []);

                // Fetch leads
                $leads = $source->fetchLeads($config);

                foreach ($leads as $leadData) {
                    // Score the lead
                    $score = LeadScorer::calculate($leadData);

                    // Skip leads below save threshold
                    if (! LeadScorer::meetsSaveThreshold($score)) {
                        Log::debug("Lead Finder: Skipping low-score lead", [
                            'title' => Str::limit($leadData['title'], 50),
                            'score' => $score,
                        ]);

                        continue;
                    }

                    // Check for duplicates
                    if ($this->isDuplicate($leadData)) {
                        Log::debug("Lead Finder: Skipping duplicate", [
                            'title' => Str::limit($leadData['title'], 50),
                        ]);

                        continue;
                    }

                    // Calculate score category
                    $scoreCategory = LeadScorer::getScoreCategory($score);

                    // Save to database
                    $lead = DiscoveredLead::create([
                        'source' => $leadData['source'],
                        'source_id' => $leadData['source_id'],
                        'title' => $leadData['title'],
                        'url' => $leadData['url'],
                        'body' => $leadData['body'],
                        'author' => $leadData['author'],
                        'subreddit' => $leadData['subreddit'],
                        'calculated_score' => $score,
                        'score_category' => $scoreCategory,
                        'upvotes' => $leadData['score'],
                        'comments_count' => $leadData['comments'],
                        'intent_keywords_found' => $leadData['intent_keywords_found'],
                        'metadata' => $leadData['metadata'],
                        'posted_at' => $leadData['posted_at'],
                        'discovered_at' => $leadData['discovered_at'],
                        'status' => 'new',
                    ]);

                    $result = [
                        'lead' => $lead,
                        'score' => $score,
                        'score_category' => $scoreCategory,
                        'score_label' => LeadScorer::getScoreCategoryLabel($score),
                        'notified' => false,
                    ];

                    // Send notification if enabled and score meets threshold
                    if ($notify && LeadScorer::meetsNotificationThreshold($score)) {
                        try {
                            $this->sendLeadNotification($lead);
                            $lead->update([
                                'notified' => true,
                                'notified_at' => now(),
                            ]);
                            $result['notified'] = true;
                            $notified[] = $lead;
                        } catch (\Exception $e) {
                            Log::error('Lead Finder: Failed to send notification', [
                                'lead_id' => $lead->id,
                                'error' => $e->getMessage(),
                            ]);
                        }
                    }

                    $discovered[] = $result;
                }

                Log::info("Lead Finder: Processed {$sourceName}", [
                    'leads_fetched' => count($leads),
                    'leads_saved' => count($discovered),
                ]);

            } catch (\Exception $e) {
                $errors[] = [
                    'source' => $sourceName,
                    'error' => $e->getMessage(),
                ];
                Log::error("Lead Finder: Failed to fetch from {$sourceName}", [
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return [
            'discovered' => $discovered,
            'notified' => $notified,
            'errors' => $errors,
        ];
    }

    /**
     * Check if lead is a duplicate.
     */
    protected function isDuplicate(array $leadData): bool
    {
        if (! config('lead_finder.duplicate_detection.enabled', true)) {
            return false;
        }

        $lookbackDays = config('lead_finder.duplicate_detection.lookback_days', 14);

        // Check exact source_id match
        $existsBySourceId = DiscoveredLead::where('source', $leadData['source'])
            ->where('source_id', $leadData['source_id'])
            ->where('discovered_at', '>=', now()->subDays($lookbackDays))
            ->exists();

        if ($existsBySourceId) {
            return true;
        }

        // Check title similarity
        $similarityThreshold = config('lead_finder.duplicate_detection.similarity_threshold', 0.8);
        $recentTitles = DiscoveredLead::where('discovered_at', '>=', now()->subDays($lookbackDays))
            ->pluck('title');

        foreach ($recentTitles as $existingTitle) {
            if ($this->calculateSimilarity($leadData['title'], $existingTitle) >= $similarityThreshold) {
                return true;
            }
        }

        return false;
    }

    /**
     * Calculate string similarity.
     */
    protected function calculateSimilarity(string $str1, string $str2): float
    {
        similar_text(strtolower($str1), strtolower($str2), $percent);

        return $percent / 100;
    }

    /**
     * Send Telegram notification for a lead.
     */
    protected function sendLeadNotification(DiscoveredLead $lead): void
    {
        $scoreLabel = LeadScorer::getScoreCategoryLabel($lead->calculated_score);
        $suggestedApproach = LeadScorer::generateSuggestedApproach([
            'title' => $lead->title,
            'body' => $lead->body,
            'subreddit' => $lead->subreddit,
        ]);

        // Format intent keywords
        $intentKeywords = $lead->intent_keywords_found ?? [];
        $keywordList = collect($intentKeywords)
            ->flatten()
            ->unique()
            ->take(5)
            ->implode(', ');

        // Calculate time ago
        $timeAgo = $lead->posted_at?->diffForHumans() ?? 'unknown';

        // Build source line
        $sourceLine = $lead->source === 'reddit'
            ? "📍 Source: r/{$lead->subreddit}"
            : '📍 Source: Hacker News';

        $message = "🎯 <b>{$scoreLabel}</b>\n\n"
            ."📝 <b>Title:</b> {$lead->title}\n"
            ."📊 <b>Score:</b> {$lead->calculated_score}/10\n"
            ."🔗 {$lead->url}\n\n"
            ."👤 <b>Author:</b> {$lead->author}\n"
            ."{$sourceLine}\n"
            ."⏰ <b>Posted:</b> {$timeAgo}\n\n"
            ."🔑 <b>Intent Signals:</b> {$keywordList}\n\n"
            ."💡 <b>Suggested Approach:</b>\n"
            ."{$suggestedApproach}";

        $this->notifications->sendCustomMessage($message);
    }

    /**
     * Sync leads from local to production.
     *
     * @return array{success: bool, synced: int, skipped: int, error: string|null}
     */
    public function syncToProduction(array $discovered, bool $notify = false): array
    {
        $productionUrl = config('lead_finder.sync.production_url');
        $productionToken = config('lead_finder.sync.production_token');
        $timeout = config('lead_finder.sync.timeout', 30);

        if (empty($productionUrl) || empty($productionToken)) {
            return [
                'success' => false,
                'synced' => 0,
                'skipped' => 0,
                'error' => 'Production sync not configured',
            ];
        }

        // Prepare leads data for sync
        $leadsData = collect($discovered)->map(function ($result) {
            $lead = $result['lead'];

            return [
                'source' => $lead->source,
                'source_id' => $lead->source_id,
                'title' => $lead->title,
                'url' => $lead->url,
                'body' => $lead->body,
                'author' => $lead->author,
                'subreddit' => $lead->subreddit,
                'calculated_score' => $lead->calculated_score,
                'score_category' => $lead->score_category,
                'upvotes' => $lead->upvotes,
                'comments_count' => $lead->comments_count,
                'intent_keywords_found' => $lead->intent_keywords_found,
                'metadata' => $lead->metadata,
                'posted_at' => $lead->posted_at?->toIso8601String(),
                'discovered_at' => $lead->discovered_at?->toIso8601String(),
            ];
        })->values()->toArray();

        if (empty($leadsData)) {
            return [
                'success' => true,
                'synced' => 0,
                'skipped' => 0,
                'error' => null,
            ];
        }

        try {
            $response = \Illuminate\Support\Facades\Http::timeout($timeout)
                ->withHeaders([
                    'X-Sync-Token' => $productionToken,
                    'Accept' => 'application/json',
                ])
                ->post($productionUrl, [
                    'leads' => $leadsData,
                    'notify' => $notify,
                ]);

            if ($response->successful()) {
                $data = $response->json();

                return [
                    'success' => true,
                    'synced' => $data['synced'] ?? 0,
                    'skipped' => $data['skipped'] ?? 0,
                    'notified' => $data['notified'] ?? 0,
                    'error' => null,
                ];
            }

            return [
                'success' => false,
                'synced' => 0,
                'skipped' => 0,
                'error' => "HTTP {$response->status()}: {$response->body()}",
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'synced' => 0,
                'skipped' => 0,
                'error' => $e->getMessage(),
            ];
        }
    }
}
