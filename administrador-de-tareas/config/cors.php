<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders, y allowedMethods pueden establecerse en array('*')
    | para aceptar cualquier valor.
    |
    */

    'paths' => ['api/*', 'login', 'register', ], // Rutas que deben permitir CORS

    'allowed_methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'], // Métodos permitidos

    'allowed_origins' => ['http://localhost:8080'], // Orígenes permitidos

    'allowed_headers' => ['Content-Type', 'Authorization'], // Encabezados permitidos

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];

