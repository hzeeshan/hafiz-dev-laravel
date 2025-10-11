<?php

namespace App\Filament\Resources\BlogGenerationLogs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BlogGenerationLogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('topic.title')
                    ->label('Blog Topic')
                    ->searchable()
                    ->sortable()
                    ->limit(40)
                    ->url(fn ($record) => $record->topic ? route('filament.admin.resources.blog-topics.edit', ['record' => $record->topic_id]) : null),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'failed' => 'danger',
                        'started' => 'warning',
                        'content_generated' => 'info',
                        'images_generated' => 'info',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('ai_model')
                    ->label('Model')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('generation_time')
                    ->label('Time')
                    ->suffix('s')
                    ->sortable()
                    ->alignEnd(),

                TextColumn::make('cost_tracking')
                    ->label('Cost')
                    ->money('USD', divideBy: 1)
                    ->getStateUsing(fn ($record) => $record->getTotalCost())
                    ->sortable()
                    ->alignEnd(),

                TextColumn::make('content_tokens')
                    ->label('Tokens')
                    ->numeric()
                    ->sortable()
                    ->toggleable()
                    ->alignEnd(),

                TextColumn::make('image_count')
                    ->label('Images')
                    ->badge()
                    ->alignCenter()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Generated At')
                    ->dateTime('M j, Y g:i A')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'started' => 'Started',
                        'content_generated' => 'Content Generated',
                        'images_generated' => 'Images Generated',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                    ])
                    ->multiple(),
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
