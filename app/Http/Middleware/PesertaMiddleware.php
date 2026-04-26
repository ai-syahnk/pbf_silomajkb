<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PesertaMiddleware
{
    /**
     * Handle an incoming request.
     * Memastikan user sudah login dan memiliki role peserta.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->role !== 'peserta') {
            return redirect()->route('web.peserta.login')
                ->withErrors(['email' => 'Silakan login sebagai peserta terlebih dahulu.']);
        }

        return $next($request);
    }
}
