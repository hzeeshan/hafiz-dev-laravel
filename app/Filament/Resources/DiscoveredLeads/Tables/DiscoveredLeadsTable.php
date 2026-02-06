<?php

namespace App\Filament\Resources\DiscoveredLeads\Tables;

use App\Models\DiscoveredLead;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class DiscoveredLeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('calculated_score')
                    ->label('Score')
                    ->formatStateUsing(fn ($state) => number_format($state, 1).'/10')
                    ->badge()
                    ->color(fn ($state) => match (true) {
                        $state >= 8.0 => 'danger',   // Hot lead
                        $state >= 6.0 => 'success',  // Strong lead
                        $state >= 4.0 => 'warning',  // Worth checking
                        default => 'gray',            // Saved
                    })
                    ->icon(fn ($state) => match (true) {
                        $state >= 8.0 => 'heroicon-o-fire',
                        $state >= 6.0 => 'heroicon-o-star',
                        $state >= 4.0 => 'heroicon-o-eye',
                        default => 'heroicon-o-bookmark',
                    })
                    ->sortable(),

                TextColumn::make('title')
                    ->searchable()
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->title)
                    ->url(fn ($record) => $record->url, true)
                    ->wrap(),

                TextColumn::make('source')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'reddit' => '🔴 Reddit',
                        'hackernews' => '🔶 HN',
                        default => $state,
                    })
                    ->badge()
                    ->sortable(),

                TextColumn::make('subreddit')
                    ->label('Sub')
                    ->formatStateUsing(fn ($state) => $state ? "r/{$state}" : '-')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'new' => 'info',
                        'contacted' => 'warning',
                        'replied' => 'success',
                        'converted' => 'success',
                        'skipped' => 'gray',
                        default => 'gray',
                    })
                    ->icon(fn ($state) => match ($state) {
                        'new' => 'heroicon-o-sparkles',
                        'contacted' => 'heroicon-o-paper-airplane',
                        'replied' => 'heroicon-o-chat-bubble-left-right',
                        'converted' => 'heroicon-o-check-circle',
                        'skipped' => 'heroicon-o-x-circle',
                        default => null,
                    })
                    ->sortable(),

                TextColumn::make('intent_keywords_found')
                    ->label('Intent')
                    ->getStateUsing(function ($record) {
                        $keywords = $record->intent_keywords_found ?? [];
                        if (empty($keywords)) {
                            return '-';
                        }

                        // Flatten and get unique keywords
                        $allKeywords = collect($keywords)->flatten()->unique()->filter()->take(3)->toArray();

                        return ! empty($allKeywords) ? implode(', ', $allKeywords) : '-';
                    })
                    ->wrap()
                    ->toggleable(),

                TextColumn::make('posted_at')
                    ->label('Posted')
                    ->since()
                    ->sortable(),

                TextColumn::make('upvotes')
                    ->label('⬆️')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('comments_count')
                    ->label('💬')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('notified')
                    ->label('📱')
                    ->formatStateUsing(fn ($state) => $state ? '✅' : '❌')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('discovered_at')
                    ->label('Discovered')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'new' => '🆕 New',
                        'contacted' => '📧 Contacted',
                        'replied' => '💬 Replied',
                        'converted' => '✅ Converted',
                        'skipped' => '⏭️ Skipped',
                    ]),

                SelectFilter::make('score_category')
                    ->label('Lead Quality')
                    ->options([
                        'hot_lead' => '🔥 Hot Lead (8+)',
                        'strong_lead' => '⭐ Strong Lead (6-7.9)',
                        'worth_checking' => '👀 Worth Checking (4-5.9)',
                        'saved' => '📋 Saved (2-3.9)',
                    ]),

                SelectFilter::make('source')
                    ->options([
                        'reddit' => '🔴 Reddit',
                        'hackernews' => '🔶 Hacker News',
                    ]),

                SelectFilter::make('subreddit')
                    ->label('Subreddit')
                    ->options(fn () => DiscoveredLead::query()
                        ->whereNotNull('subreddit')
                        ->distinct()
                        ->pluck('subreddit', 'subreddit')
                        ->mapWithKeys(fn ($sub) => [$sub => "r/{$sub}"])
                        ->toArray()
                    )
                    ->searchable(),

                SelectFilter::make('discovered_date_range')
                    ->label('Discovered')
                    ->options([
                        'today' => '📅 Today',
                        'last_7_days' => '📅 Last 7 days',
                        'last_30_days' => '📅 Last 30 days',
                        'older_than_30_days' => '📅 Older than 30 days',
                        'older_than_60_days' => '🗑️ Older than 60 days',
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query->when($data['value'], function (Builder $query, string $value) {
                            match ($value) {
                                'today' => $query->whereDate('discovered_at', today()),
                                'last_7_days' => $query->where('discovered_at', '>=', now()->subDays(7)),
                                'last_30_days' => $query->where('discovered_at', '>=', now()->subDays(30)),
                                'older_than_30_days' => $query->where('discovered_at', '<', now()->subDays(30)),
                                'older_than_60_days' => $query->where('discovered_at', '<', now()->subDays(60)),
                                default => $query,
                            };
                        });
                    }),
            ])
            ->recordActions([
                ViewAction::make()
                    ->slideOver(),

                Action::make('mark_contacted')
                    ->label('Contacted')
                    ->icon('heroicon-o-paper-airplane')
                    ->color('warning')
                    ->hidden(fn ($record) => $record->status !== 'new')
                    ->form([
                        Textarea::make('notes')
                            ->label('Notes (optional)')
                            ->placeholder('Add notes about your outreach...'),
                    ])
                    ->action(function ($record, array $data) {
                        $record->markAsContacted($data['notes'] ?? null);

                        Notification::make()
                            ->success()
                            ->title('Status Updated')
                            ->body('Lead marked as contacted.')
                            ->send();
                    }),

                Action::make('mark_replied')
                    ->label('Replied')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->color('success')
                    ->hidden(fn ($record) => ! in_array($record->status, ['new', 'contacted']))
                    ->form([
                        Textarea::make('notes')
                            ->label('Notes (optional)')
                            ->placeholder('Notes about their reply...'),
                    ])
                    ->action(function ($record, array $data) {
                        $record->update([
                            'status' => 'replied',
                            'notes' => $data['notes'] ?? $record->notes,
                        ]);

                        Notification::make()
                            ->success()
                            ->title('Status Updated')
                            ->body('Lead marked as replied.')
                            ->send();
                    }),

                Action::make('mark_converted')
                    ->label('Converted! 🎉')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->hidden(fn ($record) => $record->status === 'converted' || $record->status === 'skipped')
                    ->requiresConfirmation()
                    ->modalHeading('Mark as Converted')
                    ->modalDescription('Congratulations! This lead became a paying client.')
                    ->form([
                        Textarea::make('notes')
                            ->label('Conversion Notes')
                            ->placeholder('Details about the deal, project scope, etc.'),
                    ])
                    ->action(function ($record, array $data) {
                        $record->markAsConverted($data['notes'] ?? null);

                        Notification::make()
                            ->success()
                            ->title('🎉 Lead Converted!')
                            ->body('Congratulations on the new client!')
                            ->send();
                    }),

                Action::make('mark_skipped')
                    ->label('Skip')
                    ->icon('heroicon-o-x-circle')
                    ->color('gray')
                    ->hidden(fn ($record) => $record->status === 'converted' || $record->status === 'skipped')
                    ->form([
                        Textarea::make('notes')
                            ->label('Reason (optional)')
                            ->placeholder('Why are you skipping this lead?'),
                    ])
                    ->action(function ($record, array $data) {
                        $record->markAsSkipped($data['notes'] ?? null);

                        Notification::make()
                            ->info()
                            ->title('Lead Skipped')
                            ->body('Lead has been skipped.')
                            ->send();
                    }),

                Action::make('open_url')
                    ->label('Open')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->color('gray')
                    ->url(fn ($record) => $record->url, true),
            ])
            ->defaultSort('discovered_at', 'desc')
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('mark_all_contacted')
                        ->label('Mark Contacted')
                        ->icon('heroicon-o-paper-airplane')
                        ->action(fn (Collection $records) => $records->each->markAsContacted())
                        ->deselectRecordsAfterCompletion()
                        ->requiresConfirmation(),

                    BulkAction::make('mark_all_skipped')
                        ->label('Mark Skipped')
                        ->icon('heroicon-o-x-circle')
                        ->action(fn (Collection $records) => $records->each->markAsSkipped())
                        ->deselectRecordsAfterCompletion()
                        ->requiresConfirmation(),

                    DeleteBulkAction::make(),
                ]),
            ])
            ->poll('60s'); // Auto-refresh every minute
    }
}
