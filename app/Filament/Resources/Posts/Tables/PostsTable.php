<?php

namespace App\Filament\Resources\Posts\Tables;

use App\Jobs\PublishToDevToJob;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                BadgeColumn::make('status')
                    ->colors([
                        'secondary' => 'draft',
                        'warning' => 'scheduled',
                        'success' => 'published',
                    ]),

                TextColumn::make('published_at')
                    ->dateTime('M d, Y')
                    ->sortable(),

                TextColumn::make('views')
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('reading_time')
                    ->suffix(' min')
                    ->alignCenter()
                    ->toggleable(isToggledHiddenByDefault: true),

                TagsColumn::make('tags')
                    ->limit(3)
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('devto_published')
                    ->label('Dev.to')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->getStateUsing(fn ($record) => $record->publications()
                        ->where('platform', 'devto')
                        ->where('status', 'published')
                        ->exists())
                    ->tooltip(fn ($record) => self::getDevToTooltip($record))
                    ->alignCenter(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'scheduled' => 'Scheduled',
                        'published' => 'Published',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),

                Action::make('publish_to_devto')
                    ->label('Dev.to')
                    ->icon('heroicon-o-rocket-launch')
                    ->color('info')
                    ->visible(fn ($record) => $record->status === 'published')
                    ->tooltip(fn ($record) => self::getPublishActionTooltip($record))
                    ->requiresConfirmation()
                    ->modalHeading(fn ($record) => self::getPublishActionHeading($record))
                    ->modalDescription(fn ($record) => self::getPublishActionDescription($record))
                    ->modalSubmitActionLabel(fn ($record) => self::getPublishActionLabel($record))
                    ->action(function ($record) {
                        PublishToDevToJob::dispatch($record);

                        Notification::make()
                            ->title('Dev.to Publishing Queued')
                            ->body('Your post is being published to Dev.to. Check the publications table for status.')
                            ->success()
                            ->send();
                    }),

                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    private static function getDevToTooltip($record): string
    {
        $publication = $record->publications()
            ->where('platform', 'devto')
            ->latest()
            ->first();

        if (!$publication) {
            return 'Not published to Dev.to';
        }

        if ($publication->status === 'published') {
            return 'Published to Dev.to';
        }

        if ($publication->status === 'failed') {
            return 'Failed: ' . ($publication->error_message ?? 'Unknown error');
        }

        return 'Pending publication';
    }

    private static function getPublishActionTooltip($record): string
    {
        $publication = $record->publications()
            ->where('platform', 'devto')
            ->where('status', 'published')
            ->first();

        return $publication ? 'Update on Dev.to' : 'Publish to Dev.to';
    }

    private static function getPublishActionHeading($record): string
    {
        $publication = $record->publications()
            ->where('platform', 'devto')
            ->where('status', 'published')
            ->first();

        return $publication ? 'Update Dev.to Article?' : 'Publish to Dev.to?';
    }

    private static function getPublishActionDescription($record): string
    {
        $publication = $record->publications()
            ->where('platform', 'devto')
            ->where('status', 'published')
            ->first();

        if ($publication) {
            return 'This will update the existing article on Dev.to with the latest content.';
        }

        return 'This will publish your post to Dev.to with a canonical URL pointing back to your blog.';
    }

    private static function getPublishActionLabel($record): string
    {
        $publication = $record->publications()
            ->where('platform', 'devto')
            ->where('status', 'published')
            ->first();

        return $publication ? 'Update' : 'Publish';
    }
}
