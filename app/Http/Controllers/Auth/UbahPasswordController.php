<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UbahPasswordController extends Controller
{
    public function ubahPassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:6|same:password_baru_confirmation',
            'password_baru_confirmation' => 'required|min:6',
        ], [
            'password_baru.same' => 'Password baru dan konfirmasi password tidak cocok.',
        ]);

        // Cek apakah password lama sesuai
        if (!Hash::check($request->password_lama, Auth::user()->password)) {
            return back()->with('error', 'Password lama tidak sesuai.');
        }

        // Update password baru
        $user = Auth::user();
        $user->password = Hash::make($request->password_baru);
        $user->save();

        return back()->with('success', 'Password berhasil diubah.');
    }
}
