<?php

namespace App\Filament\Widgets;

use App\Models\FailedJob;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class FailedJobsAlertsWidget extends BaseWidget
{
    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                FailedJob::query()
                    ->orderBy('failed_at', 'desc')
                    ->limit(5)
            )
            ->heading('🚨 Failed Jobs & Alerts')
            ->description('Recent failed jobs that need attention')
            ->columns([
                Tables\Columns\TextColumn::make('job_type')
                    ->label('Job Type')
                    ->state(fn (FailedJob $record): string => $record->getJobTypeLabel())
                    ->badge()
                    ->color(fn (FailedJob $record): string => match(true) {
                        $record->isBlogGenerationJob() => 'danger',
                        $record->isPublishingJob() => 'warning',
                        default => 'gray',
                    })
                    ->icon(fn (FailedJob $record): string => match(true) {
                        $record->isBlogGenerationJob() => 'heroicon-o-sparkles',
                        $record->isPublishingJob() => 'heroicon-o-paper-airplane',
                        default => 'heroicon-o-exclamation-circle',
                    }),

                Tables\Columns\TextColumn::make('blog_topic')
                    ->label('Related Topic')
                    ->state(function (FailedJob $record): string {
                        $topic = $record->blogTopic();
                        if (!$topic) {
                            return 'N/A';
                        }
                        return $topic->title ?: '(Untitled)';
                    })
                    ->limit(40)
                    ->tooltip(function (FailedJob $record): ?string {
                        $topic = $record->blogTopic();
                        return $topic?->title;
                    })
                    ->url(function (FailedJob $record): ?string {
                        $topic = $record->blogTopic();
                        if (!$topic) {
                            return null;
                        }
                        return route('filament.admin.resources.blog-topics.edit', $topic);
                    })
                    ->openUrlInNewTab(false)
                    ->placeholder('N/A'),

                Tables\Columns\TextColumn::make('exception_preview')
                    ->label('Error Message')
                    ->state(fn (FailedJob $record): string => $record->getExceptionPreview(100))
                    ->limit(100)
                    ->tooltip(fn (FailedJob $record): string => $record->getExceptionPreview(500))
                    ->color('danger')
                    ->wrap(),

                Tables\Columns\TextColumn::make('failed_at')
                    ->label('Failed')
                    ->dateTime('M j, g:i A')
                    ->description(fn (FailedJob $record): string => $record->failed_at->diffForHumans())
                    ->sortable()
                    ->color('gray'),
            ])
            ->actions([
                Action::make('retry')
                    ->label('Retry')
                    ->icon('heroicon-o-arrow-path')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->modalHeading('Retry Failed Job')
                    ->modalDescription('Are you sure you want to retry this job?')
                    ->action(function (FailedJob $record) {
                        $record->retry();
                        $this->dispatch('refresh');
                    })
                    ->successNotificationTitle('Job queued for retry'),

                Action::make('view')
                    ->label('Details')
                    ->icon('heroicon-o-eye')
                    ->url(fn (FailedJob $record): string =>
                        route('filament.admin.resources.failed-jobs.view', $record)
                    )
                    ->openUrlInNewTab(false),

                Action::make('delete')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (FailedJob $record) {
                        $record->delete();
                        $this->dispatch('refresh');
                    })
                    ->successNotificationTitle('Failed job deleted'),
            ])
            ->bulkActions([
                BulkAction::make('retry_selected')
                    ->label('Retry Selected')
                    ->icon('heroicon-o-arrow-path')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->action(function ($records) {
                        foreach ($records as $record) {
                            $record->retry();
                        }
                        $this->dispatch('refresh');
                    })
                    ->successNotificationTitle('Selected jobs queued for retry')
                    ->deselectRecordsAfterCompletion(),
            ])
            ->emptyStateHeading('No failed jobs')
            ->emptyStateDescription('All systems operational! 🎉')
            ->emptyStateIcon('heroicon-o-check-circle')
            ->striped()
            ->paginated(false);
    }
}
