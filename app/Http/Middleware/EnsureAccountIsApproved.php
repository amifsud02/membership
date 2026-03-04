<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAccountIsApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user) {
            // Check organisation approval
            if ($user->role === \App\Enums\UserRole::ORGANISATION && $user->organisation && $user->organisation->status !== 'approved') {
                auth()->logout();
                return redirect()->route('login')->with('status', 'Your organisation account is pending approval or has been suspended.');
            }

            // Check merchant approval
            if ($user->role === \App\Enums\UserRole::MERCHANT && $user->merchant && $user->merchant->status !== 'approved') {
                auth()->logout();
                return redirect()->route('login')->with('status', 'Your merchant account is pending approval or has been suspended.');
            }
        }

        return $next($request);
    }
}
