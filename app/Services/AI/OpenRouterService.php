<?php

namespace App\Services\AI;

use EchoLabs\Prism\Facades\Prism;
use EchoLabs\Prism\Providers\OpenAI\OpenAI;
use Illuminate\Support\Facades\Log;

class OpenRouterService
{
    protected string $apiKey;
    protected string $baseUrl;
    protected string $siteUrl;
    protected string $siteName;

    public function __construct()
    {
        $this->apiKey = config('services.openrouter.api_key');
        $this->baseUrl = config('services.openrouter.base_url');
        $this->siteUrl = config('services.openrouter.site_url');
        $this->siteName = config('services.openrouter.site_name');
    }

    /**
     * Generate content using specified model
     *
     * @param string $prompt
     * @param string|null $model
     * @param int|null $maxTokens
     * @param array $options
     * @return array ['content' => string, 'tokens' => int, 'model' => string, 'cost' => float]
     */
    public function generate(
        string $prompt,
        ?string $model = null,
        ?int $maxTokens = null,
        array $options = []
    ): array {
        $model = $model ?? config('blog.models.primary');
        $maxTokens = $maxTokens ?? 4000;

        $startTime = microtime(true);

        try {
            Log::info('OpenRouter generation started', [
                'model' => $model,
                'prompt_length' => strlen($prompt),
            ]);

            // Use Prism with OpenAI provider pointing to OpenRouter
            $response = Prism::using(
                OpenAI::class,
                $this->apiKey,
                $this->baseUrl
            )->text()
                ->using($model)
                ->withMaxTokens($maxTokens)
                ->withClientOptions([
                    'headers' => [
                        'HTTP-Referer' => $this->siteUrl,
                        'X-Title' => $this->siteName,
                    ],
                ])
                ->withPrompt($prompt);

            $generationTime = round((microtime(true) - $startTime), 2);

            $content = $response->text;
            $usage = $response->usage ?? null;

            Log::info('OpenRouter generation completed', [
                'model' => $model,
                'generation_time' => $generationTime,
                'tokens' => $usage?->totalTokens ?? 0,
            ]);

            return [
                'content' => $content,
                'tokens' => $usage?->totalTokens ?? 0,
                'input_tokens' => $usage?->promptTokens ?? 0,
                'output_tokens' => $usage?->completionTokens ?? 0,
                'model' => $model,
                'generation_time' => $generationTime,
                'cost' => $this->estimateCost($model, $usage?->promptTokens ?? 0, $usage?->completionTokens ?? 0),
            ];
        } catch (\Exception $e) {
            Log::error('OpenRouter generation failed', [
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
        $primaryModel = $primaryModel ?? config('blog.models.primary');
        $fallbackModel = $fallbackModel ?? config('blog.models.fallback');

        try {
            return $this->generate($prompt, $primaryModel);
        } catch (\Exception $e) {
            Log::warning('Primary model failed, trying fallback', [
                'primary' => $primaryModel,
                'fallback' => $fallbackModel,
                'error' => $e->getMessage(),
            ]);

            return $this->generate($prompt, $fallbackModel);
        }
    }

    /**
     * Generate structured JSON output
     *
     * @param string $prompt
     * @param string|null $model
     * @return array
     */
    public function generateJson(string $prompt, ?string $model = null): array
    {
        $model = $model ?? config('blog.models.primary');

        try {
            $response = Prism::using(
                OpenAI::class,
                $this->apiKey,
                $this->baseUrl
            )->text()
                ->using($model)
                ->withMaxTokens(4000)
                ->withClientOptions([
                    'headers' => [
                        'HTTP-Referer' => $this->siteUrl,
                        'X-Title' => $this->siteName,
                    ],
                ])
                ->withPrompt($prompt . "\n\nReturn ONLY valid JSON, no markdown formatting.");

            $content = $response->text;

            // Clean potential markdown formatting
            $content = preg_replace('/```json\n?|\n?```/', '', $content);
            $content = trim($content);

            return json_decode($content, true) ?? [];
        } catch (\Exception $e) {
            Log::error('OpenRouter JSON generation failed', [
                'model' => $model,
                'error' => $e->getMessage(),
            ]);

            throw $e;
        }
    }

    /**
     * Estimate cost based on model and token usage
     *
     * @param string $model
     * @param int $inputTokens
     * @param int $outputTokens
     * @return float
     */
    protected function estimateCost(string $model, int $inputTokens, int $outputTokens): float
    {
        // Approximate pricing (per 1M tokens)
        $pricing = [
            'deepseek/deepseek-chat' => ['input' => 0.14, 'output' => 0.28],
            'deepseek/deepseek-r1' => ['input' => 0.55, 'output' => 2.19],
            'anthropic/claude-3.5-sonnet' => ['input' => 3.00, 'output' => 15.00],
            'openai/gpt-4o-mini' => ['input' => 0.15, 'output' => 0.60],
            'google/gemini-2.0-flash-thinking-exp:free' => ['input' => 0.00, 'output' => 0.00],
        ];

        $modelPricing = $pricing[$model] ?? ['input' => 0.10, 'output' => 0.30]; // Default estimate

        $inputCost = ($inputTokens / 1_000_000) * $modelPricing['input'];
        $outputCost = ($outputTokens / 1_000_000) * $modelPricing['output'];

        return round($inputCost + $outputCost, 6);
    }

    /**
     * Get available models from config
     *
     * @return array
     */
    public function getAvailableModels(): array
    {
        return config('blog.models');
    }
}
