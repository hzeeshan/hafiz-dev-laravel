<?php

namespace App\Filament\Widgets;

use App\Models\BlogGenerationLog;
use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class ThisWeeksStatsWidget extends BaseWidget
{
    protected static ?int $sort = 3;

    protected function getStats(): array
    {
        $weekStart = now()->startOfWeek();
        $weekEnd = now()->endOfWeek();

        // Posts published this week
        $publishedThisWeek = Post::query()
            ->where('status', 'published')
            ->whereBetween('published_at', [$weekStart, $weekEnd])
            ->count();

        // Total views this week
        $viewsThisWeek = Post::query()
            ->where('status', 'published')
            ->whereBetween('published_at', [$weekStart, $weekEnd])
            ->sum('views');

        // Posts awaiting review
        $postsInReview = Post::query()
            ->where('status', 'review')
            ->count();

        // Cost spent this week
        $costThisWeek = BlogGenerationLog::query()
            ->whereBetween('created_at', [$weekStart, $weekEnd])
            ->where('status', 'completed')
            ->get()
            ->sum(fn($log) => $log->getTotalCost());

        // Get trend data (compare with last week)
        $lastWeekStart = now()->subWeek()->startOfWeek();
        $lastWeekEnd = now()->subWeek()->endOfWeek();

        $publishedLastWeek = Post::query()
            ->where('status', 'published')
            ->whereBetween('published_at', [$lastWeekStart, $lastWeekEnd])
            ->count();

        $viewsLastWeek = Post::query()
            ->where('status', 'published')
            ->whereBetween('published_at', [$lastWeekStart, $lastWeekEnd])
            ->sum('views');

        // Calculate trends
        $publishedTrend = $publishedLastWeek > 0
            ? (($publishedThisWeek - $publishedLastWeek) / $publishedLastWeek) * 100
            : 0;

        $viewsTrend = $viewsLastWeek > 0
            ? (($viewsThisWeek - $viewsLastWeek) / $viewsLastWeek) * 100
            : 0;

        return [
            Stat::make('Posts Published This Week', $publishedThisWeek)
                ->description($this->getTrendDescription($publishedTrend, 'from last week'))
                ->descriptionIcon($publishedTrend >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($publishedTrend >= 0 ? 'success' : 'danger')
                ->chart($this->getPublishedChart())
                ->icon('heroicon-o-newspaper'),

            Stat::make('Total Views This Week', number_format($viewsThisWeek))
                ->description($this->getTrendDescription($viewsTrend, 'from last week'))
                ->descriptionIcon($viewsTrend >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($viewsTrend >= 0 ? 'success' : 'danger')
                ->icon('heroicon-o-eye'),

            Stat::make('Posts In Review', $postsInReview)
                ->description($postsInReview > 0 ? 'Awaiting approval' : 'All caught up!')
                ->descriptionIcon($postsInReview > 0 ? 'heroicon-m-clock' : 'heroicon-m-check-circle')
                ->color($postsInReview > 0 ? 'warning' : 'success')
                ->url(route('filament.admin.resources.posts.index', ['tableFilters' => ['status' => ['value' => 'review']]]))
                ->icon('heroicon-o-document-magnifying-glass'),

            Stat::make('AI Cost This Week', '$' . number_format($costThisWeek, 4))
                ->description('Content + Images')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('info')
                ->icon('heroicon-o-sparkles'),
        ];
    }

    /**
     * Get trend description text
     */
    protected function getTrendDescription(float $trend, string $suffix = ''): string
    {
        if ($trend == 0) {
            return "No change {$suffix}";
        }

        $direction = $trend > 0 ? 'increase' : 'decrease';
        $percentage = abs(round($trend, 1));

        return "{$percentage}% {$direction} {$suffix}";
    }

    /**
     * Get published posts chart data for last 7 days
     */
    protected function getPublishedChart(): array
    {
        $data = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->startOfDay();
            $count = Post::query()
                ->where('status', 'published')
                ->whereDate('published_at', $date)
                ->count();

            $data[] = $count;
        }

        return $data;
    }
}
