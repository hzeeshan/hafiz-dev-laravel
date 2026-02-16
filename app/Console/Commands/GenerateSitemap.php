<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Tool;
use App\Models\ToolTranslation;
use Illuminate\Console\Command;
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

        // Laravel Error Solutions pages (pSEO)
        $errorsData = $this->getErrorsData();
        $errorCount = 0;

        // Errors index page
        $sitemap->add(
            Url::create('/errors')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8)
        );

        // Individual error pages
        foreach ($errorsData['errors'] as $error) {
            $sitemap->add(
                Url::create('/errors/' . $error['slug'])
                    ->setLastModificationDate(now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.7)
            );
            $errorCount++;
        }

        // Homepage - highest priority
        $sitemap->add(
            Url::create('/')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(1.0)
        );

        // About page
        $sitemap->add(
            Url::create('/about')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.8)
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

        // Italian homepage
        $sitemap->add(
            Url::create('/it')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.9)
        );

        // Italian services index page
        $sitemap->add(
            Url::create('/it/servizi')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8)
        );

        // Italian SEO landing pages (static custom pages)
        $italianStaticPages = [
            '/it/sviluppatore-web-torino',
            '/it/sviluppatore-laravel-italia',
            '/it/automazione-processi-aziendali',
        ];

        foreach ($italianStaticPages as $page) {
            $sitemap->add(
                Url::create($page)
                    ->setLastModificationDate(now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.8)
            );
        }

        // Italian Local SEO pSEO pages (from JSON data)
        $italianPseoSlugs = $this->getItalianLocalSeoSlugs();
        $italianPseoCount = 0;

        foreach ($italianPseoSlugs as $slug) {
            $sitemap->add(
                Url::create('/it/' . $slug)
                    ->setLastModificationDate(now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.7)
            );
            $italianPseoCount++;
        }

        // Tool pages from database (active tools only)
        $tools = Tool::where('is_active', true)->get();
        $toolCount = 0;

        foreach ($tools as $tool) {
            $sitemap->add(
                Url::create('/tools/' . $tool->slug)
                    ->setLastModificationDate($tool->updated_at ?? now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.7)
            );
            $toolCount++;
        }

        // Italian tools index page
        $italianToolTranslations = ToolTranslation::where('locale', 'it')
            ->where('is_active', true)
            ->whereHas('tool', fn ($q) => $q->where('is_active', true))
            ->with('tool')
            ->get();
        $italianToolCount = 0;

        if ($italianToolTranslations->isNotEmpty()) {
            $sitemap->add(
                Url::create('/it/strumenti')
                    ->setLastModificationDate(now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8)
            );

            foreach ($italianToolTranslations as $translation) {
                $sitemap->add(
                    Url::create('/it/strumenti/' . $translation->slug)
                        ->setLastModificationDate($translation->tool->updated_at ?? now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setPriority(0.7)
                );
                $italianToolCount++;
            }
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
        $italianStaticCount = count($italianStaticPages);
        $italianToolsIndexCount = $italianToolCount > 0 ? 1 : 0;
        $this->info("✓ Sitemap generated successfully!");
        $this->info("  - Homepage: 1");
        $this->info("  - Blog index: 1");
        $this->info("  - Tools index: 1");
        $this->info("  - Tool pages: {$toolCount}");
        $this->info("  - Italian tools index: {$italianToolsIndexCount}");
        $this->info("  - Italian tool pages: {$italianToolCount}");
        $this->info("  - Italian homepage: 1");
        $this->info("  - Italian services index: 1");
        $this->info("  - Italian static pages: {$italianStaticCount}");
        $this->info("  - Italian pSEO pages: {$italianPseoCount}");
        $this->info("  - Blog posts: {$postCount}");
        $this->info("  - Errors index: 1");
        $this->info("  - Error pages: {$errorCount}");
        $this->info("  - Total URLs: " . (6 + $toolCount + $italianToolsIndexCount + $italianToolCount + $italianStaticCount + $italianPseoCount + $postCount + $errorCount));
        $this->info("  - File: public/sitemap.xml");
    }

    /**
     * Get the errors data from JSON file.
     */
    private function getErrorsData(): array
    {
        $jsonPath = database_path('data/laravel-errors.json');
        $content = file_get_contents($jsonPath);

        return json_decode($content, true);
    }

    /**
     * Get all Italian local SEO page slugs from JSON file.
     */
    private function getItalianLocalSeoSlugs(): array
    {
        $jsonPath = database_path('data/italian-local-seo.json');

        if (! file_exists($jsonPath)) {
            return [];
        }

        $content = file_get_contents($jsonPath);
        $data = json_decode($content, true);

        return array_column($data['pages'] ?? [], 'slug');
    }
}
