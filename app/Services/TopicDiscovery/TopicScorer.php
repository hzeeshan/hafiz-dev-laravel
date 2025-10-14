<?php

namespace App\Services\TopicDiscovery;

class TopicScorer
{
    /**
     * Calculate topic score (0-10 scale)
     *
     * @param array $topic Topic data from source
     * @return float Score between 0 and 10
     */
    public static function calculate(array $topic): float
    {
        $score = 0.0;

        // 1. Engagement Score (upvotes/points) - max 4 points
        $engagementScore = min(($topic['score'] ?? 0) / 100, 4.0);
        $score += $engagementScore;

        // 2. Discussion Score (comments) - max 3 points
        $discussionScore = min(($topic['comments'] ?? 0) / 50, 3.0);
        $score += $discussionScore;

        // 3. Keyword Relevance - max 3 points
        $relevanceScore = self::calculateKeywordRelevance($topic);
        $score += $relevanceScore;

        // Cap at 10
        return round(min($score, 10.0), 1);
    }

    /**
     * Calculate keyword relevance score
     */
    protected static function calculateKeywordRelevance(array $topic): float
    {
        $keywords = $topic['keywords'] ?? [];
        $title = strtolower($topic['title'] ?? '');

        // High-value keywords (your competitive advantages & core expertise)
        $highValueKeywords = [
            // Your Core (Laravel + AI)
            'laravel',
            'php',
            'deepseek',
            'ai',
            'llm',
            'automation',
            'chatgpt',
            'openai',
            'claude',
            'claude code',
            // Your Products & Experience
            'saas',
            'filament',
            'chrome extension',
            'browser extension',
            // High SEO Value
            'api',
            'performance',
            'optimization',
            'full-stack',
            'fullstack',
            // Business Keywords
            'startup',
            'monetization',
            'side project',
            'indie hacker',
        ];

        // Medium-value keywords (supporting skills, still valuable for SEO)
        $mediumValueKeywords = [
            // Frontend
            'vue',
            'react',
            'tailwind',
            'alpine',
            'inertia',
            'livewire',
            'javascript',
            // DevOps & Database
            'docker',
            'kubernetes',
            'deployment',
            'database',
            'redis',
            'mysql',
            'postgres',
            // Quality & Security
            'testing',
            'security',
            'tdd',
            'pest',
            'phpunit',
            // General Backend
            'rest',
            'graphql',
            'backend',
            'caching',
        ];

        $score = 0.0;

        foreach ($keywords as $keyword) {
            $keyword = strtolower($keyword);

            if (in_array($keyword, $highValueKeywords)) {
                $score += 0.4;
            } elseif (in_array($keyword, $mediumValueKeywords)) {
                $score += 0.2;
            } else {
                $score += 0.1;
            }
        }

        // Bonus for multiple relevant keywords
        $relevantKeywordCount = count(array_intersect(
            $keywords,
            array_merge($highValueKeywords, $mediumValueKeywords)
        ));

        if ($relevantKeywordCount >= 3) {
            $score += 0.5; // Bonus for multiple relevant keywords
        }

        return min($score, 3.0); // Cap at 3 points
    }

    /**
     * Calculate freshness bonus (newer = better)
     */
    protected static function calculateFreshnessBonus(array $topic): float
    {
        $discoveredAt = $topic['discovered_at'] ?? now();
        $hoursAgo = now()->diffInHours($discoveredAt);

        if ($hoursAgo < 6) {
            return 1.0; // Very fresh
        } elseif ($hoursAgo < 24) {
            return 0.7; // Fresh
        } elseif ($hoursAgo < 72) {
            return 0.4; // Still relevant
        }

        return 0.0; // Older content
    }

    /**
     * Get score category label
     */
    public static function getScoreCategory(float $score): string
    {
        return match (true) {
            $score >= 9.0 => '🔥 Excellent',
            $score >= 7.0 => '⭐ High',
            $score >= 5.0 => '✓ Good',
            $score >= 3.0 => '~ Fair',
            default => '× Low',
        };
    }

    /**
     * Check if score meets auto-create threshold
     */
    public static function meetsThreshold(float $score, ?float $threshold = null): bool
    {
        $threshold = $threshold ?? config('topic_discovery.auto_create_threshold', 7.0);

        return $score >= $threshold;
    }
}
