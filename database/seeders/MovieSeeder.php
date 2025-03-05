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

        $imageUrls = [
            "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/movie-poster-template-design-425afebdc1dd8a9bac0e3d27cd2bef95.jpg?ts=1637002317",
            "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/aqua-maximalist-the-phantom-of-the-opera-a4-design-template-8377f85d6075300cf1a799903abe622d_screen.jpg?ts=1730390492",
            "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/brown-vintage-retro-night-party-a4-design-template-467d82150c7c064d8d3b2851b96a28ca_screen.jpg?ts=1740065571",
            "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/blue-maximalist-teddy-at-the-party-night-a4-design-template-4a67a1df81d0264c221d7815c8cf9216_screen.jpg?ts=1739887378",
            "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/black-3d-jungle-party-%22the-sect%22-a4-design-template-65717f8002ee06442463550a83663ab8_screen.jpg?ts=1739205157",
            "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/red-maximalist-valentines-party-poster-design-template-0c4388bb8f5c1168bcb607f16250f001_screen.jpg?ts=1739021544",
            "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/maximalist-valentine-pink-party-a4-design-template-135392f622ffca359aaa150077747e6b_screen.jpg?ts=1738506737",
            "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/black-neon-jungle-party-a4-design-template-e3d6062c9274e4d1892057778320aa75_screen.jpg?ts=1736173837",
            "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/de5a1b99a77a1d96f6481600733cd2c5_screen.jpg?ts=1735635766",
            "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/purple-maximalist-lovers-night-special-valent-design-template-0045828f653c79b22b27bce93e7f6f99_screen.jpg?ts=1738785758",
            "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/blue-maximalist-easter-egg-hunt-party-a4-design-template-1f9103a50593eb35c7b0892b8ccff14d_screen.jpg?ts=1738506739",
            "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/black-3d-bad-santa-night-party-a4-design-template-7725d5a2eb599fbbaa1e1129f9b48d24_screen.jpg?ts=1735398031",
            "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/red-maximalist-funky-monkey-night-party-insta-design-template-a04e626f8e435ce1d0587007ea175d0d_screen.jpg?ts=1735318911",
            "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/modern-%26-minimal-drama-action-movie-a4-design-template-10517c650397549d2e7b1a56dde4721a_screen.jpg?ts=1726281052",
        ];

        // Create 50 movies using the factory
        Movie::factory()->count(50)->create()->each(function ($movie) use ($genres, $actors, $directors, $imageUrls) {
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

            // Assign a random image URL from the list
            $movie->poster = $imageUrls[array_rand($imageUrls)];

            // Save the movie with the random poster
            $movie->save();
        });
    }
}
