<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PaymentAccessMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        if (Auth::user()->email !== 'shariful971@gmail.com') {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
