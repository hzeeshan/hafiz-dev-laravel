<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Tool;
use App\Observers\PostObserver;
use App\Observers\ToolObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register observers for automatic IndexNow notifications
        Post::observe(PostObserver::class);
        Tool::observe(ToolObserver::class);
    }
}
