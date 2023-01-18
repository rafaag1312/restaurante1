<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Mesa;
use App\Models\User;
use App\Models\Horario;
use App\Models\Invitado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserva>
 */
class ReservaFactory extends Factory
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
            "num_personas" => fake()->numberBetween($min = 1, $max = 8),
            "id_cliente" => fake()->randomElement(User::all())["id"],
            "id_invitado" => fake()->randomElement(Invitado::all())["id"],
            "id_menu" => fake()->randomElement(Menu::all())["id"],
            "id_mesa" => fake()->randomElement(Mesa::all())["id"],
            "fecha_reserva" => fake()->randomElement(Horario::all())["id"],
        ];
    }
}
