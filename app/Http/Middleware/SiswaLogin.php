<?php

namespace App\Http\Middleware;

use App\Models\siswa;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiswaLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('siswa')) {
            return $next($request);
        } else {
            return redirect()->route('login.siswa');
        }
    }
}
