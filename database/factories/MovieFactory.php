<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Award;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'release_year' => $this->faker->year(),
            'plot' => $this->faker->paragraph(),
            'poster' => $this->faker->imageUrl(),
            'duration' => $this->faker->numberBetween(90, 180) . ' min',
            'award_id' => Award::factory(), // Assumes an Award model and factory exist
        ];
    }
}
