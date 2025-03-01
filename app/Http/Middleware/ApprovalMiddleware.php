<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovalMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->approved) {
            return $next($request);
        }

        return redirect('dashboard')->with('error', 'Your account is not approved yet.');
    }
}
