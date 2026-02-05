<?php

namespace App\Contracts;

interface LeadSourceInterface
{
    /**
     * Fetch potential leads from the source.
     *
     * @param  array  $config  Source-specific configuration
     * @return array Array of leads with standardized structure:
     *               - title: string
     *               - url: string
     *               - body: string|null (post body text)
     *               - author: string
     *               - score: int (upvotes)
     *               - comments: int
     *               - source: string ('reddit' or 'hackernews')
     *               - source_id: string
     *               - subreddit: string|null (for Reddit posts)
     *               - intent_keywords_found: array (which intent keywords matched)
     *               - metadata: array (raw API data)
     *               - posted_at: Carbon
     *               - discovered_at: Carbon
     */
    public function fetchLeads(array $config): array;

    /**
     * Get the source name identifier.
     */
    public function getName(): string;
}
