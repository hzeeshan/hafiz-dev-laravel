<?php

namespace App\Filament\Resources\TrendingTopicSources;

use App\Filament\Resources\TrendingTopicSources\Pages\CreateTrendingTopicSource;
use App\Filament\Resources\TrendingTopicSources\Pages\EditTrendingTopicSource;
use App\Filament\Resources\TrendingTopicSources\Pages\ListTrendingTopicSources;
use App\Filament\Resources\TrendingTopicSources\Schemas\TrendingTopicSourceForm;
use App\Filament\Resources\TrendingTopicSources\Tables\TrendingTopicSourcesTable;
use App\Models\TrendingTopicSource;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TrendingTopicSourceResource extends Resource
{
    protected static ?string $model = TrendingTopicSource::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Trending Topics';

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return TrendingTopicSourceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TrendingTopicSourcesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTrendingTopicSources::route('/'),
            // Disabled: topics are auto-discovered, not manually created
            // 'create' => CreateTrendingTopicSource::route('/create'),
            // 'edit' => EditTrendingTopicSource::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false; // Topics are discovered automatically
    }
}
