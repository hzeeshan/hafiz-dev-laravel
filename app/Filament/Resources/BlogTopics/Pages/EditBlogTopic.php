<?php

namespace App\Filament\Resources\BlogTopics\Pages;

use App\Filament\Resources\BlogTopics\BlogTopicResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBlogTopic extends EditRecord
{
    protected static string $resource = BlogTopicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
