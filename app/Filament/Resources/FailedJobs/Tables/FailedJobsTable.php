<?php

namespace App\Filament\Resources\FailedJobs\Tables;

use App\Models\BlogTopic;
use App\Models\FailedJob;
use App\Services\NotificationService;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Notifications\Notification;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;

class FailedJobsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('job_class')
                    ->label('Job')
                    ->getStateUsing(fn (FailedJob $record) => $record->getJobClass())
                    ->badge()
                    ->color(fn (FailedJob $record) => match (true) {
                        $record->isBlogGenerationJob() => 'info',
                        $record->isPublishingJob() => 'warning',
                        default => 'gray',
                    })
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('payload', 'like', "%{$search}%");
                    })
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query; // Can't sort on computed column easily
                    }),

                TextColumn::make('related_resource')
                    ->label('Related')
                    ->getStateUsing(function (FailedJob $record) {
                        $topic = $record->blogTopic();
                        if ($topic) {
                            return new HtmlString(
                                '<a href="/admin/blog-topics/' . $topic->id . '/edit" class="text-primary-600 hover:underline font-medium">' .
                                e($topic->title) .
                                '</a>'
                            );
                        }
                        return '-';
                    })
                    ->html()
                    ->limit(40),

                TextColumn::make('queue')
                    ->badge()
                    ->color('gray')
                    ->toggleable(),

                TextColumn::make('exception_preview')
                    ->label('Exception')
                    ->getStateUsing(fn (FailedJob $record) => $record->getExceptionPreview(100))
                    ->limit(80)
                    ->tooltip(fn (FailedJob $record) => $record->getExceptionPreview(300))
                    ->wrap()
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('exception', 'like', "%{$search}%");
                    }),

                TextColumn::make('failed_at')
                    ->dateTime()
                    ->since()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('uuid')
                    ->label('UUID')
                    ->copyable()
                    ->copyMessage('UUID copied!')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->limit(20),
            ])
            ->filters([
                SelectFilter::make('job_type')
                    ->label('Job Type')
                    ->options([
                        'blog_generation' => 'Blog Generation',
                        'devto_publishing' => 'Dev.to Publishing',
                        'hashnode_publishing' => 'Hashnode Publishing',
                        'other' => 'Other Jobs',
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        if (empty($data['value'])) {
                            return $query;
                        }

                        return $query->where(function ($query) use ($data) {
                            $records = FailedJob::all();

                            $filtered = $records->filter(function ($record) use ($data) {
                                return match ($data['value']) {
                                    'blog_generation' => $record->isBlogGenerationJob(),
                                    'devto_publishing' => str_contains($record->getJobClass(), 'PublishToDevTo'),
                                    'hashnode_publishing' => str_contains($record->getJobClass(), 'PublishToHashnode'),
                                    'other' => !$record->isBlogGenerationJob() && !$record->isPublishingJob(),
                                    default => true,
                                };
                            });

                            $query->whereIn('id', $filtered->pluck('id')->toArray());
                        });
                    }),

                Filter::make('failed_today')
                    ->label('Failed Today')
                    ->query(fn (Builder $query): Builder => $query->whereDate('failed_at', today())),

                Filter::make('failed_this_week')
                    ->label('Failed This Week')
                    ->query(fn (Builder $query): Builder => $query->where('failed_at', '>=', now()->startOfWeek())),

                Filter::make('failed_this_month')
                    ->label('Failed This Month')
                    ->query(fn (Builder $query): Builder => $query->where('failed_at', '>=', now()->startOfMonth())),

                TernaryFilter::make('has_related_topic')
                    ->label('Has Related BlogTopic')
                    ->placeholder('All jobs')
                    ->trueLabel('With BlogTopic')
                    ->falseLabel('Without BlogTopic')
                    ->queries(
                        true: function (Builder $query) {
                            $records = FailedJob::all();
                            $withTopic = $records->filter(fn($r) => $r->getBlogTopicId() !== null);
                            return $query->whereIn('id', $withTopic->pluck('id')->toArray());
                        },
                        false: function (Builder $query) {
                            $records = FailedJob::all();
                            $withoutTopic = $records->filter(fn($r) => $r->getBlogTopicId() === null);
                            return $query->whereIn('id', $withoutTopic->pluck('id')->toArray());
                        },
                    ),
            ])
            ->recordActions([
                Action::make('view')
                    ->label('View')
                    ->icon('heroicon-o-eye')
                    ->url(fn (FailedJob $record): string => route('filament.admin.resources.failed-jobs.view', ['record' => $record])),

                Action::make('retry')
                    ->label('Retry')
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
                                ->body('The job has been re-queued successfully.')
                                ->success()
                                ->send();
                        } catch (\Exception $e) {
                            Notification::make()
                                ->title('Retry Failed')
                                ->body('Failed to retry job: ' . $e->getMessage())
                                ->danger()
                                ->send();
                        }
                    }),

                DeleteAction::make()
                    ->label('Delete')
                    ->requiresConfirmation()
                    ->modalHeading('Delete Failed Job')
                    ->modalDescription('Are you sure you want to delete this failed job? This action cannot be undone.')
                    ->successNotification(
                        Notification::make()
                            ->title('Failed job deleted')
                            ->success()
                    ),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    Action::make('retry_selected')
                        ->label('Retry Selected')
                        ->icon('heroicon-o-arrow-path')
                        ->color('warning')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            $count = 0;
                            $notificationService = app(NotificationService::class);

                            foreach ($records as $record) {
                                try {
                                    $record->retry();

                                    // Update BlogTopic status if applicable
                                    $topic = $record->blogTopic();
                                    if ($topic && $topic->isFailed()) {
                                        $topic->update(['status' => 'pending']);
                                    }

                                    $count++;
                                } catch (\Exception $e) {
                                    // Continue with next job
                                }
                            }

                            Notification::make()
                                ->title('Jobs Retried')
                                ->body("Successfully retried {$count} job(s).")
                                ->success()
                                ->send();
                        }),

                    DeleteBulkAction::make()
                        ->label('Delete Selected')
                        ->requiresConfirmation()
                        ->successNotification(
                            Notification::make()
                                ->title('Failed jobs deleted')
                                ->success()
                        ),
                ]),
            ])
            ->headerActions([
                Action::make('retry_all')
                    ->label('Retry All Failed Jobs')
                    ->icon('heroicon-o-arrow-path')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->modalHeading('Retry All Failed Jobs')
                    ->modalDescription('Are you sure you want to retry ALL failed jobs? This will re-queue all jobs in the failed_jobs table.')
                    ->action(function () {
                        try {
                            // Update all failed BlogTopics to pending
                            BlogTopic::where('status', 'failed')->update(['status' => 'pending']);

                            // Retry all failed jobs
                            FailedJob::retryAll();

                            Notification::make()
                                ->title('All Jobs Retried')
                                ->body('All failed jobs have been re-queued successfully.')
                                ->success()
                                ->send();
                        } catch (\Exception $e) {
                            Notification::make()
                                ->title('Retry Failed')
                                ->body('Failed to retry jobs: ' . $e->getMessage())
                                ->danger()
                                ->send();
                        }
                    }),

                Action::make('delete_all')
                    ->label('Delete All Failed Jobs')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Delete All Failed Jobs')
                    ->modalDescription('Are you sure you want to delete ALL failed jobs? This action cannot be undone.')
                    ->action(function () {
                        $count = FailedJob::count();
                        FailedJob::truncate();

                        Notification::make()
                            ->title('All Failed Jobs Deleted')
                            ->body("Deleted {$count} failed job(s).")
                            ->success()
                            ->send();
                    }),
            ])
            ->defaultSort('failed_at', 'desc')
            ->poll('10s') // Auto-refresh every 10 seconds
            ->emptyStateHeading('No Failed Jobs')
            ->emptyStateDescription('Great! All jobs are running successfully.')
            ->emptyStateIcon('heroicon-o-check-circle');
    }
}
