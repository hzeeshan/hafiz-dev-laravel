<?php

namespace App\Jobs;

use App\Models\Post;
use App\Services\Publishing\HashnodeService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PublishToHashnodeJob implements ShouldQueue
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
        // First retry: 30 seconds
        // Second retry: 60 seconds
        // Third retry: 120 seconds
        return [30, 60, 120];
    }

    /**
     * Execute the job.
     */
    public function handle(HashnodeService $hashnodeService): void
    {
        Log::info('PublishToHashnodeJob started', [
            'post_id' => $this->post->id,
            'title' => $this->post->title,
        ]);

        // Check if post is published
        if ($this->post->status !== 'published') {
            Log::warning('Attempted to publish non-published post to Hashnode', [
                'post_id' => $this->post->id,
                'status' => $this->post->status,
            ]);

            $hashnodeService->markPublicationFailed(
                $this->post,
                'Post must be published before cross-posting to Hashnode'
            );

            return;
        }

        // Check if already published to Hashnode
        $existingPublication = $this->post->publications()
            ->where('platform', 'hashnode')
            ->where('status', 'published')
            ->first();

        if ($existingPublication) {
            Log::info('Post already published to Hashnode, updating instead', [
                'post_id' => $this->post->id,
                'hashnode_id' => $existingPublication->external_id,
            ]);

            // Update existing post
            $result = $hashnodeService->update($this->post, $existingPublication->external_id);

            if ($result['success']) {
                $hashnodeService->createOrUpdatePublication($this->post, $result['data']);

                Log::info('Hashnode post updated successfully', [
                    'post_id' => $this->post->id,
                ]);
            } else {
                $hashnodeService->markPublicationFailed($this->post, $result['error']);

                // Throw exception to trigger retry
                throw new \Exception('Failed to update Hashnode post: ' . $result['error']);
            }

            return;
        }

        // Publish new post to Hashnode
        $result = $hashnodeService->publish($this->post);

        if ($result['success']) {
            $publication = $hashnodeService->createOrUpdatePublication($this->post, $result['data']);

            Log::info('Post published to Hashnode successfully', [
                'post_id' => $this->post->id,
                'hashnode_url' => $publication->external_url,
            ]);

            // Optional: Send notification (if you have notification service)
            // $this->sendSuccessNotification($publication);

        } else {
            $hashnodeService->markPublicationFailed($this->post, $result['error']);

            Log::error('Failed to publish to Hashnode', [
                'post_id' => $this->post->id,
                'error' => $result['error'],
            ]);

            // Throw exception to trigger retry (if tries remaining)
            throw new \Exception('Failed to publish to Hashnode: ' . $result['error']);
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception): void
    {
        Log::error('PublishToHashnodeJob failed permanently', [
            'post_id' => $this->post->id,
            'exception' => $exception->getMessage(),
        ]);

        // Mark as failed in database
        $hashnodeService = app(HashnodeService::class);
        $hashnodeService->markPublicationFailed(
            $this->post,
            'Job failed after ' . $this->tries . ' attempts: ' . $exception->getMessage()
        );

        // Optional: Send failure notification
        // $this->sendFailureNotification($exception);
    }
}
