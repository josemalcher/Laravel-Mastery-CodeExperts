<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->sentence;

        return [
            'title' => $name,
            'description' => $this->faker->words(7, true),
            'body' => $this->faker->paragraph,
            'start_event' => now(),
            'slug' => Str::slug($name),

        ];
    }
}
