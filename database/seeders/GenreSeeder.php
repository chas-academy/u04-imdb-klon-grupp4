<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            "comedy",
            "fantasy",
            "science fiction",
            "crime",
            "mystery",
            "drama",
            "horror",
            "action",
            "documentary",
            "historical",
            "western",
            "film noir",
            "thriller",
            "romance",
            "animation",
            "musical",
            "adventure"
        ];

        foreach ($genres as $genre) {
            Genre::create(["name" => $genre]);
        }
    }
}
