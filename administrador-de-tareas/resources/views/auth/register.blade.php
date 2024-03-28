@extends('app')

@section('title', 'Registro')

@section('content')
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro de Usuario</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="register-form" id="showRegistrationForm">
            <h2>Registro de Usuario</h2>
            <form action="{{ route('register.submit') }}" method="POST">
                @csrf <!-- Agrega el token CSRF para protección contra falsificación de solicitudes entre sitios -->
                <input type="text" name="name" placeholder="Nombre del usuario" required>
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <select name="role" required>
                    <option value="" disabled selected>Seleccionar rol</option>
                    <option value="admin">Administrador</option>
                    <option value="user">Usuario</option>
                </select>
                <button type="submit">Registrarse</button>
            </form>
        </div>
        <script>
            document.getElementById('showRegistrationForm').addEventListener('click', function(event) { // Corregido el id aquí
                event.preventDefault();
                var showRegistrationForm = document.getElementById('showRegistrationForm');
                showRegistrationForm.style.display = showRegistrationForm.style.display === 'block' ? 'none' : 'block';
            });
        </script>
    </body>
    </html>
@endsection
