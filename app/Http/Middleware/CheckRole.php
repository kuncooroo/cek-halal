<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles (misal: 'admin', 'superadmin')
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Jika tidak login atau rolenya tidak ada di daftar $roles
        if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {
            // Bisa redirect ke halaman login atau tampilkan 403
            return abort(403, 'AKSES DITOLAK.');
        }

        return $next($request);
    }
}