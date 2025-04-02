<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(3),
            "description" => fake()->realText(),
            "writer" => User::inRandomOrder()->first()->id ?? User::factory(),
            "cover" => fake()->imageUrl(200, 300, 'books', true, 'Book Cover'),
            "price" => fake()->randomFloat(2, 100, 800)
        ];
    }
}
