<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence(5),
            "content" => $this->faker->sentences(8, true),
            "rating" => $this->faker->randomFloat(1, 1, 10),
            "own_rating" => $this->faker->numberBetween(1, 10),
            "movie_id" => Movie::all()->random()->id,
            "user_id" => User::all()->random()->id,
        ];
    }
}
