<?php

namespace App\Jobs;

use App\Models\BlogGenerationLog;
use App\Models\BlogTopic;
use App\Models\Post;
use App\Services\BlogContentGenerator;
use App\Services\AI\FalImageService;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GenerateBlogPostJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $timeout = 600; // 10 minutes
    public int $tries = 1; // Single attempt, manual retry via admin

    /**
     * Create a new job instance.
     */
    public function __construct(
        public BlogTopic $topic
    ) {}

    /**
     * Execute the job.
     */
    public function handle(BlogContentGenerator $contentGenerator, FalImageService $imageService): void
    {
        // Create generation log
        $log = BlogGenerationLog::create([
            'topic_id' => $this->topic->id,
            'status' => 'started',
        ]);

        $startTime = microtime(true);

        try {
            // Update topic status
            $this->topic->update(['status' => 'generating']);

            // Generate content
            Log::info("Starting content generation for topic: {$this->topic->title}");
            $content = $contentGenerator->generate($this->topic);

            $log->update([
                'status' => 'content_generated',
                'content_tokens' => $content['tokens'] ?? 0,
                'ai_provider' => $content['ai_provider'] ?? 'openrouter',
                'ai_model' => $content['model'] ?? 'unknown',
            ]);

            // Generate featured image (if enabled)
            $featuredImageUrl = null;
            $imageCost = 0;
            $imageCount = 0;

            if (config('blog.featured_images_count', 1) > 0) {
                Log::info("Generating featured image for: {$this->topic->title}");

                try {
                    $imageResult = $imageService->generateFeaturedImage(
                        $content['title'],
                        $content['content']
                    );

                    $featuredImageUrl = $imageResult['local_path'] ?? $imageResult['url'];
                    $imageCost = $imageResult['cost'] ?? 0;
                    $imageCount = 1;

                    $log->update([
                        'status' => 'images_generated',
                        'image_count' => $imageCount,
                    ]);
                } catch (Exception $e) {
                    Log::warning("Featured image generation failed: {$e->getMessage()}");
                    // Continue without image - not a critical failure
                }
            }

            // Create the blog post
            $post = Post::create([
                'blog_topic_id' => $this->topic->id,
                'title' => $content['title'],
                'slug' => Str::slug($content['title']),
                'content' => $content['html_content'],
                'excerpt' => $content['meta_description'],
                'featured_image' => $featuredImageUrl,
                'meta_title' => $content['meta_title'],
                'meta_description' => $content['meta_description'],
                'reading_time' => $content['reading_time'] ?? 5,
                'author_id' => config('blog.default_author_id', 1),
                'auto_generated' => true,
                'generation_quality_score' => $content['quality_score'] ?? null,
                'requires_code_review' => $content['has_code'] ?? false,
                'status' => config('blog.require_review', true) ? 'draft' : 'published',
                'published_at' => config('blog.require_review', true) ? null : now(),
            ]);

            // Calculate total cost
            $contentCost = $content['cost'] ?? 0;
            $totalCost = $contentCost + $imageCost;
            $generationTime = (int) ((microtime(true) - $startTime));

            // Update topic
            $this->topic->update([
                'status' => config('blog.require_review', true) ? 'review' : 'published',
                'generated_at' => now(),
            ]);

            // Complete log
            $log->update([
                'post_id' => $post->id,
                'status' => 'completed',
                'generation_time' => $generationTime,
                'cost_tracking' => [
                    'content' => round($contentCost, 6),
                    'images' => round($imageCost, 6),
                    'total' => round($totalCost, 6),
                    'currency' => 'USD',
                ],
            ]);

            Log::info("Blog post generated successfully", [
                'topic_id' => $this->topic->id,
                'post_id' => $post->id,
                'generation_time' => $generationTime,
                'cost' => $totalCost,
                'quality_score' => $content['quality_score'] ?? 'N/A',
            ]);

            // Send Telegram notification if enabled
            $this->sendTelegramNotification('success', $post, $totalCost, $generationTime);

        } catch (Exception $e) {
            // Update topic back to pending
            $this->topic->update(['status' => 'pending']);

            // Log the error
            $log->update([
                'status' => 'failed',
                'error_message' => $e->getMessage(),
                'error_stack' => $e->getTraceAsString(),
                'generation_time' => (int) ((microtime(true) - $startTime)),
            ]);

            Log::error("Blog post generation failed", [
                'topic_id' => $this->topic->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Send failure notification
            $this->sendTelegramNotification('failure', null, 0, 0, $e->getMessage());

            throw $e;
        }
    }

    /**
     * Send Telegram notification
     */
    protected function sendTelegramNotification(string $type, ?Post $post, float $cost, int $time, ?string $error = null): void
    {
        if (!config('blog.notifications.telegram_enabled', false)) {
            return;
        }

        $shouldNotify = $type === 'success'
            ? config('blog.notifications.notify_on_success', true)
            : config('blog.notifications.notify_on_failure', true);

        if (!$shouldNotify) {
            return;
        }

        try {
            $botToken = config('blog.notifications.telegram_bot_token');
            $chatId = config('blog.notifications.telegram_chat_id');

            if (!$botToken || !$chatId) {
                return;
            }

            $message = $type === 'success'
                ? $this->formatSuccessMessage($post, $cost, $time)
                : $this->formatFailureMessage($error);

            $url = "https://api.telegram.org/bot{$botToken}/sendMessage";

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'HTML',
            ]));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_exec($ch);
            curl_close($ch);
        } catch (Exception $e) {
            Log::warning("Telegram notification failed: {$e->getMessage()}");
        }
    }

    protected function formatSuccessMessage(Post $post, float $cost, int $time): string
    {
        return "✅ <b>Blog Post Generated</b>\n\n"
            . "📝 <b>Title:</b> {$post->title}\n"
            . "⏱ <b>Time:</b> {$time}s\n"
            . "💰 <b>Cost:</b> $" . number_format($cost, 4) . "\n"
            . "📊 <b>Quality:</b> {$post->generation_quality_score}/10\n"
            . "🔍 <b>Status:</b> " . ucfirst($post->status) . "\n\n"
            . "👉 Review at: " . url("/admin/posts/{$post->id}/edit");
    }

    protected function formatFailureMessage(?string $error): string
    {
        return "❌ <b>Blog Generation Failed</b>\n\n"
            . "📝 <b>Topic:</b> {$this->topic->title}\n"
            . "❗️ <b>Error:</b> " . ($error ? Str::limit($error, 200) : 'Unknown error') . "\n\n"
            . "👉 Check logs for details";
    }
}
