<?php

namespace App\Filament\Resources\ToolViews\Pages;

use App\Models\ToolView;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ToolViewStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $todayViews = ToolView::getTodayAllToolsViews();
        $last7Days = ToolView::where('date', '>=', now()->subDays(7)->toDateString())->sum('views');
        $last30Days = ToolView::where('date', '>=', now()->subDays(30)->toDateString())->sum('views');
        $totalViews = ToolView::getTotalAllToolsViews();

        // Get top tool
        $topTool = ToolView::selectRaw('tool_slug, SUM(views) as total_views')
            ->groupBy('tool_slug')
            ->orderByDesc('total_views')
            ->first();

        $topToolName = $topTool ? (ToolView::$tools[$topTool->tool_slug] ?? $topTool->tool_slug) : 'N/A';

        return [
            Stat::make('Today', number_format($todayViews))
                ->description('Views today')
                ->color('success'),

            Stat::make('Last 7 Days', number_format($last7Days))
                ->description('Weekly views')
                ->color('info'),

            Stat::make('Last 30 Days', number_format($last30Days))
                ->description('Monthly views')
                ->color('warning'),

            Stat::make('All Time', number_format($totalViews))
                ->description('Total views')
                ->color('primary'),

            Stat::make('Top Tool', $topToolName)
                ->description($topTool ? number_format($topTool->total_views) . ' views' : '')
                ->color('success'),
        ];
    }
}
