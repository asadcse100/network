<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class User
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('lo3gin');
        }

        if (Auth::user()->role == 2) {
            return $next($request);
        }

        if (Auth::user()->role == 1) {
            return redirect()->route('admin');
        }
    }
}
