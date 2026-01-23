<?php

namespace App\Filament\Resources\ToolViews;

use App\Filament\Resources\ToolViews\Pages\ListToolViews;
use App\Filament\Resources\ToolViews\Tables\ToolViewsTable;
use App\Models\ToolView;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ToolViewResource extends Resource
{
    protected static ?string $model = ToolView::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;

    protected static string|UnitEnum|null $navigationGroup = 'Analytics';

    protected static ?string $navigationLabel = 'Tool Views';

    protected static ?string $modelLabel = 'Tool View';

    protected static ?int $navigationSort = 1;

    public static function table(Table $table): Table
    {
        return ToolViewsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListToolViews::route('/'),
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

    public static function canDelete($record): bool
    {
        return false;
    }
}
