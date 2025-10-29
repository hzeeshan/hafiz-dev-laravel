<?php

namespace App\Jobs;

use App\Models\Post;
use App\Services\Publishing\MediumService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PublishToMediumJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $timeout = 120; // 2 minutes timeout
    public int $tries = 3; // Retry up to 3 times

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Post $post
    ) {
        //
    }

    /**
     * Calculate exponential backoff delay for retries
     * For rate limiting or API errors, we need to wait longer
     *
     * @return array
     */
    public function backoff(): array
    {
        // First retry: 60 seconds
        // Second retry: 120 seconds
        // Third retry: 180 seconds
        return [60, 120, 180];
    }

    /**
     * Execute the job.
     */
    public function handle(MediumService $mediumService): void
    {
        Log::info('PublishToMediumJob started', [
            'post_id' => $this->post->id,
            'title' => $this->post->title,
        ]);

        // Check if post is published
        if ($this->post->status !== 'published') {
            Log::warning('Attempted to publish non-published post to Medium', [
                'post_id' => $this->post->id,
                'status' => $this->post->status,
            ]);

            $mediumService->markPublicationFailed(
                $this->post,
                'Post must be published before cross-posting to Medium'
            );

            return;
        }

        // Check if already published to Medium
        $existingPublication = $this->post->publications()
            ->where('platform', 'medium')
            ->where('status', 'published')
            ->first();

        if ($existingPublication) {
            Log::warning('Post already published to Medium', [
                'post_id' => $this->post->id,
                'medium_id' => $existingPublication->external_id,
                'medium_url' => $existingPublication->external_url,
            ]);

            // Medium API does NOT support updating posts
            // This is a limitation of the Medium API
            $mediumService->markPublicationFailed(
                $this->post,
                'Medium API does not support updating posts. Post was already published at: ' . $existingPublication->external_url
            );

            return;
        }

        // Publish new post to Medium
        $result = $mediumService->publish($this->post);

        if ($result['success']) {
            $publication = $mediumService->createOrUpdatePublication($this->post, $result['data']);

            Log::info('Post published to Medium successfully', [
                'post_id' => $this->post->id,
                'medium_url' => $publication->external_url,
            ]);

            // Optional: Send notification (if you have notification service)
            // $this->sendSuccessNotification($publication);

        } else {
            $mediumService->markPublicationFailed($this->post, $result['error']);

            Log::error('Failed to publish to Medium', [
                'post_id' => $this->post->id,
                'error' => $result['error'],
            ]);

            // Throw exception to trigger retry (if tries remaining)
            throw new \Exception('Failed to publish to Medium: ' . $result['error']);
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception): void
    {
        Log::error('PublishToMediumJob failed permanently', [
            'post_id' => $this->post->id,
            'exception' => $exception->getMessage(),
        ]);

        // Mark as failed in database
        $mediumService = app(MediumService::class);
        $mediumService->markPublicationFailed(
            $this->post,
            'Job failed after ' . $this->tries . ' attempts: ' . $exception->getMessage()
        );

        // Optional: Send failure notification
        // $this->sendFailureNotification($exception);
    }
}
