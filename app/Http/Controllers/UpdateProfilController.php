<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRegisterr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateProfilController extends Controller
{
    /**
     * Update user foto profil.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateFoto(Request $request)
    {
        $request->validate([
            'profil' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $authenticatedUser = Auth::user();

        if ($request->hasFile('profil')) {
            $file = $request->file('profil');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/profiles', $fileName);

            if ($authenticatedUser->profil) {
                Storage::delete('public/profiles/' . $authenticatedUser->profil);
            }

            $authenticatedUser->update(['profil' => $fileName]);

            // Simpan URL gambar di sesi dengan kunci 'idUser'
            session(['user_profile_url_' . $authenticatedUser->idUser => asset('storage/profiles/' . $fileName)]);
        }

        return redirect()->route('settingAkun')->with('success', 'Profil berhasil diperbarui');
    }
}
