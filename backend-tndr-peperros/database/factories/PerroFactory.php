<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perro>
 */
class PerroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'perro_nombre' => $this->faker->name,
            'perro_imagen' => $this->faker->sentence,
            'perro_descripcion' => $this->faker->sentence,
        ];
    }
}
