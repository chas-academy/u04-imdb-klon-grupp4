<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Director;

class DirectorSeeder extends Seeder
{
    public function run()
    {
        Director::factory()->count(10)->create(); // Create 10 directors
    }
}
