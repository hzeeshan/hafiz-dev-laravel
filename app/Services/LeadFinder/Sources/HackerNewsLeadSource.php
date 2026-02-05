<?php

namespace App\Services\LeadFinder\Sources;

use App\Contracts\LeadSourceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class HackerNewsLeadSource implements LeadSourceInterface
{
    /**
     * HN Algolia Search API - allows keyword search and date filtering.
     */
    protected const ALGOLIA_BASE_URL = 'https://hn.algolia.com/api/v1';

    public function getName(): string
    {
        return 'hackernews';
    }

    public function fetchLeads(array $config): array
    {
        $leads = [];
        $searchQueries = $config['search_queries'] ?? [];
        $minPoints = $config['min_points'] ?? 1;
        $maxAgeHours = $config['max_age_hours'] ?? 48;
        $limit = $config['limit'] ?? 30;

        $cutoffTimestamp = now()->subHours($maxAgeHours)->timestamp;
        $seenIds = []; // Track seen IDs to avoid duplicates across queries

        foreach ($searchQueries as $query) {
            try {
                $results = $this->searchByQuery($query, $cutoffTimestamp, $limit);

                foreach ($results as $story) {
                    // Skip if already seen (same story can match multiple queries)
                    $storyId = (string) ($story['objectID'] ?? $story['story_id'] ?? uniqid());
                    if (isset($seenIds[$storyId])) {
                        continue;
                    }
                    $seenIds[$storyId] = true;

                    // Skip stories below minimum points
                    if (($story['points'] ?? 0) < $minPoints) {
                        continue;
                    }

                    // Get text content
                    $title = $story['title'] ?? '';
                    $body = $story['story_text'] ?? $story['text'] ?? '';
                    $fullText = $title.' '.$body;

                    // Check for exclude keywords
                    if ($this->hasExcludeKeywords($fullText)) {
                        Log::debug("Lead Finder: Skipping excluded HN post: {$title}");

                        continue;
                    }

                    // Find intent keywords
                    $intentKeywords = $this->findIntentKeywords($fullText);

                    // Parse posted time
                    $postedAt = isset($story['created_at'])
                        ? Carbon::parse($story['created_at'])
                        : (isset($story['created_at_i'])
                            ? Carbon::createFromTimestamp($story['created_at_i'])
                            : now());

                    // Build lead data
                    $leads[] = [
                        'title' => Str::limit($title, 500),
                        'url' => $story['url'] ?? "https://news.ycombinator.com/item?id={$storyId}",
                        'body' => Str::limit($body, 2000),
                        'author' => $story['author'] ?? 'unknown',
                        'score' => $story['points'] ?? 0,
                        'comments' => $story['num_comments'] ?? 0,
                        'source' => 'hackernews',
                        'source_id' => $storyId,
                        'subreddit' => null, // Not applicable for HN
                        'intent_keywords_found' => $intentKeywords,
                        'metadata' => [
                            'story_type' => $story['_tags'][0] ?? 'story',
                            'hn_url' => "https://news.ycombinator.com/item?id={$storyId}",
                            'matched_query' => $query,
                        ],
                        'posted_at' => $postedAt,
                        'discovered_at' => now(),
                    ];
                }

                // Rate limiting - small delay between queries
                usleep(300000); // 0.3 seconds

            } catch (\Exception $e) {
                Log::error("Lead Finder: Failed HN search for '{$query}'", [
                    'error' => $e->getMessage(),
                ]);
            }
        }

        Log::info('Lead Finder: Hacker News fetch complete', [
            'queries_searched' => count($searchQueries),
            'leads_found' => count($leads),
        ]);

        return $leads;
    }

    /**
     * Search HN using Algolia API by keyword and date filter.
     */
    protected function searchByQuery(string $query, int $cutoffTimestamp, int $limit): array
    {
        // search_by_date sorts by date (newest first) which is what we want
        $response = Http::timeout(10)
            ->get(self::ALGOLIA_BASE_URL.'/search_by_date', [
                'query' => $query,
                'tags' => 'story', // Only stories (not comments)
                'numericFilters' => "created_at_i>{$cutoffTimestamp}",
                'hitsPerPage' => $limit,
            ]);

        if (! $response->successful()) {
            throw new \Exception("HN Algolia API returned {$response->status()}");
        }

        return $response->json()['hits'] ?? [];
    }

    /**
     * Check if text contains any exclude keywords.
     */
    protected function hasExcludeKeywords(string $text): bool
    {
        $textLower = strtolower($text);
        $excludeKeywords = config('lead_finder.exclude_keywords', []);

        foreach ($excludeKeywords as $keyword) {
            if (str_contains($textLower, strtolower($keyword))) {
                return true;
            }
        }

        return false;
    }

    /**
     * Find all matching intent keywords in text.
     *
     * @return array{high: string[], medium: string[], low: string[]}
     */
    protected function findIntentKeywords(string $text): array
    {
        $textLower = strtolower($text);
        $intentKeywords = config('lead_finder.intent_keywords', []);

        $found = [
            'high' => [],
            'medium' => [],
            'low' => [],
        ];

        foreach (['high', 'medium', 'low'] as $level) {
            foreach ($intentKeywords[$level] ?? [] as $keyword) {
                if (str_contains($textLower, strtolower($keyword))) {
                    $found[$level][] = $keyword;
                }
            }
        }

        return $found;
    }
}
