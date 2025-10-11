<?php

namespace App\Filament\Resources\BlogTopics\Pages;

use App\Filament\Resources\BlogTopics\BlogTopicResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogTopic extends CreateRecord
{
    protected static string $resource = BlogTopicResource::class;
}
