<?php

namespace App\Services\TopicDiscovery\Sources;

use App\Contracts\TopicSourceInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HackerNewsSource implements TopicSourceInterface
{
    protected const BASE_URL = 'https://hacker-news.firebaseio.com/v0';

    public function getName(): string
    {
        return 'hackernews';
    }

    public function fetchTopics(array $config): array
    {
        $keywords = $config['keywords'] ?? ['laravel', 'php'];
        $minPoints = $config['min_points'] ?? 100;
        $limit = $config['limit'] ?? 30;

        try {
            // Fetch top story IDs
            $storyIds = $this->fetchTopStories($limit);

            $topics = [];

            foreach ($storyIds as $id) {
                $story = $this->fetchStory($id);

                if (!$story) {
                    continue;
                }

                // Filter by minimum points
                if (($story['score'] ?? 0) < $minPoints) {
                    continue;
                }

                // Filter by keywords
                if (!$this->matchesKeywords($story['title'] ?? '', $keywords)) {
                    continue;
                }

                // Extract keywords from title
                $extractedKeywords = $this->extractKeywords($story['title'] ?? '');

                $topics[] = [
                    'title' => $story['title'] ?? 'Untitled',
                    'url' => $story['url'] ?? "https://news.ycombinator.com/item?id={$id}",
                    'excerpt' => $story['text'] ?? null,
                    'score' => $story['score'] ?? 0,
                    'comments' => $story['descendants'] ?? 0,
                    'source' => 'hackernews',
                    'source_id' => (string) $id,
                    'keywords' => $extractedKeywords,
                    'metadata' => [
                        'by' => $story['by'] ?? 'unknown',
                        'time' => $story['time'] ?? time(),
                        'type' => $story['type'] ?? 'story',
                        'hn_url' => "https://news.ycombinator.com/item?id={$id}",
                    ],
                    'discovered_at' => now(),
                ];
            }

            return $topics;
        } catch (\Exception $e) {
            Log::warning('Failed to fetch from Hacker News', [
                'error' => $e->getMessage(),
            ]);

            return [];
        }
    }

    /**
     * Fetch top story IDs from Hacker News
     */
    protected function fetchTopStories(int $limit): array
    {
        $response = Http::timeout(10)
            ->get(self::BASE_URL . '/topstories.json');

        if (!$response->successful()) {
            throw new \Exception("Hacker News API returned {$response->status()}");
        }

        $storyIds = $response->json();

        return array_slice($storyIds, 0, $limit);
    }

    /**
     * Fetch individual story details
     */
    protected function fetchStory(int $id): ?array
    {
        try {
            $response = Http::timeout(5)
                ->get(self::BASE_URL . "/item/{$id}.json");

            if (!$response->successful()) {
                return null;
            }

            return $response->json();
        } catch (\Exception $e) {
            Log::debug("Failed to fetch HN story {$id}: {$e->getMessage()}");
            return null;
        }
    }

    /**
     * Check if title matches any of the keywords
     */
    protected function matchesKeywords(string $title, array $keywords): bool
    {
        $titleLower = strtolower($title);

        foreach ($keywords as $keyword) {
            if (str_contains($titleLower, strtolower($keyword))) {
                return true;
            }
        }

        return false;
    }

    /**
     * Extract keywords from title
     */
    protected function extractKeywords(string $title): array
    {
        $keywords = [];

        // Tech terms relevant to full-stack development
        $techTerms = [
            // Backend
            'laravel',
            'php',
            'symfony',
            'api',
            'rest',
            'graphql',
            'backend',
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
            // Full-Stack
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
            'devops',
            // Testing
            'testing',
            'phpunit',
            'pest',
            'tdd',
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
            'indie hacker',
            'side project',
            // Performance & Security
            'performance',
            'optimization',
            'scaling',
            'security',
            'caching',
            // Chrome Extensions
            'chrome extension',
            'browser extension',
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
}
