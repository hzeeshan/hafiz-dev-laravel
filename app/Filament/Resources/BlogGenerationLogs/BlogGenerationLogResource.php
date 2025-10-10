<?php

namespace App\Filament\Resources\BlogGenerationLogs;

use App\Filament\Resources\BlogGenerationLogs\Pages\CreateBlogGenerationLog;
use App\Filament\Resources\BlogGenerationLogs\Pages\EditBlogGenerationLog;
use App\Filament\Resources\BlogGenerationLogs\Pages\ListBlogGenerationLogs;
use App\Filament\Resources\BlogGenerationLogs\Pages\ViewBlogGenerationLog;
use App\Filament\Resources\BlogGenerationLogs\Schemas\BlogGenerationLogForm;
use App\Filament\Resources\BlogGenerationLogs\Schemas\BlogGenerationLogInfolist;
use App\Filament\Resources\BlogGenerationLogs\Tables\BlogGenerationLogsTable;
use App\Models\BlogGenerationLog;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BlogGenerationLogResource extends Resource
{
    protected static ?string $model = BlogGenerationLog::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Generation Logs';

    protected static ?string $modelLabel = 'Generation Log';

    protected static ?int $navigationSort = 2;

    // Hide from navigation - access via BlogTopic
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return BlogGenerationLogForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BlogGenerationLogInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BlogGenerationLogsTable::configure($table);
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
            'index' => ListBlogGenerationLogs::route('/'),
            'view' => ViewBlogGenerationLog::route('/{record}'),
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
}
