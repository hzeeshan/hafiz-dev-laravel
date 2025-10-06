<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Add Save button to header for easy access
            $this->getSaveFormAction()
                ->formId('form')
                ->label('Save Changes')
                ->icon('heroicon-o-check-circle'),
            Actions\DeleteAction::make(),
        ];
    }
}
