<?php

namespace App\Filament\Resources\TrendingTopicSources\Pages;

use App\Filament\Resources\TrendingTopicSources\TrendingTopicSourceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTrendingTopicSource extends EditRecord
{
    protected static string $resource = TrendingTopicSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
