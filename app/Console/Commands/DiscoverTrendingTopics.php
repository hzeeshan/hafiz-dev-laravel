<?php

namespace App\Console\Commands;

use App\Services\NotificationService;
use App\Services\TopicDiscovery\TopicDiscoveryService;
use App\Services\TopicDiscovery\TopicSourceFactory;
use Illuminate\Console\Command;

class DiscoverTrendingTopics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:discover-trending
                            {--sources=* : Specific sources to use (reddit, hackernews, google_trends)}
                            {--auto-create : Auto-create BlogTopics for high-scoring topics (score >= 7)}
                            {--notify : Send Telegram notification with summary}
                            {--limit=100 : Maximum topics to discover per source}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Discover trending topics from Reddit, Hacker News, and Google Trends';

    /**
     * Execute the console command.
     */
    public function handle(TopicDiscoveryService $discovery, NotificationService $notifications): int
    {
        $this->info('🔍 Discovering Trending Topics...');
        $this->newLine();

        // Determine which sources to use
        $sources = $this->option('sources');
        if (empty($sources)) {
            $sources = TopicSourceFactory::availableSources();
        } else {
            // Handle comma-separated sources (e.g., --sources=reddit,hackernews)
            if (count($sources) === 1 && str_contains($sources[0], ',')) {
                $sources = explode(',', $sources[0]);
                $sources = array_map('trim', $sources);
            }
        }

        $this->line("📡 Sources: " . implode(', ', $sources));
        $this->newLine();

        // Run discovery
        $startTime = microtime(true);
        $results = $discovery->discover($sources, $this->option('auto-create'));
        $duration = round(microtime(true) - $startTime, 2);

        // Display results
        $this->displayResults($results, $duration);

        // Send notification if requested
        if ($this->option('notify')) {
            $this->sendNotification($notifications, $results);
        }

        return self::SUCCESS;
    }

    /**
     * Display discovery results
     */
    protected function displayResults(array $results, float $duration): void
    {
        $discovered = $results['discovered'];
        $created = $results['created'];
        $errors = $results['errors'];

        $this->info("📊 Discovery Complete ({$duration}s)");
        $this->newLine();

        // Summary
        $this->line("  Total Discovered: <fg=cyan>" . count($discovered) . "</>");
        $this->line("  Auto-Created BlogTopics: <fg=green>" . count($created) . "</>");
        $this->line("  Errors: <fg=red>" . count($errors) . "</>");
        $this->newLine();

        // Show high-scoring topics
        $highScoring = collect($discovered)
            ->sortByDesc('score')
            ->take(10);

        if ($highScoring->isNotEmpty()) {
            $this->info("🎯 Top Discovered Topics:");
            $this->line(str_repeat('━', 80));
            $this->newLine();

            foreach ($highScoring as $index => $result) {
                $topic = $result['trending'];
                $score = $result['score'];
                $category = $result['score_category'];
                $autoCreated = $result['auto_created'] ? ' ✅ Auto-created' : '';

                $this->line(sprintf(
                    "%d. %s %.1f/10 - %s",
                    $index + 1,
                    $category,
                    $score,
                    $topic->title
                ));

                $this->line("   <fg=gray>Source: {$topic->source_name} | Upvotes: {$topic->upvotes} | Comments: {$topic->comments_count}{$autoCreated}</>");
                $this->line("   <fg=gray>Keywords: " . implode(', ', $topic->keywords ?? []) . "</>");
                $this->newLine();
            }

            $this->line(str_repeat('━', 80));
        }

        // Show errors
        if (!empty($errors)) {
            $this->newLine();
            $this->warn("⚠️  Errors:");
            foreach ($errors as $error) {
                $this->line("  • {$error['source']}: {$error['error']}");
            }
        }

        $this->newLine();
        $this->info("✅ Discovery complete! Check /admin/blog-topics for auto-created topics.");
    }

    /**
     * Send Telegram notification
     */
    protected function sendNotification(NotificationService $notifications, array $results): void
    {
        $discovered = count($results['discovered']);
        $created = count($results['created']);

        $topTopics = collect($results['discovered'])
            ->sortByDesc('score')
            ->take(5)
            ->map(fn($result) => sprintf(
                "• %.1f/10 - %s",
                $result['score'],
                $result['trending']->title
            ))
            ->join("\n");

        $message = "🔍 <b>Topic Discovery Complete</b>\n\n"
            . "📊 <b>Summary:</b>\n"
            . "• Discovered: {$discovered} topics\n"
            . "• Auto-created: {$created} BlogTopics\n\n"
            . "🎯 <b>Top Topics:</b>\n"
            . $topTopics . "\n\n"
            . "✅ Check your admin panel to review!";

        $notifications->sendCustomMessage($message);

        $this->info('📱 Telegram notification sent!');
    }
}
