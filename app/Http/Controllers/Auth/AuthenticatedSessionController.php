<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request ): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if($request->user()->role == 0){
            return redirect()->intended(route('superadmin'));
        }
        elseif($request->user()->role == 1){
            return redirect()->intended(route('admin'));
        }
        elseif($request->user()->role == 2){
            return redirect()->intended(route('doctor'));
        }
        elseif($request->user()->role == 3){
            return redirect()->intended(route('patient'));
        }
        else{
            return redirect()->intended(route('login', absolute: false));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
