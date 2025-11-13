<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckTeknisiAtauAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->role == 'teknisi' || $user->role == 'admin') {
            return $next($request);
        }

        return redirect('/dashboard')->with('error', 'Anda tidak memiliki hak akses untuk halaman ini.');
    }
}