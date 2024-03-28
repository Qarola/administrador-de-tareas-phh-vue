<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PDFController;

use App\Http\Middleware\VerifyCsrfToken; 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Fruitcake\Cors\HandleCors;

Route::middleware(HandleCors::class)->group(function () {
    
    // Rutas para mostrar el formulario de inicio de sesión y manejar el inicio de sesión
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit')->middleware(VerifyCsrfToken::class);

    // Rutas para mostrar el formulario de registro y manejar el registro
    Route::get('/dashboard', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit')->middleware(VerifyCsrfToken::class); // Utiliza la clase del middleware

    // Ruta para mostrar la aplicación después de iniciar sesión
    Route::get('/app', [AuthController::class, 'showApp'])->name('app');

    // Rutas para manejar el cierre de sesión
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware(VerifyCsrfToken::class); // Utiliza la clase del middleware

    // Rutas para restablecer la contraseña
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email')->middleware(VerifyCsrfToken::class); // Utiliza la clase del middleware
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update')->middleware(VerifyCsrfToken::class); // Utiliza la clase del middleware

    // Para configurar contraseña después de recibir email
    Route::get('/set-password', [AuthController::class, 'showSetPasswordForm']);
    Route::post('/set-password', [AuthController::class, 'setPassword']);

    // Ruta para obtener el token CSRF
    Route::get('/csrf-token', function() {
        $token = Cookie::get('XSRF-TOKEN');
        return response()->json(['token' => $token]);
    });

    Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard');

    // Rutas para las tareas
    Route::middleware('auth:web')->group(function () {
        Route::get('/tasks', [TaskController::class, 'index']);
        Route::post('/tasks', [TaskController::class, 'store']);
        Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
        Route::patch('/tasks/{task}', [TaskController::class, 'updateStatus']);
    });

    // Ruta para generar reporte en PDF
    Route::get('/report', [ReportController::class, 'generate']);

    // Ruta para generar PDF
    Route::get('/generate-pdf', [PDFController::class, 'generate']);

});
