<?php

namespace App\Filament\Resources\BlogGenerationLogs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;

class BlogGenerationLogInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // AI Prompts FIRST - most important! FULL WIDTH
                ViewEntry::make('prompts')
                    ->label('AI Prompts Used')
                    ->view('filament.infolists.prompts-display')
                    ->columnSpanFull(),

                Section::make('AI Configuration')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('ai_provider')
                                    ->label('AI Provider')
                                    ->badge()
                                    ->default('N/A'),

                                TextEntry::make('ai_model')
                                    ->label('Model')
                                    ->copyable()
                                    ->default('N/A'),

                                TextEntry::make('image_provider')
                                    ->label('Image Provider')
                                    ->badge()
                                    ->default('N/A'),
                            ]),
                    ])
                    ->collapsible(),

                Section::make('Performance Metrics')
                    ->schema([
                        Grid::make(4)
                            ->schema([
                                TextEntry::make('content_tokens')
                                    ->label('Tokens Used')
                                    ->numeric()
                                    ->default(0),

                                TextEntry::make('image_count')
                                    ->label('Images Generated')
                                    ->badge()
                                    ->default(0),

                                TextEntry::make('cost_tracking.content')
                                    ->label('Content Cost')
                                    ->money('USD')
                                    ->default(0),

                                TextEntry::make('cost_tracking.total')
                                    ->label('Total Cost')
                                    ->money('USD')
                                    ->weight(FontWeight::Bold)
                                    ->color('success')
                                    ->default(0),
                            ]),
                    ])
                    ->collapsible(),

                Section::make('Error Details')
                    ->schema([
                        TextEntry::make('error_message')
                            ->label('Error Message')
                            ->color('danger')
                            ->columnSpanFull(),

                        TextEntry::make('error_stack')
                            ->label('Stack Trace')
                            ->columnSpanFull(),
                    ])
                    ->visible(fn ($record) => $record->status === 'failed')
                    ->collapsible(),

                // Overview at bottom - less important
                Section::make('Overview')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('topic.title')
                                    ->label('Blog Topic')
                                    ->weight(FontWeight::Bold)
                                    ->url(fn ($record) => $record->topic ? route('filament.admin.resources.blog-topics.edit', ['record' => $record->topic_id]) : null)
                                    ->color('primary'),

                                TextEntry::make('status')
                                    ->badge()
                                    ->color(fn (string $state): string => match ($state) {
                                        'completed' => 'success',
                                        'failed' => 'danger',
                                        'started' => 'warning',
                                        'content_generated' => 'info',
                                        'images_generated' => 'info',
                                        default => 'gray',
                                    }),

                                TextEntry::make('created_at')
                                    ->label('Generated At')
                                    ->dateTime('M j, Y g:i A'),

                                TextEntry::make('generation_time')
                                    ->label('Total Time')
                                    ->suffix(' seconds'),
                            ]),
                    ])
                    ->collapsible()
                    ->collapsed(true),
            ]);
    }
}
