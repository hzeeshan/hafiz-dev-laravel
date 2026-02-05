<?php

namespace App\Filament\Resources\DiscoveredLeads\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;

class DiscoveredLeadInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Lead Details')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('title')
                                    ->label('Title')
                                    ->columnSpanFull()
                                    ->weight(FontWeight::Bold),

                                TextEntry::make('calculated_score')
                                    ->label('Score')
                                    ->formatStateUsing(fn ($state) => number_format($state, 1).'/10')
                                    ->badge()
                                    ->color(fn ($state) => match (true) {
                                        $state >= 8.0 => 'danger',
                                        $state >= 6.0 => 'success',
                                        $state >= 4.0 => 'warning',
                                        default => 'gray',
                                    }),

                                TextEntry::make('score_category')
                                    ->label('Category')
                                    ->formatStateUsing(fn ($state) => match ($state) {
                                        'hot_lead' => '🔥 Hot Lead',
                                        'strong_lead' => '⭐ Strong Lead',
                                        'worth_checking' => '👀 Worth Checking',
                                        'saved' => '📋 Saved',
                                        default => $state,
                                    })
                                    ->badge(),

                                TextEntry::make('status')
                                    ->badge()
                                    ->color(fn ($state) => match ($state) {
                                        'new' => 'info',
                                        'contacted' => 'warning',
                                        'replied' => 'success',
                                        'converted' => 'success',
                                        'skipped' => 'gray',
                                        default => 'gray',
                                    }),
                            ]),
                    ]),

                Section::make('Source Information')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('source')
                                    ->formatStateUsing(fn ($state) => match ($state) {
                                        'reddit' => '🔴 Reddit',
                                        'hackernews' => '🔶 Hacker News',
                                        default => $state,
                                    }),

                                TextEntry::make('subreddit')
                                    ->label('Subreddit')
                                    ->formatStateUsing(fn ($state) => $state ? "r/{$state}" : '-')
                                    ->placeholder('-'),

                                TextEntry::make('author')
                                    ->formatStateUsing(fn ($state, $record) => $record->source === 'reddit' ? "u/{$state}" : $state),

                                TextEntry::make('upvotes')
                                    ->label('Upvotes'),

                                TextEntry::make('comments_count')
                                    ->label('Comments'),

                                TextEntry::make('posted_at')
                                    ->label('Posted')
                                    ->since(),
                            ]),

                        TextEntry::make('url')
                            ->label('URL')
                            ->url(fn ($state) => $state, true)
                            ->columnSpanFull(),
                    ]),

                Section::make('Intent Analysis')
                    ->schema([
                        TextEntry::make('intent_keywords_found')
                            ->label('Intent Keywords Found')
                            ->formatStateUsing(function ($state) {
                                if (empty($state)) {
                                    return 'No keywords found';
                                }

                                $formatted = [];
                                foreach (['high' => '🔴 HIGH', 'medium' => '🟡 MEDIUM', 'low' => '🟢 LOW'] as $level => $label) {
                                    if (! empty($state[$level])) {
                                        $formatted[] = "{$label}: ".implode(', ', $state[$level]);
                                    }
                                }

                                return implode("\n", $formatted) ?: 'No keywords found';
                            })
                            ->columnSpanFull(),
                    ]),

                Section::make('Post Content')
                    ->schema([
                        TextEntry::make('body')
                            ->label('Body')
                            ->markdown()
                            ->columnSpanFull()
                            ->placeholder('No body text'),
                    ])
                    ->collapsible(),

                Section::make('Notes')
                    ->schema([
                        TextEntry::make('notes')
                            ->label('')
                            ->placeholder('No notes yet')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Timestamps')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('discovered_at')
                                    ->label('Discovered')
                                    ->dateTime(),

                                TextEntry::make('notified')
                                    ->label('Notified')
                                    ->formatStateUsing(fn ($state, $record) => $state ? "Yes ({$record->notified_at?->diffForHumans()})" : 'No')
                                    ->badge()
                                    ->color(fn ($state) => $state ? 'success' : 'gray'),

                                TextEntry::make('updated_at')
                                    ->label('Last Updated')
                                    ->dateTime(),
                            ]),
                    ])
                    ->collapsed(),
            ]);
    }
}
