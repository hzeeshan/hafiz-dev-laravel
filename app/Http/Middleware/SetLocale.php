<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        // Detect locale from route prefix
        $segment = $request->segment(1);

        $supportedLocales = ['it', 'es', 'de', 'fr', 'pt'];

        if (in_array($segment, $supportedLocales)) {
            app()->setLocale($segment);
        }

        return $next($request);
    }
}
