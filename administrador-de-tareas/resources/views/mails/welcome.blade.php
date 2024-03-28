@component('mail::message')
# Bienvenido a Nuestra Plataforma

Hola {{ $user->name }},

¡Estamos encantados de darte la bienvenida a nuestra plataforma! Gracias por unirte a nosotros.

Por favor, haz clic en el botón de abajo para establecer tu contraseña y completar tu registro:

@component('mail::button', ['url' => url('/set-password?token=' . $user->reset_password_token)])
Establecer Contraseña
@endcomponent

Si no solicitaste esto, puedes ignorar este correo electrónico.

Saludos cordiales,<br>
El Equipo de la Plataforma
@endcomponent
