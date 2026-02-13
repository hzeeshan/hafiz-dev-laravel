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
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
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

    public string $activeLocale = 'en';

    public function mount(): void
    {
        $this->loadLocaleData('en');
    }

    public function switchLocale(string $locale): void
    {
        $this->activeLocale = $locale;
        $this->loadLocaleData($locale);
    }

    private function loadLocaleData(string $locale): void
    {
        $record = ToolCtaSetting::where('locale', $locale)->first();

        if ($record) {
            $this->form->fill($record->toArray());
        } else {
            $this->form->fill($this->getDefaults($locale));
        }
    }

    private function getDefaults(string $locale): array
    {
        if ($locale === 'it') {
            return [
                'heading' => 'Hai bisogno di uno strumento personalizzato?',
                'description' => 'Sviluppo MVP e applicazioni web su misura in 7 giorni. Dall\'idea alla produzione — veloce, affidabile e scalabile. 9+ anni di esperienza full-stack.',
                'button_text' => 'Prenota una Chiamata Gratuita',
                'button_url' => '/#contact',
                'is_active' => true,
            ];
        }

        return [
            'heading' => 'Need a custom tool or web app?',
            'description' => 'I build MVPs and custom web applications in 7 days. From idea to production — fast, reliable, and scalable. 9+ years of full-stack experience.',
            'button_text' => 'Book a Free Call',
            'button_url' => '/#contact',
            'is_active' => true,
        ];
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Section::make('CTA Configuration')
                    ->description('This CTA appears on all tool pages for the selected language.')
                    ->schema([
                        TextInput::make('heading')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->required()
                            ->rows(3),

                        TextInput::make('button_text')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('button_url')
                            ->required()
                            ->maxLength(255),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->helperText('When disabled, the CTA will not appear on tool pages for this language.'),
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

        ToolCtaSetting::updateOrCreate(
            ['locale' => $this->activeLocale],
            $data
        );

        ToolCtaSetting::clearCache();

        Notification::make()
            ->title('CTA settings saved for ' . strtoupper($this->activeLocale))
            ->success()
            ->send();
    }
}
