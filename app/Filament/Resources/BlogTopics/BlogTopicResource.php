<?php

namespace App\Filament\Resources\BlogTopics;

use App\Filament\Resources\BlogTopics\Pages\CreateBlogTopic;
use App\Filament\Resources\BlogTopics\Pages\EditBlogTopic;
use App\Filament\Resources\BlogTopics\Pages\ListBlogTopics;
use App\Filament\Resources\BlogTopics\Schemas\BlogTopicForm;
use App\Filament\Resources\BlogTopics\Tables\BlogTopicsTable;
use App\Models\BlogTopic;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BlogTopicResource extends Resource
{
    protected static ?string $model = BlogTopic::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedLightBulb;

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Blog Topics';

    protected static ?string $modelLabel = 'Blog Topic';

    protected static ?string $pluralModelLabel = 'Blog Topics';

    public static function form(Schema $schema): Schema
    {
        return BlogTopicForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BlogTopicsTable::configure($table);
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
            'index' => ListBlogTopics::route('/'),
            'create' => CreateBlogTopic::route('/create'),
            'edit' => EditBlogTopic::route('/{record}/edit'),
        ];
    }
}
