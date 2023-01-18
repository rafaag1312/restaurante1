<?php

namespace Database\Factories;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarjeta>
 */
class TarjetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "num_tarjeta" => fake()->numberBetween($min = 10000000, $max = 99999999),
            "mes_caducidad" => fake()->numberBetween($min = 1, $max = 12),
            "anyo_caducidad" => fake()->numberBetween($min = 2023, $max = 2032),
            "cvv" => fake()->numberBetween($min = 100, $max = 999),
            "id_cliente" => fake()->randomElement(User::all())["id"],
        ];
    }
}
