<?php

namespace App\Services\LeadFinder;

use App\Contracts\LeadSourceInterface;
use App\Services\LeadFinder\Sources\HackerNewsLeadSource;
use App\Services\LeadFinder\Sources\RedditLeadSource;
use InvalidArgumentException;

class LeadSourceFactory
{
    /**
     * Create a lead source instance by name.
     *
     * @throws InvalidArgumentException
     */
    public static function make(string $source): LeadSourceInterface
    {
        return match ($source) {
            'reddit' => new RedditLeadSource,
            'hackernews' => new HackerNewsLeadSource,
            default => throw new InvalidArgumentException("Unknown lead source: {$source}"),
        };
    }

    /**
     * Create all enabled lead sources from config.
     *
     * @return LeadSourceInterface[]
     */
    public static function makeAll(): array
    {
        $sources = [];
        $config = config('lead_finder.sources', []);

        foreach ($config as $sourceName => $sourceConfig) {
            if ($sourceConfig['enabled'] ?? true) {
                try {
                    $sources[] = self::make($sourceName);
                } catch (InvalidArgumentException $e) {
                    continue;
                }
            }
        }

        return $sources;
    }

    /**
     * Get list of available source names.
     *
     * @return string[]
     */
    public static function availableSources(): array
    {
        return ['reddit', 'hackernews'];
    }
}
