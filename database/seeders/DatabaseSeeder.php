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
        // \App\Models\User::factory(10)->create();
        \App\Models\Paciente::factory(20)->create();
        $this->call([
            AlergiaSeeder::class,
            EspecialidadSeeder::class,
            AlergiaPacienteSeeder::class
        ]);
    }
}
