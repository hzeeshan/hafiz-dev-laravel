<?php

namespace App\Filament\Resources\BlogTopics\Tables;

use App\Jobs\GenerateBlogPostJob;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BlogTopicsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'gray',
                        'generating' => 'warning',
                        'review' => 'info',
                        'approved' => 'success',
                        'published' => 'success',
                        'skipped' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('generation_mode')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'topic' => 'primary',
                        'context_youtube' => 'danger',
                        'context_blog' => 'success',
                        'context_twitter' => 'info',
                        'manual' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'topic' => 'Topic',
                        'context_youtube' => 'YouTube',
                        'context_blog' => 'Blog',
                        'context_twitter' => 'Twitter',
                        'manual' => 'Manual',
                        default => $state,
                    })
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('content_type')
                    ->badge(),



                TextColumn::make('category')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('priority')
                    ->badge()
                    ->color(fn(int $state): string => match (true) {
                        $state >= 8 => 'danger',
                        $state >= 6 => 'warning',
                        $state >= 4 => 'info',
                        default => 'gray',
                    })
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('scheduled_for')
                    ->dateTime('M j, Y g:i A')
                    ->sortable()
                    ->placeholder('Not scheduled')
                    ->toggleable(),

                IconColumn::make('post_generated')
                    ->label('Generated')
                    ->boolean()
                    ->getStateUsing(fn($record) => $record->generated_at !== null)
                    ->toggleable(),

                TextColumn::make('platforms')
                    ->label('Platforms')
                    ->badge()
                    ->getStateUsing(function ($record) {
                        $platforms = [];
                        if ($record->publish_to_devto) $platforms[] = 'Dev.to';
                        if ($record->publish_to_hashnode) $platforms[] = 'Hashnode';
                        if ($record->publish_to_linkedin) $platforms[] = 'LinkedIn';
                        if ($record->publish_to_medium) $platforms[] = 'Medium';
                        return $platforms;
                    })
                    ->toggleable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'generating' => 'Generating',
                        'review' => 'Review',
                        'approved' => 'Approved',
                        'published' => 'Published',
                        'skipped' => 'Skipped',
                    ])
                    ->multiple(),

                SelectFilter::make('generation_mode')
                    ->label('Mode')
                    ->options([
                        'topic' => 'Topic-Based',
                        'context_youtube' => 'YouTube',
                        'context_blog' => 'Blog Remix',
                        'context_twitter' => 'Twitter',
                        'manual' => 'Manual',
                    ])
                    ->multiple(),

                SelectFilter::make('priority')
                    ->options([
                        'high' => 'High (8-10)',
                        'medium' => 'Medium (4-7)',
                        'low' => 'Low (1-3)',
                    ])
                    ->query(function ($query, $data) {
                        return $query->when(
                            $data['value'] === 'high',
                            fn($query) => $query->where('priority', '>=', 8)
                        )->when(
                            $data['value'] === 'medium',
                            fn($query) => $query->whereBetween('priority', [4, 7])
                        )->when(
                            $data['value'] === 'low',
                            fn($query) => $query->where('priority', '<=', 3)
                        );
                    }),
            ])
            ->recordActions([
                Action::make('generate')
                    ->label('Generate Now')
                    ->icon('heroicon-o-sparkles')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Generate Blog Post')
                    ->modalDescription(fn($record) => "This will generate a blog post for: {$record->title}")
                    ->modalSubmitActionLabel('Generate')
                    ->visible(fn($record) => in_array($record->status, ['pending', 'skipped']))
                    ->action(function ($record) {
                        // Dispatch the job
                        GenerateBlogPostJob::dispatch($record);

                        Notification::make()
                            ->title('Blog generation started')
                            ->body('The blog post is being generated in the background. You\'ll be notified when it\'s ready for review.')
                            ->success()
                            ->send();
                    }),

                Action::make('viewPost')
                    ->label('View Post')
                    ->icon('heroicon-o-eye')
                    ->color('primary')
                    ->visible(fn($record) => $record->post !== null)
                    ->url(fn($record) => route('filament.admin.resources.posts.edit', ['record' => $record->post->id])),

                EditAction::make(),

                Action::make('viewLogs')
                    ->label('View Logs')
                    ->icon('heroicon-o-document-text')
                    ->color('gray')
                    ->url(
                        fn($record) => $record->generationLogs()->exists()
                            ? route('filament.admin.resources.blog-generation-logs.view', [
                                'record' => $record->generationLogs()->latest()->first()->id
                            ])
                            : null
                    )
                    ->visible(fn($record) => $record->generationLogs()->exists()),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
