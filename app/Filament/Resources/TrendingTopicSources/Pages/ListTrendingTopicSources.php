<?php

namespace App\Filament\Resources\TrendingTopicSources\Pages;

use App\Filament\Resources\TrendingTopicSources\TrendingTopicSourceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTrendingTopicSources extends ListRecords
{
    protected static string $resource = TrendingTopicSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
