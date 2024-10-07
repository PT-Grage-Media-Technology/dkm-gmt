<?php

namespace App\Http\Controllers;

use App\Models\Lomin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;


class LominController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.lomin');
    }

    public function lomin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('lomin')->attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    // public function lomin(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'username' => ['required'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::guard('lomin')->attempt($credentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('home');
    //     }

    //     return back()->withErrors([
    //         'username' => 'The provided credentials do not match our records.',
    //     ]);
    // }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/lomin');
    }

    public function showRegisterForm()
    {
        return view('admin.registeradmin');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:lomin',
            'email' => 'required|email|unique:lomin',
            'password' => 'required|min:8|confirmed',
        ]);

        Lomin::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('lomin')->with('success', 'Registration successful. You can now login.');
    }

    protected function authenticated(Request $request, $user)
{
    return redirect()->route('home');
}

}
