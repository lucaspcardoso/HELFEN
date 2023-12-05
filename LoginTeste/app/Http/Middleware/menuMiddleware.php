<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Laravel\Jetstream\Http\Livewire\NavigationMenu;
use Symfony\Component\HttpFoundation\Response;

class menuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (str_starts_with($request->getPathInfo(), '/dashboard')) {
            // Recupere suas categorias a partir de onde quer que estejam armazenadas.
            $categories = Categoria::all();

            // Compartilhe as categorias com todas as views.
            NavigationMenu::share('categorias', $categories);
        }

        return $next($request);
    }
}
