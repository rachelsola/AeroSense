<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $request->session->regenerate();
            return $next($request);
        }
        return back()->withErrors('Silahkan login bang');
    }

    protected function redirectTo($request)
    {
        return route('register'); // Ganti 'register' dengan route yang Anda inginkan
    }

}
