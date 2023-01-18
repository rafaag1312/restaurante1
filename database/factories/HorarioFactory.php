<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Horario>
 */
class HorarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "fecha" => fake()->dateTimeBetween($startDate = '-15 days', $endDate = '+15 days'),
            "hora" => fake()->time(),
            "estado" => "Disponible",
        ];
    }
}
