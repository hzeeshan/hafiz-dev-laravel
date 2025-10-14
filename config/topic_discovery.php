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
                // Core Tech (Your Expertise)
                'laravel',
                'PHP',
                'webdev',
                'programming',
                // Business & SaaS (Your Products)
                'SaaS',
                'EntrepreneurRideAlong',
                'startups',
                'sidehustle',
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
            ],
            'min_upvotes' => 50,
            'limit' => 25,
        ],

        'hackernews' => [
            'enabled' => true,
            'keywords' => [
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
                // SaaS & Business (Your Experience)
                'saas',
                'startup',
                'monetization',
                'side project',
                'indie hacker',
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
        'technical' => ['tutorial', 'guide', 'how to', 'building', 'implementing'],
        'opinion' => ['why', 'thoughts on', 'my take', 'unpopular opinion'],
        'news' => ['released', 'announced', 'update', 'new version', 'launched'],
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
];
