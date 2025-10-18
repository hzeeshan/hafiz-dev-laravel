<?php

namespace App\Filament\Resources\PostPublications;

use App\Filament\Resources\PostPublications\Pages\CreatePostPublication;
use App\Filament\Resources\PostPublications\Pages\EditPostPublication;
use App\Filament\Resources\PostPublications\Pages\ListPostPublications;
use App\Filament\Resources\PostPublications\Schemas\PostPublicationForm;
use App\Filament\Resources\PostPublications\Tables\PostPublicationsTable;
use App\Models\PostPublication;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PostPublicationResource extends Resource
{
    protected static ?string $model = PostPublication::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $navigationLabel = 'Cross-Posted Articles';

    protected static ?string $modelLabel = 'Publication';

    protected static ?string $pluralModelLabel = 'Publications';

    protected static UnitEnum|string|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return PostPublicationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostPublicationsTable::configure($table);
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
            'index' => ListPostPublications::route('/'),
            // Remove create/edit pages - this is read-only
        ];
    }

    public static function canCreate(): bool
    {
        return false; // Publications are created automatically by jobs
    }
}
