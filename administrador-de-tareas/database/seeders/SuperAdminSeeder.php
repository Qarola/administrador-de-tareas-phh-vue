<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Notifications\WelcomeNotification;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        // Verifica si el usuario superadmin ya existe
        $superAdmin = User::where('email', 'superadmin@example.com')->first();

        // Si no existe, crearlo
        if (!$superAdmin) {
            $superAdmin = User::create([
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('password'), // Cambia la contraseña por una segura
                'is_admin' => true,
            ]);

            // Autentica al usuario
            Auth::login($superAdmin);
            
            // Envía correo electrónico de bienvenida
            $superAdmin->notify(new WelcomeNotification());
        }
    }
}
