<?php

namespace App\Jobs;

use App\Models\Post;
use App\Services\Publishing\DevToService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PublishToDevToJob implements ShouldQueue
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
     * Execute the job.
     */
    public function handle(DevToService $devToService): void
    {
        Log::info('PublishToDevToJob started', [
            'post_id' => $this->post->id,
            'title' => $this->post->title,
        ]);

        // Check if post is published
        if ($this->post->status !== 'published') {
            Log::warning('Attempted to publish non-published post to Dev.to', [
                'post_id' => $this->post->id,
                'status' => $this->post->status,
            ]);

            $devToService->markPublicationFailed(
                $this->post,
                'Post must be published before cross-posting to Dev.to'
            );

            return;
        }

        // Check if already published to Dev.to
        $existingPublication = $this->post->publications()
            ->where('platform', 'devto')
            ->where('status', 'published')
            ->first();

        if ($existingPublication) {
            Log::info('Post already published to Dev.to, updating instead', [
                'post_id' => $this->post->id,
                'devto_id' => $existingPublication->external_id,
            ]);

            // Update existing article
            $result = $devToService->update($this->post, (int) $existingPublication->external_id);

            if ($result['success']) {
                $devToService->createOrUpdatePublication($this->post, $result['data']);

                Log::info('Dev.to article updated successfully', [
                    'post_id' => $this->post->id,
                ]);
            } else {
                $devToService->markPublicationFailed($this->post, $result['error']);

                // Throw exception to trigger retry
                throw new \Exception('Failed to update Dev.to article: ' . $result['error']);
            }

            return;
        }

        // Publish new article to Dev.to
        $result = $devToService->publish($this->post);

        if ($result['success']) {
            $publication = $devToService->createOrUpdatePublication($this->post, $result['data']);

            Log::info('Post published to Dev.to successfully', [
                'post_id' => $this->post->id,
                'devto_url' => $publication->external_url,
            ]);

            // Optional: Send notification (if you have notification service)
            // $this->sendSuccessNotification($publication);

        } else {
            $devToService->markPublicationFailed($this->post, $result['error']);

            Log::error('Failed to publish to Dev.to', [
                'post_id' => $this->post->id,
                'error' => $result['error'],
            ]);

            // Throw exception to trigger retry (if tries remaining)
            throw new \Exception('Failed to publish to Dev.to: ' . $result['error']);
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception): void
    {
        Log::error('PublishToDevToJob failed permanently', [
            'post_id' => $this->post->id,
            'exception' => $exception->getMessage(),
        ]);

        // Mark as failed in database
        $devToService = app(DevToService::class);
        $devToService->markPublicationFailed(
            $this->post,
            'Job failed after ' . $this->tries . ' attempts: ' . $exception->getMessage()
        );

        // Optional: Send failure notification
        // $this->sendFailureNotification($exception);
    }
}
