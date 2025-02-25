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

        $trailerIndex = $this->faker->numberBetween(0, 2);
        $trailers = [
            "https://www.youtube.com/embed/22w7z_lT6YM?si=JNl2pBcsvHZ3XlA8",
            "https://www.youtube.com/embed/BjJcYdEOI0k?si=WB87lALUqHW-DYrN",
            "https://www.youtube.com/embed/s__osnzooxA?si=8yI_-1XUIH-iZ2hZ"
        ];

        return [
            'title' => $this->faker->sentence(3),
            'release_date' => $this->faker->year,
            'plot' => $this->faker->paragraph,
            'poster' => 'images/posters/' . basename($images[array_rand($images)]),
            'duration' => $this->faker->numberBetween(80, 100) . ' min',
            'trailer' => $trailers[$trailerIndex]
        ];
    }
}
