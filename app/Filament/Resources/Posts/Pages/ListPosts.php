<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use App\Models\Post;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('exportCsv')
                ->label('Export CSV')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('gray')
                ->action(fn () => $this->exportToCsv()),

            CreateAction::make(),
        ];
    }

    protected function exportToCsv(): StreamedResponse
    {
        $filename = 'posts-' . now()->format('Y-m-d') . '.csv';

        return response()->streamDownload(function () {
            $handle = fopen('php://output', 'w');

            // CSV headers
            fputcsv($handle, [
                'Title',
                'Slug',
                'Published Date',
                'Views',
                'Dev.to',
                'Tags',
            ]);

            // Get only published posts with publications
            $posts = Post::with('publications')
                ->where('status', 'published')
                ->get();

            foreach ($posts as $post) {
                $devtoPublished = $post->publications
                    ->where('platform', 'devto')
                    ->where('status', 'published')
                    ->isNotEmpty() ? 'Yes' : 'No';

                $tags = is_array($post->tags) ? implode(', ', $post->tags) : '';

                fputcsv($handle, [
                    $post->title,
                    $post->slug,
                    $post->published_at?->format('Y-m-d'),
                    $post->views ?? 0,
                    $devtoPublished,
                    $tags,
                ]);
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }
}
