<?php

namespace App\Filament\Widgets;

use App\Models\ToolView;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ToolViewsStatsWidget extends BaseWidget
{
    protected static ?int $sort = 2;

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
            Stat::make('Tool Views Today', number_format($todayViews))
                ->description('Views today')
                ->color('success')
                ->icon('heroicon-o-wrench-screwdriver'),

            Stat::make('Tool Views (7 Days)', number_format($last7Days))
                ->description('Weekly views')
                ->color('info')
                ->icon('heroicon-o-chart-bar'),

            Stat::make('Tool Views (30 Days)', number_format($last30Days))
                ->description('Monthly views')
                ->color('warning')
                ->icon('heroicon-o-calendar'),

            Stat::make('All Time Tool Views', number_format($totalViews))
                ->description('Total views')
                ->color('primary')
                ->icon('heroicon-o-eye'),

            Stat::make('Top Tool', $topToolName)
                ->description($topTool ? number_format($topTool->total_views) . ' views' : '')
                ->color('success')
                ->icon('heroicon-o-star'),
        ];
    }
}
