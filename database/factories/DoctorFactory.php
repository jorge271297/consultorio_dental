<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

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
            'cedula_profesional' => rand(10000,10000),
            'numero_salubridad' => rand(10000,10000),
            'estado' => $this->faker->state(),
            'municipio' => Str::random(10),
            'colonia' => Str::random(10),
            'domicilio' => Str::random(10),
            'codigo_postal' => rand(1000, 9999),
            'telefono_fijo' => $this->faker->phoneNumber(),
            'telefono_movil' => $this->faker->phoneNumber(),
        ];
    }
}
