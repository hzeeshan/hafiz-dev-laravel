<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Post Content')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) =>
                                $set('slug', Str::slug($state))
                            ),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('Auto-generated from title'),

                        Textarea::make('excerpt')
                            ->maxLength(500)
                            ->rows(3)
                            ->helperText('Brief summary (auto-generated if empty)'),

                        MarkdownEditor::make('content')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'link',
                                'heading',
                                'bulletList',
                                'orderedList',
                                'codeBlock',
                                'blockquote',
                            ]),
                    ])
                    ->columns(2),

                Section::make('Media')
                    ->schema([
                        FileUpload::make('featured_image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('blog-images')
                            ->visibility('public')
                            ->helperText('Recommended: 1200x630px'),
                    ]),

                Section::make('Meta Information')
                    ->schema([
                        TagsInput::make('tags')
                            ->suggestions(['Laravel', 'PHP', 'Vue.js', 'Docker', 'SaaS', 'Automation'])
                            ->helperText('Press Enter to add tag'),

                        TextInput::make('seo_title')
                            ->maxLength(60)
                            ->helperText('Leave empty to use post title'),

                        Textarea::make('seo_description')
                            ->maxLength(160)
                            ->rows(2)
                            ->helperText('Leave empty to use excerpt'),

                        TextInput::make('reading_time')
                            ->numeric()
                            ->suffix('minutes')
                            ->helperText('Auto-calculated if empty'),
                    ])
                    ->columns(2),

                Section::make('Publishing')
                    ->schema([
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'scheduled' => 'Scheduled',
                                'published' => 'Published',
                            ])
                            ->required()
                            ->default('draft'),

                        DateTimePicker::make('published_at')
                            ->label('Publish Date')
                            ->helperText('Leave empty to publish immediately'),
                    ])
                    ->columns(2),
            ]);
    }
}
