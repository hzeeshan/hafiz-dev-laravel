<?php

namespace App\Filament\Pages;

use App\Models\ToolCtaSetting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ToolCtaSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMegaphone;

    protected static string|UnitEnum|null $navigationGroup = 'Site';

    protected static ?int $navigationSort = 11;

    protected static ?string $navigationLabel = 'Tool CTA';

    protected static ?string $title = 'Tool CTA Settings';

    protected string $view = 'filament.pages.tool-cta-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $record = ToolCtaSetting::first();

        if (! $record) {
            $record = ToolCtaSetting::create([
                'heading' => 'Need a custom tool or web app?',
                'description' => 'I build MVPs and custom web applications in 7 days. From idea to production — fast, reliable, and scalable. 9+ years of full-stack experience.',
                'button_text' => 'Book a Free Call',
                'button_url' => '/contact',
                'is_active' => true,
            ]);
        }

        $this->form->fill($record->toArray());
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Section::make('CTA Configuration')
                    ->description('This CTA appears on all tool pages.')
                    ->schema([
                        TextInput::make('heading')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Need a custom tool or web app?'),

                        Textarea::make('description')
                            ->required()
                            ->rows(3)
                            ->placeholder('I build MVPs and custom web applications...'),

                        TextInput::make('button_text')
                            ->required()
                            ->maxLength(100)
                            ->placeholder('Book a Free Call'),

                        TextInput::make('button_url')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('/contact'),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->helperText('When disabled, the CTA will not appear on any tool page.'),
                    ])
                    ->columns(1),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Changes')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $record = ToolCtaSetting::first();

        if ($record) {
            $record->update($data);
        } else {
            ToolCtaSetting::create($data);
        }

        ToolCtaSetting::clearCache();

        Notification::make()
            ->title('CTA settings saved')
            ->success()
            ->send();
    }
}
