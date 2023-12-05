<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProfissionalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Verifique se a função do usuário corresponde à função esperada
            if (Auth::user()->role === "profissional") {
                return $next($request);
            }
        }

        // Redirecione o usuário para uma página não autorizada ou qualquer outra página apropriada
        return redirect('/');
    }
}
