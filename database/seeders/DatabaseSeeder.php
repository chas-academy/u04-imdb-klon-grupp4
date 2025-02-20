<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GenreSeeder::class,
            ActorSeeder::class,
            DirectorSeeder::class,
           // AwardSeeder::class, // if needed for movies or other parts of your app
            MovieSeeder::class,
            UserSeeder::class,
        ]);

        User::factory()->create([
            'email' => fake()->unique()->safeEmail(),
            'username' => fake()->unique()->userName(),
        ]);
    }
    
}
