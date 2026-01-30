<?php

namespace App\Console\Commands;

use App\Services\IndexNowService;
use Illuminate\Console\Command;

class IndexNowSubmit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'indexnow:submit
                            {--all : Submit ALL pages (blog, tools, errors, Italian pSEO)}
                            {--blog : Submit all published blog posts}
                            {--tools : Submit all tool pages}
                            {--errors : Submit all error solution pages}
                            {--italian : Submit all Italian local SEO pages}
                            {--url= : Submit a specific URL}
                            {--post= : Submit a specific post by ID or slug}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Submit URLs to search engines via IndexNow';

    /**
     * Execute the console command.
     */
    public function handle(IndexNowService $indexNowService): int
    {
        if (!$indexNowService->isEnabled()) {
            $this->error('IndexNow is not enabled. Please set INDEXNOW_API_KEY in your .env file.');
            return Command::FAILURE;
        }

        // Submit ALL pages (blog, tools, errors, Italian)
        if ($this->option('all')) {
            $this->info('Submitting ALL pages to search engines...');
            $this->newLine();

            $results = $indexNowService->submitAllPages();

            $this->table(
                ['Page Type', 'URLs Submitted', 'Status'],
                [
                    ['Homepage', '1', $results['homepage'] ? '✅ Success' : '❌ Failed'],
                    ['Blog Posts', $results['results']['blog']['count'] ?? 0, ($results['results']['blog']['success'] ?? false) ? '✅ Success' : '⚠️ None/Failed'],
                    ['Tools', $results['results']['tools']['count'] ?? 0, ($results['results']['tools']['success'] ?? false) ? '✅ Success' : '⚠️ None/Failed'],
                    ['Error Solutions', $results['results']['errors']['count'] ?? 0, ($results['results']['errors']['success'] ?? false) ? '✅ Success' : '⚠️ None/Failed'],
                    ['Italian pSEO', $results['results']['italian']['count'] ?? 0, ($results['results']['italian']['success'] ?? false) ? '✅ Success' : '⚠️ None/Failed'],
                ]
            );

            $this->newLine();
            $this->info("Total URLs submitted: {$results['total_urls']}");

            return Command::SUCCESS;
        }

        // Submit all blog posts
        if ($this->option('blog')) {
            $this->info('Submitting all published blog posts...');

            $result = $indexNowService->submitAllPublishedPosts();

            if ($result['success']) {
                $this->info("✅ {$result['count']} blog posts submitted successfully!");
            } else {
                $this->warn('No posts to submit or submission failed.');
            }

            return Command::SUCCESS;
        }

        // Submit all tools
        if ($this->option('tools')) {
            $this->info('Submitting all tool pages...');

            $result = $indexNowService->submitAllToolPages();

            if ($result['success']) {
                $this->info("✅ {$result['count']} tool pages submitted successfully!");
            } else {
                $this->warn('No tools to submit or submission failed.');
            }

            return Command::SUCCESS;
        }

        // Submit all error pages
        if ($this->option('errors')) {
            $this->info('Submitting all error solution pages...');

            $result = $indexNowService->submitAllErrorPages();

            if ($result['success']) {
                $this->info("✅ {$result['count']} error pages submitted successfully!");
            } else {
                $this->warn('No error pages to submit or submission failed.');
            }

            return Command::SUCCESS;
        }

        // Submit all Italian pages
        if ($this->option('italian')) {
            $this->info('Submitting all Italian local SEO pages...');

            $result = $indexNowService->submitAllItalianPages();

            if ($result['success']) {
                $this->info("✅ {$result['count']} Italian pages submitted successfully!");
            } else {
                $this->warn('No Italian pages to submit or submission failed.');
            }

            return Command::SUCCESS;
        }

        // Submit a specific URL
        if ($url = $this->option('url')) {
            $this->info("Submitting URL: {$url}");

            $result = $indexNowService->submitUrl($url);

            if ($result) {
                $this->info('✅ URL submitted successfully!');
            } else {
                $this->error('Failed to submit URL.');
                return Command::FAILURE;
            }

            return Command::SUCCESS;
        }

        // Submit a specific post
        if ($identifier = $this->option('post')) {
            $post = \App\Models\Post::where('id', $identifier)
                ->orWhere('slug', $identifier)
                ->first();

            if (!$post) {
                $this->error("Post not found: {$identifier}");
                return Command::FAILURE;
            }

            $this->info("Submitting post: {$post->title}");

            $result = $indexNowService->submitPost($post);

            if ($result) {
                $this->info('✅ Post submitted successfully!');
            } else {
                $this->error('Failed to submit post.');
                return Command::FAILURE;
            }

            return Command::SUCCESS;
        }

        // No options provided - show help
        $this->info('IndexNow URL Submission Tool');
        $this->newLine();
        $this->line('Submit ALL pages (recommended for initial setup):');
        $this->line('  <fg=green>php artisan indexnow:submit --all</>');
        $this->newLine();
        $this->line('Submit by page type:');
        $this->line('  php artisan indexnow:submit --blog      Submit all blog posts');
        $this->line('  php artisan indexnow:submit --tools     Submit all tool pages');
        $this->line('  php artisan indexnow:submit --errors    Submit all error solution pages');
        $this->line('  php artisan indexnow:submit --italian   Submit all Italian pSEO pages');
        $this->newLine();
        $this->line('Submit specific content:');
        $this->line('  php artisan indexnow:submit --url=<url>       Submit a specific URL');
        $this->line('  php artisan indexnow:submit --post=<id|slug>  Submit a specific post');
        $this->newLine();
        $this->line('Check IndexNow status:');
        $this->line('  php artisan indexnow:status');
        $this->line('  php artisan indexnow:logs');

        return Command::SUCCESS;
    }
}
