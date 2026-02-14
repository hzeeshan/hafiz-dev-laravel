<?php

namespace App\Filament\Resources\ToolFeedbacks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Actions\Action;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;

class ToolFeedbackInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Actions::make([
                    Action::make('toggle_resolved')
                        ->label(fn ($record) => $record->is_resolved ? 'Mark Unresolved' : 'Mark Resolved')
                        ->icon(fn ($record) => $record->is_resolved ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                        ->color(fn ($record) => $record->is_resolved ? 'gray' : 'success')
                        ->action(function ($record) {
                            $record->update(['is_resolved' => !$record->is_resolved]);
                        }),
                ]),

                Section::make('Feedback')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('tool_slug')
                                    ->label('Tool')
                                    ->weight(FontWeight::Bold)
                                    ->copyable(),

                                TextEntry::make('type')
                                    ->badge()
                                    ->color(fn (string $state): string => match ($state) {
                                        'bug' => 'danger',
                                        'feature' => 'info',
                                        default => 'gray',
                                    })
                                    ->formatStateUsing(fn (string $state): string => match ($state) {
                                        'bug' => 'Bug Report',
                                        'feature' => 'Feature Request',
                                        default => 'Other',
                                    }),

                                TextEntry::make('is_resolved')
                                    ->label('Status')
                                    ->badge()
                                    ->formatStateUsing(fn (bool $state): string => $state ? 'Resolved' : 'Open')
                                    ->color(fn (bool $state): string => $state ? 'success' : 'warning'),
                            ]),

                        TextEntry::make('message')
                            ->columnSpanFull(),
                    ]),

                Section::make('Contact & Meta')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('email')
                                    ->default('Not provided')
                                    ->copyable(),

                                TextEntry::make('url')
                                    ->label('Page URL')
                                    ->copyable()
                                    ->url(fn ($record) => $record->url, true),

                                TextEntry::make('ip_address')
                                    ->label('IP Address')
                                    ->default('N/A'),

                                TextEntry::make('created_at')
                                    ->label('Submitted At')
                                    ->dateTime('M j, Y g:i A'),
                            ]),

                        TextEntry::make('user_agent')
                            ->label('Browser')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),
            ]);
    }
}
