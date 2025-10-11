<?php

namespace App\Services\AI;

use Illuminate\Support\Facades\Log;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Prism;

class OpenRouterService
{
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
        $startTime = microtime(true);

        try {
            Log::info('OpenRouter generation started', [
                'model' => $model,
                'prompt_length' => strlen($prompt),
            ]);

            // Use Prism's native OpenRouter provider
            $response = Prism::text()
                ->using(Provider::OpenRouter, $model)
                ->withClientOptions([
                    'timeout' => 120, // 2 minutes for long blog posts
                ])
                ->withPrompt($prompt)
                ->generate();

            $generationTime = round((microtime(true) - $startTime), 2);

            $content = $response->text;
            $usage = $response->usage ?? null;

            // Get token counts (handling different property names)
            $inputTokens = $usage?->promptTokens ?? 0;
            $outputTokens = $usage?->completionTokens ?? 0;
            $totalTokens = $inputTokens + $outputTokens;

            Log::info('OpenRouter generation completed', [
                'model' => $model,
                'generation_time' => $generationTime,
                'tokens' => $totalTokens,
            ]);

            return [
                'content' => $content,
                'tokens' => $totalTokens,
                'input_tokens' => $inputTokens,
                'output_tokens' => $outputTokens,
                'model' => $model,
                'generation_time' => $generationTime,
                'cost' => $this->estimateCost($model, $inputTokens, $outputTokens),
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
     * Generate structured JSON output with validation
     *
     * @param string $prompt
     * @param string|null $model
     * @return array ['title' => string, 'excerpt' => string, 'meta_description' => string, 'tags' => array, 'image_prompt' => string, 'content' => string, 'metadata' => array]
     * @throws \Exception if JSON is invalid or missing required fields
     */
    public function generateStructured(string $prompt, ?string $model = null): array
    {
        $model = $model ?? config('blog.models.primary');
        $startTime = microtime(true);

        try {
            Log::info('Structured JSON generation started', [
                'model' => $model,
                'prompt_length' => strlen($prompt),
            ]);

            // Add explicit JSON formatting instructions
            $jsonPrompt = $prompt . "\n\n" . <<<'JSON_INSTRUCTION'

**CRITICAL: Return your response as valid JSON ONLY. No markdown, no code fences, no explanation.**

Required JSON format:
{
  "title": "SEO-optimized title (50-60 chars)",
  "excerpt": "Compelling 1-2 sentence summary (max 150 chars)",
  "meta_description": "SEO meta description (150-160 chars)",
  "tags": ["tag1", "tag2", "tag3", "tag4", "tag5"],
  "image_prompt": "Detailed image generation prompt (80-120 words, describe scene/style/colors)",
  "content": "Full markdown blog post content without any metadata headers"
}

Rules:
- Return ONLY the JSON object (no ```json fences, no extra text)
- All fields are required and must be non-empty
- Tags must be an array with 3-5 items
- Content must be clean markdown (no EXCERPT:, META:, etc. headers)
- Image prompt should be detailed for AI image generation
JSON_INSTRUCTION;

            $response = Prism::text()
                ->using(Provider::OpenRouter, $model)
                ->withClientOptions([
                    'timeout' => 120, // 2 minutes for long content
                ])
                ->withPrompt($jsonPrompt)
                ->generate();

            $generationTime = round((microtime(true) - $startTime), 2);
            $content = trim($response->text);
            $usage = $response->usage ?? null;

            // Clean potential markdown code fences
            $content = preg_replace('/^```json\s*|\s*```$/m', '', $content);
            $content = trim($content);

            // Parse JSON
            $data = json_decode($content, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Invalid JSON: ' . json_last_error_msg() . "\nContent preview: " . substr($content, 0, 200));
            }

            // Validate required fields
            $required = ['title', 'excerpt', 'meta_description', 'tags', 'image_prompt', 'content'];
            $missing = [];
            foreach ($required as $field) {
                if (!isset($data[$field]) || (is_string($data[$field]) && trim($data[$field]) === '') || (is_array($data[$field]) && empty($data[$field]))) {
                    $missing[] = $field;
                }
            }

            if (!empty($missing)) {
                throw new \Exception("Missing or empty required fields: " . implode(', ', $missing));
            }

            // Validate tags is an array
            if (!is_array($data['tags'])) {
                throw new \Exception("Tags must be an array, got: " . gettype($data['tags']));
            }

            // Get token counts
            $inputTokens = $usage?->promptTokens ?? 0;
            $outputTokens = $usage?->completionTokens ?? 0;
            $totalTokens = $inputTokens + $outputTokens;

            Log::info('Structured JSON generation completed', [
                'model' => $model,
                'generation_time' => $generationTime,
                'tokens' => $totalTokens,
                'content_length' => strlen($data['content']),
                'word_count' => str_word_count($data['content']),
            ]);

            // Add metadata to response
            $data['metadata'] = [
                'model' => $model,
                'generation_time' => $generationTime,
                'tokens' => $totalTokens,
                'input_tokens' => $inputTokens,
                'output_tokens' => $outputTokens,
                'cost' => $this->estimateCost($model, $inputTokens, $outputTokens),
                'format' => 'json',
            ];

            return $data;

        } catch (\Exception $e) {
            Log::error('Structured JSON generation failed', [
                'model' => $model,
                'error' => $e->getMessage(),
                'generation_time' => round((microtime(true) - $startTime), 2),
            ]);

            throw $e;
        }
    }

    /**
     * Generate structured JSON output (legacy method, kept for compatibility)
     *
     * @param string $prompt
     * @param string|null $model
     * @return array
     */
    public function generateJson(string $prompt, ?string $model = null): array
    {
        $model = $model ?? config('blog.models.primary');

        try {
            $response = Prism::text()
                ->using(Provider::OpenRouter, $model)
                ->withMaxTokens(4000)
                ->withClientOptions([
                    'timeout' => 120,
                ])
                ->withPrompt($prompt . "\n\nReturn ONLY valid JSON, no markdown formatting.")
                ->generate();

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
            'google/gemini-2.0-flash-exp' => ['input' => 0.00, 'output' => 0.00],
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
