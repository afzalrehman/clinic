<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\forgotPasswordMail;
use App\Models\User;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Mail;
use Str;

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
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if ($request->user()->role == 0) {
            return redirect()->intended(route('superadmin'));
        } elseif ($request->user()->role == 1) {
            return redirect()->intended(route('admin'));
        } elseif ($request->user()->role == 2) {
            return redirect()->intended(route('doctor'));
        } elseif ($request->user()->role == 3) {
            return redirect()->intended(route('patient'));
        } else {
            return redirect()->intended(route('login', absolute: false));
        }
    }


    public function forgot_password_create()
    {
        return view('auth.forgot-password');
    }


    public function forgot_password_store(Request $request)
    {

        $request->validate([
            'email' => 'required',
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if (!empty($user)) {

            $user->remember_token = Str::random(50);
            $user->save();

            Mail::to($user->email)->send(new forgotPasswordMail($user));

            return redirect()->back()->with('success', 'please check your email and reset your password');
        } else {
            return redirect()->back()->with('error', 'Email Not Found in the System');
        }
    }

    

    public function reset_password($token)
    {
        $data['user'] = User::where('remember_token' , '=' , $token)->first();

        if(!empty($data)){
            return view('auth.reset-password' , $data );
        }
        else{
            return redirect()->back()->with('success', 'Email Not Found in the System');
        }
    }


    public function reset_password_store($token, Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(50);
            return redirect('login')->with('success', 'Your Password Reset Successfully');
        }else{
            return redirect()->back()->with('success', 'Email Not Found in the System');
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
