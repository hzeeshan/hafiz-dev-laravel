<?php

namespace App\Filament\Resources\BlogTopics\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BlogTopicForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->helperText('Main topic or article title'),

                        TextInput::make('category')
                            ->maxLength(100)
                            ->placeholder('e.g., Laravel, PHP, DevOps')
                            ->columnSpan(1),

                        TextInput::make('target_audience')
                            ->maxLength(100)
                            ->placeholder('e.g., Intermediate Laravel Developers')
                            ->columnSpan(1),

                        Textarea::make('keywords')
                            ->rows(2)
                            ->columnSpanFull()
                            ->placeholder('Comma-separated keywords for SEO')
                            ->helperText('Used for SEO and content generation'),

                        Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('Brief description or angle for this topic')
                            ->helperText('Guides the AI on what to focus on'),

                        Select::make('priority')
                            ->options([
                                1 => '1 - Lowest',
                                2 => '2',
                                3 => '3',
                                4 => '4',
                                5 => '5 - Medium',
                                6 => '6',
                                7 => '7',
                                8 => '8',
                                9 => '9',
                                10 => '10 - Highest',
                            ])
                            ->default(5)
                            ->required()
                            ->helperText('Higher priority topics are processed first')
                            ->columnSpan(1),

                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'generating' => 'Generating',
                                'review' => 'Review',
                                'approved' => 'Approved',
                                'published' => 'Published',
                                'skipped' => 'Skipped',
                            ])
                            ->default('pending')
                            ->required()
                            ->disabled(fn ($record) => $record && in_array($record->status, ['generating']))
                            ->columnSpan(1),
                    ])
                    ->columns(2),

                Section::make('Content Generation')
                    ->schema([
                        Select::make('generation_mode')
                            ->options([
                                'topic' => 'Topic-Based (Original)',
                                'context_youtube' => 'YouTube Video Analysis',
                                'context_blog' => 'Blog Post Remix',
                                'context_twitter' => 'Twitter Thread Expansion',
                                'manual' => 'Manual (Skip AI)',
                            ])
                            ->default('topic')
                            ->required()
                            ->live()
                            ->columnSpanFull()
                            ->helperText('How should this content be generated?'),

                        TextInput::make('source_url')
                            ->url()
                            ->maxLength(500)
                            ->columnSpanFull()
                            ->visible(fn ($get) => in_array($get('generation_mode'), ['context_youtube', 'context_blog', 'context_twitter']))
                            ->required(fn ($get) => in_array($get('generation_mode'), ['context_youtube', 'context_blog', 'context_twitter']))
                            ->placeholder('https://www.youtube.com/watch?v=... or https://example.com/article')
                            ->helperText('URL to analyze (YouTube video, blog post, or Twitter thread)'),

                        Textarea::make('source_content')
                            ->rows(5)
                            ->columnSpanFull()
                            ->visible(fn ($get) => $get('generation_mode') !== 'topic')
                            ->placeholder('Paste transcript, article content, or thread text here...')
                            ->helperText('Optional: Pre-fetched content. Leave empty to auto-fetch from URL.'),

                        Textarea::make('custom_prompt')
                            ->rows(4)
                            ->columnSpanFull()
                            ->placeholder('Add any custom instructions for the AI...')
                            ->helperText('Optional: Additional context or specific requirements'),
                    ])
                    ->collapsible()
                    ->columns(1),

                Section::make('Scheduling & Automation')
                    ->schema([
                        DateTimePicker::make('scheduled_for')
                            ->native(false)
                            ->helperText('When should this post be auto-generated? Leave empty for manual generation.')
                            ->timezone('UTC')
                            ->columnSpanFull(),
                    ])
                    ->collapsible()
                    ->columns(1),

                Section::make('Metadata (Auto-filled)')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                DateTimePicker::make('generated_at')
                                    ->disabled()
                                    ->native(false),

                                DateTimePicker::make('reviewed_at')
                                    ->disabled()
                                    ->native(false),
                            ]),
                    ])
                    ->collapsible()
                    ->collapsed()
                    ->visible(fn ($record) => $record && ($record->generated_at || $record->reviewed_at)),
            ]);
    }
}
