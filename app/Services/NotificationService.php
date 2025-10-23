<?php

namespace App\Services;

use App\Models\BlogTopic;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    protected ?string $botToken;
    protected ?string $chatId;
    protected bool $enabled;

    public function __construct()
    {
        $this->botToken = config('blog.notifications.telegram_bot_token');
        $this->chatId = config('blog.notifications.telegram_chat_id');
        $this->enabled = config('blog.notifications.telegram_enabled', true);
    }

    /**
     * Send success notification when blog post is generated
     */
    public function sendGenerationSuccess(BlogTopic $topic, Post $post, array $metadata = []): void
    {
        if (!$this->enabled || !$this->botToken || !$this->chatId) {
            return;
        }

        $message = $this->formatSuccessMessage($topic, $post, $metadata);
        $this->sendMessage($message);
    }

    /**
     * Send failure notification when blog generation fails
     */
    public function sendGenerationFailure(BlogTopic $topic, string $error, array $metadata = []): void
    {
        if (!$this->enabled || !$this->botToken || !$this->chatId) {
            return;
        }

        $message = $this->formatFailureMessage($topic, $error, $metadata);
        $this->sendMessage($message);
    }

    /**
     * Send custom notification
     */
    public function sendCustomMessage(string $message): void
    {
        if (!$this->enabled || !$this->botToken || !$this->chatId) {
            return;
        }

        $this->sendMessage($message);
    }

    /**
     * Send notification when retrying a failed job
     */
    public function sendJobRetry(string $jobClass, ?BlogTopic $topic = null): void
    {
        if (!$this->enabled || !$this->botToken || !$this->chatId) {
            return;
        }

        $message = $this->formatJobRetryMessage($jobClass, $topic);
        $this->sendMessage($message);
    }

    /**
     * Send notification when job retry succeeds
     */
    public function sendJobRetrySuccess(string $jobClass, ?BlogTopic $topic = null): void
    {
        if (!$this->enabled || !$this->botToken || !$this->chatId) {
            return;
        }

        $message = $this->formatJobRetrySuccessMessage($jobClass, $topic);
        $this->sendMessage($message);
    }

    /**
     * Send notification when job retry fails again
     */
    public function sendJobRetryFailed(string $jobClass, string $error, ?BlogTopic $topic = null): void
    {
        if (!$this->enabled || !$this->botToken || !$this->chatId) {
            return;
        }

        $message = $this->formatJobRetryFailedMessage($jobClass, $error, $topic);
        $this->sendMessage($message);
    }

    /**
     * Format success message with HTML
     */
    protected function formatSuccessMessage(BlogTopic $topic, Post $post, array $metadata): string
    {
        $adminUrl = config('app.url') . '/admin/posts/' . $post->id . '/edit';
        $publicUrl = config('app.url') . '/blog/' . $post->slug;

        $generationTime = $metadata['generation_time'] ?? 'N/A';
        $cost = $metadata['cost'] ?? 0;
        $qualityScore = $metadata['quality_score'] ?? 'N/A';
        $wordCount = str_word_count(strip_tags($post->content));

        return "
🎉 <b>Blog Post Generated Successfully!</b>

📝 <b>Title:</b> {$post->title}

📊 <b>Metrics:</b>
• Word Count: {$wordCount} words
• Quality Score: {$qualityScore}/10
• Generation Time: {$generationTime}s
• Cost: $" . number_format($cost, 4) . "

🔗 <b>Links:</b>
• <a href=\"{$adminUrl}\">Review in Admin</a>
• <a href=\"{$publicUrl}\">View on Blog</a>

✅ Ready for review and publishing!
";
    }

    /**
     * Format failure message with HTML
     */
    protected function formatFailureMessage(BlogTopic $topic, string $error, array $metadata): string
    {
        $adminUrl = config('app.url') . '/admin/blog-topics/' . $topic->id . '/edit';

        $retryCount = $metadata['retry_count'] ?? 0;
        $generationMode = ucfirst(str_replace('_', ' ', $topic->generation_mode));

        return "
❌ <b>Blog Generation Failed</b>

📝 <b>Topic:</b> {$topic->title}

🔧 <b>Details:</b>
• Mode: {$generationMode}
• Retry Count: {$retryCount}

⚠️ <b>Error:</b>
<code>{$error}</code>

🔗 <a href=\"{$adminUrl}\">View Topic in Admin</a>

💡 The topic status has been reset to 'pending'. You can retry generation manually.
";
    }

    /**
     * Format job retry message with HTML
     */
    protected function formatJobRetryMessage(string $jobClass, ?BlogTopic $topic): string
    {
        $jobName = class_basename($jobClass);
        $adminUrl = config('app.url') . '/admin/failed-jobs';

        $message = "
🔄 <b>Retrying Failed Job</b>

⚙️ <b>Job:</b> {$jobName}
";

        if ($topic) {
            $topicUrl = config('app.url') . '/admin/blog-topics/' . $topic->id . '/edit';
            $message .= "
📝 <b>Topic:</b> {$topic->title}
🔗 <a href=\"{$topicUrl}\">View Topic</a>
";
        }

        $message .= "
🔗 <a href=\"{$adminUrl}\">View Failed Jobs</a>

⏳ Job has been re-queued and will process shortly...
";

        return $message;
    }

    /**
     * Format job retry success message with HTML
     */
    protected function formatJobRetrySuccessMessage(string $jobClass, ?BlogTopic $topic): string
    {
        $jobName = class_basename($jobClass);

        $message = "
✅ <b>Job Retry Successful</b>

⚙️ <b>Job:</b> {$jobName}
";

        if ($topic) {
            $topicUrl = config('app.url') . '/admin/blog-topics/' . $topic->id . '/edit';
            $message .= "
📝 <b>Topic:</b> {$topic->title}
🔗 <a href=\"{$topicUrl}\">View Topic</a>
";
        }

        return $message;
    }

    /**
     * Format job retry failed message with HTML
     */
    protected function formatJobRetryFailedMessage(string $jobClass, string $error, ?BlogTopic $topic): string
    {
        $jobName = class_basename($jobClass);
        $adminUrl = config('app.url') . '/admin/failed-jobs';

        $message = "
❌ <b>Job Retry Failed Again</b>

⚙️ <b>Job:</b> {$jobName}

⚠️ <b>Error:</b>
<code>{$error}</code>
";

        if ($topic) {
            $topicUrl = config('app.url') . '/admin/blog-topics/' . $topic->id . '/edit';
            $message .= "
📝 <b>Topic:</b> {$topic->title}
🔗 <a href=\"{$topicUrl}\">View Topic</a>
";
        }

        $message .= "
🔗 <a href=\"{$adminUrl}\">View Failed Jobs</a>

💡 Please review the error and try manual debugging.
";

        return $message;
    }

    /**
     * Send message via Telegram Bot API
     */
    protected function sendMessage(string $message): void
    {
        try {
            $response = Http::timeout(10)
                ->post("https://api.telegram.org/bot{$this->botToken}/sendMessage", [
                    'chat_id' => $this->chatId,
                    'text' => trim($message),
                    'parse_mode' => 'HTML',
                    'disable_web_page_preview' => false,
                ]);

            if (!$response->successful()) {
                Log::warning('Telegram notification failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Failed to send Telegram notification', [
                'error' => $e->getMessage(),
                'message' => $message,
            ]);
        }
    }

    /**
     * Test Telegram connection
     */
    public function testConnection(): bool
    {
        if (!$this->enabled || !$this->botToken || !$this->chatId) {
            return false;
        }

        try {
            $response = Http::timeout(10)
                ->get("https://api.telegram.org/bot{$this->botToken}/getMe");

            return $response->successful();
        } catch (\Exception $e) {
            Log::error('Telegram connection test failed', [
                'error' => $e->getMessage(),
            ]);
            return false;
        }
    }
}
