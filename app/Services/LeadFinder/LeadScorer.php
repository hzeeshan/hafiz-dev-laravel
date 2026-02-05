<?php

namespace App\Services\LeadFinder;

use Carbon\Carbon;

class LeadScorer
{
    /**
     * Calculate lead score based on BUYING INTENT (0-10 scale).
     *
     * Score = Intent Keywords (max 4) + Freshness (max 2) + Specificity (max 2) + Subreddit Bonus (max 2)
     */
    public static function calculate(array $lead): float
    {
        $score = 0.0;

        // 1. Intent Keywords Score - max 4 points
        $intentScore = self::calculateIntentScore($lead['intent_keywords_found'] ?? []);
        $score += $intentScore;

        // 2. Freshness Score - max 2 points
        $freshnessScore = self::calculateFreshnessScore($lead['posted_at'] ?? now());
        $score += $freshnessScore;

        // 3. Specificity Score - max 2 points
        $specificityScore = self::calculateSpecificityScore($lead);
        $score += $specificityScore;

        // 4. Subreddit/Source Bonus - max 2 points
        $subredditBonus = self::calculateSubredditBonus($lead['subreddit'] ?? null);
        $score += $subredditBonus;

        return round(min($score, 10.0), 1);
    }

    /**
     * Calculate score based on intent keywords found.
     * - HIGH keywords: +1.0 each (cap at 3.0)
     * - MEDIUM keywords: +0.5 each (cap at 2.0)
     * - LOW keywords: +0.2 each (cap at 1.0)
     * Total capped at 4.0
     */
    protected static function calculateIntentScore(array $intentKeywords): float
    {
        $highCount = count($intentKeywords['high'] ?? []);
        $mediumCount = count($intentKeywords['medium'] ?? []);
        $lowCount = count($intentKeywords['low'] ?? []);

        $highScore = min($highCount * 1.0, 3.0);
        $mediumScore = min($mediumCount * 0.5, 2.0);
        $lowScore = min($lowCount * 0.2, 1.0);

        return min($highScore + $mediumScore + $lowScore, 4.0);
    }

    /**
     * Calculate freshness score - newer posts are more valuable.
     * - Posted < 2 hours ago: 2.0
     * - Posted < 6 hours ago: 1.5
     * - Posted < 12 hours ago: 1.0
     * - Posted < 24 hours ago: 0.5
     * - Posted < 48 hours ago: 0.2
     * - Older: 0.0
     */
    protected static function calculateFreshnessScore(Carbon|string $postedAt): float
    {
        if (is_string($postedAt)) {
            $postedAt = Carbon::parse($postedAt);
        }

        $hoursAgo = $postedAt->diffInHours(now());

        return match (true) {
            $hoursAgo < 2 => 2.0,
            $hoursAgo < 6 => 1.5,
            $hoursAgo < 12 => 1.0,
            $hoursAgo < 24 => 0.5,
            $hoursAgo < 48 => 0.2,
            default => 0.0,
        };
    }

    /**
     * Calculate specificity score - detailed posts indicate serious buyers.
     * - Has budget/price mentioned: +0.8
     * - Has timeline mentioned: +0.5
     * - Body length > 200 chars (detailed post): +0.4
     * - Mentions specific tech (web app, dashboard, saas, etc.): +0.3
     */
    protected static function calculateSpecificityScore(array $lead): float
    {
        $score = 0.0;
        $title = strtolower($lead['title'] ?? '');
        $body = strtolower($lead['body'] ?? '');
        $fullText = $title.' '.$body;

        // Budget/price mentioned
        $budgetKeywords = ['budget', '$', '€', '£', 'price', 'cost', 'pay', 'paying', 'quote', 'rate'];
        foreach ($budgetKeywords as $keyword) {
            if (str_contains($fullText, $keyword)) {
                $score += 0.8;

                break;
            }
        }

        // Timeline mentioned
        $timelineKeywords = ['deadline', 'asap', 'urgent', 'this week', 'next week', 'by end of', 'timeline', 'timeframe'];
        foreach ($timelineKeywords as $keyword) {
            if (str_contains($fullText, $keyword)) {
                $score += 0.5;

                break;
            }
        }

        // Detailed body (> 200 chars indicates serious inquiry)
        if (strlen($lead['body'] ?? '') > 200) {
            $score += 0.4;
        }

        // Specific tech mentioned
        $techKeywords = ['web app', 'dashboard', 'saas', 'chrome extension', 'automation', 'api', 'mobile app', 'platform'];
        foreach ($techKeywords as $keyword) {
            if (str_contains($fullText, $keyword)) {
                $score += 0.3;

                break;
            }
        }

        return min($score, 2.0);
    }

    /**
     * Calculate subreddit bonus - some subreddits indicate higher intent.
     */
    protected static function calculateSubredditBonus(?string $subreddit): float
    {
        if (! $subreddit) {
            return 0.0;
        }

        $bonuses = config('lead_finder.high_intent_subreddits', []);

        return $bonuses[$subreddit] ?? 0.0;
    }

    /**
     * Get score category for display.
     */
    public static function getScoreCategory(float $score): string
    {
        return match (true) {
            $score >= 8.0 => 'hot_lead',
            $score >= 6.0 => 'strong_lead',
            $score >= 4.0 => 'worth_checking',
            $score >= 2.0 => 'saved',
            default => 'skip',
        };
    }

    /**
     * Get display label for score category.
     */
    public static function getScoreCategoryLabel(float $score): string
    {
        return match (true) {
            $score >= 8.0 => '🔥 Hot Lead',
            $score >= 6.0 => '⭐ Strong Lead',
            $score >= 4.0 => '👀 Worth Checking',
            $score >= 2.0 => '📋 Saved',
            default => '⏭️ Skip',
        };
    }

    /**
     * Check if score meets notification threshold.
     */
    public static function meetsNotificationThreshold(float $score, ?float $threshold = null): bool
    {
        $threshold = $threshold ?? config('lead_finder.notification_threshold', 5.0);

        return $score >= $threshold;
    }

    /**
     * Check if score meets minimum save threshold.
     */
    public static function meetsSaveThreshold(float $score, ?float $threshold = null): bool
    {
        $threshold = $threshold ?? config('lead_finder.min_save_threshold', 2.0);

        return $score >= $threshold;
    }

    /**
     * Generate a suggested approach based on lead characteristics.
     */
    public static function generateSuggestedApproach(array $lead): string
    {
        $subreddit = $lead['subreddit'] ?? null;
        $approaches = config('lead_finder.suggested_approaches', []);

        // Check for high-intent subreddits first
        if ($subreddit && isset($approaches[$subreddit])) {
            return $approaches[$subreddit];
        }

        // Check for specific signals in content
        $fullText = strtolower(($lead['title'] ?? '').' '.($lead['body'] ?? ''));

        // Budget mentioned = serious buyer
        $budgetKeywords = ['budget', '$', '€', '£', 'pay', 'paying', 'cost'];
        foreach ($budgetKeywords as $keyword) {
            if (str_contains($fullText, $keyword)) {
                return $approaches['budget_mentioned'] ?? 'Budget mentioned. This is a serious inquiry - respond promptly.';
            }
        }

        // Automation/process pain
        $automationKeywords = ['automate', 'automation', 'manual', 'excel', 'spreadsheet'];
        foreach ($automationKeywords as $keyword) {
            if (str_contains($fullText, $keyword)) {
                return $approaches['automation'] ?? 'Process pain point. Lead with time savings and automation angle.';
            }
        }

        // No-code limits
        $nocodeKeywords = ['no-code', 'nocode', 'bubble', 'webflow', 'outgrew', 'limits'];
        foreach ($nocodeKeywords as $keyword) {
            if (str_contains($fullText, $keyword)) {
                return $approaches['nocode_limits'] ?? 'No-code limitations. Emphasize custom solutions and scalability.';
            }
        }

        // Default
        return $approaches['default'] ?? 'Potential lead. Reply with helpful advice first, mention your services naturally.';
    }
}
