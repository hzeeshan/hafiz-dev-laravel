<?php

namespace App\Filament\Resources\BlogGenerationLogs\Pages;

use App\Filament\Resources\BlogGenerationLogs\BlogGenerationLogResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBlogGenerationLog extends ViewRecord
{
    protected static string $resource = BlogGenerationLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
