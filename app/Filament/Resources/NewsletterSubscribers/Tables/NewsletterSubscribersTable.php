<?php

namespace App\Filament\Resources\NewsletterSubscribers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ExportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class NewsletterSubscribersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'success',
                        'unsubscribed' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('source')
                    ->badge()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Subscribed At')
                    ->dateTime('M j, Y g:i A')
                    ->sortable()
                    ->description(fn ($record) => $record->created_at->diffForHumans()),
                TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('confirmed_at')
                    ->label('Confirmed At')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'unsubscribed' => 'Unsubscribed',
                    ])
                    ->default('confirmed'),
            ])
            ->recordActions([
                // View only - no editing to maintain data integrity
            ])
            ->toolbarActions([
                ExportAction::make()
                    ->label('Export Emails')
                    ->icon('heroicon-o-arrow-down-tray'),
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Delete Selected'),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('30s'); // Auto-refresh every 30 seconds
    }
}
