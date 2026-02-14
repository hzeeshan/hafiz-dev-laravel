<?php

namespace App\Filament\Resources\ToolFeedbacks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ToolFeedbacksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('tool_slug')
                    ->label('Tool')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'bug' => 'danger',
                        'feature' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'bug' => 'Bug',
                        'feature' => 'Feature',
                        default => 'Other',
                    })
                    ->sortable(),

                TextColumn::make('message')
                    ->limit(50)
                    ->searchable()
                    ->wrap(),

                TextColumn::make('email')
                    ->searchable()
                    ->placeholder('—')
                    ->toggleable(),

                IconColumn::make('is_resolved')
                    ->label('Resolved')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Submitted')
                    ->dateTime('M j, Y g:i A')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'bug' => 'Bug Report',
                        'feature' => 'Feature Request',
                        'other' => 'Other',
                    ]),

                TernaryFilter::make('is_resolved')
                    ->label('Resolved'),

                SelectFilter::make('tool_slug')
                    ->label('Tool')
                    ->options(fn () => \App\Models\ToolFeedback::query()
                        ->distinct()
                        ->pluck('tool_slug', 'tool_slug')
                        ->toArray())
                    ->searchable(),
            ])
            ->recordActions([
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
