<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlergiaPacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alergias_pacientes')->insert([
            'alergia_id' => 1,
            'paciente_id' => 1,
        ]);
        DB::table('alergias_pacientes')->insert([
            'alergia_id' => 2,
            'paciente_id' => 1,
        ]);
        DB::table('alergias_pacientes')->insert([
            'alergia_id' => 3,
            'paciente_id' => 2,
        ]);
        DB::table('alergias_pacientes')->insert([
            'alergia_id' => 2,
            'paciente_id' => 3,
        ]);
        DB::table('alergias_pacientes')->insert([
            'alergia_id' => 1,
            'paciente_id' => 4,
        ]);
        DB::table('alergias_pacientes')->insert([
            'alergia_id' => 3,
            'paciente_id' => 5,
        ]);
    }
}
