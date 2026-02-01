<?php

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(
            at: '*',
            headers: Request::HEADER_X_FORWARDED_FOR |
                Request::HEADER_X_FORWARDED_HOST |
                Request::HEADER_X_FORWARDED_PORT |
                Request::HEADER_X_FORWARDED_PROTO |
                Request::HEADER_X_FORWARDED_AWS_ELB
        );

        // Register custom middleware aliases
        $middleware->alias([
            'sync.token' => \App\Http\Middleware\ValidateSyncToken::class,
        ]);
    })
    ->withSchedule(function (Schedule $schedule): void {
        // Check for scheduled blog topics
        // Production: hourly (resource-efficient)
        // Local: every minute (faster testing)
        $scheduleTask = $schedule->call(function () {
            $topics = \App\Models\BlogTopic::where('status', 'pending')
                ->whereNotNull('scheduled_for')
                ->where('scheduled_for', '<=', now())
                ->get();

            foreach ($topics as $topic) {
                \App\Jobs\GenerateBlogPostJob::dispatch($topic);
                $topic->update(['scheduled_for' => null]);
            }
        });

        // Run hourly in production, every minute in local
        if (app()->environment('production')) {
            $scheduleTask->hourly();
        } else {
            $scheduleTask->everyMinute();
        }

        $scheduleTask->name('process-scheduled-blog-topics');
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
