<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categoryName = $this->faker->word;
        return [
            'nome' => $categoryName,
            'description' => $this->faker->sentence,
            'slug' => Str::slug($categoryName),

        ];
    }
}
