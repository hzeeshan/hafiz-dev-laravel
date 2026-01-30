<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Ymigval\LaravelIndexnow\Facade\IndexNow;

/**
 * IndexNow Service
 *
 * Handles instant search engine notifications when content is published or updated.
 * Notifies Bing, Yandex, and other IndexNow-compatible search engines.
 *
 * @see https://www.indexnow.org/
 */
class IndexNowService
{
    protected bool $enabled;

    public function __construct()
    {
        $this->enabled = config('indexnow.enable_submissions', true)
            && !empty(config('indexnow.indexnow_api_key'));
    }

    /**
     * Check if IndexNow is properly configured and enabled
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * Submit a single URL to search engines
     */
    public function submitUrl(string $url): bool
    {
        if (!$this->enabled) {
            Log::info('[IndexNow] Submissions disabled or API key not configured', ['url' => $url]);
            return false;
        }

        try {
            IndexNow::submit($url);

            Log::info('[IndexNow] URL submitted successfully', ['url' => $url]);
            return true;
        } catch (\Exception $e) {
            Log::error('[IndexNow] Failed to submit URL', [
                'url' => $url,
                'error' => $e->getMessage(),
            ]);
            return false;
        }
    }

    /**
     * Submit multiple URLs to search engines
     */
    public function submitUrls(array $urls): bool
    {
        if (!$this->enabled) {
            Log::info('[IndexNow] Submissions disabled or API key not configured', ['urls' => $urls]);
            return false;
        }

        if (empty($urls)) {
            return false;
        }

        try {
            IndexNow::submit($urls);

            Log::info('[IndexNow] URLs submitted successfully', [
                'count' => count($urls),
                'urls' => $urls,
            ]);
            return true;
        } catch (\Exception $e) {
            Log::error('[IndexNow] Failed to submit URLs', [
                'urls' => $urls,
                'error' => $e->getMessage(),
            ]);
            return false;
        }
    }

    /**
     * Submit a blog post URL to search engines
     */
    public function submitPost(\App\Models\Post $post): bool
    {
        $url = url("/blog/{$post->slug}");
        return $this->submitUrl($url);
    }

    /**
     * Submit the blog index page
     */
    public function submitBlogIndex(): bool
    {
        return $this->submitUrl(url('/blog'));
    }

    /**
     * Submit homepage
     */
    public function submitHomepage(): bool
    {
        return $this->submitUrl(url('/'));
    }

    /**
     * Submit an error solution page
     */
    public function submitErrorPage(string $slug): bool
    {
        $url = url("/errors/{$slug}");
        return $this->submitUrl($url);
    }

    /**
     * Submit an Italian local SEO page
     */
    public function submitItalianPage(string $slug): bool
    {
        $url = url("/it/{$slug}");
        return $this->submitUrl($url);
    }

    /**
     * Submit a tool page
     */
    public function submitToolPage(string $slug): bool
    {
        $url = url("/tools/{$slug}");
        return $this->submitUrl($url);
    }

    /**
     * Batch submit all published blog posts
     * Useful for initial setup or after major changes
     */
    public function submitAllPublishedPosts(): array
    {
        $posts = \App\Models\Post::published()->get();

        if ($posts->isEmpty()) {
            Log::info('[IndexNow] No published posts to submit');
            return ['success' => false, 'count' => 0, 'urls' => []];
        }

        $urls = $posts->map(fn ($post) => url("/blog/{$post->slug}"))->toArray();
        $success = $this->submitUrls($urls);

        return ['success' => $success, 'count' => count($urls), 'urls' => $urls];
    }

    /**
     * Batch submit all tool pages
     */
    public function submitAllToolPages(): array
    {
        $tools = \App\Models\Tool::where('is_active', true)->get();

        if ($tools->isEmpty()) {
            Log::info('[IndexNow] No active tools to submit');
            return ['success' => false, 'count' => 0, 'urls' => []];
        }

        $urls = $tools->map(fn ($tool) => url("/tools/{$tool->slug}"))->toArray();
        // Add tools index page
        $urls[] = url('/tools');

        $success = $this->submitUrls($urls);

        return ['success' => $success, 'count' => count($urls), 'urls' => $urls];
    }

    /**
     * Batch submit all error solution pages
     */
    public function submitAllErrorPages(): array
    {
        $dataPath = database_path('data/laravel-errors.json');

        if (!file_exists($dataPath)) {
            Log::info('[IndexNow] No error data file found');
            return ['success' => false, 'count' => 0, 'urls' => []];
        }

        $errors = json_decode(file_get_contents($dataPath), true);

        if (empty($errors)) {
            return ['success' => false, 'count' => 0, 'urls' => []];
        }

        $urls = array_map(fn ($error) => url("/errors/{$error['slug']}"), $errors);
        // Add errors index page
        $urls[] = url('/errors');

        $success = $this->submitUrls($urls);

        return ['success' => $success, 'count' => count($urls), 'urls' => $urls];
    }

    /**
     * Batch submit all Italian local SEO pages
     */
    public function submitAllItalianPages(): array
    {
        $dataPath = database_path('data/italian-local-seo.json');

        if (!file_exists($dataPath)) {
            Log::info('[IndexNow] No Italian SEO data file found');
            return ['success' => false, 'count' => 0, 'urls' => []];
        }

        $pages = json_decode(file_get_contents($dataPath), true);

        if (empty($pages)) {
            return ['success' => false, 'count' => 0, 'urls' => []];
        }

        $urls = array_map(fn ($page) => url("/it/{$page['slug']}"), $pages);
        // Add Italian services index page
        $urls[] = url('/it/servizi');

        $success = $this->submitUrls($urls);

        return ['success' => $success, 'count' => count($urls), 'urls' => $urls];
    }

    /**
     * Submit all pages on the site (blog, tools, errors, Italian pSEO)
     * Useful for initial setup
     */
    public function submitAllPages(): array
    {
        $results = [
            'homepage' => $this->submitHomepage(),
            'blog' => $this->submitAllPublishedPosts(),
            'tools' => $this->submitAllToolPages(),
            'errors' => $this->submitAllErrorPages(),
            'italian' => $this->submitAllItalianPages(),
        ];

        $totalUrls = 1; // homepage
        $totalUrls += $results['blog']['count'] ?? 0;
        $totalUrls += $results['tools']['count'] ?? 0;
        $totalUrls += $results['errors']['count'] ?? 0;
        $totalUrls += $results['italian']['count'] ?? 0;

        Log::info('[IndexNow] Submitted all pages', [
            'total_urls' => $totalUrls,
            'results' => $results,
        ]);

        return [
            'total_urls' => $totalUrls,
            'results' => $results,
        ];
    }
}
