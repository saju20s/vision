<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Payment;

class CheckRejectedPayment
{
    public function handle(Request $request, Closure $next)
    {
        // Check if there is any rejected payment
        $hasRejectedPayment = Payment::where('status', 'rejected')->exists();

        if ($hasRejectedPayment) {
            // Redirect to login page with message
            return redirect()->route('account.login')
                ->with('error', 'Your account is temporarily suspended');
        }

        return $next($request);
    }
}
