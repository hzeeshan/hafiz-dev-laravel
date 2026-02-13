<x-filament-panels::page>
    {{-- Language Tabs --}}
    <div class="flex gap-2 mb-4">
        <button
            type="button"
            wire:click="switchLocale('en')"
            @class([
                'px-4 py-2 rounded-lg text-sm font-medium transition-colors',
                'bg-primary-600 text-white' => $activeLocale === 'en',
                'bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700' => $activeLocale !== 'en',
            ])
        >
            English
        </button>
        <button
            type="button"
            wire:click="switchLocale('it')"
            @class([
                'px-4 py-2 rounded-lg text-sm font-medium transition-colors',
                'bg-primary-600 text-white' => $activeLocale === 'it',
                'bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700' => $activeLocale !== 'it',
            ])
        >
            Italiano
        </button>
    </div>

    <form wire:submit="save">
        {{ $this->form }}

        <div class="mt-6">
            <x-filament::button type="submit">
                Save Changes
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>
