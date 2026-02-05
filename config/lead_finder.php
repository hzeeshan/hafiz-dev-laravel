<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Lead Finder Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for the automated lead discovery system that monitors
    | Reddit and Hacker News for potential client leads.
    |
    */

    'enabled' => env('LEAD_FINDER_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Notification Threshold
    |--------------------------------------------------------------------------
    |
    | Minimum score (0-10) required to send a Telegram notification.
    | Leads below this threshold are saved but not notified.
    |
    */

    'notification_threshold' => 5.0,

    /*
    |--------------------------------------------------------------------------
    | Minimum Save Threshold
    |--------------------------------------------------------------------------
    |
    | Minimum score (0-10) required to save a lead to the database.
    | Leads below this threshold are completely skipped.
    |
    */

    'min_save_threshold' => 2.0,

    /*
    |--------------------------------------------------------------------------
    | Sources Configuration
    |--------------------------------------------------------------------------
    */

    'sources' => [
        'reddit' => [
            'enabled' => true,
            'subreddits' => [
                // HIGH INTENT - People actively looking for developers
                'forhire',           // Hiring posts
                'SomebodyMakeThis',  // "I want someone to build X"
                'startups',          // Founders looking for tech help
                'Entrepreneur',
                'smallbusiness',

                // MEDIUM INTENT - People with problems I can solve
                'SaaS',
                'SideProject',
                'indiehackers',
                'Solopreneur',
                'MicroSaas',
                'buildinpublic',
                'webdev',
                'nocode',            // People hitting no-code limits

                // PROBLEM SIGNALS - People frustrated with current tools
                'Automate',
                'AutomateYourself',
                'AppIdeas',

                // EMERGING OPPORTUNITIES - People hitting limits, need real dev help
                'vibecoding',        // People trying AI coding but getting stuck
                'AlphaandBetaUsers', // Early-stage founders needing dev for next iteration
                'juststart',         // People starting online businesses, some need tech built
            ],
            'sort' => 'new',         // Use /new not /hot (we want fresh posts)
            'min_upvotes' => 1,      // Low threshold - fresh posts have few upvotes
            'limit' => 25,
            'max_age_hours' => 48,   // Only posts from last 48 hours
        ],

        'hackernews' => [
            'enabled' => true,
            'search_queries' => [
                // Use HN Algolia Search API for keyword search
                'looking for developer',
                'need a developer',
                'hire freelancer',
                'build my mvp',
                'need someone to build',
                'looking for cofounder technical',
                'replace excel spreadsheet',
                'automate my business',
                'need web app',
                'need a web developer',
                'hire developer',
                'looking for freelancer',
            ],
            'min_points' => 1,       // Low threshold for fresh posts
            'max_age_hours' => 48,
            'limit' => 30,           // Results per query
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Intent Keywords
    |--------------------------------------------------------------------------
    |
    | Keywords that indicate buying intent, used for scoring.
    | Matched against BOTH title AND body text.
    |
    */

    'intent_keywords' => [
        // STRONG INTENT (someone actively looking to hire/pay)
        'high' => [
            'need a developer', 'looking for developer', 'hire developer',
            'hire freelancer', 'looking for freelancer', 'need someone to build',
            'who can build', 'want to hire', 'budget', 'pay someone',
            'looking for someone to build', 'need a web developer',
            'need an app built', 'build my app', 'build my mvp',
            'build my idea', 'developer for hire', 'freelancer needed',
            'seeking developer', 'need help building', 'willing to pay',
            'looking for a coder', 'need a programmer',
        ],

        // MEDIUM INTENT (someone has a problem I can solve)
        'medium' => [
            'replacing excel', 'replace spreadsheet', 'manual process',
            'need automation', 'automate my', 'spending too much time',
            'wish there was an app', 'want to build', 'app idea',
            'how much does it cost to build', 'should I hire',
            'need a dashboard', 'need a website', 'need a web app',
            'looking for a tool', 'is there a tool', 'custom software',
            'tired of doing manually', 'no-code limits', 'outgrew no-code',
            'need something more powerful', 'mvp', 'prototype',
            'saas idea', 'chrome extension idea',
        ],

        // LOW INTENT (general signals, might lead somewhere)
        'low' => [
            'side project idea', 'app idea', 'startup idea',
            'would pay for', 'take my money', 'shut up and take',
            'somebody make this', 'i wish', 'why is there no',
            'frustrated with', 'hate doing this manually',
            'business process', 'workflow automation',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Exclude Keywords
    |--------------------------------------------------------------------------
    |
    | Posts matching these keywords are NOT leads (filter out completely).
    |
    */

    'exclude_keywords' => [
        'hiring full-time', 'full time position', 'equity only',
        'unpaid', 'for exposure', 'internship', 'volunteer',
        'looking for cofounder only', 'no budget',
        'just an idea', 'shower thought', 'remote position',
        'full-time role', 'permanent position', 'job posting',
    ],

    /*
    |--------------------------------------------------------------------------
    | High Intent Subreddits
    |--------------------------------------------------------------------------
    |
    | Subreddits with higher base intent scores (added to final score).
    |
    */

    'high_intent_subreddits' => [
        'forhire' => 2.0,           // People literally hiring
        'SomebodyMakeThis' => 1.5,  // People wanting things built
        'startups' => 0.5,
        'Entrepreneur' => 0.5,
        'smallbusiness' => 0.5,
    ],

    /*
    |--------------------------------------------------------------------------
    | Duplicate Detection
    |--------------------------------------------------------------------------
    */

    'duplicate_detection' => [
        'enabled' => true,
        'lookback_days' => 14,
        'similarity_threshold' => 0.8,
    ],

    /*
    |--------------------------------------------------------------------------
    | Production Sync
    |--------------------------------------------------------------------------
    |
    | Settings for syncing discovered leads from local Mac to production.
    |
    */

    'sync' => [
        'production_url' => env('LEAD_FINDER_SYNC_URL'),
        'production_token' => env('LEAD_FINDER_SYNC_TOKEN'),
        'token' => env('LEAD_FINDER_TOKEN'),
        'timeout' => 30,
    ],

    /*
    |--------------------------------------------------------------------------
    | Suggested Approaches
    |--------------------------------------------------------------------------
    |
    | Templates for suggested reply approaches based on lead characteristics.
    |
    */

    'suggested_approaches' => [
        'forhire' => 'Direct hiring post. Reply with your relevant experience and portfolio link.',
        'SomebodyMakeThis' => 'Idea request. Reply helpfully first, explain how you\'d approach it technically.',
        'budget_mentioned' => 'Budget mentioned. This is a serious inquiry - respond promptly.',
        'automation' => 'Process pain point. Lead with time savings and automation angle.',
        'nocode_limits' => 'No-code limitations. Emphasize custom solutions and scalability.',
        'default' => 'Potential lead. Reply with helpful advice first, mention your services naturally.',
    ],
];
