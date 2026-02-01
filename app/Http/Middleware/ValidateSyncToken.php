<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateSyncToken
{
    /**
     * Handle an incoming request.
     *
     * Validates the X-Sync-Token header against the configured token.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $configuredToken = config('topic_discovery.sync.token');

        if (empty($configuredToken)) {
            return response()->json([
                'error' => 'Sync token not configured on server',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $providedToken = $request->header('X-Sync-Token');

        if (empty($providedToken)) {
            return response()->json([
                'error' => 'Missing X-Sync-Token header',
            ], Response::HTTP_UNAUTHORIZED);
        }

        if (!hash_equals($configuredToken, $providedToken)) {
            return response()->json([
                'error' => 'Invalid sync token',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
