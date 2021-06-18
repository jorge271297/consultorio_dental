<?php

namespace Database\Seeders;

use App\Models\Alergia;
use Illuminate\Database\Seeder;

class AlergiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alergia::create([
            'alergia' => "Alergia al Paracetamol",
            'descripcion' => "Alguno de los síntomas de una reacción alérgica al paracetamol, son: ronchas, dificultad para respirar; hinchazón de la cara, labios, lengua, o garganta."
        ]);
        Alergia::create([
            'alergia' => "Alergia al naproxeno",
            'descripcion' => "Alguno de los síntomas de una reacción alérgica al naproxeno, son: Erupción cutánea, Urticaria, Picazón, Fiebre, Hinchazón, Falta de aire, Silbido al respirar, o Moqueo."
        ]);
        Alergia::create([
            'alergia' => "Alergia a la Penicilina",
            'descripcion' => "Alguno de los síntomas de una reacción alérgica a la penicilina, son: Erupción cutánea, Urticaria, Picazón, Fiebre, Hinchazón, Falta de aire, Sibilancia, Catarro, Ojos llorosos con picazón, o Anafilaxia."
        ]);
    }
}
