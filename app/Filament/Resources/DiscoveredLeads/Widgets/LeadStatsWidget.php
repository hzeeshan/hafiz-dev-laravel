<?php

namespace App\Filament\Resources\DiscoveredLeads\Widgets;

use App\Models\DiscoveredLead;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LeadStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $today = now()->startOfDay();
        $thisWeek = now()->startOfWeek();

        return [
            Stat::make('New Leads', DiscoveredLead::where('status', 'new')->count())
                ->description('Awaiting action')
                ->descriptionIcon('heroicon-o-sparkles')
                ->color('info'),

            Stat::make('Hot Leads', DiscoveredLead::hotLeads()->where('status', 'new')->count())
                ->description('Score 8+ - Act fast!')
                ->descriptionIcon('heroicon-o-fire')
                ->color('danger'),

            Stat::make('Contacted', DiscoveredLead::where('status', 'contacted')->count())
                ->description('Awaiting reply')
                ->descriptionIcon('heroicon-o-paper-airplane')
                ->color('warning'),

            Stat::make('Converted', DiscoveredLead::where('status', 'converted')->count())
                ->description('All time')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('This Week', DiscoveredLead::where('discovered_at', '>=', $thisWeek)->count())
                ->description('New discoveries')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('primary'),

            Stat::make('Conversion Rate', $this->getConversionRate().'%')
                ->description('Leads → Clients')
                ->descriptionIcon('heroicon-o-chart-bar')
                ->color('success'),
        ];
    }

    protected function getConversionRate(): string
    {
        $total = DiscoveredLead::whereIn('status', ['converted', 'skipped'])->count();
        $converted = DiscoveredLead::where('status', 'converted')->count();

        if ($total === 0) {
            return '0';
        }

        return number_format(($converted / $total) * 100, 1);
    }
}
