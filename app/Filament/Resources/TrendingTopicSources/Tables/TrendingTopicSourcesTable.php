<?php

namespace App\Filament\Resources\TrendingTopicSources\Tables;

use App\Services\TopicDiscovery\TopicDiscoveryService;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class TrendingTopicSourcesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('calculated_score')
                    ->label('Score')
                    ->formatStateUsing(fn ($state) => number_format($state, 1) . '/10')
                    ->badge()
                    ->color(fn ($state) => match (true) {
                        $state >= 9.0 => 'danger',  // Excellent
                        $state >= 7.0 => 'success', // High
                        $state >= 5.0 => 'warning', // Good
                        default => 'gray',          // Fair/Low
                    })
                    ->icon(fn ($state) => match (true) {
                        $state >= 9.0 => 'heroicon-o-fire',
                        $state >= 7.0 => 'heroicon-o-star',
                        $state >= 5.0 => 'heroicon-o-check-circle',
                        default => 'heroicon-o-minus-circle',
                    })
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title')
                    ->searchable()
                    ->limit(60)
                    ->tooltip(fn ($record) => $record->title)
                    ->url(fn ($record) => $record->url, true)
                    ->wrap(),

                TextColumn::make('source')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'reddit' => '🔴 Reddit',
                        'hackernews' => '🔶 HN',
                        'google_trends' => '📈 Trends',
                        default => $state,
                    })
                    ->badge()
                    ->sortable(),

                TextColumn::make('upvotes')
                    ->label('Votes')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('comments_count')
                    ->label('Comments')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('keywords')
                    ->badge()
                    ->separator(',')
                    ->limit(3)
                    ->toggleable(),

                TextColumn::make('blogTopic.title')
                    ->label('BlogTopic')
                    ->default('Not converted')
                    ->badge()
                    ->color(fn ($state) => $state === 'Not converted' ? 'gray' : 'success')
                    ->url(fn ($record) => $record->blog_topic_id
                        ? "/admin/blog-topics/{$record->blog_topic_id}/edit"
                        : null)
                    ->sortable(),

                TextColumn::make('discovered_at')
                    ->label('Discovered')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('source')
                    ->options([
                        'reddit' => '🔴 Reddit',
                        'hackernews' => '🔶 Hacker News',
                        'google_trends' => '📈 Google Trends',
                    ]),

                SelectFilter::make('score_range')
                    ->label('Score Range')
                    ->options([
                        '9+' => '🔥 Excellent (9+)',
                        '7+' => '⭐ High (7-8.9)',
                        '5+' => '✓ Good (5-6.9)',
                        '3+' => '~ Fair (3-4.9)',
                        '0+' => '× Low (<3)',
                    ])
                    ->query(function ($query, $state) {
                        return match ($state['value'] ?? null) {
                            '9+' => $query->where('calculated_score', '>=', 9.0),
                            '7+' => $query->whereBetween('calculated_score', [7.0, 8.9]),
                            '5+' => $query->whereBetween('calculated_score', [5.0, 6.9]),
                            '3+' => $query->whereBetween('calculated_score', [3.0, 4.9]),
                            '0+' => $query->where('calculated_score', '<', 3.0),
                            default => $query,
                        };
                    }),

                TernaryFilter::make('converted')
                    ->label('Converted to BlogTopic')
                    ->placeholder('All topics')
                    ->trueLabel('Converted')
                    ->falseLabel('Not converted')
                    ->queries(
                        true: fn ($query) => $query->whereNotNull('blog_topic_id'),
                        false: fn ($query) => $query->whereNull('blog_topic_id'),
                    ),
            ])
            ->recordActions([
                ViewAction::make()
                    ->slideOver()
                    ->modalHeading(fn ($record) => 'Topic: ' . $record->title),

                Action::make('convert_to_blog_topic')
                    ->label('Convert to BlogTopic')
                    ->icon('heroicon-o-arrow-right-circle')
                    ->color('success')
                    ->hidden(fn ($record) => $record->isConverted())
                    ->requiresConfirmation()
                    ->modalHeading('Convert to BlogTopic')
                    ->modalDescription(fn ($record) => "Convert \"{$record->title}\" (Score: {$record->calculated_score}/10) to a BlogTopic?")
                    ->action(function ($record) {
                        $service = app(TopicDiscoveryService::class);
                        $blogTopic = $service->createBlogTopic($record);

                        Notification::make()
                            ->success()
                            ->title('BlogTopic Created')
                            ->body("Created: {$blogTopic->title}")
                            ->send();

                        return redirect()->to("/admin/blog-topics/{$blogTopic->id}/edit");
                    }),
            ])
            ->defaultSort('calculated_score', 'desc')
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
