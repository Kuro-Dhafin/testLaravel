<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ArtistMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'artist') {
            return $next($request);
        }

        abort(403, 'Artist only');
    }
    
}
