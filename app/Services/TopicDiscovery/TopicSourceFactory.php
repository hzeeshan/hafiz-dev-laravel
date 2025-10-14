<?php

namespace App\Services\TopicDiscovery;

use App\Contracts\TopicSourceInterface;
use App\Services\TopicDiscovery\Sources\GoogleTrendsSource;
use App\Services\TopicDiscovery\Sources\HackerNewsSource;
use App\Services\TopicDiscovery\Sources\RedditSource;

class TopicSourceFactory
{
    /**
     * Create a topic source by name
     *
     * @throws \InvalidArgumentException
     */
    public static function make(string $source): TopicSourceInterface
    {
        return match ($source) {
            'reddit' => new RedditSource(),
            'hackernews' => new HackerNewsSource(),
            'google_trends' => new GoogleTrendsSource(),
            default => throw new \InvalidArgumentException("Unknown topic source: {$source}"),
        };
    }

    /**
     * Create all enabled sources
     *
     * @return array<TopicSourceInterface>
     */
    public static function makeAll(): array
    {
        $sources = [];
        $config = config('topic_discovery.sources', []);

        foreach ($config as $sourceName => $sourceConfig) {
            if (($sourceConfig['enabled'] ?? true)) {
                try {
                    $sources[] = self::make($sourceName);
                } catch (\InvalidArgumentException $e) {
                    // Skip unknown sources
                    continue;
                }
            }
        }

        return $sources;
    }

    /**
     * Get list of available source names
     */
    public static function availableSources(): array
    {
        return ['reddit', 'hackernews', 'google_trends'];
    }
}
