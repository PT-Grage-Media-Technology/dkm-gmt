<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UbahPasswordAdminController extends Controller
{
    public function indexPasswordAdmin()
    {
        return view('admin.setting.ubahPasswordAdmin');
    }

    public function ubahPasswordAdmin(Request $request)
    {
        // Validasi input
        $request->validate([
            'password_lama_admin' => 'required',
            'password_baru_admin' => 'required|min:6|confirmed',
        ]);

        // Ambil data admin yang sedang login
        $lomin = Auth::guard('lomin')->user();

        // Cek apakah password lama sesuai
        if (!Hash::check($request->password_lama_admin, $lomin->password)) {
            return back()->withErrors(['password_lama_admin' => 'Password lama tidak cocok.']);
        }

        // Update password dengan password baru yang di-hash
        $lomin->password = Hash::make($request->password_baru_admin);
        $lomin->save();

        // Kembali dengan pesan sukses
        return back()->with('success', 'Password berhasil diubah.');
    }
}
