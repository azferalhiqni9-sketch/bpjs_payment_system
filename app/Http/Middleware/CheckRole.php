<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Pastikan user sudah login dan rolenya ada di dalam daftar angka role yang diizinkan
        if ($request->user() && in_array((string)$request->user()->role, $roles)) {
            return $next($request);
        }

        // Jika bukan hak aksesnya, munculkan error 403
        abort(403, 'Maaf, Anda tidak memiliki hak akses untuk halaman ini.');
    }
}