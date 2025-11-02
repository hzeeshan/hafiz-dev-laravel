<?php

namespace App\Filament\Widgets;

use App\Jobs\GenerateBlogPostJob;
use App\Models\BlogTopic;
use Filament\Actions\Action;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PendingTopicsWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                BlogTopic::query()
                    ->where('status', 'pending')
                    ->orderBy('priority', 'desc')
                    ->orderBy('created_at', 'asc')
                    ->limit(5)
            )
            ->heading('💡 Pending Topics Ready to Generate')
            ->description('Topics waiting to be generated into blog posts')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(50)
                    ->weight('bold')
                    ->placeholder('(AI will generate title)')
                    ->description(fn (BlogTopic $record): string =>
                        $record->isRemixMode()
                            ? "🎭 {$record->remix_style} • {$record->getSourceTypeLabel()}"
                            : ''
                    ),

                Tables\Columns\TextColumn::make('content_type')
                    ->label('Type')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match($state) {
                        'technical' => '💻 Technical',
                        'opinion' => '💭 Opinion',
                        'news' => '📰 News',
                        default => $state,
                    })
                    ->color(fn ($state) => match($state) {
                        'technical' => 'info',
                        'opinion' => 'warning',
                        'news' => 'success',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Added')
                    ->since()
                    ->sortable()
                    ->color('gray'),
            ])
            ->actions([
                Action::make('generate_now')
                    ->label('Generate')
                    ->icon('heroicon-o-sparkles')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Generate Blog Post')
                    ->modalDescription(fn (BlogTopic $record): string =>
                        "Generate a blog post from: \"{$record->title}\"?"
                    )
                    ->action(function (BlogTopic $record) {
                        // Dispatch the generation job
                        GenerateBlogPostJob::dispatch($record);

                        // Update topic status
                        $record->update(['status' => 'generating']);

                        $this->dispatch('refresh');
                    })
                    ->successNotificationTitle('Post generation started!')
                    ->successNotification(
                        fn () => \Filament\Notifications\Notification::make()
                            ->success()
                            ->title('Generation Started')
                            ->body('Your post is being generated. You\'ll receive a notification when it\'s ready.')
                            ->send()
                    ),

                Action::make('edit')
                    ->icon('heroicon-o-pencil')
                    ->url(fn (BlogTopic $record): string =>
                        route('filament.admin.resources.blog-topics.edit', $record)
                    )
                    ->openUrlInNewTab(false),
            ])
            ->emptyStateHeading('No pending topics')
            ->emptyStateDescription('Create a blog topic to see it here')
            ->emptyStateIcon('heroicon-o-light-bulb')
            ->emptyStateActions([
                Action::make('create_topic')
                    ->label('Create Blog Topic')
                    ->url(route('filament.admin.resources.blog-topics.create'))
                    ->icon('heroicon-o-plus')
                    ->color('primary'),
            ])
            ->striped()
            ->paginated(false);
    }
}
