<?php
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == '1') {dd('d');
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
