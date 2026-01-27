<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class ErrorSolutionController extends Controller
{
    /**
     * Cache duration in seconds (1 hour)
     */
    private const CACHE_DURATION = 3600;

    /**
     * Display all errors grouped by category.
     */
    public function index()
    {
        $data = $this->getErrorsData();
        $errors = collect($data['errors']);

        // Group by category and sort
        $groupedErrors = $errors->groupBy('category')->sortKeys();

        // Get category info
        $categories = $data['meta']['categories'];

        return view('errors-solutions.index', [
            'groupedErrors' => $groupedErrors,
            'categories' => $categories,
            'totalErrors' => count($data['errors']),
        ]);
    }

    /**
     * Display a single error solution page.
     */
    public function show(string $slug)
    {
        $data = $this->getErrorsData();
        $errors = collect($data['errors']);

        // Find the error by slug
        $error = $errors->firstWhere('slug', $slug);

        if (! $error) {
            abort(404);
        }

        // Get related errors
        $relatedErrors = $this->getRelatedErrors($error, $errors);

        return view('errors-solutions.show', [
            'error' => $error,
            'relatedErrors' => $relatedErrors,
        ]);
    }

    /**
     * Get the errors data from JSON file with caching.
     */
    private function getErrorsData(): array
    {
        return Cache::remember('laravel_errors_data', self::CACHE_DURATION, function () {
            $jsonPath = base_path('docs/data/laravel-errors.json');
            $content = file_get_contents($jsonPath);

            return json_decode($content, true);
        });
    }

    /**
     * Get related errors based on related_errors field and same category.
     */
    private function getRelatedErrors(array $error, \Illuminate\Support\Collection $errors): array
    {
        $relatedSlugs = $error['related_errors'] ?? [];
        $related = collect();

        // First, add errors from related_errors array
        foreach ($relatedSlugs as $slug) {
            $relatedError = $errors->firstWhere('slug', $slug);
            if ($relatedError && $relatedError['slug'] !== $error['slug']) {
                $related->push($relatedError);
            }
        }

        // If we have less than 3, add more from the same category
        if ($related->count() < 3) {
            $sameCategoryErrors = $errors
                ->where('category', $error['category'])
                ->whereNotIn('slug', array_merge([$error['slug']], $related->pluck('slug')->toArray()))
                ->take(3 - $related->count());

            $related = $related->merge($sameCategoryErrors);
        }

        return $related->take(3)->values()->toArray();
    }
}
