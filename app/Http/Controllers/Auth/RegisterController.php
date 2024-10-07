<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|unique:users',
            'nama_lengkap' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
        ]);

        try {
            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'nama_lengkap' => $request->nama_lengkap,
                'no_telepon' => $request->no_telepon,
            ]);

            Log::info('User created successfully: ' . $user->id);
            return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login');
        } catch (\Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat registrasi. Silakan coba lagi.');
        }
    }
}
