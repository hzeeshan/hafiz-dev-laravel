<?php

namespace App\Filament\Resources\PostPublications\Pages;

use App\Filament\Resources\PostPublications\PostPublicationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPostPublication extends EditRecord
{
    protected static string $resource = PostPublicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
