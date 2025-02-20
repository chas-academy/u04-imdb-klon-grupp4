<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'release_date' => $this->faker->year,
            'plot' => $this->faker->paragraph,
            'poster' => 'default-poster.jpg',
            'duration' => $this->faker->numberBetween(80, 100) . ' min',


        ];
    }
}
