<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DiscoveredLead;
use App\Services\LeadFinder\LeadScorer;
use App\Services\NotificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DiscoveredLeadSyncController extends Controller
{
    public function __construct(
        protected NotificationService $notifications
    ) {}

    /**
     * Receive and store leads from local machine.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'leads' => 'required|array',
            'leads.*.source' => 'required|string|in:reddit,hackernews',
            'leads.*.source_id' => 'required|string',
            'leads.*.title' => 'required|string|max:500',
            'leads.*.url' => 'required|url|max:500',
            'leads.*.body' => 'nullable|string',
            'leads.*.author' => 'nullable|string',
            'leads.*.subreddit' => 'nullable|string',
            'leads.*.calculated_score' => 'required|numeric|min:0|max:10',
            'leads.*.score_category' => 'required|string',
            'leads.*.upvotes' => 'required|integer|min:0',
            'leads.*.comments_count' => 'required|integer|min:0',
            'leads.*.intent_keywords_found' => 'nullable|array',
            'leads.*.metadata' => 'nullable|array',
            'leads.*.posted_at' => 'nullable|date',
            'leads.*.discovered_at' => 'nullable|date',
            'notify' => 'boolean',
        ]);

        $leads = $validated['leads'];
        $notify = $validated['notify'] ?? false;

        $synced = 0;
        $skipped = 0;
        $notified = 0;

        foreach ($leads as $leadData) {
            // Check for duplicates
            if ($this->isDuplicate($leadData)) {
                Log::debug('Lead Sync: Skipping duplicate', ['title' => $leadData['title']]);
                $skipped++;

                continue;
            }

            // Create or update lead
            $lead = DiscoveredLead::updateOrCreate(
                [
                    'source' => $leadData['source'],
                    'source_id' => $leadData['source_id'],
                ],
                [
                    'title' => $leadData['title'],
                    'url' => $leadData['url'],
                    'body' => $leadData['body'] ?? null,
                    'author' => $leadData['author'] ?? null,
                    'subreddit' => $leadData['subreddit'] ?? null,
                    'calculated_score' => $leadData['calculated_score'],
                    'score_category' => $leadData['score_category'],
                    'upvotes' => $leadData['upvotes'],
                    'comments_count' => $leadData['comments_count'],
                    'intent_keywords_found' => $leadData['intent_keywords_found'] ?? [],
                    'metadata' => $leadData['metadata'] ?? [],
                    'posted_at' => $leadData['posted_at'] ?? now(),
                    'discovered_at' => $leadData['discovered_at'] ?? now(),
                    'status' => 'new',
                ]
            );

            $synced++;

            // Send notification if enabled and meets threshold
            if ($notify && LeadScorer::meetsNotificationThreshold($lead->calculated_score) && ! $lead->notified) {
                try {
                    $this->sendLeadNotification($lead);
                    $lead->update([
                        'notified' => true,
                        'notified_at' => now(),
                    ]);
                    $notified++;
                } catch (\Exception $e) {
                    Log::error('Lead Sync: Failed to send notification', [
                        'lead_id' => $lead->id,
                        'error' => $e->getMessage(),
                    ]);
                }
            }
        }

        Log::info('Lead Sync completed', [
            'synced' => $synced,
            'skipped' => $skipped,
            'notified' => $notified,
        ]);

        return response()->json([
            'success' => true,
            'synced' => $synced,
            'skipped' => $skipped,
            'notified' => $notified,
        ]);
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
        $similarityThreshold = config('lead_finder.duplicate_detection.similarity_threshold', 0.8);

        // Check for similar titles (exclude exact matches - updateOrCreate handles those)
        $recentTitles = DiscoveredLead::where('discovered_at', '>=', now()->subDays($lookbackDays))
            ->where(function ($query) use ($leadData) {
                $query->where('source', '!=', $leadData['source'])
                    ->orWhere('source_id', '!=', $leadData['source_id']);
            })
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
}
