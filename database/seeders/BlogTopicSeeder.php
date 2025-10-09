<?php

namespace Database\Seeders;

use App\Models\BlogTopic;
use Illuminate\Database\Seeder;

class BlogTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            [
                'title' => 'Building a Multi-Tenant SaaS Application in Laravel 11',
                'slug' => 'building-multi-tenant-saas-laravel-11',
                'category' => 'Laravel',
                'keywords' => 'laravel, saas, multi-tenancy, database design, architecture',
                'description' => 'Complete guide to implementing multi-tenant architecture in Laravel, including database strategies, tenant isolation, and best practices.',
                'target_audience' => 'Entrepreneurs',
                'priority' => 10,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
            [
                'title' => 'Laravel Queue Best Practices for High-Performance Applications',
                'slug' => 'laravel-queue-best-practices',
                'category' => 'Laravel',
                'keywords' => 'laravel, queues, redis, performance, background jobs',
                'description' => 'Learn how to optimize Laravel queues for handling thousands of jobs efficiently, including Redis configuration and monitoring.',
                'target_audience' => 'Intermediate Laravel Developers',
                'priority' => 9,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
            [
                'title' => 'Automating Chrome Extensions with Laravel: A Complete Integration Guide',
                'slug' => 'automating-chrome-extensions-laravel',
                'category' => 'Automation',
                'keywords' => 'chrome extension, laravel, api, automation, javascript',
                'description' => 'How to build a Laravel backend that powers a Chrome extension, including authentication, data sync, and real-time updates.',
                'target_audience' => 'Full-Stack Developers',
                'priority' => 8,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
            [
                'title' => 'Building AI-Powered Features in Laravel with OpenAI and Anthropic',
                'slug' => 'ai-powered-features-laravel-openai-anthropic',
                'category' => 'AI Integration',
                'keywords' => 'laravel, ai, openai, anthropic, gpt, claude, api integration',
                'description' => 'Practical guide to integrating AI capabilities into your Laravel applications, including content generation and data analysis.',
                'target_audience' => 'SaaS Founders',
                'priority' => 9,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
            [
                'title' => 'Filament v4: Building Beautiful Admin Panels in Minutes',
                'slug' => 'filament-v4-admin-panels',
                'category' => 'Laravel',
                'keywords' => 'filament, laravel, admin panel, crud, forms, tables',
                'description' => 'Deep dive into Filament v4 features, showing how to create professional admin interfaces with minimal code.',
                'target_audience' => 'Laravel Developers',
                'priority' => 7,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
            [
                'title' => 'Laravel Reverb: Real-Time Features Made Simple',
                'slug' => 'laravel-reverb-real-time-features',
                'category' => 'Laravel',
                'keywords' => 'laravel, reverb, websockets, real-time, broadcasting',
                'description' => 'Building real-time chat, notifications, and live updates using Laravel Reverb, the official WebSocket server.',
                'target_audience' => 'Intermediate Laravel Developers',
                'priority' => 8,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
            [
                'title' => 'Docker Compose for Laravel: Production-Ready Setup in 2025',
                'slug' => 'docker-compose-laravel-production',
                'category' => 'DevOps',
                'keywords' => 'docker, laravel, docker-compose, deployment, nginx, mysql',
                'description' => 'Create a production-ready Docker environment for Laravel with Nginx, MySQL, Redis, and queue workers.',
                'target_audience' => 'DevOps Engineers',
                'priority' => 6,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
            [
                'title' => 'Building a Profitable SaaS: Lessons from $10K to $50K MRR',
                'slug' => 'building-profitable-saas-lessons',
                'category' => 'SaaS',
                'keywords' => 'saas, business, revenue, growth, marketing, product development',
                'description' => 'Key lessons learned while scaling a Laravel-based SaaS from initial launch to $50K monthly recurring revenue.',
                'target_audience' => 'Entrepreneurs',
                'priority' => 8,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
            [
                'title' => 'Laravel Testing: From Zero to 100% Coverage',
                'slug' => 'laravel-testing-complete-guide',
                'category' => 'Testing',
                'keywords' => 'laravel, testing, phpunit, pest, tdd, feature tests, unit tests',
                'description' => 'Comprehensive testing strategy for Laravel applications using Pest, including feature tests, unit tests, and database testing.',
                'target_audience' => 'Intermediate Laravel Developers',
                'priority' => 7,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
            [
                'title' => 'Optimizing Laravel Performance: From 200ms to 20ms Response Times',
                'slug' => 'optimizing-laravel-performance',
                'category' => 'Performance',
                'keywords' => 'laravel, performance, optimization, caching, database, queries',
                'description' => 'Proven techniques for optimizing Laravel applications, including database indexing, query optimization, and caching strategies.',
                'target_audience' => 'Senior Laravel Developers',
                'priority' => 9,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
        ];

        foreach ($topics as $topicData) {
            BlogTopic::create($topicData);
        }

        $this->command->info('✅ Created 10 blog topics for testing');
    }
}
