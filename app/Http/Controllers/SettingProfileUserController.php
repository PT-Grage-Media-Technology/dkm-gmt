<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingProfileUserController extends Controller
{
    public function uploadProfileImage(Request $request)
    {
        $request->validate([
            'profile_user' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();
        $image = $request->file('profile_user');
        $imageName = $user->id . '_profile.' . $image->getClientOriginalExtension();

        // Simpan gambar ke direktori public/profile_user
        $path = $image->storeAs('public/profile_user', $imageName);

        // Hapus gambar profil sebelumnya jika ada
        if ($user->profile_user && $user->profile_user != $imageName) {
            Storage::delete('public/profile_user/' . $user->profile_user);
        }

        // Simpan path gambar baru ke database
        $user->profile_user = $imageName;
        $user->save();

        return response()->json(['success' => true, 'image_name' => $imageName]);
    }
}
