<?php

namespace App\Filament\Resources\FailedJobs\Pages;

use App\Filament\Resources\FailedJobs\FailedJobResource;
use App\Models\FailedJob;
use App\Services\NotificationService;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewFailedJob extends ViewRecord
{
    protected static string $resource = FailedJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('retry')
                ->label('Retry Job')
                ->icon('heroicon-o-arrow-path')
                ->color('warning')
                ->requiresConfirmation()
                ->modalHeading('Retry Failed Job')
                ->modalDescription(fn (FailedJob $record) => 'Are you sure you want to retry ' . $record->getJobClass() . '?')
                ->action(function (FailedJob $record) {
                    try {
                        // Send Telegram notification
                        $notificationService = app(NotificationService::class);
                        $topic = $record->blogTopic();

                        $notificationService->sendJobRetry(
                            $record->getFullJobClass(),
                            $topic
                        );

                        // Retry the job
                        $record->retry();

                        // Update BlogTopic status if applicable
                        if ($topic && $topic->isFailed()) {
                            $topic->update(['status' => 'pending']);
                        }

                        Notification::make()
                            ->title('Job Retried')
                            ->body('The job has been re-queued successfully. Check the queue worker logs.')
                            ->success()
                            ->send();

                        // Redirect to list after retry
                        return redirect()->route('filament.admin.resources.failed-jobs.index');
                    } catch (\Exception $e) {
                        Notification::make()
                            ->title('Retry Failed')
                            ->body('Failed to retry job: ' . $e->getMessage())
                            ->danger()
                            ->send();
                    }
                }),

            Actions\DeleteAction::make()
                ->requiresConfirmation()
                ->modalHeading('Delete Failed Job')
                ->modalDescription('Are you sure you want to delete this failed job? This action cannot be undone.')
                ->successNotificationTitle('Failed job deleted')
                ->successRedirectUrl(route('filament.admin.resources.failed-jobs.index')),
        ];
    }
}
