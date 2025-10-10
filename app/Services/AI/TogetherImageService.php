<?php

namespace App\Services\AI;

use App\Contracts\ImageServiceInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TogetherImageService implements ImageServiceInterface
{
    protected ?string $apiKey;
    protected string $baseUrl = 'https://api.together.xyz/v1';
    protected int $timeout = 60;

    public function __construct()
    {
        $this->apiKey = config('services.together.api_key');
    }

    /**
     * Generate image using Together.ai
     *
     * @param string $prompt
     * @param array $options
     * @return array ['url' => string, 'local_path' => string, 'cost' => float, 'generation_time' => float]
     */
    public function generate(string $prompt, array $options = []): array
    {
        if (!$this->apiKey) {
            throw new \Exception('Together.ai API key not configured. Set TOGETHER_API_KEY in .env file.');
        }

        $startTime = microtime(true);

        $model = $options['model'] ?? config('blog.image_models.together_primary', 'black-forest-labs/FLUX.1-schnell');

        try {
            Log::info('Together.ai image generation started', [
                'model' => $model,
                'prompt' => Str::limit($prompt, 100),
            ]);

            // Prepare request payload
            $payload = [
                'model' => $model,
                'prompt' => $prompt,
                'width' => $options['width'] ?? config('blog.image_settings.width', 1024),
                'height' => $options['height'] ?? config('blog.image_settings.height', 1024),
                'steps' => $options['steps'] ?? $this->getDefaultSteps($model),
                'n' => 1,
                'response_format' => 'url',
            ];

            // Call Together.ai API
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])
                ->timeout($this->timeout)
                ->post("{$this->baseUrl}/images/generations", $payload);

            if (!$response->successful()) {
                throw new \Exception('Together.ai API error: ' . $response->body());
            }

            $data = $response->json();
            $imageUrl = $data['data'][0]['url'] ?? null;

            if (!$imageUrl) {
                throw new \Exception('No image URL in Together.ai response');
            }

            // Download and save image locally
            $localPath = $this->downloadAndSaveImage($imageUrl);

            $generationTime = round((microtime(true) - $startTime), 2);
            $cost = $this->estimateCost($model, $payload['width'], $payload['height']);

            Log::info('Together.ai image generation completed', [
                'model' => $model,
                'generation_time' => $generationTime,
                'cost' => $cost,
                'local_path' => $localPath,
            ]);

            return [
                'url' => $imageUrl,
                'local_path' => $localPath,
                'model' => $model,
                'provider' => $this->getProviderName(),
                'generation_time' => $generationTime,
                'cost' => $cost,
                'width' => $payload['width'],
                'height' => $payload['height'],
                'prompt' => $prompt,
            ];
        } catch (\Exception $e) {
            Log::error('Together.ai image generation failed', [
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
        $primaryModel = $primaryModel ?? config('blog.image_models.together_primary', 'black-forest-labs/FLUX.1-schnell');
        $fallbackModel = $fallbackModel ?? config('blog.image_models.together_fallback', 'black-forest-labs/FLUX.1.1-pro');

        try {
            return $this->generate($prompt, ['model' => $primaryModel]);
        } catch (\Exception $e) {
            Log::warning('Primary model failed, trying fallback', [
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
        // Use custom AI-generated prompt if provided, otherwise build static prompt
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
     * Get default steps based on model
     *
     * @param string $model
     * @return int
     */
    protected function getDefaultSteps(string $model): int
    {
        // FLUX.1-schnell is optimized for 1-4 steps
        if (str_contains($model, 'schnell')) {
            return 4;
        }

        // FLUX.1-dev works best with 28-50 steps
        if (str_contains($model, 'dev')) {
            return 28;
        }

        // FLUX.1.1-pro uses adaptive steps
        return 28;
    }

    /**
     * Estimate cost based on model and image size
     *
     * @param string $model
     * @param int $width
     * @param int $height
     * @return float
     */
    protected function estimateCost(string $model, int $width, int $height): float
    {
        $megapixels = ($width * $height) / 1_000_000;

        // Together.ai pricing per megapixel
        $pricing = [
            'black-forest-labs/FLUX.1-schnell' => 0.003,      // Fastest, cheapest
            'black-forest-labs/FLUX.1-dev' => 0.025,          // Balanced
            'black-forest-labs/FLUX.1.1-pro' => 0.04,         // Highest quality
        ];

        $pricePerMegapixel = $pricing[$model] ?? 0.003; // Default to schnell

        return round($megapixels * $pricePerMegapixel, 4);
    }

    /**
     * Get the provider name
     *
     * @return string
     */
    public function getProviderName(): string
    {
        return 'together';
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
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
            ])->timeout(10)->get("{$this->baseUrl}/models");

            return $response->successful();
        } catch (\Exception $e) {
            Log::warning('Together.ai health check failed', ['error' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * Get cost estimate for standard 1024x1024 image with default model
     *
     * @return float
     */
    public function getCostPerImage(): float
    {
        // Using FLUX.1-schnell (cheapest option)
        return 0.003; // $0.003 per megapixel × 1 MP
    }

    /**
     * Get available models for this provider
     *
     * @return array
     */
    public function getAvailableModels(): array
    {
        return [
            'together_primary' => config('blog.image_models.together_primary', 'black-forest-labs/FLUX.1-schnell'),
            'together_fallback' => config('blog.image_models.together_fallback', 'black-forest-labs/FLUX.1-dev'),
            'together_hq' => config('blog.image_models.together_hq', 'black-forest-labs/FLUX.1.1-pro'),
        ];
    }
}
