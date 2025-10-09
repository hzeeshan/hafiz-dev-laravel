<?php

namespace App\Services\AI;

use App\Contracts\ImageServiceInterface;
use Illuminate\Support\Facades\Log;

class ImageServiceFactory
{
    /**
     * Create image service instance based on configuration
     *
     * @return ImageServiceInterface
     * @throws \Exception
     */
    public static function make(): ImageServiceInterface
    {
        $provider = config('blog.image_provider', 'fal');

        Log::info('Creating image service', [
            'provider' => $provider,
            'environment' => app()->environment(),
        ]);

        return match ($provider) {
            'fal' => app(FalImageService::class),
            'together' => app(TogetherImageService::class),
            default => throw new \Exception("Unsupported image provider: {$provider}"),
        };
    }

    /**
     * Create image service with automatic fallback
     * Primary provider tries first, falls back to secondary if it fails
     *
     * @return ImageServiceInterface
     * @throws \Exception
     */
    public static function makeWithFallback(): ImageServiceInterface
    {
        $primary = config('blog.image_providers.primary', 'fal');
        $fallback = config('blog.image_providers.fallback', 'together');

        Log::info('Creating image service with fallback', [
            'primary' => $primary,
            'fallback' => $fallback,
        ]);

        // Try primary provider first
        try {
            $service = self::makeProvider($primary);

            if ($service->isAvailable()) {
                Log::info('Using primary image provider', ['provider' => $primary]);
                return $service;
            }
        } catch (\Exception $e) {
            Log::warning('Primary provider failed', [
                'provider' => $primary,
                'error' => $e->getMessage(),
            ]);
        }

        // Fallback to secondary provider
        Log::info('Falling back to secondary provider', ['provider' => $fallback]);
        return self::makeProvider($fallback);
    }

    /**
     * Create specific provider instance
     *
     * @param string $provider
     * @return ImageServiceInterface
     * @throws \Exception
     */
    protected static function makeProvider(string $provider): ImageServiceInterface
    {
        return match ($provider) {
            'fal' => app(FalImageService::class),
            'together' => app(TogetherImageService::class),
            default => throw new \Exception("Unsupported image provider: {$provider}"),
        };
    }

    /**
     * Get provider status for monitoring
     *
     * @return array
     */
    public static function getProviderStatus(): array
    {
        $providers = ['fal', 'together'];
        $status = [];

        foreach ($providers as $provider) {
            try {
                $service = self::makeProvider($provider);
                $status[$provider] = [
                    'available' => $service->isAvailable(),
                    'cost_per_image' => $service->getCostPerImage(),
                    'name' => $service->getProviderName(),
                ];
            } catch (\Exception $e) {
                $status[$provider] = [
                    'available' => false,
                    'error' => $e->getMessage(),
                ];
            }
        }

        return $status;
    }

    /**
     * Get recommended provider based on environment
     * Local: Together.ai (cheaper for testing)
     * Production: Fal.ai (better quality/reliability)
     *
     * @return string
     */
    public static function getRecommendedProvider(): string
    {
        return app()->environment('local', 'development') ? 'together' : 'fal';
    }

    /**
     * Test image generation with current provider
     *
     * @return array
     */
    public static function test(): array
    {
        $service = self::make();

        $testPrompt = 'A simple test image: geometric shapes on a gradient background, modern and clean';

        Log::info('Testing image generation', [
            'provider' => $service->getProviderName(),
            'prompt' => $testPrompt,
        ]);

        $startTime = microtime(true);

        try {
            $result = $service->generate($testPrompt, [
                'width' => 512,
                'height' => 512,
            ]);

            $totalTime = round(microtime(true) - $startTime, 2);

            return [
                'success' => true,
                'provider' => $service->getProviderName(),
                'total_time' => $totalTime,
                'generation_time' => $result['generation_time'],
                'cost' => $result['cost'],
                'local_path' => $result['local_path'],
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'provider' => $service->getProviderName(),
                'error' => $e->getMessage(),
            ];
        }
    }
}
