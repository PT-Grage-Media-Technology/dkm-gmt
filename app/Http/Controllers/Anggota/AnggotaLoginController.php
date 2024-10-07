<?php

namespace App\Http\Controllers\Anggota;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AnggotaLoginController extends Controller
{
    public function index()
    {
        return view('anggota.login.loginAnggota');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('anggota')->attempt($credentials)) {
            return redirect('/homepageanggota');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('anggota')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/loginanggota');
    }
}
