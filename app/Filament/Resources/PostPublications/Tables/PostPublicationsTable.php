<?php

namespace App\Filament\Resources\PostPublications\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PostPublicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('post.title')
                    ->label('Post Title')
                    ->searchable()
                    ->sortable()
                    ->limit(40)
                    ->url(fn ($record) => $record->post ? route('blog.show', $record->post->slug) : null)
                    ->openUrlInNewTab(),

                BadgeColumn::make('platform')
                    ->label('Platform')
                    ->colors([
                        'info' => 'devto',
                        'success' => 'hashnode',
                        'primary' => 'linkedin',
                        'warning' => 'medium',
                    ])
                    ->icons([
                        'devto' => 'heroicon-o-globe-alt',
                        'hashnode' => 'heroicon-o-globe-alt',
                        'linkedin' => 'heroicon-o-globe-alt',
                        'medium' => 'heroicon-o-globe-alt',
                    ]),

                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'published',
                        'danger' => 'failed',
                    ]),

                TextColumn::make('external_url')
                    ->label('External URL')
                    ->limit(40)
                    ->url(fn ($record) => $record->external_url)
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->iconPosition('after')
                    ->placeholder('N/A'),

                TextColumn::make('views')
                    ->numeric()
                    ->sortable()
                    ->alignCenter()
                    ->toggleable(),

                TextColumn::make('likes')
                    ->numeric()
                    ->sortable()
                    ->alignCenter()
                    ->toggleable(),

                TextColumn::make('comments')
                    ->numeric()
                    ->sortable()
                    ->alignCenter()
                    ->toggleable(),

                TextColumn::make('published_at')
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->placeholder('Not published'),

                TextColumn::make('error_message')
                    ->label('Error')
                    ->limit(50)
                    ->placeholder('-')
                    ->color('danger')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('platform')
                    ->options([
                        'devto' => 'Dev.to',
                        'hashnode' => 'Hashnode',
                        'medium' => 'Medium',
                        'linkedin' => 'LinkedIn',
                    ]),

                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'published' => 'Published',
                        'failed' => 'Failed',
                    ]),
            ])
            ->recordActions([
                Action::make('view_external')
                    ->label('View')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->url(fn ($record) => $record->external_url)
                    ->openUrlInNewTab()
                    ->visible(fn ($record) => !empty($record->external_url)),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
