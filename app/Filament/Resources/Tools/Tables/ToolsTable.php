<?php

namespace App\Filament\Resources\Tools\Tables;

use App\Models\ToolView;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ToolsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->reorderable('position')
            ->defaultSort('position')
            ->columns([
                TextColumn::make('position')
                    ->sortable()
                    ->width('60px'),

                TextColumn::make('icon')
                    ->label('')
                    ->width('40px'),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable()
                    ->color('gray')
                    ->copyable()
                    ->copyMessage('Slug copied'),

                TextColumn::make('category')
                    ->badge()
                    ->sortable(),

                TextColumn::make('total_views')
                    ->label('Views')
                    ->getStateUsing(fn ($record) => ToolView::getTotalViews($record->slug))
                    ->numeric()
                    ->sortable(query: function ($query, $direction) {
                        return $query->withSum('views as total_views_sum', 'views')
                            ->orderBy('total_views_sum', $direction);
                    }),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options(\App\Models\Tool::categories())
                    ->multiple(),

                TernaryFilter::make('is_active')
                    ->label('Active')
                    ->placeholder('All')
                    ->trueLabel('Active only')
                    ->falseLabel('Inactive only'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
