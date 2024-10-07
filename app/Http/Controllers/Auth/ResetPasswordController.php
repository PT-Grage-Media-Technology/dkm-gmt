<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
 // Menampilkan form reset password
 public function showResetForm(Request $request, $token = null)
 {
     return view('auth.password.reset')->with(
         ['token' => $token, 'email' => $request->email]
     );
 }

 // Menangani proses reset password
 public function reset(Request $request)
 {
     $request->validate([
         'token' => 'required',
         'email' => 'required|email',
         'password' => 'required|confirmed|min:6',
     ],
     [
         'password.min' => 'Password minimal 6 karakter',
         'password.confirmed' => 'Konfirmasi password tidak sama',
         'password.required' => 'Password harus diisi',
     ]
    );

     $status = Password::reset(
         $request->only('email', 'password', 'password_confirmation', 'token'),
         function ($user, $password) {
             $user->forceFill([
                'password' => Hash::make($password),
             ])->save();
         }
     );

     // Set pesan sesuai status
     if ($status == Password::PASSWORD_RESET) {
         return redirect()->route('login')->with('status', __($status));
     }

     return back()->withErrors(['email' => __($status)]);
 }

}
