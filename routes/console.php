<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

/**
 * SEO Scheduled Tasks
 * Cron runs: * * * * * cd /var/www/hafiz.dev && php artisan schedule:run
 */
Schedule::command('sitemap:generate')
    ->dailyAt('03:00')
    ->onSuccess(fn () => logger('Sitemap regenerated successfully'))
    ->onFailure(fn () => logger('Sitemap generation failed'));

/**
 * Blog Topic Discovery
 * DISABLED: Reddit API blocked on VPS. Discovery now runs from local Mac
 * via crontab and syncs to production via API endpoint.
 * See: docs/blog/TOPIC_DISCOVERY.md
 */
// Schedule::command('blog:discover-trending --auto-create --notify')
//     ->weeklyOn(1, '09:00')
//     ->onSuccess(fn () => logger('Topic discovery completed successfully'))
//     ->onFailure(fn () => logger('Topic discovery failed'));
