<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user yang login adalah admin
        if (Auth::check()){
            return $next($request);
        }

        // Jika bukan admin, redirect ke halaman lain
        return redirect('/register');
    }
}
