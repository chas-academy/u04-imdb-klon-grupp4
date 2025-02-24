<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Award;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all genres, actors, directors, and awards that have been seeded
        $genres = Genre::all();
        $actors = Actor::all();
        $directors = Director::all();
       // $awards = Award::all();

       // Get all images from the posters folder
       $images = glob(public_path('images/posters/*'));

       // Get all images from the posters folder
       $images = glob(public_path('images/posters/*'));

        // Create 50 movies using the factory
        Movie::factory()->count(50)->create()->each(function ($movie) use ($genres, $actors, $directors) {
            // Attach between 1 and 3 random genres if any exist
            if ($genres->isNotEmpty()) {
                $movie->genres()->attach(
                    $genres->random(rand(1, 3))->pluck('id')->toArray()
                );
            }

            // Attach between 1 and 3 random actors if any exist
            if ($actors->isNotEmpty()) {
                $movie->actors()->attach(
                    $actors->random(rand(1, 3))->pluck('id')->toArray()
                );
            }

            // Attach 1 random director if any exist
            if ($directors->isNotEmpty()) {
                $movie->directors()->attach(
                    $directors->random(1)->pluck('id')->toArray()
                );
            }

            // Assign a random image from the posters folder
            if (!empty($images)) {
                // Get a random image from the array and assign it to the movie's poster
                $poster = $images[array_rand($images)];
                $movie->poster = asset('images/posters/' . basename($poster));
            }

            // Save the movie with the random poster
            $movie->save();
        });
    }
}
