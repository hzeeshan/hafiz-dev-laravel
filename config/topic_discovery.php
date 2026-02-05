<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Topic Discovery Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for automated trending topic discovery from multiple sources.
    | Discovered topics are saved to trending_topic_sources table and can be
    | auto-converted to BlogTopic based on score threshold.
    |
    */

    'enabled' => env('TOPIC_DISCOVERY_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Auto-Create Threshold
    |--------------------------------------------------------------------------
    |
    | Topics with scores >= this threshold will be automatically converted
    | to BlogTopics when using --auto-create flag.
    | Score range: 0-10
    |
    */

    'auto_create_threshold' => 7.0,

    /*
    |--------------------------------------------------------------------------
    | Source Configurations
    |--------------------------------------------------------------------------
    */

    'sources' => [
        'reddit' => [
            'enabled' => true,
            'subreddits' => [
                // === TECHNICAL (70%) ===
                // Core Tech (Your Expertise)
                'laravel',
                'PHP',
                'webdev',
                'programming',
                // Frontend (Full-Stack Focus)
                'vuejs',
                'reactjs',
                'javascript',
                'Frontend',
                // DevOps & Tools
                'docker',
                'devops',
                'selfhosted',
                // AI & Automation (Your Niche)
                'LocalLLaMA',
                'AutomateYourself',
                'ChatGPTCoding',

                // === FOUNDER-FOCUSED (30%) ===
                // Business & SaaS (MVP Services Target Audience)
                'SaaS',
                'startups',
                'Entrepreneur',
                'EntrepreneurRideAlong',
                'SideProject',
                'Solopreneur',
                'smallbusiness',
                'Business_Ideas',
                'Startup_Ideas',
                'SomebodyMakeThis',
                'indiehackers',
                'MicroSaas',
                'buildinpublic',
            ],
            'min_upvotes' => 50,
            'limit' => 25,
        ],

        'hackernews' => [
            'enabled' => true,
            'keywords' => [
                // === TECHNICAL (70%) ===
                // Backend (Your Core)
                'laravel',
                'php',
                'api',
                'backend',
                'rest',
                'graphql',
                // Frontend (Full-Stack)
                'vue',
                'react',
                'tailwind',
                'alpine',
                'inertia',
                // Full-Stack Tools
                'full-stack',
                'fullstack',
                'livewire',
                'filament',
                // AI & Automation (Your Competitive Edge)
                'ai',
                'llm',
                'openai',
                'deepseek',
                'claude',
                'chatgpt',
                'automation',
                // DevOps (Full-Stack Coverage)
                'docker',
                'kubernetes',
                'deployment',
                'ci/cd',
                'hosting',
                // Database
                'mysql',
                'postgres',
                'database',
                'sql',
                'redis',
                // Performance (SEO Value)
                'performance',
                'optimization',
                'scaling',
                'caching',
                // Chrome Extensions (Your Unique Angle)
                'chrome extension',
                'browser extension',
                'manifest v3',

                // === FOUNDER-FOCUSED (30%) ===
                // SaaS & Business (MVP Services Target Audience)
                'saas',
                'startup',
                'monetization',
                'side project',
                'indie hacker',
                'mvp',
                'validate idea',
                'validation',
                'first customers',
                'launch',
                'bootstrapped',
                'solo founder',
                'no-code',
                'build vs buy',
                'hire developer',
                'freelancer',
                'outsourcing',
                'cost of building',
                'app development cost',
            ],
            'min_points' => 100,
            'limit' => 50, // Increased from 30
        ],

        'google_trends' => [
            'enabled' => false, // Disabled - no free API available
            // Note: Use manual SEO research tools instead:
            // - Ahrefs (keyword research)
            // - Google Search Console (your actual search terms)
            // - AnswerThePublic (question-based topics)
            'keywords' => ['laravel', 'deepseek', 'php', 'filament', 'livewire'],
            'geo' => 'US',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Scoring Configuration
    |--------------------------------------------------------------------------
    |
    | Weights for different scoring factors (must sum to 1.0)
    |
    */

    'scoring' => [
        'upvote_weight' => 0.4,     // Engagement score weight
        'comment_weight' => 0.3,    // Discussion score weight
        'keyword_weight' => 0.3,    // Relevance score weight
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Content Type Mapping
    |--------------------------------------------------------------------------
    |
    | Map keywords to content types for auto-created topics
    |
    */

    'content_type_mapping' => [
        'technical' => ['tutorial', 'guide', 'how to', 'building', 'implementing', 'laravel', 'php', 'vue', 'api', 'database'],
        'founder' => ['validate', 'mvp', 'startup', 'launch', 'customers', 'bootstrapped', 'founder', 'idea', 'cost', 'hire'],
        'opinion' => ['why', 'thoughts on', 'my take', 'unpopular opinion'],
        'news' => ['released', 'announced', 'update', 'new version', 'launched'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Founder-Focused Subreddits
    |--------------------------------------------------------------------------
    |
    | Topics from these subreddits are auto-tagged as 'founder' content type
    |
    */

    'founder_subreddits' => [
        'startups',
        'Entrepreneur',
        'SideProject',
        'Solopreneur',
        'smallbusiness',
        'Business_Ideas',
        'Startup_Ideas',
        'SomebodyMakeThis',
        'indiehackers',
        'MicroSaas',
        'buildinpublic',
    ],

    /*
    |--------------------------------------------------------------------------
    | Duplicate Detection
    |--------------------------------------------------------------------------
    |
    | Prevent creating duplicate topics
    |
    */

    'duplicate_detection' => [
        'enabled' => true,
        'similarity_threshold' => 0.8, // 80% title similarity = duplicate
        'lookback_days' => 30,         // Check last 30 days for duplicates
    ],

    /*
    |--------------------------------------------------------------------------
    | Production Sync Configuration
    |--------------------------------------------------------------------------
    |
    | Settings for syncing discovered topics from local machine to production.
    | Local machine uses PRODUCTION_SYNC_URL and PRODUCTION_SYNC_TOKEN.
    | Production server uses TOPIC_SYNC_TOKEN to validate incoming requests.
    |
    */

    'sync' => [
        // Production endpoint URL (used by local machine)
        'production_url' => env('PRODUCTION_SYNC_URL'),

        // Token for authenticating with production (used by local machine)
        'production_token' => env('PRODUCTION_SYNC_TOKEN'),

        // Token for validating incoming sync requests (used by production)
        'token' => env('TOPIC_SYNC_TOKEN'),

        // Request timeout in seconds
        'timeout' => 30,
    ],
];
