<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Los middleware de la aplicación HTTP.
     *
     * Estos middleware son ejecutados en cada solicitud a tu aplicación.
     *
     * @var array
     */
    protected $middleware = [
        // Middlewares globales...
    ];

    /**
     * Los grupos de middleware de la aplicación HTTP.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // Middlewares para rutas web...
        ],

        'api' => [
            // Middlewares para rutas de API...
        ],
    ];

    /**
     * Los middleware de ruta de la aplicación.
     *
     * Estos middleware pueden ser asignados a grupos o utilizados individualmente.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        // Otros middlewares de ruta...
        'api' => [
            \Fruitcake\Cors\HandleCors::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
        

    ];

    /**
     * Los middlewares de la aplicación que nunca deben ser aplicados a las rutas de API.
     *
     * @var array
     */
    protected $middlewareExcept = [
        // Rutas excluidas de los middlewares...
    ];
}

