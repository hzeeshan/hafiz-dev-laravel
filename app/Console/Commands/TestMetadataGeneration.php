<?php

namespace App\Console\Commands;

use App\Models\BlogTopic;
use App\Services\BlogContentGenerator;
use Illuminate\Console\Command;

class TestMetadataGeneration extends Command
{
    protected $signature = 'blog:test-metadata';
    protected $description = 'Test metadata generation (excerpt, SEO title, SEO description)';

    public function handle(BlogContentGenerator $generator): int
    {
        $this->info('Testing metadata generation...');
        $this->newLine();

        // Sample markdown content with all edge cases
        $markdownContent = "## The Problem: Scaling Without Chaos

Imagine launching a SaaS product that gains traction—100 customers sign up in the first month. Your single-tenant architecture now faces a nightmare:

- **Data leaks**: Customer A sees Customer B's invoices.
- **Performance issues**: One query scans millions of rows across all tenants.
- **Operational complexity**: Backups, migrations, and scaling become high-risk.

This is where **multi-tenancy** saves the day.

```php
public function boot()
{
    return 'Laravel';
}
```

I've built multiple SaaS products using Laravel, and here's what works.";

        // Create a test topic with a very long title
        $topic = new BlogTopic();
        $topic->title = 'Building a Multi-Tenant SaaS Application in Laravel 11 with Advanced Features and Enterprise-Grade Security';

        // Use reflection to test the protected method
        $reflection = new \ReflectionClass($generator);
        $method = $reflection->getMethod('generateMetadata');
        $method->setAccessible(true);

        $result = $method->invoke($generator, $topic->title, $markdownContent, $topic);

        // Display results
        $this->line('📝 <fg=yellow>Excerpt (' . mb_strlen($result['excerpt']) . ' chars):</>');
        $this->line($result['excerpt']);
        $this->newLine();

        $this->line('🎯 <fg=yellow>SEO Title (' . mb_strlen($result['seo_title']) . ' chars):</>');
        $this->line($result['seo_title']);
        $this->newLine();

        $this->line('📄 <fg=yellow>SEO Description (' . mb_strlen($result['seo_description']) . ' chars):</>');
        $this->line($result['seo_description']);
        $this->newLine();

        // Validation checks
        $this->line('<fg=cyan>Validation Checks:</>');

        $checks = [
            'No ## in excerpt' => !str_contains($result['excerpt'], '##'),
            'No ** in excerpt' => !str_contains($result['excerpt'], '**'),
            'No ``` in excerpt' => !str_contains($result['excerpt'], '```'),
            'No code in excerpt' => !str_contains($result['excerpt'], 'public function'),
            'SEO Title <= 60 chars' => mb_strlen($result['seo_title']) <= 60,
            'SEO Description <= 160 chars' => mb_strlen($result['seo_description']) <= 160,
        ];

        foreach ($checks as $check => $passed) {
            $icon = $passed ? '✅' : '❌';
            $color = $passed ? 'green' : 'red';
            $this->line("  {$icon} <fg={$color}>{$check}</>");
        }

        $allPassed = !in_array(false, $checks, true);

        $this->newLine();
        if ($allPassed) {
            $this->info('🎉 All checks passed!');
            return self::SUCCESS;
        } else {
            $this->error('❌ Some checks failed!');
            return self::FAILURE;
        }
    }
}
