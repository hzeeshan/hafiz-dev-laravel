<?php

namespace App\Filament\Resources\ToolFeedbacks;

use App\Filament\Resources\ToolFeedbacks\Pages\ListToolFeedbacks;
use App\Filament\Resources\ToolFeedbacks\Pages\ViewToolFeedback;
use App\Filament\Resources\ToolFeedbacks\Schemas\ToolFeedbackInfolist;
use App\Filament\Resources\ToolFeedbacks\Tables\ToolFeedbacksTable;
use App\Models\ToolFeedback;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ToolFeedbackResource extends Resource
{
    protected static ?string $model = ToolFeedback::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static string|UnitEnum|null $navigationGroup = 'Site';

    protected static ?string $navigationLabel = 'Tool Feedback';

    protected static ?string $modelLabel = 'Feedback';

    protected static ?int $navigationSort = 15;

    public static function infolist(Schema $schema): Schema
    {
        return ToolFeedbackInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ToolFeedbacksTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListToolFeedbacks::route('/'),
            'view' => ViewToolFeedback::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::where('is_resolved', false)->count();

        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }
}
