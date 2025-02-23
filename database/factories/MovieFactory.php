<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition(): array
    {
        $images = glob(public_path('images/posters/*'));
        
        return [
            'title' => $this->faker->sentence(3),
            'release_date' => $this->faker->year,
            'plot' => $this->faker->paragraph,
            'poster' => 'images/posters/' . basename($images[array_rand($images)]),
            'duration' => $this->faker->numberBetween(80, 100) . ' min',
        ];
    }
}


