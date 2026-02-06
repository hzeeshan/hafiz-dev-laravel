<?php

namespace App\Console\Commands;

use App\Models\DiscoveredLead;
use Illuminate\Console\Command;

class CleanupOldLeads extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leads:cleanup
                            {--days=30 : Delete leads older than this many days}
                            {--status=new : Only delete leads with this status}
                            {--dry-run : Show what would be deleted without deleting}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up old discovered leads to prevent database bloat';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $days = (int) $this->option('days');
        $status = $this->option('status');
        $dryRun = $this->option('dry-run');

        $this->info("🧹 Lead Cleanup");
        $this->newLine();

        // Build query
        $query = DiscoveredLead::where('discovered_at', '<', now()->subDays($days));

        if ($status) {
            $query->where('status', $status);
        }

        // Get count
        $count = $query->count();

        if ($count === 0) {
            $this->info("✅ No leads to cleanup (older than {$days} days with status '{$status}')");

            return self::SUCCESS;
        }

        // Show what will be deleted
        $this->warn("Found {$count} leads to delete:");
        $this->table(
            ['Criteria', 'Value'],
            [
                ['Older than', "{$days} days"],
                ['Status', $status ?: 'any'],
                ['Cutoff date', now()->subDays($days)->format('Y-m-d H:i:s')],
                ['Leads affected', $count],
            ]
        );

        if ($dryRun) {
            $this->info('🔍 Dry run - no leads deleted');
            $this->newLine();

            // Show sample of leads
            $this->info('Sample leads that would be deleted:');
            $sample = $query->limit(5)->get(['id', 'title', 'status', 'discovered_at']);
            $this->table(
                ['ID', 'Title', 'Status', 'Discovered'],
                $sample->map(fn ($lead) => [
                    $lead->id,
                    \Illuminate\Support\Str::limit($lead->title, 50),
                    $lead->status,
                    $lead->discovered_at->diffForHumans(),
                ])->toArray()
            );

            return self::SUCCESS;
        }

        // Confirm deletion
        if (! $this->confirm("Delete {$count} leads?", false)) {
            $this->info('Cancelled');

            return self::SUCCESS;
        }

        // Delete
        $deleted = $query->delete();

        $this->info("✅ Deleted {$deleted} leads");
        $this->info("💾 Database space freed up");

        return self::SUCCESS;
    }
}
