<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('lo2gin');
        }

        if (Auth::user()->role == 1) {
            return $next($request);
        }

        if (Auth::user()->role == 2) {
            return redirect()->route('user');
        }
    }
}
