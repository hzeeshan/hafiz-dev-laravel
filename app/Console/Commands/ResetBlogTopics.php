<?php

namespace App\Console\Commands;

use App\Models\BlogGenerationLog;
use App\Models\BlogTopic;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetBlogTopics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:reset-topics
                            {--delete-posts : Delete all auto-generated posts}
                            {--delete-logs : Delete all generation logs}
                            {--status=pending : Set all topics to this status (pending|generating|review|approved|published|skipped)}
                            {--topic= : Reset specific topic ID only}
                            {--all : Reset everything (posts, logs, status)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset blog topics for re-testing (delete posts, reset status, clear logs)';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('🔄 Blog Topics Reset Tool');
        $this->newLine();

        // Get topic filter
        $topicId = $this->option('topic');

        if ($this->option('all')) {
            return $this->resetAll($topicId);
        }

        $this->showCurrentState($topicId);
        $this->newLine();

        // Confirm action
        if (!$this->confirm('Do you want to proceed with the reset?', true)) {
            $this->info('❌ Reset cancelled.');
            return Command::FAILURE;
        }

        $this->newLine();

        // Delete auto-generated posts
        if ($this->option('delete-posts')) {
            $this->deletePosts($topicId);
        }

        // Delete generation logs
        if ($this->option('delete-logs')) {
            $this->deleteLogs($topicId);
        }

        // Update topic status
        $status = $this->option('status');
        if ($status) {
            $this->updateTopicStatus($topicId, $status);
        }

        $this->newLine();
        $this->info('✅ Reset complete!');
        $this->newLine();

        $this->showCurrentState($topicId);

        return Command::SUCCESS;
    }

    /**
     * Reset everything (convenience method)
     */
    protected function resetAll(?int $topicId = null): int
    {
        $this->warn('⚠️  FULL RESET MODE');
        $this->line('   This will:');
        $this->line('   - Delete all auto-generated posts');
        $this->line('   - Delete all generation logs');
        $this->line('   - Reset all topics to "pending" status');
        $this->newLine();

        $this->showCurrentState($topicId);
        $this->newLine();

        if (!$this->confirm('Are you sure you want to reset EVERYTHING?', false)) {
            $this->info('❌ Reset cancelled.');
            return Command::FAILURE;
        }

        $this->newLine();

        // Delete posts
        $this->deletePosts($topicId);

        // Delete logs
        $this->deleteLogs($topicId);

        // Reset status
        $this->updateTopicStatus($topicId, 'pending');

        $this->newLine();
        $this->info('✅ Full reset complete!');
        $this->newLine();

        $this->showCurrentState($topicId);

        return Command::SUCCESS;
    }

    /**
     * Show current state
     */
    protected function showCurrentState(?int $topicId = null): void
    {
        $this->info('📊 Current State:');
        $this->newLine();

        $query = BlogTopic::query();
        if ($topicId) {
            $query->where('id', $topicId);
        }

        // Topic statistics
        $topics = $query->get();
        $this->line("  Topics: <fg=cyan>{$topics->count()}</>");

        // Status breakdown
        $statusCounts = $topics->groupBy('status')->map->count();
        foreach ($statusCounts as $status => $count) {
            $this->line("    - {$status}: <fg=yellow>{$count}</>");
        }

        $this->newLine();

        // Post statistics
        $postsQuery = Post::where('auto_generated', true);
        if ($topicId) {
            $postsQuery->where('blog_topic_id', $topicId);
        }
        $postsCount = $postsQuery->count();
        $this->line("  Auto-generated Posts: <fg=cyan>{$postsCount}</>");

        // Log statistics
        $logsQuery = BlogGenerationLog::query();
        if ($topicId) {
            $logsQuery->where('topic_id', $topicId);
        }
        $logsCount = $logsQuery->count();
        $this->line("  Generation Logs: <fg=cyan>{$logsCount}</>");

        // Cost summary
        $totalCost = $logsQuery->get()->sum(fn($log) => $log->getTotalCost());
        $this->line("  Total Cost: <fg=green>\${$totalCost}</>");
    }

    /**
     * Delete auto-generated posts
     */
    protected function deletePosts(?int $topicId = null): void
    {
        $this->line('🗑️  Deleting auto-generated posts...');

        $query = Post::where('auto_generated', true);
        if ($topicId) {
            $query->where('blog_topic_id', $topicId);
        }

        $count = $query->count();

        if ($count > 0) {
            // Get IDs before deleting
            $postIds = $query->pluck('id');

            // Delete related records first (check if tables exist)
            try {
                if (DB::getSchemaBuilder()->hasTable('post_images')) {
                    DB::table('post_images')->whereIn('post_id', $postIds)->delete();
                }
            } catch (\Exception $e) {
                // Table doesn't exist, skip
            }

            try {
                if (DB::getSchemaBuilder()->hasTable('post_publications')) {
                    DB::table('post_publications')->whereIn('post_id', $postIds)->delete();
                }
            } catch (\Exception $e) {
                // Table doesn't exist, skip
            }

            // Delete posts
            $query->delete();

            $this->line("   ✅ Deleted {$count} auto-generated post(s)");
        } else {
            $this->line('   ℹ️  No auto-generated posts to delete');
        }
    }

    /**
     * Delete generation logs
     */
    protected function deleteLogs(?int $topicId = null): void
    {
        $this->line('🗑️  Deleting generation logs...');

        $query = BlogGenerationLog::query();
        if ($topicId) {
            $query->where('topic_id', $topicId);
        }

        $count = $query->count();

        if ($count > 0) {
            $query->delete();
            $this->line("   ✅ Deleted {$count} generation log(s)");
        } else {
            $this->line('   ℹ️  No generation logs to delete');
        }
    }

    /**
     * Update topic status
     */
    protected function updateTopicStatus(?int $topicId = null, string $status = 'pending'): void
    {
        $this->line("📝 Updating topic status to '{$status}'...");

        $query = BlogTopic::query();
        if ($topicId) {
            $query->where('id', $topicId);
        }

        $count = $query->count();

        if ($count > 0) {
            $query->update([
                'status' => $status,
                'generated_at' => null,
                'reviewed_at' => null,
            ]);

            $this->line("   ✅ Updated {$count} topic(s) to status: {$status}");
        } else {
            $this->line('   ℹ️  No topics to update');
        }
    }
}
