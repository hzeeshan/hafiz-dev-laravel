<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ThisWeeksStatsWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // Posts published in last 7 days
        $publishedLast7Days = Post::query()
            ->where('status', 'published')
            ->where('published_at', '>=', now()->subDays(7))
            ->count();

        // Total views in last 7 days
        $viewsLast7Days = Post::query()
            ->where('status', 'published')
            ->where('published_at', '>=', now()->subDays(7))
            ->sum('views');

        // Posts awaiting review
        $postsInReview = Post::query()
            ->where('status', 'review')
            ->count();

        // Get trend data (compare with previous 7 days)
        $publishedPrevious7Days = Post::query()
            ->where('status', 'published')
            ->whereBetween('published_at', [now()->subDays(14), now()->subDays(7)])
            ->count();

        $viewsPrevious7Days = Post::query()
            ->where('status', 'published')
            ->whereBetween('published_at', [now()->subDays(14), now()->subDays(7)])
            ->sum('views');

        // Calculate trends
        $publishedTrend = $publishedPrevious7Days > 0
            ? (($publishedLast7Days - $publishedPrevious7Days) / $publishedPrevious7Days) * 100
            : 0;

        $viewsTrend = $viewsPrevious7Days > 0
            ? (($viewsLast7Days - $viewsPrevious7Days) / $viewsPrevious7Days) * 100
            : 0;

        return [
            Stat::make('Posts Published (Last 7 Days)', $publishedLast7Days)
                ->description($this->getTrendDescription($publishedTrend, 'vs previous 7 days'))
                ->descriptionIcon($publishedTrend >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($publishedTrend >= 0 ? 'success' : 'danger')
                ->chart($this->getPublishedChart())
                ->icon('heroicon-o-newspaper'),

            Stat::make('Total Views (Last 7 Days)', number_format($viewsLast7Days))
                ->description($this->getTrendDescription($viewsTrend, 'vs previous 7 days'))
                ->descriptionIcon($viewsTrend >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($viewsTrend >= 0 ? 'success' : 'danger')
                ->icon('heroicon-o-eye'),

            Stat::make('Posts In Review', $postsInReview)
                ->description($postsInReview > 0 ? 'Awaiting approval' : 'All caught up!')
                ->descriptionIcon($postsInReview > 0 ? 'heroicon-m-clock' : 'heroicon-m-check-circle')
                ->color($postsInReview > 0 ? 'warning' : 'success')
                ->url(route('filament.admin.resources.posts.index', ['tableFilters' => ['status' => ['value' => 'review']]]))
                ->icon('heroicon-o-document-magnifying-glass'),
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
