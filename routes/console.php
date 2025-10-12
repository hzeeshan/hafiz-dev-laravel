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
