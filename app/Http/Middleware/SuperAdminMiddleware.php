<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna terautentikasi melalui guard 'lomin'
        if (!Auth::guard('lomin')->check()) {
            // Arahkan ke halaman login lomin jika belum terautentikasi
            return redirect('/lomin');
        }

        return $next($request);
    }
    
}
