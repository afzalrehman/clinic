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

    public function forgot_password_create()
    {
        return view('auth.forgot-password');
    }
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();

        // Check if user exists
        if (!$user) {
            return back()->withErrors(['email' => 'Email not found']);
        }

        // Check if email is verified
        if (is_null($user->email_verified_at)) {
            return back()->withErrors(['email' => 'Your email is not verified. Please verify your email first.']);
        }

        // Check if user status is active
        if ($user->status != 'active') {
            return back()->withErrors(['email' => 'Your account is inactive. Please contact support.']);
        }



        // Check if remember token exists (optional)
        if (is_null($user->remember_token)) {
            return back()->withErrors(['email' => 'Login not allowed. Please contact support.']);
        }

        // Authenticate user
        if (Auth::attempt($credentials)) {
            $request->authenticate(); // Authenticate using Breeze's method
            $request->session()->regenerate();

            // Redirect based on role
            switch ($user->role) {
                case 0:
                    return redirect()->route('superadmin');
                case 1:
                    return redirect()->route('admin');
                case 2:
                    return redirect()->route('doctor');
                case 3:
                    return redirect()->route('patient');
                default:
                    Auth::logout();
                    return redirect()->route('login');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials. Please try again.']);
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
        $data['user'] = User::where('remember_token', '=', $token)->first();

        if (!empty($data)) {
            return view('auth.reset-password', $data);
        } else {
            return redirect()->back()->with('success', 'Email Not Found in the System');
        }
    }
    public function verify_email($token, Request $request)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->remember_token = Str::random(50);
            $user->status = 'active';
            $user->save();

            return redirect('/login')->with('success', 'Your Account  successfully verified ');
        } else {
            abort(404);
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
            $user->save();
            return redirect('login')->with('success', 'Your Password Reset Successfully');
        } else {
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
