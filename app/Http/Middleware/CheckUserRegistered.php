<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRegistered
{
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect()->route('register');
        }

        return $next($request);
    }
}