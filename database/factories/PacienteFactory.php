<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paciente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'foto' => $this->faker->imageUrl(),
            'nombres' => $this->faker->name(),
            'apellido_paterno' => $this->faker->lastName(),
            'apellido_materno' => $this->faker->lastName(),
            'fecha_nacimiento' => $this->faker->date(),
            'sexo' => 'f',
            'peso' => rand(3, 300),
            'altura' => rand(0.3, 2.80),
            'estado' => $this->faker->state(),
            'municipio' => Str::random(10),
            'colonia' => Str::random(10),
            'domicilio' => Str::random(10),
            'codigo_postal' => rand(1000, 9999),
            'email' => $this->faker->safeEmail(),
            'telefono_fijo' => $this->faker->phoneNumber(),
            'telefono_movil' => $this->faker->phoneNumber(),
        ];
    }
}
