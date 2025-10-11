<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Blog Automation Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for automated blog post generation system.
    | Based on proven StudyLab.app automation with OpenRouter + Fal.ai stack.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Content Generation Settings
    |--------------------------------------------------------------------------
    */

    'ai_provider' => env('BLOG_AI_PROVIDER', 'openrouter'),

    'min_word_count' => env('BLOG_MIN_WORD_COUNT', 1500),
    'max_word_count' => env('BLOG_MAX_WORD_COUNT', 2500),

    'default_author_id' => env('BLOG_DEFAULT_AUTHOR_ID', 1),

    /*
    |--------------------------------------------------------------------------
    | AI Models Configuration
    |--------------------------------------------------------------------------
    */

    'models' => [
        'primary' => env('BLOG_PRIMARY_MODEL', 'deepseek/deepseek-chat'),
        'fallback' => env('BLOG_FALLBACK_MODEL', 'anthropic/claude-3.5-sonnet'),
        'fast' => env('BLOG_FAST_MODEL', 'google/gemini-2.0-flash-thinking-exp:free'),
        'reasoning' => env('BLOG_REASONING_MODEL', 'deepseek/deepseek-r1'), // For complex technical posts
    ],

    /*
    |--------------------------------------------------------------------------
    | Image Generation Settings
    |--------------------------------------------------------------------------
    | Provider options: 'fal' (Fal.ai), 'together' (Together.ai)
    | Recommendation:
    |   - Local/Development: 'together' (cheaper for testing: $0.003/image)
    |   - Production: 'fal' (better quality/reliability: $0.046/image)
    */

    'image_provider' => env('BLOG_IMAGE_PROVIDER', 'fal'),

    // Provider configuration with fallback support
    'image_providers' => [
        'primary' => env('BLOG_IMAGE_PRIMARY_PROVIDER', 'fal'),
        'fallback' => env('BLOG_IMAGE_FALLBACK_PROVIDER', 'together'),
    ],

    'featured_images_count' => env('BLOG_FEATURED_IMAGES_COUNT', 1),
    'inline_images_count' => env('BLOG_INLINE_IMAGES_COUNT', 0), // 0 = text-only blog posts

    // Fal.ai models (Production recommended)
    'image_models' => [
        'primary' => env('BLOG_IMAGE_PRIMARY_MODEL', 'fal-ai/flux/dev'),
        'fallback' => env('BLOG_IMAGE_FALLBACK_MODEL', 'fal-ai/flux/schnell'),
        'high_quality' => env('BLOG_IMAGE_HQ_MODEL', 'fal-ai/flux-pro'),

        // Together.ai models (Cheaper for development)
        'together_primary' => env('BLOG_IMAGE_TOGETHER_PRIMARY', 'black-forest-labs/FLUX.1-schnell'),
        'together_fallback' => env('BLOG_IMAGE_TOGETHER_FALLBACK', 'black-forest-labs/FLUX.1-dev'),
        'together_hq' => env('BLOG_IMAGE_TOGETHER_HQ', 'black-forest-labs/FLUX.1.1-pro'),
    ],

    'image_settings' => [
        'width' => env('BLOG_IMAGE_WIDTH', 1792),
        'height' => env('BLOG_IMAGE_HEIGHT', 1024),
        'format' => env('BLOG_IMAGE_FORMAT', 'jpeg'),
        'quality' => env('BLOG_IMAGE_QUALITY', 90),
    ],

    /*
    |--------------------------------------------------------------------------
    | Automation Settings
    |--------------------------------------------------------------------------
    */

    'auto_generation_enabled' => env('BLOG_AUTO_GENERATION_ENABLED', false),
    'generation_frequency' => env('BLOG_GENERATION_FREQUENCY', 3), // Days between auto-posts
    'schedule_check_interval' => env('BLOG_SCHEDULE_CHECK_INTERVAL', 5), // Minutes

    'require_review' => env('BLOG_REQUIRE_REVIEW', true), // Always true for personal brand

    /*
    |--------------------------------------------------------------------------
    | Quality Control Settings
    |--------------------------------------------------------------------------
    */

    'quality_checks' => [
        'require_code_examples' => env('BLOG_REQUIRE_CODE', true),
        'min_code_blocks' => env('BLOG_MIN_CODE_BLOCKS', 1),
        'check_plagiarism' => env('BLOG_CHECK_PLAGIARISM', false),
        'validate_links' => env('BLOG_VALIDATE_LINKS', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | SEO Settings
    |--------------------------------------------------------------------------
    */

    'seo' => [
        'title_max_length' => 60,
        'description_max_length' => 160,
        'auto_generate_seo' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Multi-Platform Distribution Settings
    |--------------------------------------------------------------------------
    */

    'distribution' => [
        'enabled' => env('BLOG_DISTRIBUTION_ENABLED', false),
        'delay_hours' => env('BLOG_DISTRIBUTION_DELAY', 48), // SEO priority for main blog

        'platforms' => [
            'devto' => env('BLOG_PUBLISH_DEVTO', true),
            'hashnode' => env('BLOG_PUBLISH_HASHNODE', true),
            'linkedin' => env('BLOG_PUBLISH_LINKEDIN', true),
            'medium' => env('BLOG_PUBLISH_MEDIUM', false),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Notification Settings
    |--------------------------------------------------------------------------
    */

    'notifications' => [
        'telegram_enabled' => env('BLOG_TELEGRAM_ENABLED', true),
        'telegram_bot_token' => env('BLOG_TELEGRAM_BOT_TOKEN'),
        'telegram_chat_id' => env('BLOG_TELEGRAM_CHAT_ID'),

        'notify_on_success' => env('BLOG_TELEGRAM_ON_SUCCESS', true),
        'notify_on_failure' => env('BLOG_TELEGRAM_ON_FAILURE', true),
        'notify_on_review' => env('BLOG_TELEGRAM_ON_REVIEW', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Performance & Cost Tracking
    |--------------------------------------------------------------------------
    */

    'tracking' => [
        'log_generation_time' => true,
        'log_token_usage' => true,
        'log_costs' => true,
        'monthly_budget' => env('BLOG_MONTHLY_BUDGET', 5.00), // USD
    ],

    /*
    |--------------------------------------------------------------------------
    | Timeouts & Retries
    |--------------------------------------------------------------------------
    */

    'timeouts' => [
        'content_generation' => 300, // 5 minutes
        'image_generation' => 60,    // 1 minute
        'total_job' => 420,          // 7 minutes
    ],

    'retries' => [
        'max_attempts' => 3,
        'backoff_seconds' => [5, 15, 45], // Exponential backoff
    ],

    /*
    |--------------------------------------------------------------------------
    | Content Templates
    |--------------------------------------------------------------------------
    */

    'templates' => [
        'author_bio' => env('BLOG_AUTHOR_BIO', 'Hafiz Riaz is a Laravel developer and automation expert. Need help with your project? Contact me at hafiz.dev'),
        'hire_me_cta' => env('BLOG_HIRE_CTA', 'Need help implementing this? Let\'s work together: [Contact me](https://hafiz.dev)'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Voice & Tone Settings (for AI)
    |--------------------------------------------------------------------------
    */

    'voice' => [
        'style' => 'professional_developer', // professional_developer, casual_teacher, technical_expert
        'person' => 'first', // first, third
        'include_personal_experience' => true,
        'use_code_examples' => true,
        'explain_trade_offs' => true,
    ],
];
