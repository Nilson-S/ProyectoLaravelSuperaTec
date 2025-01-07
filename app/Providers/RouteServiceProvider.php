<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * El espacio de nombres para las rutas del controlador.
     *
     * @var string
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Cargar las rutas para la aplicación.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Registrando el middleware para roles (si no está registrado aún)
        Route::aliasMiddleware('role', \Spatie\Permission\Middlewares\RoleMiddleware::class);
    }

    /**
     * Definir las rutas para la aplicación.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
        $this->mapApiRoutes();
    }

    /**
     * Definir las rutas web para la aplicación.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Definir las rutas API para la aplicación.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
