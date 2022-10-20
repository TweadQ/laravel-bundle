<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(10),
            'url_img' => "https://source.unsplash.com/random/640×480",
            'price' => fake()->randomNumber(),
            'author' => fake()->name(),
            'nombre_pages' => fake()->randomDigit(),
            'created_at' => now(),
        ];
    }
}
