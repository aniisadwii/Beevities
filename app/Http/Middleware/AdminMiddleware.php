<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role != 1) {
            return redirect()->route('user.dashboard')->with('error', 'Akses ditolak! Anda bukan admin.');
        }

        return $next($request);
    }
}
