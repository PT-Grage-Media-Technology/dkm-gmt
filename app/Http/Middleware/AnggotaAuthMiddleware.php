<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AnggotaAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ganti logika di sini dengan apa yang Anda butuhkan.
        if (!Auth::guard('anggota')->check()) {
            return redirect()->route('anggota.login'); // atau rute lain jika pengguna tidak terautentikasi
        }
        return $next($request);
    }
}
