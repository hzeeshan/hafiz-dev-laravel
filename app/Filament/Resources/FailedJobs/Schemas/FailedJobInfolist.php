<?php

namespace App\Filament\Resources\FailedJobs\Schemas;

use App\Models\FailedJob;
use Filament\Actions\Action;
use Filament\Infolists\Components\Actions as InfolistAction;
use Filament\Infolists\Components\Actions\Action as InfolistActionComponent;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class FailedJobInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Job Details')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('job_class')
                                    ->label('Job Class')
                                    ->getStateUsing(fn (FailedJob $record) => $record->getJobClass())
                                    ->badge()
                                    ->color(fn (FailedJob $record) => match (true) {
                                        $record->isBlogGenerationJob() => 'info',
                                        $record->isPublishingJob() => 'warning',
                                        default => 'gray',
                                    }),

                                TextEntry::make('job_type')
                                    ->label('Job Type')
                                    ->getStateUsing(fn (FailedJob $record) => $record->getJobTypeLabel())
                                    ->badge()
                                    ->color('gray'),

                                TextEntry::make('queue')
                                    ->badge()
                                    ->color('gray'),

                                TextEntry::make('connection')
                                    ->badge()
                                    ->color('gray'),

                                TextEntry::make('failed_at')
                                    ->dateTime()
                                    ->since(),

                                TextEntry::make('uuid')
                                    ->label('UUID')
                                    ->copyable()
                                    ->copyMessage('UUID copied!')
                                    ->fontFamily('mono'),
                            ]),
                    ])
                    ->collapsible(),

                Section::make('Related Resources')
                    ->schema([
                        TextEntry::make('related_topic')
                            ->label('BlogTopic')
                            ->getStateUsing(function (FailedJob $record) {
                                $topic = $record->blogTopic();
                                if ($topic) {
                                    return new HtmlString(
                                        '<a href="/admin/blog-topics/' . $topic->id . '/edit" class="text-primary-600 hover:underline font-semibold">' .
                                        '#' . $topic->id . ' - ' . e($topic->title) .
                                        '</a>' .
                                        '<div class="mt-1 text-sm text-gray-500">Status: ' . ucfirst($topic->status) . '</div>'
                                    );
                                }
                                return 'No related BlogTopic';
                            })
                            ->html(),

                        TextEntry::make('related_post')
                            ->label('Generated Post')
                            ->getStateUsing(function (FailedJob $record) {
                                $topic = $record->blogTopic();
                                if ($topic && $topic->post) {
                                    $post = $topic->post;
                                    return new HtmlString(
                                        '<a href="/admin/posts/' . $post->id . '/edit" class="text-primary-600 hover:underline font-semibold">' .
                                        '#' . $post->id . ' - ' . e($post->title) .
                                        '</a>' .
                                        '<div class="mt-1 text-sm text-gray-500">Status: ' . ucfirst($post->status) . '</div>'
                                    );
                                }
                                return 'No generated post';
                            })
                            ->html(),
                    ])
                    ->collapsible()
                    ->visible(fn (FailedJob $record) => $record->getBlogTopicId() !== null),

                Section::make('Exception Details')
                    ->description('Click the copy icon to copy the full exception to clipboard')
                    ->schema([
                        TextEntry::make('exception')
                            ->label('Full Exception')
                            ->getStateUsing(fn (FailedJob $record) => $record->getFormattedException())
                            ->copyable()
                            ->copyMessage('Exception copied to clipboard!')
                            ->copyMessageDuration(2000)
                            ->columnSpanFull()
                            ->extraAttributes(['class' => 'font-mono text-xs whitespace-pre-wrap bg-gray-50 dark:bg-gray-900 p-4 rounded-lg overflow-x-auto max-h-96 overflow-y-auto']),
                    ])
                    ->collapsible(),

                Section::make('Job Payload')
                    ->schema([
                        TextEntry::make('payload_preview')
                            ->label('Payload Data')
                            ->getStateUsing(function (FailedJob $record) {
                                $data = $record->getFormattedJobData();
                                $output = "Job Class: {$data['full_class']}\n";
                                $output .= "Queue: {$data['queue']}\n";
                                $output .= "Connection: {$data['connection']}\n";
                                $output .= "Failed At: {$data['failed_at']}\n\n";

                                if ($data['topic_id']) {
                                    $output .= "--- Related BlogTopic ---\n";
                                    $output .= "Topic ID: #{$data['topic_id']}\n";
                                    $output .= "Topic Title: {$data['topic_title']}\n";
                                }

                                $output .= "\n--- Raw Payload (JSON) ---\n";
                                $payload = $record->getDecodedPayload();
                                $output .= json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

                                return $output;
                            })
                            ->prose()
                            ->columnSpanFull()
                            ->extraAttributes(['class' => 'font-mono text-xs whitespace-pre-wrap bg-gray-50 dark:bg-gray-900 p-4 rounded-lg overflow-x-auto max-h-96 overflow-y-auto']),
                    ])
                    ->collapsible()
                    ->collapsed(),

                Section::make('Actions')
                    ->schema([
                        TextEntry::make('retry_info')
                            ->label('')
                            ->getStateUsing(fn () => new HtmlString(
                                '<div class="text-sm text-gray-600 dark:text-gray-400">' .
                                '💡 Use the <strong>Retry Job</strong> button above to re-queue this job. ' .
                                'It will be processed by the queue worker shortly.' .
                                '</div>'
                            ))
                            ->html()
                            ->hiddenLabel(),
                    ])
                    ->collapsible()
                    ->collapsed(),
            ]);
    }
}
