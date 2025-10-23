<?php

namespace App\Services\Publishing;

use App\Models\Post;
use App\Models\PostPublication;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HashnodeService
{
    private string $apiToken;
    private string $publicationId;
    private string $graphqlEndpoint;

    public function __construct()
    {
        $this->apiToken = config('services.hashnode.api_token');
        $this->publicationId = config('services.hashnode.publication_id');
        $this->graphqlEndpoint = config('services.hashnode.base_url', 'https://gql.hashnode.com');

        if (empty($this->apiToken)) {
            throw new \Exception('Hashnode API token is not configured. Please set HASHNODE_API_TOKEN in .env');
        }

        if (empty($this->publicationId)) {
            throw new \Exception('Hashnode Publication ID is not configured. Please set HASHNODE_PUBLICATION_ID in .env');
        }
    }

    /**
     * Publish a post to Hashnode
     *
     * @param Post $post
     * @return array ['success' => bool, 'data' => array|null, 'error' => string|null]
     */
    public function publish(Post $post): array
    {
        try {
            Log::info('Publishing post to Hashnode', [
                'post_id' => $post->id,
                'title' => $post->title,
            ]);

            // Prepare GraphQL mutation
            $mutation = $this->prepareGraphQLMutation($post);

            // Make GraphQL request
            $response = Http::withHeaders([
                'Authorization' => $this->apiToken,
                'Content-Type' => 'application/json',
            ])->post($this->graphqlEndpoint, $mutation);

            if ($response->successful()) {
                $responseData = $response->json();

                // Check for GraphQL errors
                if (isset($responseData['errors'])) {
                    $errorMessage = $this->extractGraphQLErrors($responseData['errors']);

                    Log::error('GraphQL errors while publishing to Hashnode', [
                        'post_id' => $post->id,
                        'errors' => $responseData['errors'],
                    ]);

                    return [
                        'success' => false,
                        'data' => null,
                        'error' => $errorMessage,
                    ];
                }

                // Extract post data from GraphQL response
                $postData = $responseData['data']['publishPost']['post'] ?? null;

                if (!$postData) {
                    Log::error('No post data in Hashnode response', [
                        'post_id' => $post->id,
                        'response' => $responseData,
                    ]);

                    return [
                        'success' => false,
                        'data' => null,
                        'error' => 'No post data in response',
                    ];
                }

                Log::info('Post published to Hashnode successfully', [
                    'post_id' => $post->id,
                    'hashnode_id' => $postData['id'] ?? null,
                    'hashnode_url' => $postData['url'] ?? null,
                ]);

                return [
                    'success' => true,
                    'data' => $postData,
                    'error' => null,
                ];
            }

            // HTTP error
            $errorMessage = $this->extractErrorMessage($response);

            Log::error('Failed to publish post to Hashnode', [
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
            Log::error('Exception while publishing to Hashnode', [
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
     * Update an existing Hashnode post
     *
     * @param Post $post
     * @param string $hashnodePostId
     * @return array
     */
    public function update(Post $post, string $hashnodePostId): array
    {
        try {
            Log::info('Updating Hashnode post', [
                'post_id' => $post->id,
                'hashnode_post_id' => $hashnodePostId,
            ]);

            // Prepare GraphQL mutation for update
            $mutation = $this->prepareUpdateMutation($post, $hashnodePostId);

            $response = Http::withHeaders([
                'Authorization' => $this->apiToken,
                'Content-Type' => 'application/json',
            ])->post($this->graphqlEndpoint, $mutation);

            if ($response->successful()) {
                $responseData = $response->json();

                // Check for GraphQL errors
                if (isset($responseData['errors'])) {
                    $errorMessage = $this->extractGraphQLErrors($responseData['errors']);

                    Log::error('GraphQL errors while updating Hashnode post', [
                        'post_id' => $post->id,
                        'hashnode_post_id' => $hashnodePostId,
                        'errors' => $responseData['errors'],
                    ]);

                    return [
                        'success' => false,
                        'data' => null,
                        'error' => $errorMessage,
                    ];
                }

                $postData = $responseData['data']['updatePost']['post'] ?? null;

                if (!$postData) {
                    Log::error('No post data in Hashnode update response', [
                        'post_id' => $post->id,
                        'response' => $responseData,
                    ]);

                    return [
                        'success' => false,
                        'data' => null,
                        'error' => 'No post data in update response',
                    ];
                }

                Log::info('Hashnode post updated successfully', [
                    'post_id' => $post->id,
                    'hashnode_id' => $hashnodePostId,
                ]);

                return [
                    'success' => true,
                    'data' => $postData,
                    'error' => null,
                ];
            }

            $errorMessage = $this->extractErrorMessage($response);

            Log::error('Failed to update Hashnode post', [
                'post_id' => $post->id,
                'hashnode_post_id' => $hashnodePostId,
                'status' => $response->status(),
                'error' => $errorMessage,
            ]);

            return [
                'success' => false,
                'data' => null,
                'error' => $errorMessage,
            ];

        } catch (\Exception $e) {
            Log::error('Exception while updating Hashnode post', [
                'post_id' => $post->id,
                'hashnode_post_id' => $hashnodePostId,
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
     * Prepare GraphQL mutation for publishing a new post
     *
     * @param Post $post
     * @return array
     */
    private function prepareGraphQLMutation(Post $post): array
    {
        $input = $this->preparePostInput($post);

        $query = <<<'GRAPHQL'
mutation PublishPost($input: PublishPostInput!) {
  publishPost(input: $input) {
    post {
      id
      title
      url
      slug
    }
  }
}
GRAPHQL;

        return [
            'query' => $query,
            'variables' => [
                'input' => $input,
            ],
        ];
    }

    /**
     * Prepare GraphQL mutation for updating an existing post
     *
     * @param Post $post
     * @param string $hashnodePostId
     * @return array
     */
    private function prepareUpdateMutation(Post $post, string $hashnodePostId): array
    {
        $input = $this->preparePostInput($post);
        $input['id'] = $hashnodePostId;

        $query = <<<'GRAPHQL'
mutation UpdatePost($input: UpdatePostInput!) {
  updatePost(input: $input) {
    post {
      id
      title
      url
      slug
    }
  }
}
GRAPHQL;

        return [
            'query' => $query,
            'variables' => [
                'input' => $input,
            ],
        ];
    }

    /**
     * Prepare post input data for Hashnode
     *
     * @param Post $post
     * @return array
     */
    private function preparePostInput(Post $post): array
    {
        $canonicalUrl = $this->getCanonicalUrl($post);
        $bodyMarkdown = $this->prepareBodyMarkdown($post);
        $tags = $this->prepareTags($post->tags ?? []);

        $input = [
            'publicationId' => $this->publicationId,
            'title' => $post->title,
            'contentMarkdown' => $bodyMarkdown,
            'tags' => $tags,
            'originalArticleURL' => $canonicalUrl, // Hashnode uses this for canonical URL
        ];

        // Add cover image if available
        if ($coverImageUrl = $this->getCoverImageUrl($post)) {
            $input['coverImageOptions'] = [
                'coverImageURL' => $coverImageUrl,
            ];
        }

        // Add subtitle/excerpt if available
        if ($post->excerpt) {
            $input['subtitle'] = $post->excerpt;
        }

        // Add SEO metadata if available
        if ($post->seo_title || $post->seo_description) {
            $input['metaTags'] = [
                'title' => $post->seo_title ?? $post->title,
                'description' => $post->seo_description ?? $post->excerpt,
            ];
        }

        return $input;
    }

    /**
     * Get canonical URL for the post
     *
     * @param Post $post
     * @return string
     */
    private function getCanonicalUrl(Post $post): string
    {
        // Use production URL if configured, fallback to APP_URL
        $baseUrl = config('services.hashnode.canonical_base_url') ?: config('app.url');

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
     * Prepare tags for Hashnode
     *
     * Hashnode accepts tag objects with name/slug or just tag IDs
     * We'll use tag names and let Hashnode match them
     *
     * @param array $tags
     * @return array
     */
    private function prepareTags(array $tags): array
    {
        // Hashnode accepts tags as array of objects: [{ name: "JavaScript" }, { slug: "javascript" }]
        // Or as array of tag IDs if you know them
        // For simplicity, we'll send tag names and let Hashnode match/create them
        return array_map(function ($tag) {
            // Sanitize slug to match Hashnode requirements: ^[a-z0-9-]{1,250}(?<!--deleted)$
            // Remove dots, special characters, convert to lowercase
            $slug = strtolower($tag);
            $slug = str_replace(['.', '_', ' '], '-', $slug); // Replace dots, underscores, spaces with hyphens
            $slug = preg_replace('/[^a-z0-9-]/', '', $slug); // Remove all other special characters
            $slug = preg_replace('/-+/', '-', $slug); // Replace multiple hyphens with single hyphen
            $slug = trim($slug, '-'); // Remove leading/trailing hyphens

            return [
                'name' => $tag,
                'slug' => $slug ?: 'tag', // Fallback to 'tag' if slug is empty
            ];
        }, array_slice($tags, 0, 5)); // Hashnode allows up to 5 tags
    }

    /**
     * Get cover image URL (must be absolute URL)
     *
     * @param Post $post
     * @return string|null
     */
    private function getCoverImageUrl(Post $post): ?string
    {
        if (empty($post->featured_image)) {
            return null;
        }

        // If already absolute URL, return as is
        if (filter_var($post->featured_image, FILTER_VALIDATE_URL)) {
            return $post->featured_image;
        }

        // Use production URL for images
        $baseUrl = config('services.hashnode.canonical_base_url') ?: config('app.url');

        // If localhost, use hafiz.dev production URL
        if (str_contains($baseUrl, 'localhost') || str_contains($baseUrl, '127.0.0.1')) {
            $baseUrl = 'https://hafiz.dev';
        }

        // Convert relative path to absolute URL
        return rtrim($baseUrl, '/') . '/storage/' . $post->featured_image;
    }

    /**
     * Extract GraphQL errors into a readable string
     *
     * @param array $errors
     * @return string
     */
    private function extractGraphQLErrors(array $errors): string
    {
        $messages = array_map(function ($error) {
            return $error['message'] ?? 'Unknown GraphQL error';
        }, $errors);

        return 'GraphQL Errors: ' . implode(', ', $messages);
    }

    /**
     * Extract error message from HTTP response
     *
     * @param \Illuminate\Http\Client\Response $response
     * @return string
     */
    private function extractErrorMessage($response): string
    {
        $body = $response->json();

        if (isset($body['errors'])) {
            return $this->extractGraphQLErrors($body['errors']);
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
     * @param array $hashnodeResponse
     * @return PostPublication
     */
    public function createOrUpdatePublication(Post $post, array $hashnodeResponse): PostPublication
    {
        return PostPublication::updateOrCreate(
            [
                'post_id' => $post->id,
                'platform' => 'hashnode',
            ],
            [
                'external_id' => $hashnodeResponse['id'] ?? null,
                'external_url' => $hashnodeResponse['url'] ?? null,
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
                'platform' => 'hashnode',
            ],
            [
                'status' => 'failed',
                'error_message' => $errorMessage,
            ]
        );
    }
}
