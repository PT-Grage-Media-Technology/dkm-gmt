<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    // Menampilkan form untuk input email
    public function showLinkRequestForm()
    {
        return view('auth.password.email');
    }
    public function showLinkRequestFormMobile()
    {
        return view('mobile.pages.settings.resetPass');
    }

    // Mengirim email reset password
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Mencari user dengan email yang diberikan
        $user = User::where('email', $request->email)->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return back()->withErrors(['email' => 'Maaf, email tersebut tidak terdaftar. Silakan coba lagi.']);
        }

        // Mengirim email dengan link reset password
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Set pesan sesuai status pengiriman email
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', 'Email reset password telah dikirim!');
        }

        return back()->withErrors(['email' => __($status)]);
    }

}
