<?php

namespace Database\Seeders;

use App\Models\Cita;
use Illuminate\Database\Seeder;

class CitaSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Cita::create([
            'doctor_id'   => '1',
            'paciente_id' => '1',
            'fecha'       => '2021-06-19',
            'hora'        => '01:30:00',
            'nota'        => 'Cita 1',
            'status'      => 'f',
        ]);
        Cita::create([
            'doctor_id'   => '2',
            'paciente_id' => '4',
            'fecha'       => '2021-06-19',
            'hora'        => '02:30:00',
            'nota'        => 'Cita 2',
            'status'      => 'p',
        ]);
        Cita::create([
            'doctor_id'   => '4',
            'paciente_id' => '20',
            'fecha'       => '2021-06-19',
            'hora'        => '03:30:00',
            'nota'        => 'Cita 3',
            'status'      => 'a',
        ]);
        Cita::create([
            'doctor_id'   => '4',
            'paciente_id' => '10',
            'fecha'       => '2021-06-20',
            'hora'        => '01:30:00',
            'nota'        => 'Cita 4',
            'status'      => 'a',
        ]);
    }
}
