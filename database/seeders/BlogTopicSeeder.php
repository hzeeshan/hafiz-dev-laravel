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
            // TECHNICAL POSTS (with code examples)
            [
                'title' => 'Building a Multi-Tenant SaaS Application in Laravel 11',
                'slug' => 'building-multi-tenant-saas-laravel-11',
                'category' => 'Laravel',
                'keywords' => 'laravel, saas, multi-tenancy, database design, architecture',
                'description' => 'Complete guide to implementing multi-tenant architecture in Laravel, including database strategies, tenant isolation, and best practices.',
                'target_audience' => 'Intermediate Laravel Developers',
                'content_type' => 'technical',
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
                'target_audience' => 'Senior Laravel Developers',
                'content_type' => 'technical',
                'priority' => 9,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
            [
                'title' => 'Building Real-Time Chat with Laravel Reverb and Vue.js',
                'slug' => 'laravel-reverb-real-time-chat',
                'category' => 'Laravel',
                'keywords' => 'laravel, reverb, websockets, real-time, vue.js, broadcasting',
                'description' => 'Step-by-step tutorial: Build a production-ready real-time chat application using Laravel Reverb WebSocket server and Vue.js.',
                'target_audience' => 'Full-Stack Developers',
                'content_type' => 'technical',
                'priority' => 8,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],

            // OPINION POSTS (personal insights, no code required)
            [
                'title' => 'Claude Sonnet 4.5 Is Absolutely Insane for Developers',
                'slug' => 'claude-sonnet-45-insane-for-developers',
                'category' => 'AI Tools',
                'keywords' => 'claude, ai, sonnet 4.5, coding assistant, productivity, developer tools',
                'description' => 'After testing Claude Sonnet 4.5 for a week, I\'m convinced it\'s the best AI coding assistant available. Here\'s why every developer should try it.',
                'target_audience' => 'Developers and Tech Enthusiasts',
                'content_type' => 'opinion',
                'priority' => 9,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
            [
                'title' => 'I\'ll Instantly Know You Used ChatGPT If I See This in Your Code',
                'slug' => 'chatgpt-code-red-flags',
                'category' => 'Opinion',
                'keywords' => 'chatgpt, ai, code review, software development, best practices',
                'description' => 'After reviewing 200+ AI-generated pull requests, I can spot ChatGPT code instantly. Here are the telltale signs and how to use AI more effectively.',
                'target_audience' => 'Software Developers',
                'content_type' => 'opinion',
                'priority' => 10,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
            [
                'title' => 'Stop Overengineering: Apply YAGNI to Build What Matters',
                'slug' => 'stop-overengineering-yagni',
                'category' => 'Software Development',
                'keywords' => 'yagni, overengineering, software development, best practices, productivity',
                'description' => 'I spent 3 years overengineering everything. Here\'s what I learned about building features you actually need instead of "might need someday".',
                'target_audience' => 'Developers and Product Managers',
                'content_type' => 'opinion',
                'priority' => 8,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
            [
                'title' => 'I\'m a Middle-Aged Developer, and My Time to Shine Is Setting',
                'slug' => 'middle-aged-developer-career-thoughts',
                'category' => 'Career',
                'keywords' => 'career, software development, age, experience, industry trends',
                'description' => 'Reflections on being a 40+ developer in a youth-obsessed industry, and why experience still matters more than ever.',
                'target_audience' => 'Experienced Developers',
                'content_type' => 'opinion',
                'priority' => 7,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],

            // NEWS/UPDATE POSTS (announcements, tool reviews)
            [
                'title' => 'NotebookLM Just Got a Serious Upgrade: Exploring the Newest Features',
                'slug' => 'notebooklm-upgrade-new-features',
                'category' => 'AI Tools',
                'keywords' => 'notebooklm, google, ai, productivity, note-taking, updates',
                'description' => 'Google\'s NotebookLM received major updates this week. Let\'s explore the new features and how they change the AI note-taking game.',
                'target_audience' => 'Tech Enthusiasts and Productivity Nerds',
                'content_type' => 'news',
                'priority' => 8,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
            [
                'title' => 'Docker\'s Gone — Here\'s Why It\'s Time to Move On',
                'slug' => 'docker-alternatives-2025',
                'category' => 'DevOps',
                'keywords' => 'docker, containers, podman, kubernetes, devops, alternatives',
                'description' => 'Docker Desktop changes and licensing issues have pushed many developers to alternatives. Here\'s what you should consider switching to.',
                'target_audience' => 'DevOps Engineers and Developers',
                'content_type' => 'news',
                'priority' => 9,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],

            // TECHNICAL (additional)
            [
                'title' => 'Filament v4: Building Beautiful Admin Panels in Minutes',
                'slug' => 'filament-v4-admin-panels',
                'category' => 'Laravel',
                'keywords' => 'filament, laravel, admin panel, crud, forms, tables',
                'description' => 'Deep dive into Filament v4 features, showing how to create professional admin interfaces with minimal code.',
                'target_audience' => 'Laravel Developers',
                'content_type' => 'technical',
                'priority' => 7,
                'generation_mode' => 'topic',
                'status' => 'pending',
            ],
        ];

        foreach ($topics as $topicData) {
            BlogTopic::create($topicData);
        }

        $this->command->info('✅ Created ' . count($topics) . ' blog topics (Technical, Opinion, News)');
    }
}
