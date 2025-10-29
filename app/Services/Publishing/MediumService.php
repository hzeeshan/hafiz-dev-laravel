<?php

namespace App\Services\Publishing;

use App\Models\Post;
use App\Models\PostPublication;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MediumService
{
    private string $integrationToken;
    private string $baseUrl;

    public function __construct()
    {
        $this->integrationToken = config('services.medium.integration_token');
        $this->baseUrl = config('services.medium.base_url', 'https://api.medium.com/v1');

        if (empty($this->integrationToken)) {
            throw new \Exception('Medium integration token is not configured. Please set MEDIUM_INTEGRATION_TOKEN in .env');
        }
    }

    /**
     * Publish a post to Medium
     *
     * @param Post $post
     * @return array ['success' => bool, 'data' => array|null, 'error' => string|null]
     */
    public function publish(Post $post): array
    {
        try {
            Log::info('Publishing post to Medium', [
                'post_id' => $post->id,
                'title' => $post->title,
            ]);

            // Get Medium user ID (cached)
            $userId = $this->getUserId();

            if (!$userId) {
                return [
                    'success' => false,
                    'data' => null,
                    'error' => 'Failed to retrieve Medium user ID',
                ];
            }

            // Prepare post data
            $postData = $this->preparePostData($post);

            // Make API request
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->integrationToken,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post("{$this->baseUrl}/users/{$userId}/posts", $postData);

            if ($response->successful()) {
                $responseData = $response->json()['data'] ?? null;

                if (!$responseData) {
                    Log::error('No data in Medium response', [
                        'post_id' => $post->id,
                        'response' => $response->body(),
                    ]);

                    return [
                        'success' => false,
                        'data' => null,
                        'error' => 'No data in Medium response',
                    ];
                }

                Log::info('Post published to Medium successfully', [
                    'post_id' => $post->id,
                    'medium_id' => $responseData['id'] ?? null,
                    'medium_url' => $responseData['url'] ?? null,
                ]);

                return [
                    'success' => true,
                    'data' => $responseData,
                    'error' => null,
                ];
            }

            // API returned error
            $errorMessage = $this->extractErrorMessage($response);

            Log::error('Failed to publish post to Medium', [
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
            Log::error('Exception while publishing to Medium', [
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
     * Get Medium user ID (cached for 24 hours)
     *
     * @return string|null
     */
    private function getUserId(): ?string
    {
        // Check if user ID is configured in .env
        $configuredUserId = config('services.medium.user_id');
        if (!empty($configuredUserId)) {
            return $configuredUserId;
        }

        // Otherwise, fetch from API and cache
        return Cache::remember('medium_user_id', 86400, function () {
            try {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $this->integrationToken,
                    'Accept' => 'application/json',
                ])->get("{$this->baseUrl}/me");

                if ($response->successful()) {
                    $userId = $response->json()['data']['id'] ?? null;

                    if ($userId) {
                        Log::info('Medium user ID fetched and cached', ['user_id' => $userId]);
                        return $userId;
                    }
                }

                Log::error('Failed to fetch Medium user ID', [
                    'status' => $response->status(),
                    'response' => $response->body(),
                ]);

                return null;
            } catch (\Exception $e) {
                Log::error('Exception while fetching Medium user ID', [
                    'exception' => $e->getMessage(),
                ]);
                return null;
            }
        });
    }

    /**
     * Prepare post data for Medium API
     *
     * @param Post $post
     * @return array
     */
    private function preparePostData(Post $post): array
    {
        // Get the canonical URL (your blog post URL)
        $canonicalUrl = $this->getCanonicalUrl($post);

        // Prepare tags (Medium allows max 3 tags)
        $tags = $this->prepareTags($post->tags ?? []);

        // Prepare body markdown (with featured image workaround and attribution)
        $bodyMarkdown = $this->prepareBodyMarkdown($post);

        return [
            'title' => $post->title,
            'contentFormat' => 'markdown',
            'content' => $bodyMarkdown,
            'canonicalUrl' => $canonicalUrl,
            'tags' => $tags,
            'publishStatus' => 'public', // Can be: public, draft, unlisted
            'license' => 'all-rights-reserved', // Or: cc-40-by, cc-40-by-sa, etc.
            'notifyFollowers' => false, // Don't spam followers with cross-posts
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
        $baseUrl = config('services.medium.canonical_base_url') ?: config('app.url');

        // If still localhost, use hafiz.dev as default production URL
        if (str_contains($baseUrl, 'localhost') || str_contains($baseUrl, '127.0.0.1')) {
            $baseUrl = 'https://hafiz.dev';
        }

        return rtrim($baseUrl, '/') . '/blog/' . $post->slug;
    }

    /**
     * Prepare body markdown with featured image workaround and attribution
     *
     * NOTE: Medium API doesn't support featured images, so we embed it
     * as the first element in the content. Medium will auto-detect and
     * use the first image as the preview image.
     *
     * @param Post $post
     * @return string
     */
    private function prepareBodyMarkdown(Post $post): string
    {
        $content = $post->content;

        // Add featured image at top if available (workaround for no API support)
        if ($featuredImageUrl = $this->getFeaturedImageUrl($post)) {
            $content = "![{$post->title}]({$featuredImageUrl})\n\n" . $content;
        }

        // Add "Originally published at" notice at the top
        $canonicalUrl = $this->getCanonicalUrl($post);
        $attribution = "> **Originally published at [hafiz.dev]({$canonicalUrl})**\n\n---\n\n";

        return $attribution . $content;
    }

    /**
     * Prepare tags for Medium (max 3 tags)
     *
     * Medium tag requirements:
     * - Maximum 3 tags
     * - Tags are simple strings (no special formatting needed)
     *
     * @param array $tags
     * @return array
     */
    private function prepareTags(array $tags): array
    {
        // Medium allows max 3 tags
        $tags = array_slice($tags, 0, 3);

        // Medium accepts tags as simple string array
        // No special normalization needed (unlike Dev.to)
        return array_values($tags);
    }

    /**
     * Get featured image URL (must be absolute URL)
     * Uses production URL even in local environment
     *
     * @param Post $post
     * @return string|null
     */
    private function getFeaturedImageUrl(Post $post): ?string
    {
        if (empty($post->featured_image)) {
            return null;
        }

        // If already absolute URL, return as is
        if (filter_var($post->featured_image, FILTER_VALIDATE_URL)) {
            return $post->featured_image;
        }

        // Use production URL for images (Medium requires publicly accessible URLs)
        $baseUrl = config('services.medium.canonical_base_url') ?: config('app.url');

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

        if (isset($body['errors']) && is_array($body['errors'])) {
            // Medium returns errors as array of objects: [{ message: "...", code: ... }]
            $messages = array_map(function ($error) {
                return $error['message'] ?? 'Unknown error';
            }, $body['errors']);

            return implode(', ', $messages);
        }

        if (isset($body['error'])) {
            return $body['error'];
        }

        return 'HTTP ' . $response->status() . ': ' . $response->body();
    }

    /**
     * Create or update PostPublication record
     *
     * @param Post $post
     * @param array $mediumResponse
     * @return PostPublication
     */
    public function createOrUpdatePublication(Post $post, array $mediumResponse): PostPublication
    {
        return PostPublication::updateOrCreate(
            [
                'post_id' => $post->id,
                'platform' => 'medium',
            ],
            [
                'external_id' => $mediumResponse['id'] ?? null,
                'external_url' => $mediumResponse['url'] ?? null,
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
                'platform' => 'medium',
            ],
            [
                'status' => 'failed',
                'error_message' => $errorMessage,
            ]
        );
    }
}
