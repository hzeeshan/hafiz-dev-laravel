<?php

namespace App\Console\Commands;

use App\Services\NotificationService;
use Illuminate\Console\Command;

class TestTelegramNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:test-telegram';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Telegram notification service';

    /**
     * Execute the console command.
     */
    public function handle(NotificationService $notification): int
    {
        $this->info('Testing Telegram notification...');

        // Test connection first
        if (!$notification->testConnection()) {
            $this->error('❌ Telegram connection failed!');
            $this->warn('Please check your BLOG_TELEGRAM_BOT_TOKEN and BLOG_TELEGRAM_CHAT_ID');
            return self::FAILURE;
        }

        $this->info('✅ Telegram connection successful!');

        // Send test message
        $notification->sendCustomMessage(
            "🧪 <b>Test Notification</b>\n\n"
            . "✅ Your Telegram integration is working perfectly!\n\n"
            . "📱 Bot Token: " . substr(config('blog.notifications.telegram_bot_token'), 0, 10) . "...\n"
            . "💬 Chat ID: " . config('blog.notifications.telegram_chat_id') . "\n\n"
            . "⏰ Sent at: " . now()->format('Y-m-d H:i:s')
        );

        $this->info('✅ Test message sent to Telegram!');
        $this->info('Check your Telegram to see if you received it.');

        return self::SUCCESS;
    }
}
