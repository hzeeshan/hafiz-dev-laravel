<?php

namespace App\Services\LeadFinder\Sources;

use App\Contracts\LeadSourceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RedditLeadSource implements LeadSourceInterface
{
    protected const USER_AGENT = 'hafiz.dev lead finder bot v1.0';

    public function getName(): string
    {
        return 'reddit';
    }

    public function fetchLeads(array $config): array
    {
        $leads = [];
        $subreddits = $config['subreddits'] ?? [];
        $limit = $config['limit'] ?? 25;
        $maxAgeHours = $config['max_age_hours'] ?? 48;
        $minUpvotes = $config['min_upvotes'] ?? 1;
        $sort = $config['sort'] ?? 'new';

        $cutoffTime = now()->subHours($maxAgeHours);

        foreach ($subreddits as $subreddit) {
            try {
                $posts = $this->fetchSubreddit($subreddit, $limit, $sort);

                foreach ($posts as $post) {
                    // Skip posts older than max age
                    $postedAt = Carbon::createFromTimestamp($post['created_utc'] ?? 0);
                    if ($postedAt->isBefore($cutoffTime)) {
                        continue;
                    }

                    // Skip posts below minimum upvotes
                    if (($post['ups'] ?? 0) < $minUpvotes) {
                        continue;
                    }

                    // Get text content (title + body)
                    $title = $post['title'] ?? '';
                    $body = $post['selftext'] ?? '';
                    $fullText = $title.' '.$body;

                    // Check for exclude keywords
                    if ($this->hasExcludeKeywords($fullText)) {
                        Log::debug("Lead Finder: Skipping excluded post: {$title}");

                        continue;
                    }

                    // Find intent keywords
                    $intentKeywords = $this->findIntentKeywords($fullText);

                    // Build lead data
                    $leads[] = [
                        'title' => Str::limit($title, 500),
                        'url' => "https://reddit.com{$post['permalink']}",
                        'body' => Str::limit($body, 2000),
                        'author' => $post['author'] ?? 'unknown',
                        'score' => $post['ups'] ?? 0,
                        'comments' => $post['num_comments'] ?? 0,
                        'source' => 'reddit',
                        'source_id' => $post['id'] ?? $post['name'] ?? uniqid(),
                        'subreddit' => $subreddit,
                        'intent_keywords_found' => $intentKeywords,
                        'metadata' => [
                            'subreddit' => $subreddit,
                            'permalink' => $post['permalink'] ?? null,
                            'is_self' => $post['is_self'] ?? true,
                            'link_flair_text' => $post['link_flair_text'] ?? null,
                            'upvote_ratio' => $post['upvote_ratio'] ?? null,
                        ],
                        'posted_at' => $postedAt,
                        'discovered_at' => now(),
                    ];
                }

                // Rate limiting - small delay between subreddit requests
                usleep(500000); // 0.5 seconds

            } catch (\Exception $e) {
                Log::error("Lead Finder: Failed to fetch r/{$subreddit}", [
                    'error' => $e->getMessage(),
                ]);
            }
        }

        Log::info('Lead Finder: Reddit fetch complete', [
            'subreddits_checked' => count($subreddits),
            'leads_found' => count($leads),
        ]);

        return $leads;
    }

    /**
     * Fetch posts from a subreddit.
     */
    protected function fetchSubreddit(string $subreddit, int $limit, string $sort): array
    {
        $response = Http::timeout(15)
            ->withHeaders(['User-Agent' => self::USER_AGENT])
            ->get("https://www.reddit.com/r/{$subreddit}/{$sort}.json", [
                'limit' => $limit,
            ]);

        if (! $response->successful()) {
            throw new \Exception("Reddit API returned {$response->status()} for r/{$subreddit}");
        }

        return collect($response->json()['data']['children'] ?? [])
            ->pluck('data')
            ->toArray();
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
