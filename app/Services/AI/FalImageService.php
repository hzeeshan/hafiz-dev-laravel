<?php

namespace App\Services\AI;

use App\Contracts\ImageServiceInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FalImageService implements ImageServiceInterface
{
    protected ?string $apiKey;
    protected ?string $baseUrl;
    protected int $timeout = 60;

    public function __construct()
    {
        $this->apiKey = config('services.fal.api_key');
        $this->baseUrl = config('services.fal.base_url');
    }

    /**
     * Generate image using Fal.ai
     *
     * @param string $prompt
     * @param array $options
     * @return array ['url' => string, 'local_path' => string, 'cost' => float, 'generation_time' => float]
     */
    public function generate(string $prompt, array $options = []): array
    {
        if (!$this->apiKey) {
            throw new \Exception('Fal.ai API key not configured. Set FAL_API_KEY in .env file.');
        }

        $model = $options['model'] ?? config('blog.image_models.primary');

        $startTime = microtime(true);

        try {
            Log::info('Fal.ai image generation started', [
                'model' => $model,
                'prompt' => Str::limit($prompt, 100),
            ]);

            // Prepare request payload
            $payload = array_merge([
                'prompt' => $prompt,
                'image_size' => [
                    'width' => config('blog.image_settings.width', 1792),
                    'height' => config('blog.image_settings.height', 1024),
                ],
                'num_inference_steps' => $options['steps'] ?? 28,
                'guidance_scale' => $options['guidance'] ?? 3.5,
                'num_images' => 1,
                'enable_safety_checker' => true,
                'output_format' => config('blog.image_settings.format', 'jpeg'),
            ], $options);

            // Call Fal.ai API
            $response = Http::withHeaders([
                'Authorization' => 'Key ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])
                ->timeout($this->timeout)
                ->post("{$this->baseUrl}/{$model}", $payload);

            if (!$response->successful()) {
                throw new \Exception('Fal.ai API error: ' . $response->body());
            }

            $data = $response->json();
            $imageUrl = $data['images'][0]['url'] ?? null;

            if (!$imageUrl) {
                throw new \Exception('No image URL in Fal.ai response');
            }

            // Download and save image locally
            $localPath = $this->downloadAndSaveImage($imageUrl);

            $generationTime = round((microtime(true) - $startTime), 2);
            $cost = $this->estimateCost($model, $payload['image_size']);

            Log::info('Fal.ai image generation completed', [
                'model' => $model,
                'generation_time' => $generationTime,
                'cost' => $cost,
                'local_path' => $localPath,
            ]);

            return [
                'url' => $imageUrl,
                'local_path' => $localPath,
                'model' => $model,
                'generation_time' => $generationTime,
                'cost' => $cost,
                'width' => $payload['image_size']['width'],
                'height' => $payload['image_size']['height'],
                'prompt' => $prompt,
            ];
        } catch (\Exception $e) {
            Log::error('Fal.ai image generation failed', [
                'model' => $model,
                'error' => $e->getMessage(),
            ]);

            throw $e;
        }
    }

    /**
     * Generate with automatic fallback
     *
     * @param string $prompt
     * @param string|null $primaryModel
     * @param string|null $fallbackModel
     * @return array
     */
    public function generateWithFallback(
        string $prompt,
        ?string $primaryModel = null,
        ?string $fallbackModel = null
    ): array {
        $primaryModel = $primaryModel ?? config('blog.image_models.primary');
        $fallbackModel = $fallbackModel ?? config('blog.image_models.fallback');

        try {
            return $this->generate($prompt, ['model' => $primaryModel]);
        } catch (\Exception $e) {
            Log::warning('Primary image model failed, trying fallback', [
                'primary' => $primaryModel,
                'fallback' => $fallbackModel,
                'error' => $e->getMessage(),
            ]);

            return $this->generate($prompt, ['model' => $fallbackModel]);
        }
    }

    /**
     * Generate featured image with blog-optimized prompt
     *
     * @param string $title
     * @param string $excerpt
     * @param array $tags
     * @param string|null $customPrompt AI-generated custom prompt (optional)
     * @return array
     */
    public function generateFeaturedImage(string $title, string $excerpt, array $tags = [], ?string $customPrompt = null): array
    {
        // Use custom AI-generated prompt if provided (check for non-empty string), otherwise build static prompt
        $prompt = ($customPrompt && trim($customPrompt) !== '')
            ? $customPrompt
            : $this->buildFeaturedImagePrompt($title, $excerpt, $tags);

        Log::info('Generating featured image', [
            'title' => Str::limit($title, 50),
            'prompt_type' => ($customPrompt && trim($customPrompt) !== '') ? 'ai-generated' : 'static-template',
            'prompt_length' => strlen($prompt),
        ]);

        return $this->generateWithFallback($prompt);
    }

    /**
     * Build featured image prompt from blog content
     *
     * @param string $title
     * @param string $excerpt
     * @param array $tags
     * @return string
     */
    protected function buildFeaturedImagePrompt(string $title, string $excerpt, array $tags = []): string
    {
        $mainTags = array_slice($tags, 0, 3);

        return "Professional blog header image for a technical article. " .
            "Theme: {$title}. " .
            "Style: Modern, clean, tech-focused, suitable for a developer blog. " .
            "Include abstract geometric shapes, code elements, or tech-inspired visuals. " .
            "Color scheme: Dark background with vibrant accent colors. " .
            "NO text, NO words on the image. " .
            "Tags: " . implode(', ', $mainTags);
    }

    /**
     * Download image from URL and save locally
     *
     * @param string $url
     * @return string Local file path
     */
    protected function downloadAndSaveImage(string $url): string
    {
        $imageContent = Http::timeout(30)->get($url)->body();

        // Generate unique filename
        $filename = 'blog-images/' . Str::random(40) . '.jpg';

        // Save to storage
        Storage::disk('public')->put($filename, $imageContent);

        return $filename;
    }

    /**
     * Estimate cost based on model and image size
     *
     * @param string $model
     * @param array $imageSize
     * @return float
     */
    protected function estimateCost(string $model, array $imageSize): float
    {
        $megapixels = ($imageSize['width'] * $imageSize['height']) / 1_000_000;

        // Fal.ai pricing per megapixel
        $pricing = [
            'fal-ai/flux/dev' => 0.025,
            'fal-ai/flux/schnell' => 0.003,
            'fal-ai/flux-pro' => 0.04,
            'fal-ai/flux-1.1-pro' => 0.04,
        ];

        $pricePerMegapixel = $pricing[$model] ?? 0.025;

        return round($megapixels * $pricePerMegapixel, 4);
    }

    /**
     * Get available image models
     *
     * @return array
     */
    public function getAvailableModels(): array
    {
        return config('blog.image_models');
    }

    /**
     * Get the provider name
     *
     * @return string
     */
    public function getProviderName(): string
    {
        return 'fal';
    }

    /**
     * Check if the provider is available
     *
     * @return bool
     */
    public function isAvailable(): bool
    {
        if (!$this->apiKey) {
            return false;
        }

        try {
            // Simple connectivity check
            $response = Http::withHeaders([
                'Authorization' => 'Key ' . $this->apiKey,
            ])->timeout(10)->get("{$this->baseUrl}/fal-ai/flux/dev");

            return $response->successful();
        } catch (\Exception $e) {
            Log::warning('Fal.ai health check failed', ['error' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * Get cost estimate for standard 1792x1024 image with FLUX dev
     *
     * @return float
     */
    public function getCostPerImage(): float
    {
        // Using FLUX dev as default
        $width = config('blog.image_settings.width', 1792);
        $height = config('blog.image_settings.height', 1024);
        return $this->estimateCost('fal-ai/flux/dev', ['width' => $width, 'height' => $height]);
    }
}
