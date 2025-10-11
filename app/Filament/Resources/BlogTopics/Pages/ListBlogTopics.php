<?php

namespace App\Filament\Resources\BlogTopics\Pages;

use App\Filament\Resources\BlogTopics\BlogTopicResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBlogTopics extends ListRecords
{
    protected static string $resource = BlogTopicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
