<?php

namespace App\Observers;

use App\Models\Post;
use App\Services\IndexNowService;
use Illuminate\Support\Facades\Log;

/**
 * Post Observer
 *
 * Handles automatic IndexNow submissions when posts are published or updated.
 * This ensures search engines are notified instantly when content changes.
 */
class PostObserver
{
    protected IndexNowService $indexNowService;

    public function __construct(IndexNowService $indexNowService)
    {
        $this->indexNowService = $indexNowService;
    }

    /**
     * Handle the Post "created" event.
     *
     * If the post is created with published status, notify search engines.
     */
    public function created(Post $post): void
    {
        if ($this->isPublished($post)) {
            $this->notifySearchEngines($post, 'created');
        }
    }

    /**
     * Handle the Post "updated" event.
     *
     * Notify search engines when:
     * 1. Post status changes to published
     * 2. Published post content is updated
     */
    public function updated(Post $post): void
    {
        // Check if post just became published (status changed to published)
        $wasPublished = $post->getOriginal('status') === 'published';
        $isPublished = $this->isPublished($post);

        if (!$wasPublished && $isPublished) {
            // Post was just published - notify search engines
            $this->notifySearchEngines($post, 'published');
            return;
        }

        // If already published and content changed, notify about update
        if ($isPublished && $this->hasContentChanged($post)) {
            $this->notifySearchEngines($post, 'updated');
        }
    }

    /**
     * Check if the post is in published state
     */
    protected function isPublished(Post $post): bool
    {
        return $post->status === 'published'
            && $post->published_at
            && $post->published_at <= now();
    }

    /**
     * Check if significant content has changed
     */
    protected function hasContentChanged(Post $post): bool
    {
        $contentFields = ['title', 'slug', 'content', 'excerpt', 'seo_title', 'seo_description'];

        foreach ($contentFields as $field) {
            if ($post->isDirty($field)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Notify search engines about the post
     */
    protected function notifySearchEngines(Post $post, string $action): void
    {
        if (!$this->indexNowService->isEnabled()) {
            Log::debug('[PostObserver] IndexNow disabled, skipping notification', [
                'post_id' => $post->id,
                'action' => $action,
            ]);
            return;
        }

        Log::info('[PostObserver] Notifying search engines', [
            'post_id' => $post->id,
            'slug' => $post->slug,
            'action' => $action,
        ]);

        // Submit the post URL
        $this->indexNowService->submitPost($post);

        // Also update the blog index page since it lists posts
        $this->indexNowService->submitBlogIndex();
    }
}
