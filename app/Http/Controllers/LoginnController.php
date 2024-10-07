<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegisterr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LoginnController extends Controller
{
    public function loginIndex()
    {
        return view('login.index1');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('userregisterrs')->attempt($credentials)) {
            $user = Auth::guard('userregisterrs')->user();
            session(['user' => $user]);

            Log::info('Login berhasil', ['user' => $user]);

            return redirect()->route('beranda')->with('success', 'Login berhasil');
        }

        // dd($request);

        Log::warning('Login gagal', ['credentials' => $credentials]);

        return back()->with('error', 'Username atau Password yang Anda masukkan salah. Silahkan ulangi!');
    }
}
