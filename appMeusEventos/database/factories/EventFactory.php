<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    protected $model = Event::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence;
        return [
            'title' => $name,
            'description' => $this->faker->word(7, true),
            'body' => $this->faker->paragraph,
            'start_event' => now(),
            'slug' => Str::slug($name)
        ];
    }
}
