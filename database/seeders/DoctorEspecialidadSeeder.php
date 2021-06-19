<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorEspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctores_especialidades')->insert([
            'doctor_id' => 1,
            'especialidad_id' => 1,
        ]);
        DB::table('doctores_especialidades')->insert([
            'doctor_id' => 1,
            'especialidad_id' => 2,
        ]);
        DB::table('doctores_especialidades')->insert([
            'doctor_id' => 1,
            'especialidad_id' => 3,
        ]);
        DB::table('doctores_especialidades')->insert([
            'doctor_id' => 2,
            'especialidad_id' => 1,
        ]);
        DB::table('doctores_especialidades')->insert([
            'doctor_id' => 2,
            'especialidad_id' => 2,
        ]);
        DB::table('doctores_especialidades')->insert([
            'doctor_id' => 2,
            'especialidad_id' => 3,
        ]);
    }
}
