<?php

namespace App\Http\Controllers\Anggota;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AnggotaRegisterController extends Controller
{
    public function index()
    {
        return view('anggota.login.registerAnggota');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:anggotas',
            'nama_lengkap' => 'required|string|unique:anggotas',
            'email' => 'required|string|email|unique:anggotas',
            'password' => 'required|string|confirmed',
        ]);

        $anggota = Anggota::create([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $request->session()->put('registeredAnggota', $anggota);

        Auth::guard('anggota')->login($anggota);

        return redirect('/homepageanggota');
    }
}
