<?php

namespace App\Services\TopicDiscovery\Sources;

use App\Contracts\TopicSourceInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RedditSource implements TopicSourceInterface
{
    public function getName(): string
    {
        return 'reddit';
    }

    public function fetchTopics(array $config): array
    {
        $topics = [];
        $subreddits = $config['subreddits'] ?? ['laravel'];
        $minUpvotes = $config['min_upvotes'] ?? 50;
        $limit = $config['limit'] ?? 25;

        foreach ($subreddits as $subreddit) {
            try {
                $posts = $this->fetchSubreddit($subreddit, $limit);

                foreach ($posts as $post) {
                    // Filter by minimum upvotes
                    if ($post['ups'] < $minUpvotes) {
                        continue;
                    }

                    // Extract keywords from title and subreddit
                    $keywords = $this->extractKeywords($post['title'], $subreddit);

                    $topics[] = [
                        'title' => $post['title'],
                        'url' => $post['url'],
                        'excerpt' => $this->cleanExcerpt($post['selftext'] ?? null),
                        'score' => $post['ups'],
                        'comments' => $post['num_comments'],
                        'source' => 'reddit',
                        'source_id' => $post['id'],
                        'keywords' => $keywords,
                        'metadata' => [
                            'subreddit' => $subreddit,
                            'author' => $post['author'],
                            'created_utc' => $post['created_utc'],
                            'permalink' => "https://reddit.com{$post['permalink']}",
                            'is_self' => $post['is_self'],
                        ],
                        'discovered_at' => now(),
                    ];
                }
            } catch (\Exception $e) {
                Log::warning("Failed to fetch from r/{$subreddit}", [
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return $topics;
    }

    /**
     * Fetch posts from a subreddit using Reddit JSON API
     */
    protected function fetchSubreddit(string $subreddit, int $limit): array
    {
        $response = Http::timeout(15)
            ->withHeaders([
                'User-Agent' => 'hafiz.dev blog topic discovery bot v1.0',
            ])
            ->get("https://www.reddit.com/r/{$subreddit}/hot.json", [
                'limit' => $limit,
            ]);

        if (!$response->successful()) {
            throw new \Exception("Reddit API returned {$response->status()}");
        }

        $data = $response->json();

        return collect($data['data']['children'] ?? [])
            ->pluck('data')
            ->toArray();
    }

    /**
     * Extract keywords from title and context
     */
    protected function extractKeywords(string $title, string $subreddit): array
    {
        $keywords = [];

        // Add subreddit as keyword
        $keywords[] = strtolower($subreddit);

        // Extract tech terms relevant to full-stack development
        $techTerms = [
            // Backend
            'laravel',
            'php',
            'symfony',
            'api',
            'rest',
            'graphql',
            'backend',
            'eloquent',
            'migration',
            'seeder',
            'queue',
            'jobs',
            'events',
            'claude',
            'claude code',
            // Frontend
            'vue',
            'react',
            'tailwind',
            'alpine',
            'inertia',
            'livewire',
            'javascript',
            'typescript',
            // Full-Stack Tools
            'filament',
            'nova',
            'full-stack',
            'fullstack',
            // Database
            'database',
            'mysql',
            'postgres',
            'redis',
            'mongodb',
            'sql',
            // DevOps
            'docker',
            'kubernetes',
            'deployment',
            'ci/cd',
            'nginx',
            'hosting',
            // Testing
            'testing',
            'phpunit',
            'pest',
            'test-driven',
            // AI & Automation
            'ai',
            'openai',
            'deepseek',
            'claude',
            'chatgpt',
            'llm',
            'automation',
            // SaaS & Business
            'saas',
            'startup',
            'monetization',
            'indie',
            'side-project',
            // Performance
            'performance',
            'optimization',
            'caching',
            'scaling',
            // Chrome Extensions
            'chrome',
            'extension',
            'browser',
            'manifest',
        ];

        $titleLower = strtolower($title);

        foreach ($techTerms as $term) {
            if (str_contains($titleLower, $term)) {
                $keywords[] = $term;
            }
        }

        return array_unique($keywords);
    }

    /**
     * Clean and truncate excerpt
     */
    protected function cleanExcerpt(?string $text): ?string
    {
        if (empty($text)) {
            return null;
        }

        // Remove markdown, trim, limit length
        $cleaned = strip_tags($text);
        $cleaned = Str::limit($cleaned, 300);

        return $cleaned;
    }
}
