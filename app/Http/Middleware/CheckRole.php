<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('publisher')->user()->expert_mode == 1) {
            dd('s');
            return $next($request);
        } else {
            return 'Sorry you cannot access this page';
        }
    }
}