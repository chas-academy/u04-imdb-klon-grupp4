<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        User::firstOrCreate(
            ['email' => 'admin@example.com'], // Check if email already exists
            [
                'username' => 'admin',
                'password' => bcrypt('password'), // Hash password
                'is_admin' => true,
            ]
        );

        // Create some random users using the factory
        User::factory()->count(10)->create();
    }
}
