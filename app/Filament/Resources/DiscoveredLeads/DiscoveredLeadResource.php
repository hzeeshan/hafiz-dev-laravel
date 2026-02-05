<?php

namespace App\Filament\Resources\DiscoveredLeads;

use App\Filament\Resources\DiscoveredLeads\Pages\ListDiscoveredLeads;
use App\Filament\Resources\DiscoveredLeads\Pages\ViewDiscoveredLead;
use App\Filament\Resources\DiscoveredLeads\Schemas\DiscoveredLeadInfolist;
use App\Filament\Resources\DiscoveredLeads\Tables\DiscoveredLeadsTable;
use App\Models\DiscoveredLead;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DiscoveredLeadResource extends Resource
{
    protected static ?string $model = DiscoveredLead::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static ?string $navigationLabel = 'Discovered Leads';

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 4; // After Trending Topics (3)

    public static function form(Schema $schema): Schema
    {
        return $schema->components([]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DiscoveredLeadInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DiscoveredLeadsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDiscoveredLeads::route('/'),
            'view' => ViewDiscoveredLead::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false; // Leads are discovered automatically
    }

    public static function getNavigationBadge(): ?string
    {
        $newCount = static::getModel()::where('status', 'new')->count();

        return $newCount > 0 ? (string) $newCount : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
}
