<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecimiento de Contraseña</title>
</head>
<body>
    <h1>Restablecimiento de Contraseña</h1>
    <p>Hola {{ $user->name }},</p>
    <p>Recibiste este correo porque solicitaste restablecer tu contraseña. Haz clic en el siguiente enlace para cambiar tu contraseña:</p>
    <a href="{{ $resetPasswordUrl }}">Restablecer Contraseña</a>
    <p>Si no solicitaste este cambio, puedes ignorar este correo.</p>
    <p>¡Gracias!</p>
</body>
</html>
