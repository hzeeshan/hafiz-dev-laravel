<?php

namespace App\Filament\Resources\DiscoveredLeads\Pages;

use App\Filament\Resources\DiscoveredLeads\DiscoveredLeadResource;
use App\Models\DiscoveredLead;
use App\Services\LeadFinder\LeadFinderService;
use App\Services\LeadFinder\LeadSourceFactory;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ListDiscoveredLeads extends ListRecords
{
    protected static string $resource = DiscoveredLeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('discoverNow')
                ->label('Discover Now')
                ->icon('heroicon-o-magnifying-glass')
                ->color('primary')
                ->form([
                    Select::make('sources')
                        ->label('Sources')
                        ->options([
                            'all' => 'All Sources',
                            'reddit' => 'Reddit Only',
                            'hackernews' => 'Hacker News Only',
                        ])
                        ->default('all')
                        ->required(),

                    Select::make('notify')
                        ->label('Send Telegram Notifications')
                        ->options([
                            '0' => 'No',
                            '1' => 'Yes (for high-scoring leads)',
                        ])
                        ->default('0'),
                ])
                ->action(function (array $data) {
                    $sources = $data['sources'] === 'all'
                        ? LeadSourceFactory::availableSources()
                        : [$data['sources']];

                    $notify = (bool) $data['notify'];

                    $service = app(LeadFinderService::class);
                    $results = $service->discover($sources, $notify);

                    $discovered = count($results['discovered']);
                    $notified = count($results['notified']);
                    $errors = count($results['errors']);

                    if ($discovered > 0) {
                        Notification::make()
                            ->success()
                            ->title('Discovery Complete')
                            ->body("Found {$discovered} leads".($notified > 0 ? ", notified {$notified}" : '').($errors > 0 ? ", {$errors} errors" : ''))
                            ->send();
                    } else {
                        Notification::make()
                            ->info()
                            ->title('Discovery Complete')
                            ->body('No new leads found.')
                            ->send();
                    }
                }),

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
                        ->default('30')
                        ->required(),

                    Select::make('status')
                        ->label('Status')
                        ->options([
                            'all' => 'All statuses',
                            'new' => 'New only',
                            'contacted' => 'Contacted only',
                            'converted' => 'Converted only',
                        ])
                        ->default('all'),

                    Select::make('source')
                        ->label('Source')
                        ->options([
                            'all' => 'All sources',
                            'reddit' => 'Reddit',
                            'hackernews' => 'Hacker News',
                        ])
                        ->default('all'),

                    Select::make('min_score')
                        ->label('Minimum Score')
                        ->options([
                            'all' => 'All scores',
                            '8' => '8+ (Hot Leads)',
                            '6' => '6+ (Strong Leads)',
                            '4' => '4+ (Worth Checking)',
                        ])
                        ->default('all'),
                ])
                ->action(fn (array $data) => $this->exportToCsv($data)),
        ];
    }

    protected function exportToCsv(array $filters): StreamedResponse
    {
        $filename = 'discovered-leads-'.now()->format('Y-m-d').'.csv';

        return response()->streamDownload(function () use ($filters) {
            $handle = fopen('php://output', 'w');

            // CSV headers
            fputcsv($handle, [
                'Title',
                'Score',
                'Category',
                'Status',
                'Source',
                'Subreddit',
                'Author',
                'Upvotes',
                'Comments',
                'Intent Keywords',
                'Posted At',
                'Discovered At',
                'URL',
                'Notes',
            ]);

            // Build query with filters
            $query = DiscoveredLead::query()
                ->orderBy('calculated_score', 'desc');

            // Date filter
            if ($filters['date_range'] !== 'all') {
                $days = (int) $filters['date_range'];
                $query->where('discovered_at', '>=', now()->subDays($days));
            }

            // Status filter
            if ($filters['status'] !== 'all') {
                $query->where('status', $filters['status']);
            }

            // Source filter
            if ($filters['source'] !== 'all') {
                $query->where('source', $filters['source']);
            }

            // Score filter
            if ($filters['min_score'] !== 'all') {
                $query->where('calculated_score', '>=', (float) $filters['min_score']);
            }

            $leads = $query->get();

            foreach ($leads as $lead) {
                $sourceName = match ($lead->source) {
                    'reddit' => 'Reddit',
                    'hackernews' => 'Hacker News',
                    default => $lead->source,
                };

                $keywords = collect($lead->intent_keywords_found ?? [])
                    ->flatten()
                    ->unique()
                    ->implode(', ');

                fputcsv($handle, [
                    $lead->title,
                    number_format($lead->calculated_score, 1),
                    $lead->score_category,
                    $lead->status,
                    $sourceName,
                    $lead->subreddit,
                    $lead->author,
                    $lead->upvotes ?? 0,
                    $lead->comments_count ?? 0,
                    $keywords,
                    $lead->posted_at?->format('Y-m-d H:i'),
                    $lead->discovered_at?->format('Y-m-d H:i'),
                    $lead->url,
                    $lead->notes,
                ]);
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\DiscoveredLeads\Widgets\LeadStatsWidget::class,
        ];
    }
}
