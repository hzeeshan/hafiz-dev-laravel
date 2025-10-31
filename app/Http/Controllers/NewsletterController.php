<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    /**
     * Handle newsletter subscription
     *
     * This is a placeholder implementation. You'll need to integrate with
     * your email service provider (ConvertKit, Mailchimp, etc.)
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribe(Request $request)
    {
        // Validate email
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please enter a valid email address.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $email = $request->input('email');

        try {
            // Save to database (backup + tracking)
            $subscriber = \App\Models\NewsletterSubscriber::firstOrCreate(
                ['email' => $email],
                [
                    'status' => 'pending',
                    'source' => 'blog',
                    'ip_address' => $request->ip(),
                ]
            );

            // Log the subscription
            Log::info('Newsletter subscription saved to database', [
                'email' => $email,
                'subscriber_id' => $subscriber->id,
                'is_new' => $subscriber->wasRecentlyCreated,
            ]);

            // Send to ConvertKit
            try {
                $convertkitResponse = Http::post(config('services.convertkit.base_url') . '/forms/' . config('services.convertkit.form_id') . '/subscribe', [
                    'api_secret' => config('services.convertkit.api_key'), // ConvertKit uses 'api_secret' not 'api_key'
                    'email' => $email,
                    'fields' => [
                        'source' => 'hafiz.dev blog',
                        'signup_date' => now()->toDateString(),
                    ],
                ]);

                if ($convertkitResponse->successful()) {
                    Log::info('Newsletter subscription sent to ConvertKit', [
                        'email' => $email,
                        'convertkit_response' => $convertkitResponse->json(),
                    ]);

                    // Update subscriber status
                    $subscriber->update(['status' => 'confirmed']);
                } else {
                    Log::warning('ConvertKit API returned error', [
                        'email' => $email,
                        'status' => $convertkitResponse->status(),
                        'response' => $convertkitResponse->body(),
                    ]);
                }
            } catch (\Exception $e) {
                // Don't fail the whole request if ConvertKit is down
                Log::error('Failed to send to ConvertKit', [
                    'email' => $email,
                    'error' => $e->getMessage(),
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Thanks for subscribing! Check your email to confirm.',
            ]);
        } catch (\Exception $e) {
            Log::error('Newsletter subscription failed', [
                'email' => $email,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.',
            ], 500);
        }
    }

    /**
     * Get current subscriber count
     * You can call this from your email provider's API to show real numbers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function count()
    {
        // TODO: Fetch from your email service provider
        // For now, return a placeholder
        $count = 50; // Update this manually or fetch from API

        return response()->json([
            'count' => $count,
            'formatted' => number_format($count) . '+',
        ]);
    }
}
