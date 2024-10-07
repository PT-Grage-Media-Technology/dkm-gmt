<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAnggota
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // public function handle($request, Closure $next, $guard = 'anggota')
    // {
    //     if (!Auth::guard($guard)->check()) {
    //         return redirect('/loginanggota');
    //     }

    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('anggota')->check()) {
            // return redirect()->route('anggota.login');
            return redirect('/loginanggota');
        }

        return $next($request);
    }
}
