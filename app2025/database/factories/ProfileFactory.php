<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'about' => $this->faker->paragraph(),
            'phone' => $this->faker->numerify('(##) #####-####'),
            'social_networks' => 'fabook-twitter-instagram',
        ];
    }
}
