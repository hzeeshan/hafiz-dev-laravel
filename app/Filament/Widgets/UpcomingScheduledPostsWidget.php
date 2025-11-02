<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Actions\Action;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UpcomingScheduledPostsWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Post::query()
                    ->where('status', 'scheduled')
                    ->whereNotNull('published_at')
                    ->where('published_at', '>', now())
                    ->orderBy('published_at', 'asc')
                    ->limit(5)
            )
            ->heading('📅 Upcoming Scheduled Posts')
            ->description('Next 5 posts scheduled for publication')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->weight('bold')
                    ->url(fn (Post $record): string => route('filament.admin.resources.posts.edit', $record))
                    ->openUrlInNewTab(false),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Publish Date')
                    ->dateTime('M j, Y - g:i A')
                    ->sortable()
                    ->badge()
                    ->color(fn (Post $record): string =>
                        $record->published_at->diffInDays(now()) <= 1 ? 'warning' : 'success'
                    )
                    ->description(fn (Post $record): string =>
                        $record->published_at->diffForHumans()
                    ),

                Tables\Columns\IconColumn::make('auto_generated')
                    ->label('AI')
                    ->boolean()
                    ->trueIcon('heroicon-o-sparkles')
                    ->falseIcon('heroicon-o-pencil')
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->tooltip(fn (Post $record): string =>
                        $record->auto_generated ? 'AI Generated' : 'Manually Written'
                    ),

                Tables\Columns\TextColumn::make('tags')
                    ->badge()
                    ->separator(',')
                    ->limit(2)
                    ->color('info'),

                Tables\Columns\TextColumn::make('reading_time')
                    ->label('Read Time')
                    ->formatStateUsing(fn ($state) => "{$state} min")
                    ->alignCenter(),
            ])
            ->actions([
                Action::make('edit')
                    ->icon('heroicon-o-pencil')
                    ->url(fn (Post $record): string => route('filament.admin.resources.posts.edit', $record))
                    ->openUrlInNewTab(false),

                Action::make('publish_now')
                    ->icon('heroicon-o-rocket-launch')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (Post $record) {
                        $record->update([
                            'status' => 'published',
                            'published_at' => now(),
                        ]);

                        $this->dispatch('refresh');
                    })
                    ->successNotificationTitle('Post published successfully!'),

                Action::make('preview')
                    ->icon('heroicon-o-eye')
                    ->url(fn (Post $record): string => route('blog.show', $record->slug))
                    ->openUrlInNewTab(),
            ])
            ->emptyStateHeading('No scheduled posts')
            ->emptyStateDescription('Schedule a post to see it here')
            ->emptyStateIcon('heroicon-o-calendar')
            ->striped()
            ->paginated(false);
    }
}
