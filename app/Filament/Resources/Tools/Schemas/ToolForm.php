<?php

namespace App\Filament\Resources\Tools\Schemas;

use App\Models\Tool;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ToolForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Tool Information')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('JSON Formatter & Validator'),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(100)
                            ->unique(ignoreRecord: true)
                            ->placeholder('json-formatter')
                            ->helperText('URL slug - must match route (e.g., json-formatter)'),

                        TextInput::make('description')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Format, validate, and minify JSON instantly'),

                        TextInput::make('icon')
                            ->maxLength(50)
                            ->placeholder('{ }')
                            ->helperText('Emoji or text icon displayed on card'),

                        Select::make('category')
                            ->options(Tool::categories())
                            ->required()
                            ->searchable(),

                        Select::make('related_tools')
                            ->label('Related Tools')
                            ->multiple()
                            ->options(fn (?Tool $record) => Tool::query()
                                ->where('is_active', true)
                                ->when($record, fn ($q) => $q->where('id', '!=', $record->id))
                                ->ordered()
                                ->pluck('name', 'slug'))
                            ->searchable()
                            ->helperText('Select related tools to show on this tool\'s page. Falls back to same-category tools if empty.'),

                        TextInput::make('position')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first'),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Inactive tools are hidden from the public page'),
                    ])
                    ->columns(2),
            ]);
    }
}
