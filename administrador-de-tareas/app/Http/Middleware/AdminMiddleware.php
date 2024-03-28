<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado
        if (!$request->user()) {
            return response()->json(['error' => 'Unauthorized. You must be logged in to access this resource.'], 401);
        }

        // Verifica si el usuario autenticado es un administrador
        if (!$request->user()->is_admin) {
            return response()->json(['error' => 'Unauthorized. Only admins can access this resource.'], 403);
        }

        return $next($request);
    }
}
