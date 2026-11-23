<?php

namespace Database\Factories;

use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Equipo>
 */
class EquipoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->numerify('EQ-#####'),
            'nombre' => $this->faker->randomElement([
                'Computadora portátil',
                'Monitor',
                'Impresora',
                'Teclado',
                'Mouse',
                'Proyector',
                'Servidor',
                'Escáner',
            ]),
            'marca' => $this->faker->company(),
            'fecha_adquisicion' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'estado' => $this->faker->randomElement(['Disponible', 'En uso', 'En mantenimiento']),
        ];
    }
}
