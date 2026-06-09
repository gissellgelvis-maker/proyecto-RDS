<?php

namespace Database\Factories;

use App\Models\Cargo;
use App\Models\FuncionesCargo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FuncionesCargo>
 */
class FuncionesCargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descripcion_funcion' => $this->faker->sentence(),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
            'id_cargo' => Cargo::factory()
        ];
    }
}
