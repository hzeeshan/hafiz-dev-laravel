<?php

namespace App\Filament\Resources\Tools\Pages;

use App\Filament\Resources\Tools\ToolResource;
use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListTools extends ListRecords
{
    protected static string $resource = ToolResource::class;

    protected function getHeaderActions(): array
    {
        $currentMode = Setting::getToolsOrderBy();
        $isManual = $currentMode === 'manual';

        return [
            Action::make('toggleOrdering')
                ->label($isManual ? 'Switch to Popularity Order' : 'Switch to Manual Order')
                ->icon($isManual ? 'heroicon-o-fire' : 'heroicon-o-bars-3')
                ->color($isManual ? 'warning' : 'primary')
                ->requiresConfirmation()
                ->modalHeading('Change Tools Ordering')
                ->modalDescription(
                    $isManual
                        ? 'Tools will be ordered by view count (most popular first) on the public page.'
                        : 'Tools will be ordered by the position field (manual order) on the public page.'
                )
                ->action(function () use ($isManual) {
                    Setting::setToolsOrderBy($isManual ? 'popularity' : 'manual');

                    Notification::make()
                        ->title('Ordering mode updated')
                        ->body($isManual ? 'Tools will now be sorted by popularity.' : 'Tools will now be sorted by manual position.')
                        ->success()
                        ->send();

                    $this->redirect(static::getUrl());
                }),

            CreateAction::make(),
        ];
    }

    public function getSubheading(): ?string
    {
        $mode = Setting::getToolsOrderBy();

        return $mode === 'manual'
            ? 'Ordering: Manual (drag to reorder)'
            : 'Ordering: By Popularity (view count)';
    }
}
