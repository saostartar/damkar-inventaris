<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
{
    if (auth()->check() && auth()->user()->role !== $role) {
        switch (auth()->user()->role) {
            case 'Staff':
                return redirect()->route('staff.dashboard');
            case 'Manager':
                return redirect()->route('manager.dashboard');
            default:
                return redirect()->route('home');
        }
    }
    return $next($request);
}
}