<?php

namespace App\Console\Commands;

use App\Services\LeadFinder\LeadFinderService;
use App\Services\LeadFinder\LeadScorer;
use App\Services\LeadFinder\LeadSourceFactory;
use App\Services\NotificationService;
use Illuminate\Console\Command;

class DiscoverLeads extends Command
{
    protected $signature = 'leads:discover
                            {--sources=* : Specific sources (reddit, hackernews)}
                            {--notify : Send Telegram notifications for high-scoring leads}
                            {--sync-to-production : Sync discovered leads to production server}';

    protected $description = 'Discover potential client leads from Reddit and Hacker News';

    public function handle(LeadFinderService $leadFinder, NotificationService $notifications): int
    {
        if (! config('lead_finder.enabled', true)) {
            $this->error('Lead Finder is disabled. Set LEAD_FINDER_ENABLED=true in .env');

            return self::FAILURE;
        }

        $this->info('🎯 Discovering Leads...');
        $this->newLine();

        // Determine sources
        $sources = $this->option('sources');
        if (empty($sources)) {
            $sources = LeadSourceFactory::availableSources();
        } else {
            // Handle comma-separated sources
            if (count($sources) === 1 && str_contains($sources[0], ',')) {
                $sources = explode(',', $sources[0]);
                $sources = array_map('trim', $sources);
            }
        }

        $this->line('📡 Sources: '.implode(', ', $sources));
        $this->newLine();

        // Run discovery (without notifications - we'll handle sync separately)
        $startTime = microtime(true);
        $notify = $this->option('notify') && ! $this->option('sync-to-production');
        $results = $leadFinder->discover($sources, $notify);
        $duration = round(microtime(true) - $startTime, 2);

        // Display results
        $this->displayResults($results, $duration);

        // Sync to production if requested
        if ($this->option('sync-to-production')) {
            $this->syncToProduction($leadFinder, $results);
        }

        return self::SUCCESS;
    }

    protected function displayResults(array $results, float $duration): void
    {
        $discovered = $results['discovered'];
        $notified = $results['notified'];
        $errors = $results['errors'];

        $this->info("📊 Discovery Complete ({$duration}s)");
        $this->newLine();

        // Count by category
        $hotLeads = collect($discovered)->filter(fn ($r) => $r['score'] >= 8.0)->count();
        $strongLeads = collect($discovered)->filter(fn ($r) => $r['score'] >= 6.0 && $r['score'] < 8.0)->count();
        $worthChecking = collect($discovered)->filter(fn ($r) => $r['score'] >= 4.0 && $r['score'] < 6.0)->count();
        $saved = collect($discovered)->filter(fn ($r) => $r['score'] >= 2.0 && $r['score'] < 4.0)->count();

        $this->line('  Total Discovered: <fg=cyan>'.count($discovered).'</>');
        $this->line("  🔥 Hot Leads: <fg=red>{$hotLeads}</>");
        $this->line("  ⭐ Strong Leads: <fg=yellow>{$strongLeads}</>");
        $this->line("  👀 Worth Checking: <fg=blue>{$worthChecking}</>");
        $this->line("  📋 Saved: <fg=gray>{$saved}</>");
        $this->line('  Notified: <fg=green>'.count($notified).'</>');
        $this->line('  Errors: <fg=red>'.count($errors).'</>');
        $this->newLine();

        // Show top leads
        $topLeads = collect($discovered)
            ->sortByDesc('score')
            ->take(10);

        if ($topLeads->isNotEmpty()) {
            $this->info('🎯 Top Discovered Leads:');
            $this->line(str_repeat('━', 80));
            $this->newLine();

            foreach ($topLeads as $index => $result) {
                $lead = $result['lead'];
                $score = $result['score'];
                $scoreLabel = $result['score_label'];
                $wasNotified = $result['notified'] ? ' 📱 Notified' : '';

                $this->line(sprintf(
                    '%d. %s %.1f/10 - %s',
                    $index + 1,
                    $scoreLabel,
                    $score,
                    \Illuminate\Support\Str::limit($lead->title, 60)
                ));

                $sourceLine = $lead->source === 'reddit'
                    ? "Source: r/{$lead->subreddit}"
                    : 'Source: Hacker News';

                $this->line("   <fg=gray>{$sourceLine} | ⬆️ {$lead->upvotes} | 💬 {$lead->comments_count}{$wasNotified}</>");

                // Show intent keywords
                $keywords = collect($lead->intent_keywords_found)->flatten()->unique()->take(4)->implode(', ');
                if ($keywords) {
                    $this->line("   <fg=gray>Intent: {$keywords}</>");
                }

                $this->line("   <fg=blue>{$lead->url}</>");
                $this->newLine();
            }

            $this->line(str_repeat('━', 80));
        }

        // Show errors
        if (! empty($errors)) {
            $this->newLine();
            $this->warn('⚠️  Errors:');
            foreach ($errors as $error) {
                $this->line("  • {$error['source']}: {$error['error']}");
            }
        }

        $this->newLine();
        $this->info('✅ Discovery complete! Check /admin/discovered-leads to manage leads.');
    }

    protected function syncToProduction(LeadFinderService $leadFinder, array $results): void
    {
        $this->newLine();
        $this->info('🔄 Syncing to production...');

        $syncResult = $leadFinder->syncToProduction(
            $results['discovered'],
            $this->option('notify')
        );

        if ($syncResult['success']) {
            $this->info('✅ Sync complete!');
            $this->line("   Synced: <fg=cyan>{$syncResult['synced']}</> leads");
            $this->line("   Skipped: <fg=yellow>{$syncResult['skipped']}</>");
            if (isset($syncResult['notified'])) {
                $this->line("   Notified: <fg=green>{$syncResult['notified']}</>");
            }
        } else {
            $this->error("❌ Sync failed: {$syncResult['error']}");
        }
    }
}
