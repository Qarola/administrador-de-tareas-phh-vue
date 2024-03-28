<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use App\Mail\ResetPasswordMail;
use App\Mail\WelcomeMail;

use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors'); // Aplicar el middleware CORS a todos los métodos del controlador
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

         // Registra un mensaje de depuración con las credenciales recibidas
         Log::info('Credentials received: ' . print_r($credentials, true));

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->is_admin) {
                // Si el usuario es un administrador, redirigir al panel de administración
                return redirect()->intended('dashboard');
            } else {
                // Si el usuario no es un administrador, responder con un error de autorización
                return redirect()->back()->withErrors(['message' => 'Unauthorized']);
            }
        } else {
            // Si las credenciales son incorrectas, redirigir de nuevo al formulario de inicio de sesión con un mensaje de error
            return redirect()->back()->withErrors(['message' => 'Credenciales incorrectas']);
        }
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function showApp()
    {
        return view('app');
    }

    public function showDashboard()
{
    return view('admin.dashboard');
}


public function register(Request $request)
{
    // Validación de datos del usuario
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
    ]);

    // Si la validación falla, retornar respuesta con errores
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    try {
        // Verifica si el usuario actual es administrador
        $isAdmin = Auth::check() && Auth::user()->is_admin;

        // Crea un nuevo usuario y lo marca como administrador si el usuario actual es administrador
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $isAdmin ? $request->input('is_admin', false) : false, // Solo si el usuario actual es administrador
            'password_configured' => false,
        ]);

        // Enviar correo electrónico de bienvenida al nuevo usuario
        Mail::to($user->email)->send(new WelcomeMail($user));

        // Retornar respuesta de éxito
        return response()->json(['message' => 'Usuario registrado exitosamente'], 201);
    } catch (\Exception $e) {
        // Si ocurre un error al crear el usuario, retornar mensaje de error
        return response()->json(['message' => 'Error al registrar el usuario', 'error' => $e->getMessage()], 500);
    }
}




public function setPassword(Request $request)
{
    // Valida si el token de restablecimiento y la nueva contraseña están presentes en la solicitud
    $request->validate([
        'token' => 'required',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Busca el usuario por el token de restablecimiento
    $user = User::where('reset_password_token', $request->token)->first();

    if (!$user) {
        // Si no se encuentra el usuario con el token de restablecimiento, responder con un error
        return response()->json(['error' => 'Invalid token'], 404);
    }

    // Actualiza la contraseña del usuario con la nueva contraseña proporcionada
    $user->update([
        'password' => Hash::make($request->password),
        'reset_password_token' => null, // Limpia el token de restablecimiento
    ]);

    // Redirige al usuario a la página de inicio de sesión u otra página de tu elección
    return redirect()->route('login')->with('success', 'Your password has been successfully set. Please log in with your new password.');
}

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }

    public function forgotPassword(Request $request)
    {
        // Validación que el correo electrónico proporcionado tenga un formato válido
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
    
        // Si la validación falla, devolver errores de validación
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
    
        try {
            // Obtener el usuario por su dirección de correo electrónico
            $user = User::where('email', $request->email)->first();
    
            if (!$user) {
                return response()->json(['message' => 'Usuario no encontrado'], 404);
            }
    
            // Generar un token para el restablecimiento de contraseña
            $token = bin2hex(random_bytes(30));
    
            // Guardar el token en la columna 'reset_password_token' de la tabla de usuarios
            $user->update(['reset_password_token' => $token]);
    
            // Construir la URL para restablecer la contraseña
            $resetPasswordUrl = url('/reset-password?token=' . $token);
    
            // Enviar un correo electrónico al usuario con un enlace para restablecer la contraseña
            Mail::to($user->email)->send(new ResetPasswordMail($user, $resetPasswordUrl));
    
            return response()->json(['message' => 'Correo electrónico de restablecimiento de contraseña enviado'], 200);
        } catch (\Exception $e) {
            // Si ocurre un error al enviar el correo electrónico, retornar un mensaje de error
            return response()->json(['message' => 'Error al enviar el correo electrónico de restablecimiento de contraseña', 'error' => $e->getMessage()], 500);
        }
    }


    public function resetPassword(Request $request)
    {
        // Valida si el token de restablecimiento y la nueva contraseña están presentes
        if (!$request->has('token') || !$request->has('password')) {
            return response()->json(['error' => 'Token and password are required'], 422);
        }
    
        // Busca el usuario por el token de restablecimiento
        $user = User::where('reset_password_token', $request->token)->first();
    
        if (!$user) {
            // Si no se encuentra el usuario con el token de restablecimiento, responder con un error
            return response()->json(['error' => 'Invalid token'], 404);
        }
    
        // Actualiza la contraseña del usuario con la nueva contraseña proporcionada
        $user->update([
            'password' => Hash::make($request->password),
            'reset_password_token' => null, // Limpia el token de restablecimiento
        ]);
    
        // Devuelve la respuesta JSON con el mensaje y el token
        return response()->json(['message' => 'Password reset successfully', 'token' => $request->token], 200);
    }
    
    public function getToken()
{
    $token = Cookie::get('XSRF-TOKEN');
    return response()->json(['token' => $token]);
}
}
