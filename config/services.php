<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'google_analytics' => [
        'tracking_id' => env('GOOGLE_ANALYTICS_TRACKING_ID'),
    ],

    /*
    |--------------------------------------------------------------------------
    | AI Services (Blog Automation)
    |--------------------------------------------------------------------------
    */

    'openrouter' => [
        'api_key' => env('OPENROUTER_API_KEY'),
        'site_url' => env('OPENROUTER_SITE_URL', 'https://hafiz.dev'),
        'site_name' => env('OPENROUTER_SITE_NAME', 'Hafiz Dev Blog'),
        'base_url' => 'https://openrouter.ai/api/v1',
    ],

    'fal' => [
        'api_key' => env('FAL_API_KEY'),
        'base_url' => 'https://fal.run',
    ],

    'together' => [
        'api_key' => env('TOGETHER_API_KEY'),
        'base_url' => 'https://api.together.xyz/v1',
    ],

    /*
    |--------------------------------------------------------------------------
    | Multi-Platform Publishing APIs
    |--------------------------------------------------------------------------
    */

    'devto' => [
        'api_key' => env('DEVTO_API_KEY'),
        'base_url' => 'https://dev.to/api',
        'canonical_base_url' => env('DEVTO_CANONICAL_BASE_URL', 'https://hafiz.dev'),
    ],

    'hashnode' => [
        'api_token' => env('HASHNODE_API_TOKEN'),
        'publication_id' => env('HASHNODE_PUBLICATION_ID'),
        'base_url' => 'https://gql.hashnode.com',
        'canonical_base_url' => env('HASHNODE_CANONICAL_BASE_URL', 'https://hafiz.dev'),
    ],

    'linkedin' => [
        'client_id' => env('LINKEDIN_CLIENT_ID'),
        'client_secret' => env('LINKEDIN_CLIENT_SECRET'),
        'redirect_uri' => env('LINKEDIN_REDIRECT_URI'),
    ],

    'medium' => [
        'integration_token' => env('MEDIUM_INTEGRATION_TOKEN'),
        'base_url' => 'https://api.medium.com/v1',
    ],

];
