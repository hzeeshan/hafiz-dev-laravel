<?php

namespace App\Filament\Resources\DiscoveredLeads\Pages;

use App\Filament\Resources\DiscoveredLeads\DiscoveredLeadResource;
use App\Services\LeadFinder\LeadScorer;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewDiscoveredLead extends ViewRecord
{
    protected static string $resource = DiscoveredLeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('open_url')
                ->label('Open Post')
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->color('primary')
                ->url(fn () => $this->record->url, true),

            Action::make('mark_contacted')
                ->label('Mark Contacted')
                ->icon('heroicon-o-paper-airplane')
                ->color('warning')
                ->hidden(fn () => $this->record->status !== 'new')
                ->form([
                    Textarea::make('notes')
                        ->label('Notes (optional)')
                        ->placeholder('Add notes about your outreach...'),
                ])
                ->action(function (array $data) {
                    $this->record->markAsContacted($data['notes'] ?? null);

                    Notification::make()
                        ->success()
                        ->title('Status Updated')
                        ->body('Lead marked as contacted.')
                        ->send();

                    $this->refreshFormData(['status', 'notes']);
                }),

            Action::make('mark_converted')
                ->label('Mark Converted 🎉')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->hidden(fn () => $this->record->status === 'converted' || $this->record->status === 'skipped')
                ->requiresConfirmation()
                ->modalHeading('Mark as Converted')
                ->modalDescription('Congratulations! This lead became a paying client.')
                ->form([
                    Textarea::make('notes')
                        ->label('Conversion Notes')
                        ->placeholder('Details about the deal, project scope, etc.'),
                ])
                ->action(function (array $data) {
                    $this->record->markAsConverted($data['notes'] ?? null);

                    Notification::make()
                        ->success()
                        ->title('🎉 Lead Converted!')
                        ->body('Congratulations on the new client!')
                        ->send();

                    $this->refreshFormData(['status', 'notes']);
                }),

            Action::make('mark_skipped')
                ->label('Skip')
                ->icon('heroicon-o-x-circle')
                ->color('gray')
                ->hidden(fn () => $this->record->status === 'converted' || $this->record->status === 'skipped')
                ->form([
                    Textarea::make('notes')
                        ->label('Reason (optional)')
                        ->placeholder('Why are you skipping this lead?'),
                ])
                ->action(function (array $data) {
                    $this->record->markAsSkipped($data['notes'] ?? null);

                    Notification::make()
                        ->info()
                        ->title('Lead Skipped')
                        ->body('Lead has been skipped.')
                        ->send();

                    $this->refreshFormData(['status', 'notes']);
                }),

            DeleteAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [];
    }

    public function getSubheading(): ?string
    {
        $suggestedApproach = LeadScorer::generateSuggestedApproach([
            'title' => $this->record->title,
            'body' => $this->record->body,
            'subreddit' => $this->record->subreddit,
        ]);

        return "💡 {$suggestedApproach}";
    }
}
