<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.xml file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap...');

        $sitemap = Sitemap::create();

        // Homepage - highest priority
        $sitemap->add(
            Url::create('/')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(1.0)
        );

        // Blog index page
        $sitemap->add(
            Url::create('/blog')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.9)
        );

        // Tools index page
        $sitemap->add(
            Url::create('/tools')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8)
        );

        // Italian SEO landing pages
        $italianPages = [
            '/it/sviluppatore-web-torino',
            '/it/sviluppatore-laravel-italia',
            '/it/automazione-processi-aziendali',
        ];

        foreach ($italianPages as $page) {
            $sitemap->add(
                Url::create($page)
                    ->setLastModificationDate(now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.8)
            );
        }

        // Auto-discover tool pages from routes (excludes /tools index)
        $toolRoutes = collect(Route::getRoutes())
            ->filter(fn ($route) => str_starts_with($route->uri(), 'tools/'))
            ->map(fn ($route) => '/' . $route->uri())
            ->values();

        foreach ($toolRoutes as $tool) {
            $sitemap->add(
                Url::create($tool)
                    ->setLastModificationDate(now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.7)
            );
        }

        // Published blog posts
        Post::published()
            ->orderBy('updated_at', 'desc')
            ->get()
            ->each(function (Post $post) use ($sitemap) {
                $sitemap->add(
                    Url::create("/blog/{$post->slug}")
                        ->setLastModificationDate($post->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.8)
                );
            });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $postCount = Post::published()->count();
        $toolCount = $toolRoutes->count();
        $italianCount = count($italianPages);
        $this->info("✓ Sitemap generated successfully!");
        $this->info("  - Homepage: 1");
        $this->info("  - Blog index: 1");
        $this->info("  - Tools index: 1");
        $this->info("  - Tool pages: {$toolCount}");
        $this->info("  - Italian pages: {$italianCount}");
        $this->info("  - Blog posts: {$postCount}");
        $this->info("  - Total URLs: " . (3 + $toolCount + $italianCount + $postCount));
        $this->info("  - File: public/sitemap.xml");
    }
}
