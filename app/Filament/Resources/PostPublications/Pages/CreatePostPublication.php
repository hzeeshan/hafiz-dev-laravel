<?php

namespace App\Filament\Resources\PostPublications\Pages;

use App\Filament\Resources\PostPublications\PostPublicationResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePostPublication extends CreateRecord
{
    protected static string $resource = PostPublicationResource::class;
}
