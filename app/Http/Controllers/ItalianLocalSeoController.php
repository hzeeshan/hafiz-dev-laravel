<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class ItalianLocalSeoController extends Controller
{
    /**
     * Cache duration in seconds (1 hour).
     */
    private const CACHE_DURATION = 3600;

    /**
     * Slugs that are handled by custom static pages (not pSEO).
     */
    private const EXCLUDED_SLUGS = [
        'sviluppatore-web-torino',
        'sviluppatore-laravel-italia',
        'automazione-processi-aziendali',
    ];

    /**
     * Display the Italian services index page.
     */
    public function index()
    {
        $data = $this->getData();

        return view('it.servizi', [
            'services' => $data['services'],
            'cities' => $data['cities'],
            'pages' => $data['pages'],
            'pageSlugs' => array_column($data['pages'], 'slug'),
            'shared' => $data['shared_content'],
            'totalPages' => count($data['pages']) + 3, // pSEO pages + 3 custom pages
        ]);
    }

    /**
     * Display an Italian local SEO page.
     */
    public function show(string $slug)
    {
        // Check if this slug is handled by custom static pages
        if (in_array($slug, self::EXCLUDED_SLUGS)) {
            abort(404);
        }

        $data = $this->getData();

        // Find the page configuration
        $page = collect($data['pages'])->firstWhere('slug', $slug);

        if (! $page) {
            abort(404);
        }

        // Get service and city data
        $service = $data['services'][$page['service_key']] ?? null;
        $city = $data['cities'][$page['city_key']] ?? null;

        if (! $service || ! $city) {
            abort(404);
        }

        // Build view data
        $viewData = $this->buildViewData($page, $service, $city, $data['shared_content']);

        return view('it.local-seo', $viewData);
    }

    /**
     * Get the Italian local SEO data from JSON file with caching.
     */
    private function getData(): array
    {
        return Cache::remember('italian_local_seo_data', self::CACHE_DURATION, function () {
            $jsonPath = database_path('data/italian-local-seo.json');
            $content = file_get_contents($jsonPath);

            return json_decode($content, true);
        });
    }

    /**
     * Build the view data array.
     */
    private function buildViewData(array $page, array $service, array $city, array $shared): array
    {
        $cityName = $city['name'];
        $regionName = $city['region'];
        $serviceName = $service['name_it'];

        // Build page title (e.g., "Sviluppatore Web a Milano")
        $pageTitle = "{$serviceName} a {$cityName}";

        // Build meta description
        $metaDescription = str_replace(
            ['{city_name}', '{region_name}'],
            [$cityName, $regionName],
            "{$serviceName} freelance a {$cityName}. {$service['description']} Basato a Torino, disponibile per progetti in {$regionName}. Contattami per un preventivo."
        );

        // Build keywords
        $keywords = $this->buildKeywords($service, $city);

        // Process FAQ with placeholders
        $faq = $this->processFaq($shared['faq'], $serviceName, $cityName, $regionName);

        return [
            'slug' => $page['slug'],
            'pageTitle' => $pageTitle,
            'metaDescription' => $metaDescription,
            'keywords' => $keywords,
            'service' => $service,
            'city' => $city,
            'shared' => $shared,
            'faq' => $faq,
        ];
    }

    /**
     * Build keywords for SEO.
     */
    private function buildKeywords(array $service, array $city): string
    {
        $cityName = strtolower($city['name']);
        $regionName = strtolower($city['region']);
        $servicePrefix = $service['slug_prefix'];

        $keywords = [
            "{$servicePrefix} {$cityName}",
            "{$service['name_it']} {$cityName}",
            "{$servicePrefix} freelance {$cityName}",
            "{$servicePrefix} {$regionName}",
            "programmatore {$cityName}",
            "sviluppatore freelance {$cityName}",
        ];

        return implode(', ', $keywords);
    }

    /**
     * Process FAQ items by replacing placeholders.
     */
    private function processFaq(array $faq, string $serviceName, string $cityName, string $regionName): array
    {
        return array_map(function ($item) use ($serviceName, $cityName, $regionName) {
            return [
                'question' => str_replace(
                    ['{service_name}', '{city_name}', '{region_name}'],
                    [$serviceName, $cityName, $regionName],
                    $item['question']
                ),
                'answer' => str_replace(
                    ['{service_name}', '{city_name}', '{region_name}'],
                    [$serviceName, $cityName, $regionName],
                    $item['answer']
                ),
            ];
        }, $faq);
    }

    /**
     * Get all page slugs for sitemap generation.
     */
    public static function getAllSlugs(): array
    {
        $jsonPath = database_path('data/italian-local-seo.json');
        $content = file_get_contents($jsonPath);
        $data = json_decode($content, true);

        return array_column($data['pages'], 'slug');
    }
}
