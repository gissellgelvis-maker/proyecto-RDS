<?php

namespace Database\Factories;

use App\Models\Cargo;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '2000-01-01'),
            'fecha_ingreso' => $this->faker->date('Y-m-d', 'now'),
            'salario' => $this->faker->randomFloat(2, 1000, 9999),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
            'id_cargo' => Cargo::factory()
        ];
    }
}
