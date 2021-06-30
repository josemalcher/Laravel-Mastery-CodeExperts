<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        return [
            'title'       => $title,
            'description' => $this->faker->word(7,true),
            'body'        =>$this->faker->paragraph,
            'slug'        => Str::slug($title),
            'start_event' => now(),

        ];
    }
}
