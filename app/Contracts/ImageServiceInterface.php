<?php

namespace App\Contracts;

interface ImageServiceInterface
{
    /**
     * Generate a single image from a prompt
     *
     * @param string $prompt The text prompt for image generation
     * @param array $options Additional generation options
     * @return array ['url' => string, 'local_path' => string, 'cost' => float, 'generation_time' => float, 'provider' => string]
     */
    public function generate(string $prompt, array $options = []): array;

    /**
     * Generate with automatic fallback to alternative model
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
    ): array;

    /**
     * Generate featured image with blog-optimized prompt
     *
     * @param string $title Blog post title
     * @param string $excerpt Blog post excerpt
     * @param array $tags Blog post tags
     * @param string|null $customPrompt AI-generated custom prompt (optional)
     * @return array
     */
    public function generateFeaturedImage(
        string $title,
        string $excerpt,
        array $tags = [],
        ?string $customPrompt = null
    ): array;

    /**
     * Get the provider name
     *
     * @return string
     */
    public function getProviderName(): string;

    /**
     * Check if the provider is available
     *
     * @return bool
     */
    public function isAvailable(): bool;

    /**
     * Get cost estimate for standard image
     *
     * @return float
     */
    public function getCostPerImage(): float;

    /**
     * Get available models for this provider
     *
     * @return array
     */
    public function getAvailableModels(): array;
}
