<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            if ($role === 0) {
                return redirect()->route('superadmin');
            } elseif ($role === 1) {
                return redirect()->route('admin');
            } elseif ($role === 2) {
                return redirect()->route('doctor');
            } elseif ($role === 3) {
                return redirect()->route('patient');
            }
        }
        return redirect()->route('login');

    }
}
