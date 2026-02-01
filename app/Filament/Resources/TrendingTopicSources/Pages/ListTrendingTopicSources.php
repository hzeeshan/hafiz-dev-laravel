<?php

namespace App\Filament\Resources\TrendingTopicSources\Pages;

use App\Filament\Resources\TrendingTopicSources\TrendingTopicSourceResource;
use App\Models\TrendingTopicSource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\ListRecords;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ListTrendingTopicSources extends ListRecords
{
    protected static string $resource = TrendingTopicSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('exportCsv')
                ->label('Export CSV')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('gray')
                ->form([
                    Select::make('date_range')
                        ->label('Date Range')
                        ->options([
                            '7' => 'Last 7 days',
                            '30' => 'Last 30 days',
                            '90' => 'Last 90 days',
                            'all' => 'All time',
                        ])
                        ->default('all')
                        ->required(),

                    Select::make('source')
                        ->label('Source')
                        ->options([
                            'all' => 'All sources',
                            'reddit' => 'Reddit',
                            'hackernews' => 'Hacker News',
                            'google_trends' => 'Google Trends',
                        ])
                        ->default('all'),

                    Select::make('converted')
                        ->label('Conversion Status')
                        ->options([
                            'all' => 'All topics',
                            'converted' => 'Converted only',
                            'not_converted' => 'Not converted only',
                        ])
                        ->default('all'),
                ])
                ->action(fn (array $data) => $this->exportToCsv($data)),

            CreateAction::make(),
        ];
    }

    protected function exportToCsv(array $filters): StreamedResponse
    {
        $filename = 'trending-topics-' . now()->format('Y-m-d') . '.csv';

        return response()->streamDownload(function () use ($filters) {
            $handle = fopen('php://output', 'w');

            // CSV headers
            fputcsv($handle, [
                'Title',
                'Score',
                'Source',
                'Votes',
                'Comments',
                'Keywords',
                'Discovered Date',
                'Converted',
                'URL',
            ]);

            // Build query with filters
            $query = TrendingTopicSource::query()
                ->orderBy('calculated_score', 'desc');

            // Date filter
            if ($filters['date_range'] !== 'all') {
                $days = (int) $filters['date_range'];
                $query->where('discovered_at', '>=', now()->subDays($days));
            }

            // Source filter
            if ($filters['source'] !== 'all') {
                $query->where('source', $filters['source']);
            }

            // Converted filter
            if ($filters['converted'] === 'converted') {
                $query->whereNotNull('blog_topic_id');
            } elseif ($filters['converted'] === 'not_converted') {
                $query->whereNull('blog_topic_id');
            }

            $topics = $query->get();

            foreach ($topics as $topic) {
                $sourceName = match ($topic->source) {
                    'reddit' => 'Reddit',
                    'hackernews' => 'Hacker News',
                    'google_trends' => 'Google Trends',
                    default => $topic->source,
                };

                $keywords = is_array($topic->keywords) ? implode(', ', $topic->keywords) : '';

                fputcsv($handle, [
                    $topic->title,
                    number_format($topic->calculated_score, 1),
                    $sourceName,
                    $topic->upvotes ?? 0,
                    $topic->comments_count ?? 0,
                    $keywords,
                    $topic->discovered_at?->format('Y-m-d'),
                    $topic->isConverted() ? 'Yes' : 'No',
                    $topic->url,
                ]);
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }
}
