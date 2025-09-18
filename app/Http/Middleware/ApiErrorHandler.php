<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiErrorHandler
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only handle API requests
        if ($request->is('api/*')) {
            // Add common headers for API responses
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('X-API-Version', '1.0');
        }

        return $response;
    }
}