<?php

namespace App\Http\Middleware;
use App\Models\Website;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminRoleMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}

