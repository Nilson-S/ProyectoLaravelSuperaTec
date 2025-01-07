<?php

namespace Spatie\Permission\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si el usuario existe y tiene alguno de los roles requeridos
        if (!$user || !$user->hasAnyRole($roles)) {
            abort(403, 'No tienes permiso para acceder a esta página');
        }
        

        return $next($request);
    }
}
