<?php

namespace App\Services\Publishing;

use App\Models\Post;
use App\Models\PostPublication;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DevToService
{
    private string $apiKey;
    private string $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.devto.api_key');
        $this->baseUrl = config('services.devto.base_url', 'https://dev.to/api');

        if (empty($this->apiKey)) {
            throw new \Exception('Dev.to API key is not configured. Please set DEVTO_API_KEY in .env');
        }
    }

    /**
     * Publish a post to Dev.to
     *
     * @param Post $post
     * @return array ['success' => bool, 'data' => array|null, 'error' => string|null]
     */
    public function publish(Post $post): array
    {
        try {
            Log::info('Publishing post to Dev.to', [
                'post_id' => $post->id,
                'title' => $post->title,
            ]);

            // Prepare article data
            $articleData = $this->prepareArticleData($post);

            // Make API request
            $response = Http::withHeaders([
                'api-key' => $this->apiKey,
                'Accept' => 'application/vnd.forem.api-v1+json',
                'Content-Type' => 'application/json',
            ])->post("{$this->baseUrl}/articles", [
                'article' => $articleData,
            ]);

            if ($response->successful()) {
                $responseData = $response->json();

                Log::info('Post published to Dev.to successfully', [
                    'post_id' => $post->id,
                    'devto_id' => $responseData['id'] ?? null,
                    'devto_url' => $responseData['url'] ?? null,
                ]);

                return [
                    'success' => true,
                    'data' => $responseData,
                    'error' => null,
                ];
            }

            // API returned error
            $errorMessage = $this->extractErrorMessage($response);

            Log::error('Failed to publish post to Dev.to', [
                'post_id' => $post->id,
                'status' => $response->status(),
                'error' => $errorMessage,
                'response' => $response->body(),
            ]);

            return [
                'success' => false,
                'data' => null,
                'error' => $errorMessage,
            ];

        } catch (\Exception $e) {
            Log::error('Exception while publishing to Dev.to', [
                'post_id' => $post->id,
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return [
                'success' => false,
                'data' => null,
                'error' => 'Exception: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Update an existing Dev.to article
     *
     * @param Post $post
     * @param int $devtoArticleId
     * @return array
     */
    public function update(Post $post, int $devtoArticleId): array
    {
        try {
            Log::info('Updating Dev.to article', [
                'post_id' => $post->id,
                'devto_article_id' => $devtoArticleId,
            ]);

            $articleData = $this->prepareArticleData($post);

            $response = Http::withHeaders([
                'api-key' => $this->apiKey,
                'Accept' => 'application/vnd.forem.api-v1+json',
                'Content-Type' => 'application/json',
            ])->put("{$this->baseUrl}/articles/{$devtoArticleId}", [
                'article' => $articleData,
            ]);

            if ($response->successful()) {
                $responseData = $response->json();

                Log::info('Dev.to article updated successfully', [
                    'post_id' => $post->id,
                    'devto_id' => $devtoArticleId,
                ]);

                return [
                    'success' => true,
                    'data' => $responseData,
                    'error' => null,
                ];
            }

            $errorMessage = $this->extractErrorMessage($response);

            Log::error('Failed to update Dev.to article', [
                'post_id' => $post->id,
                'devto_article_id' => $devtoArticleId,
                'status' => $response->status(),
                'error' => $errorMessage,
            ]);

            return [
                'success' => false,
                'data' => null,
                'error' => $errorMessage,
            ];

        } catch (\Exception $e) {
            Log::error('Exception while updating Dev.to article', [
                'post_id' => $post->id,
                'devto_article_id' => $devtoArticleId,
                'exception' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'data' => null,
                'error' => 'Exception: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Get article statistics from Dev.to
     *
     * @param int $devtoArticleId
     * @return array|null
     */
    public function getArticleStats(int $devtoArticleId): ?array
    {
        try {
            $response = Http::withHeaders([
                'api-key' => $this->apiKey,
                'Accept' => 'application/vnd.forem.api-v1+json',
            ])->get("{$this->baseUrl}/articles/{$devtoArticleId}");

            if ($response->successful()) {
                $data = $response->json();

                return [
                    'views' => $data['page_views_count'] ?? 0,
                    'likes' => $data['public_reactions_count'] ?? 0,
                    'comments' => $data['comments_count'] ?? 0,
                ];
            }

            return null;
        } catch (\Exception $e) {
            Log::error('Failed to fetch Dev.to article stats', [
                'devto_article_id' => $devtoArticleId,
                'error' => $e->getMessage(),
            ]);
            return null;
        }
    }

    /**
     * Prepare article data for Dev.to API
     *
     * @param Post $post
     * @return array
     */
    private function prepareArticleData(Post $post): array
    {
        // Get the canonical URL (your blog post URL)
        // Use production URL for canonical (Dev.to requires valid public URL)
        $canonicalUrl = $this->getCanonicalUrl($post);

        // Prepare tags (Dev.to allows max 4 tags)
        $tags = $this->prepareTags($post->tags ?? []);

        // Prepare body markdown
        $bodyMarkdown = $this->prepareBodyMarkdown($post);

        return [
            'title' => $post->title,
            'published' => true, // Publish immediately (you can change to false for drafts)
            'body_markdown' => $bodyMarkdown,
            'canonical_url' => $canonicalUrl,
            'tags' => $tags,
            'description' => $post->seo_description ?? $post->excerpt,
            'main_image' => $this->getMainImageUrl($post),
        ];
    }

    /**
     * Get canonical URL for the post
     * Uses production URL even in local environment
     *
     * @param Post $post
     * @return string
     */
    private function getCanonicalUrl(Post $post): string
    {
        // Use production URL if configured, fallback to APP_URL
        $baseUrl = config('services.devto.canonical_base_url') ?: config('app.url');

        // If still localhost, use hafiz.dev as default production URL
        if (str_contains($baseUrl, 'localhost') || str_contains($baseUrl, '127.0.0.1')) {
            $baseUrl = 'https://hafiz.dev';
        }

        return rtrim($baseUrl, '/') . '/blog/' . $post->slug;
    }

    /**
     * Prepare body markdown with attribution
     *
     * @param Post $post
     * @return string
     */
    private function prepareBodyMarkdown(Post $post): string
    {
        $content = $post->content;

        // Add "Originally published at" notice at the top
        $canonicalUrl = $this->getCanonicalUrl($post);
        $attribution = "> **Originally published at [hafiz.dev]({$canonicalUrl})**\n\n---\n\n";

        return $attribution . $content;
    }

    /**
     * Prepare tags for Dev.to (max 4 tags)
     *
     * @param array $tags
     * @return array
     */
    private function prepareTags(array $tags): array
    {
        // Dev.to allows max 4 tags
        $tags = array_slice($tags, 0, 4);

        // Dev.to tags should be lowercase and without spaces
        return array_map(function ($tag) {
            return strtolower(str_replace(' ', '', $tag));
        }, $tags);
    }

    /**
     * Get main image URL (must be absolute URL)
     * Uses production URL even in local environment
     *
     * @param Post $post
     * @return string|null
     */
    private function getMainImageUrl(Post $post): ?string
    {
        if (empty($post->featured_image)) {
            return null;
        }

        // If already absolute URL, return as is
        if (filter_var($post->featured_image, FILTER_VALIDATE_URL)) {
            return $post->featured_image;
        }

        // Use production URL for images (Dev.to requires publicly accessible URLs)
        $baseUrl = config('services.devto.canonical_base_url') ?: config('app.url');

        // If localhost, use hafiz.dev production URL
        if (str_contains($baseUrl, 'localhost') || str_contains($baseUrl, '127.0.0.1')) {
            $baseUrl = 'https://hafiz.dev';
        }

        // Convert relative path to absolute URL
        return rtrim($baseUrl, '/') . '/storage/' . $post->featured_image;
    }

    /**
     * Extract error message from API response
     *
     * @param \Illuminate\Http\Client\Response $response
     * @return string
     */
    private function extractErrorMessage($response): string
    {
        $body = $response->json();

        if (isset($body['error'])) {
            return $body['error'];
        }

        if (isset($body['errors']) && is_array($body['errors'])) {
            return implode(', ', $body['errors']);
        }

        return 'HTTP ' . $response->status() . ': ' . $response->body();
    }

    /**
     * Create or update PostPublication record
     *
     * @param Post $post
     * @param array $devtoResponse
     * @return PostPublication
     */
    public function createOrUpdatePublication(Post $post, array $devtoResponse): PostPublication
    {
        return PostPublication::updateOrCreate(
            [
                'post_id' => $post->id,
                'platform' => 'devto',
            ],
            [
                'external_id' => $devtoResponse['id'] ?? null,
                'external_url' => $devtoResponse['url'] ?? null,
                'status' => 'published',
                'published_at' => now(),
                'error_message' => null,
            ]
        );
    }

    /**
     * Mark publication as failed
     *
     * @param Post $post
     * @param string $errorMessage
     * @return PostPublication
     */
    public function markPublicationFailed(Post $post, string $errorMessage): PostPublication
    {
        return PostPublication::updateOrCreate(
            [
                'post_id' => $post->id,
                'platform' => 'devto',
            ],
            [
                'status' => 'failed',
                'error_message' => $errorMessage,
            ]
        );
    }
}
