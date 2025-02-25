<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\MovieList;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            GenreSeeder::class,
            ActorSeeder::class,
            DirectorSeeder::class,
            // AwardSeeder::class, // if needed for movies or other parts of your app
            MovieSeeder::class,
            MovieListSeeder::class,
            ReviewSeeder::class,
        ]);

        $lists = MovieList::all();
        $movies = Movie::all();

        $lists->each(function ($list) use ($movies) {
            $list->movies()->attach(
                $movies->random(5, 15)->pluck('id')
            );
        });
    }
}
