<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Add Save button to header for easy access
            $this->getSaveFormAction()
                ->formId('form')
                ->label('Save Changes')
                ->icon('heroicon-o-check-circle'),

            // View Generation Log button (for AI-generated posts)
            Actions\Action::make('viewGenerationLog')
                ->label('View Generation Log')
                ->icon('heroicon-o-document-text')
                ->color('gray')
                ->url(function () {
                    $post = $this->record;

                    // Get the generation log for this post
                    $log = \App\Models\BlogGenerationLog::where('post_id', $post->id)->latest()->first();

                    return $log
                        ? route('filament.admin.resources.blog-generation-logs.view', ['record' => $log->id])
                        : null;
                })
                ->visible(fn () => $this->record->auto_generated && \App\Models\BlogGenerationLog::where('post_id', $this->record->id)->exists()),

            Actions\DeleteAction::make(),
        ];
    }
}
