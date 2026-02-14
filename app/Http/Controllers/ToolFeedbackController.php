<?php

namespace App\Http\Controllers;

use App\Models\ToolFeedback;
use App\Services\NotificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ToolFeedbackController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'tool_slug' => 'required|string|max:255',
            'type' => 'required|in:bug,feature,other',
            'message' => 'required|string|min:10|max:1000',
            'email' => 'nullable|email|max:255',
            'url' => 'required|url|max:2048',
            'user_agent' => 'nullable|string|max:500',
        ]);

        $feedback = ToolFeedback::create([
            'tool_slug' => $validated['tool_slug'],
            'type' => $validated['type'],
            'message' => $validated['message'],
            'email' => $validated['email'] ?? null,
            'url' => $validated['url'],
            'user_agent' => $validated['user_agent'] ?? null,
            'ip_address' => $request->ip(),
        ]);

        $this->sendTelegramNotification($feedback);

        return response()->json([
            'success' => true,
            'message' => 'Thanks for your feedback!',
        ]);
    }

    protected function sendTelegramNotification(ToolFeedback $feedback): void
    {
        try {
            $typeEmoji = match ($feedback->type) {
                'bug' => "\xF0\x9F\x90\x9B",
                'feature' => "\xE2\x9C\xA8",
                default => "\xF0\x9F\x92\xAC",
            };

            $typeLabel = match ($feedback->type) {
                'bug' => 'Bug Report',
                'feature' => 'Feature Request',
                default => 'Other',
            };

            $email = $feedback->email ?: 'Not provided';

            $message = "
{$typeEmoji} <b>New Tool Feedback</b>

<b>Tool:</b> {$feedback->tool_slug}
<b>Type:</b> {$typeLabel}
<b>Message:</b> {$feedback->message}
<b>Email:</b> {$email}
<b>URL:</b> {$feedback->url}
";

            $notificationService = new NotificationService();
            $notificationService->sendCustomMessage($message);
        } catch (\Exception $e) {
            Log::warning('Failed to send tool feedback Telegram notification', [
                'error' => $e->getMessage(),
                'feedback_id' => $feedback->id,
            ]);
        }
    }
}
