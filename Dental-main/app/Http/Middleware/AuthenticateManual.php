<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateManual
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // If user is not authenticated, redirect to login page
            return redirect()->route('login.form');
        }

        // Prevent caching of pages
        $response = $next($request);
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');

        return $response;
    }
}
