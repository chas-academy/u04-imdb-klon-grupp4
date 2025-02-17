<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Actor;
use App\Models\Director;

class MovieSeeder extends Seeder
{
    
    public function run(): void
    {
        
        $genres = Genre::all();
        $actors = Actor::all();
        $directors = Director::all();

        // Create 10 movies using the factory
        Movie::factory()->count(10)->create()->each(function ($movie) use ($genres, $actors, $directors) {
            // Attach between 1 and 3 random genres 
            if ($genres->isNotEmpty()) {
                $movie->genres()->attach(
                    $genres->random(rand(1, 3))->pluck('id')->toArray()
                );
            }

            // Attach between 1 and 3 random actors 
            if ($actors->isNotEmpty()) {
                $movie->actors()->attach(
                    $actors->random(rand(1, 3))->pluck('id')->toArray()
                );
            }

            // Attach 1 random director 
            if ($directors->isNotEmpty()) {
                $movie->directors()->attach(
                    $directors->random(1)->pluck('id')->toArray()
                );
            }
        });
    }
}
