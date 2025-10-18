<?php

namespace App\Filament\Resources\PostPublications\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PostPublicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('post_id')
                    ->required()
                    ->numeric(),
                TextInput::make('platform')
                    ->required(),
                TextInput::make('external_url')
                    ->url(),
                TextInput::make('external_id'),
                TextInput::make('views')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('likes')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('comments')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                Textarea::make('error_message')
                    ->columnSpanFull(),
                DateTimePicker::make('published_at'),
            ]);
    }
}
