<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacto>
 */
class ContactoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nombre" => fake()->name(),
            "email" => fake()->unique()->safeEmail(),
            "telefono" => fake()->phoneNumber(),
            "asunto" => fake()->text(),
            "mensaje" => fake()->paragraph(),
        ];
    }
}
