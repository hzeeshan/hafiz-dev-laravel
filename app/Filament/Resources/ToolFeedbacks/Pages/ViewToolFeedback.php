<?php

namespace App\Filament\Resources\ToolFeedbacks\Pages;

use App\Filament\Resources\ToolFeedbacks\ToolFeedbackResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\ViewRecord;

class ViewToolFeedback extends ViewRecord
{
    protected static string $resource = ToolFeedbackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
