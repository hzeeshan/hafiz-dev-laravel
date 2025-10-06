<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Add Create button to header
            $this->getCreateFormAction()
                ->formId('form')
                ->label('Create Post')
                ->icon('heroicon-o-document-plus'),
            $this->getCreateAnotherFormAction()
                ->formId('form')
                ->label('Create & Create Another'),
        ];
    }
}
