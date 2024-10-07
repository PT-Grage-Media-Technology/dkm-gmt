<?php

namespace App\Http\Controllers\anggota;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingUbahPwAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexpwanggota()
    {
        return view('anggota.settings.ubah_password_anggota');
    }

    public function ubahPasswordAnggota(Request $request)
    {
        $request->validate([
            'password_lama_anggota' => 'required',
            'password_baru_anggota' => 'required|min:6|confirmed',
        ]);

        $anggota = Auth::guard('anggota')->user();

        if (!Hash::check($request->password_lama_anggota, $anggota->password)) {
            return back()->withErrors(['password_lama_anggota' => 'Password lama tidak cocok.']);
        }

        $anggota->password = Hash::make($request->password_baru_anggota);
        $anggota->save();

        return back()->with('success', 'Password berhasil diubah.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
