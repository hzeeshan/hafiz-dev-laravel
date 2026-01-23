<?php

namespace App\Filament\Resources\ToolViews\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ToolViewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tool_slug')
                    ->label('Tool')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tool_name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('date')
                    ->label('Date')
                    ->date('M j, Y')
                    ->sortable(),

                TextColumn::make('views')
                    ->label('Views')
                    ->numeric()
                    ->sortable()
                    ->alignEnd(),

                TextColumn::make('created_at')
                    ->label('First Tracked')
                    ->dateTime('M j, Y g:i A')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('M j, Y g:i A')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('tool_slug')
                    ->label('Tool')
                    ->options(\App\Models\ToolView::$tools),
            ])
            ->defaultSort('date', 'desc');
    }
}
