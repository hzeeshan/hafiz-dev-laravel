<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogTopic;
use App\Models\TrendingTopicSource;
use App\Services\NotificationService;
use App\Services\TopicDiscovery\TopicDiscoveryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TrendingTopicSyncController extends Controller
{
    public function __construct(
        protected TopicDiscoveryService $discoveryService,
        protected NotificationService $notifications
    ) {}

    /**
     * Receive and store trending topics from local machine.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'topics' => 'required|array',
            'topics.*.source' => 'required|string',
            'topics.*.source_id' => 'required|string',
            'topics.*.title' => 'required|string|max:500',
            'topics.*.url' => 'required|url|max:500',
            'topics.*.excerpt' => 'nullable|string',
            'topics.*.metadata' => 'nullable|array',
            'topics.*.calculated_score' => 'required|numeric|min:0|max:10',
            'topics.*.upvotes' => 'required|integer|min:0',
            'topics.*.comments_count' => 'required|integer|min:0',
            'topics.*.keywords' => 'nullable|array',
            'topics.*.discovered_at' => 'nullable|date',
            'auto_create' => 'boolean',
            'notify' => 'boolean',
        ]);

        $topics = $validated['topics'];
        $autoCreate = $validated['auto_create'] ?? false;
        $notify = $validated['notify'] ?? false;

        $synced = 0;
        $skipped = 0;
        $blogTopicsCreated = 0;
        $syncedTopics = [];

        foreach ($topics as $topicData) {
            // Check for duplicates using same logic as TopicDiscoveryService
            if ($this->isDuplicate($topicData)) {
                Log::debug("Sync: Skipping duplicate topic", ['title' => $topicData['title']]);
                $skipped++;
                continue;
            }

            // Create or update the trending topic
            $trending = TrendingTopicSource::updateOrCreate(
                [
                    'source' => $topicData['source'],
                    'source_id' => $topicData['source_id'],
                ],
                [
                    'title' => $topicData['title'],
                    'url' => $topicData['url'],
                    'excerpt' => $topicData['excerpt'] ?? null,
                    'metadata' => $topicData['metadata'] ?? [],
                    'calculated_score' => $topicData['calculated_score'],
                    'upvotes' => $topicData['upvotes'],
                    'comments_count' => $topicData['comments_count'],
                    'keywords' => $topicData['keywords'] ?? [],
                    'discovered_at' => $topicData['discovered_at'] ?? now(),
                ]
            );

            $synced++;
            $syncedTopics[] = $trending;

            // Auto-create BlogTopic if score meets threshold and not already converted
            if ($autoCreate && $this->meetsThreshold($trending->calculated_score) && !$trending->isConverted()) {
                try {
                    $blogTopic = $this->createBlogTopic($trending);
                    $blogTopicsCreated++;

                    Log::info("Sync: Auto-created BlogTopic", [
                        'blog_topic_id' => $blogTopic->id,
                        'trending_id' => $trending->id,
                        'title' => $blogTopic->title,
                    ]);
                } catch (\Exception $e) {
                    Log::error("Sync: Failed to create BlogTopic", [
                        'trending_id' => $trending->id,
                        'error' => $e->getMessage(),
                    ]);
                }
            }
        }

        // Send Telegram notification if requested
        if ($notify && $synced > 0) {
            $this->sendNotification($synced, $blogTopicsCreated, $syncedTopics);
        }

        Log::info("Sync completed", [
            'synced' => $synced,
            'skipped' => $skipped,
            'blog_topics_created' => $blogTopicsCreated,
        ]);

        return response()->json([
            'success' => true,
            'synced' => $synced,
            'skipped' => $skipped,
            'blog_topics_created' => $blogTopicsCreated,
        ]);
    }

    /**
     * Check if topic is duplicate (same logic as TopicDiscoveryService).
     */
    protected function isDuplicate(array $topicData): bool
    {
        if (!config('topic_discovery.duplicate_detection.enabled', true)) {
            return false;
        }

        $lookbackDays = config('topic_discovery.duplicate_detection.lookback_days', 30);
        $similarThreshold = config('topic_discovery.duplicate_detection.similarity_threshold', 0.8);

        // Check title similarity against recent topics
        $recentTopics = TrendingTopicSource::where('discovered_at', '>=', now()->subDays($lookbackDays))
            ->where(function ($query) use ($topicData) {
                // Exclude same source_id (we'll update those via updateOrCreate)
                $query->where('source', '!=', $topicData['source'])
                    ->orWhere('source_id', '!=', $topicData['source_id']);
            })
            ->pluck('title');

        foreach ($recentTopics as $existingTitle) {
            if ($this->calculateSimilarity($topicData['title'], $existingTitle) >= $similarThreshold) {
                return true;
            }
        }

        return false;
    }

    /**
     * Calculate string similarity (0-1).
     */
    protected function calculateSimilarity(string $str1, string $str2): float
    {
        similar_text(strtolower($str1), strtolower($str2), $percent);

        return $percent / 100;
    }

    /**
     * Check if score meets auto-create threshold.
     */
    protected function meetsThreshold(float $score): bool
    {
        return $score >= config('topic_discovery.auto_create_threshold', 7.0);
    }

    /**
     * Create BlogTopic from TrendingTopicSource.
     */
    protected function createBlogTopic(TrendingTopicSource $trending): BlogTopic
    {
        $contentType = $this->guessContentType($trending->title);
        $description = $trending->excerpt ?? "Blog post about {$trending->title}";

        $blogTopic = BlogTopic::create([
            'title' => $trending->title,
            'keywords' => implode(', ', $trending->keywords ?? []),
            'description' => Str::limit($description, 500),
            'content_type' => $contentType,
            'generation_mode' => 'topic',
            'status' => 'pending',
            'priority' => (int) min(ceil($trending->calculated_score), 10),
            'source_url' => $trending->url,
            'source_metadata' => [
                'discovered_from' => $trending->source,
                'original_score' => $trending->upvotes,
                'calculated_score' => $trending->calculated_score,
                'synced_from_local' => true,
            ],
        ]);

        // Link trending source to blog topic
        $trending->update([
            'blog_topic_id' => $blogTopic->id,
            'converted_at' => now(),
        ]);

        return $blogTopic;
    }

    /**
     * Guess content type from title.
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

        return 'technical';
    }

    /**
     * Send Telegram notification.
     */
    protected function sendNotification(int $synced, int $blogTopicsCreated, array $syncedTopics): void
    {
        $topTopics = collect($syncedTopics)
            ->sortByDesc('calculated_score')
            ->take(5)
            ->map(fn ($topic) => sprintf(
                "• %.1f/10 - %s",
                $topic->calculated_score,
                Str::limit($topic->title, 50)
            ))
            ->join("\n");

        $message = "🔄 <b>Topic Sync Complete</b>\n\n"
            . "📊 <b>Summary:</b>\n"
            . "• Synced: {$synced} topics\n"
            . "• Auto-created: {$blogTopicsCreated} BlogTopics\n\n"
            . "🎯 <b>Top Topics:</b>\n"
            . $topTopics . "\n\n"
            . "✅ Check your admin panel to review!";

        $this->notifications->sendCustomMessage($message);
    }
}
