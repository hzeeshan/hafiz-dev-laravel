<?php

namespace App\Filament\Resources\ToolViews\Pages;

use App\Filament\Resources\ToolViews\ToolViewResource;
use App\Models\ToolView;
use Filament\Resources\Pages\ListRecords;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ListToolViews extends ListRecords
{
    protected static string $resource = ToolViewResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            ToolViewStatsWidget::class,
        ];
    }
}
