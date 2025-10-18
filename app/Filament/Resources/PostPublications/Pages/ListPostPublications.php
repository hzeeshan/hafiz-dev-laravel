<?php

namespace App\Filament\Resources\PostPublications\Pages;

use App\Filament\Resources\PostPublications\PostPublicationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPostPublications extends ListRecords
{
    protected static string $resource = PostPublicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
