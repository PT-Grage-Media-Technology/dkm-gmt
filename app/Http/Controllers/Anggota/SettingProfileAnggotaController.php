<?php

namespace App\Http\Controllers\anggota;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingProfileAnggotaController extends Controller
{
    public function uploadProfileImageAnggota(Request $request)
    {
        // Validasi input file
        $request->validate([
            'profile_anggota' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            // Ambil data user anggota yang sedang login
            $user = Auth::guard('anggota')->user();
            $image = $request->file('profile_anggota');
            $imageName = $user->id . '_profile.' . $image->getClientOriginalExtension();

            // Simpan gambar ke direktori public/profile_anggota
            $path = $image->storeAs('public/profile_anggota', $imageName);

            // Hapus gambar profil lama jika ada
            if ($user->profile_anggota && $user->profile_anggota != $imageName) {
                Storage::delete('public/profile_anggota/' . $user->profile_anggota);
            }

            // Simpan nama file gambar baru ke database
            $user->profile_anggota = $imageName;
            $user->save();

            // Kirimkan response sukses
            return response()->json(['success' => true, 'image_name' => $imageName]);

        } catch (\Exception $e) {
            // Kirimkan response error jika terjadi kesalahan
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
