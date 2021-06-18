<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Seeder;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Especialidad::create([
            'especialidad' => "odontologia general",
            'descripcion' => "La odontología es una de las ciencias de la salud que se encarga del diagnóstico, tratamiento y prevención de las enfermedades del aparato estomatognático, el cual incluye además de los dientes, las encías, el tejido periodontal, el maxilar superior, el maxilar inferior y la articulación temporomandibular."
        ]);
        Especialidad::create([
            'especialidad' => "Implantologia",
            'descripcion' => "La implantología dental es la disciplina de la odontología que se ocupa del estudio de los materiales aloplásticos dentro o sobre los huesos de maxilares para dar apoyo a una rehabilitación dental."
        ]);
        Especialidad::create([
            'especialidad' => "Odontopediatría",
            'descripcion' => "La odontopediatría es la rama de la odontología encargada de tratar a los niños."
        ]);
        Especialidad::create([
            'especialidad' => "Radiologia",
            'descripcion' => "Especialidad médica, que se ocupa de generar imágenes del interior del cuerpo mediante diferentes agentes físicos (rayos X, ultrasonidos, campos magnéticos, entre otros)"
        ]);
    }
}
