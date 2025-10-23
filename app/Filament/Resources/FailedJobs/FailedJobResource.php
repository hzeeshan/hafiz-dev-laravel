<?php

namespace App\Filament\Resources\FailedJobs;

use App\Filament\Resources\FailedJobs\Pages\ListFailedJobs;
use App\Filament\Resources\FailedJobs\Pages\ViewFailedJob;
use App\Filament\Resources\FailedJobs\Schemas\FailedJobInfolist;
use App\Filament\Resources\FailedJobs\Tables\FailedJobsTable;
use App\Models\FailedJob;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FailedJobResource extends Resource
{
    protected static ?string $model = FailedJob::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedExclamationTriangle;

    protected static string|UnitEnum|null $navigationGroup = 'Queue';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Failed Jobs';

    protected static ?string $modelLabel = 'Failed Job';

    protected static ?string $pluralModelLabel = 'Failed Jobs';

    public static function infolist(Schema $schema): Schema
    {
        return FailedJobInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FailedJobsTable::configure($table);
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
            'index' => ListFailedJobs::route('/'),
            'view' => ViewFailedJob::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false; // Can't manually create failed jobs
    }

    public static function canEdit(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return false; // Can't edit failed jobs, only view/retry/delete
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count() > 0 ? (string) static::getModel()::count() : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $count = static::getModel()::count();

        if ($count === 0) {
            return null;
        }

        if ($count >= 5) {
            return 'danger';
        }

        if ($count >= 2) {
            return 'warning';
        }

        return 'gray';
    }
}
