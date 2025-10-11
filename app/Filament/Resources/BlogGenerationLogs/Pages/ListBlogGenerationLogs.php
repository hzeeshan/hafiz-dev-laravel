<?php

namespace App\Filament\Resources\BlogGenerationLogs\Pages;

use App\Filament\Resources\BlogGenerationLogs\BlogGenerationLogResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBlogGenerationLogs extends ListRecords
{
    protected static string $resource = BlogGenerationLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
