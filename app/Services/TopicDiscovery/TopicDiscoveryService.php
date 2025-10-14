<?php

namespace App\Services\TopicDiscovery;

use App\Models\BlogTopic;
use App\Models\TrendingTopicSource;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TopicDiscoveryService
{
    public function __construct(
        protected NotificationService $notifications
    ) {}

    /**
     * Discover topics from specified sources
     *
     * @param array $sourceNames Source names to use (e.g., ['reddit', 'hackernews'])
     * @param bool $autoCreate Auto-create BlogTopics for high-scoring topics
     * @return array Discovery results
     */
    public function discover(array $sourceNames = [], bool $autoCreate = false): array
    {
        $discovered = [];
        $created = [];
        $errors = [];

        // Use all sources if none specified
        if (empty($sourceNames)) {
            $sourceNames = array_keys(config('topic_discovery.sources', []));
        }

        foreach ($sourceNames as $sourceName) {
            try {
                $source = TopicSourceFactory::make($sourceName);
                $config = config("topic_discovery.sources.{$sourceName}", []);

                Log::info("Fetching topics from {$sourceName}...");

                $topics = $source->fetchTopics($config);

                foreach ($topics as $topicData) {
                    // Calculate score
                    $score = TopicScorer::calculate($topicData);

                    // Check for duplicates
                    if ($this->isDuplicate($topicData)) {
                        Log::debug("Skipping duplicate: {$topicData['title']}");
                        continue;
                    }

                    // Save to database
                    $trending = TrendingTopicSource::create([
                        'source' => $topicData['source'],
                        'source_id' => $topicData['source_id'],
                        'title' => $topicData['title'],
                        'url' => $topicData['url'],
                        'excerpt' => $topicData['excerpt'],
                        'metadata' => $topicData['metadata'],
                        'calculated_score' => $score,
                        'upvotes' => $topicData['score'],
                        'comments_count' => $topicData['comments'],
                        'keywords' => $topicData['keywords'],
                        'discovered_at' => $topicData['discovered_at'],
                    ]);

                    $result = [
                        'trending' => $trending,
                        'score' => $score,
                        'score_category' => TopicScorer::getScoreCategory($score),
                        'auto_created' => false,
                    ];

                    // Auto-create BlogTopic if score meets threshold
                    if ($autoCreate && TopicScorer::meetsThreshold($score)) {
                        try {
                            $blogTopic = $this->createBlogTopic($trending);
                            $result['blog_topic'] = $blogTopic;
                            $result['auto_created'] = true;
                            $created[] = $blogTopic;
                        } catch (\Exception $e) {
                            Log::error("Failed to create BlogTopic from trending topic", [
                                'trending_id' => $trending->id,
                                'error' => $e->getMessage(),
                            ]);
                        }
                    }

                    $discovered[] = $result;
                }

                Log::info("Fetched " . count($topics) . " topics from {$sourceName}");
            } catch (\Exception $e) {
                $errors[] = [
                    'source' => $sourceName,
                    'error' => $e->getMessage(),
                ];

                Log::error("Failed to fetch from {$sourceName}", [
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return [
            'discovered' => $discovered,
            'created' => $created,
            'errors' => $errors,
        ];
    }

    /**
     * Create BlogTopic from TrendingTopicSource
     */
    public function createBlogTopic(TrendingTopicSource $trending): BlogTopic
    {
        // Determine content type based on title
        $contentType = $this->guessContentType($trending->title);

        // Extract or generate description
        $description = $trending->excerpt ?? "Blog post about {$trending->title}";

        // Create BlogTopic
        $blogTopic = BlogTopic::create([
            'title' => $trending->title,
            'keywords' => implode(', ', $trending->keywords ?? []),
            'description' => Str::limit($description, 500),
            'content_type' => $contentType,
            'generation_mode' => 'topic',
            'status' => 'pending',
            'priority' => $this->calculatePriority($trending->calculated_score),
            'source_url' => $trending->url,
            'source_metadata' => [
                'discovered_from' => $trending->source,
                'original_score' => $trending->upvotes,
                'calculated_score' => $trending->calculated_score,
            ],
        ]);

        // Link trending source to blog topic
        $trending->update([
            'blog_topic_id' => $blogTopic->id,
            'converted_at' => now(),
        ]);

        Log::info("Created BlogTopic from trending source", [
            'blog_topic_id' => $blogTopic->id,
            'trending_id' => $trending->id,
            'title' => $blogTopic->title,
        ]);

        return $blogTopic;
    }

    /**
     * Check if topic is duplicate
     */
    protected function isDuplicate(array $topicData): bool
    {
        if (!config('topic_discovery.duplicate_detection.enabled', true)) {
            return false;
        }

        $lookbackDays = config('topic_discovery.duplicate_detection.lookback_days', 30);

        // Check if same source_id exists
        $existingBySourceId = TrendingTopicSource::where('source', $topicData['source'])
            ->where('source_id', $topicData['source_id'])
            ->where('discovered_at', '>=', now()->subDays($lookbackDays))
            ->exists();

        if ($existingBySourceId) {
            return true;
        }

        // Check title similarity
        $similarThreshold = config('topic_discovery.duplicate_detection.similarity_threshold', 0.8);
        $recentTopics = TrendingTopicSource::where('discovered_at', '>=', now()->subDays($lookbackDays))
            ->pluck('title');

        foreach ($recentTopics as $existingTitle) {
            if ($this->calculateSimilarity($topicData['title'], $existingTitle) >= $similarThreshold) {
                return true;
            }
        }

        return false;
    }

    /**
     * Calculate string similarity (0-1)
     */
    protected function calculateSimilarity(string $str1, string $str2): float
    {
        similar_text(strtolower($str1), strtolower($str2), $percent);

        return $percent / 100;
    }

    /**
     * Guess content type from title
     */
    protected function guessContentType(string $title): string
    {
        $titleLower = strtolower($title);
        $mapping = config('topic_discovery.content_type_mapping', []);

        foreach ($mapping as $type => $keywords) {
            foreach ($keywords as $keyword) {
                if (str_contains($titleLower, strtolower($keyword))) {
                    return $type;
                }
            }
        }

        // Default to technical
        return 'technical';
    }

    /**
     * Calculate priority (1-10) from score
     */
    protected function calculatePriority(float $score): int
    {
        return (int) min(ceil($score), 10);
    }
}
