<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Main Content Section - Single Column for Focus
                Section::make('Content')
                    ->description('Write your blog post content')
                    ->schema([
                        TextInput::make('title')
                            ->label('Post Title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) =>
                                $set('slug', Str::slug($state))
                            )
                            ->placeholder('How to Build a Laravel Blog with Filament'),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('Auto-generated from title')
                            ->disabled()
                            ->dehydrated(),

                        MarkdownEditor::make('content')
                            ->label('Post Content')
                            ->required()
                            ->toolbarButtons([
                                'attachFiles',
                                'bold',
                                'italic',
                                'strike',
                                'link',
                                'heading',
                                'bulletList',
                                'orderedList',
                                'codeBlock',
                                'blockquote',
                                'table',
                            ])
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('blog-attachments')
                            ->placeholder('Start writing your post...'),

                        Textarea::make('excerpt')
                            ->label('Excerpt (Optional)')
                            ->maxLength(500)
                            ->rows(3)
                            ->helperText('Brief summary - leave empty to auto-generate from content')
                            ->placeholder('A short summary of your post...'),
                    ])
                    ->columnSpanFull(),

                // Media & Tags Section - Visually Grouped
                Section::make('Media & Tags')
                    ->description('Add a featured image and categorize your post')
                    ->schema([
                        FileUpload::make('featured_image')
                            ->label('Featured Image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('blog-images')
                            ->visibility('public')
                            ->helperText('Recommended: 1200×630px (16:9 aspect ratio)')
                            ->columnSpanFull(),

                        TagsInput::make('tags')
                            ->suggestions(['Laravel', 'PHP', 'Vue.js', 'Docker', 'SaaS', 'Automation', 'AI', 'Chrome Extensions'])
                            ->helperText('Press Enter to add tags')
                            ->placeholder('Laravel, PHP, Vue.js')
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull()
                    ->collapsed(false),

                // Publishing Settings - Compact Two-Column
                Section::make('Publishing')
                    ->description('Set post status and publish date')
                    ->schema([
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'scheduled' => 'Scheduled',
                                'published' => 'Published',
                            ])
                            ->required()
                            ->default('draft')
                            ->columnSpan(1),

                        DateTimePicker::make('published_at')
                            ->label('Publish Date')
                            ->helperText('Leave empty to publish immediately')
                            ->columnSpan(1),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                // SEO Section - Collapsed by Default (Less Cognitive Load)
                Section::make('SEO & Advanced')
                    ->description('Optimize for search engines (optional)')
                    ->schema([
                        TextInput::make('seo_title')
                            ->label('SEO Title')
                            ->maxLength(60)
                            ->helperText('Leave empty to use post title (recommended: 50-60 characters)')
                            ->placeholder('Custom title for search engines'),

                        Textarea::make('seo_description')
                            ->label('Meta Description')
                            ->maxLength(160)
                            ->rows(3)
                            ->helperText('Leave empty to use excerpt (recommended: 150-160 characters)')
                            ->placeholder('A compelling description for search results...'),

                        TextInput::make('reading_time')
                            ->label('Reading Time')
                            ->numeric()
                            ->suffix('minutes')
                            ->helperText('Auto-calculated if empty')
                            ->placeholder('5'),
                    ])
                    ->columnSpanFull()
                    ->collapsed(true), // Collapsed by default - reduces overwhelm

                // Multi-Platform Distribution Settings
                Section::make('Multi-Platform Distribution')
                    ->description('Choose which platforms to publish this post to after reviewing')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Toggle::make('publish_to_devto')
                                    ->label('Dev.to')
                                    ->helperText('Publish to Dev.to (+48h delay)')
                                    ->default(true)
                                    ->inline(false),

                                Toggle::make('publish_to_hashnode')
                                    ->label('Hashnode')
                                    ->helperText('Publish to Hashnode (+48h delay)')
                                    ->default(true)
                                    ->inline(false),

                                Toggle::make('publish_to_linkedin')
                                    ->label('LinkedIn')
                                    ->helperText('Share excerpt on LinkedIn')
                                    ->default(true)
                                    ->inline(false),

                                Toggle::make('publish_to_medium')
                                    ->label('Medium')
                                    ->helperText('Publish to Medium (optional)')
                                    ->default(false)
                                    ->inline(false),
                            ]),
                    ])
                    ->columnSpanFull()
                    ->collapsed(true)
                    ->visible(fn ($record) => $record && $record->auto_generated), // Only show for auto-generated posts
            ]);
    }
}
