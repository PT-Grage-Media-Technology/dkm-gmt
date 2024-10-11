<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [ 
                'username.required' => 'Username harus diisi',
                'password.required' => 'Password harus diisi',
            ]
        );

        $credentials = $request->only('username', 'password');

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']], $request->remember)) {
            return redirect()->route('beranda');
        }

        return redirect()->back()->with('error', 'Username atau Password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/beranda')->with('success', 'Berhasil Logout');
    }

}
