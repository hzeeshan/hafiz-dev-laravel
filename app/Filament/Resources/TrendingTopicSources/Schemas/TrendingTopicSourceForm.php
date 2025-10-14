<?php

namespace App\Filament\Resources\TrendingTopicSources\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TrendingTopicSourceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('source')
                    ->required(),
                TextInput::make('source_id'),
                TextInput::make('title')
                    ->required(),
                TextInput::make('url')
                    ->url(),
                Textarea::make('excerpt')
                    ->columnSpanFull(),
                Textarea::make('metadata')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('calculated_score')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('upvotes')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('comments_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                Textarea::make('keywords')
                    ->columnSpanFull(),
                DateTimePicker::make('discovered_at')
                    ->required(),
                Select::make('blog_topic_id')
                    ->relationship('blogTopic', 'title'),
                DateTimePicker::make('converted_at'),
            ]);
    }
}
