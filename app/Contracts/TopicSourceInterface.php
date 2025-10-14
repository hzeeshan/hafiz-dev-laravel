<?php

namespace App\Contracts;

interface TopicSourceInterface
{
    /**
     * Fetch topics from the source
     *
     * @param array $config Source configuration
     * @return array Array of discovered topics with structure:
     *               [
     *                   'title' => string,
     *                   'url' => string|null,
     *                   'excerpt' => string|null,
     *                   'score' => int (upvotes/points),
     *                   'comments' => int,
     *                   'source' => string,
     *                   'source_id' => string,
     *                   'keywords' => array,
     *                   'metadata' => array (raw API data),
     *                   'discovered_at' => Carbon,
     *               ]
     */
    public function fetchTopics(array $config): array;

    /**
     * Get source name identifier
     */
    public function getName(): string;
}
