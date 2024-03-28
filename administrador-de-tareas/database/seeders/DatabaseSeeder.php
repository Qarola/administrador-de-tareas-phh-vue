<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Call the seeders you want to run here
        $this->call(SuperAdminSeeder::class); // Ejemplo: llama a tu seeder SuperAdminSeeder
    }
}
