<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Models\Role;

class Kernel extends HttpKernel
{
    /**
     * Las pilas de middlewares HTTP globales de la aplicación.
     *
     * Estos middlewares se ejecutan durante cada solicitud a la aplicación.
     *
     * @var array
     */
    protected $middleware = [
        // Middlewares globales predeterminados de Laravel

        \Illuminate\Http\Middleware\HandleCors::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,

        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * Las pilas de middleware por grupo de rutas.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [

            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
        
        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Middlewares de rutas individuales.
     *
     * Estos middlewares se pueden asignar a rutas individuales o grupos de rutas.
     *
     * @var array
     */
    protected $routeMiddleware = [

        'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
        
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,

        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
   
        
        // Registro del middleware de roles

    
        
    ];
}
