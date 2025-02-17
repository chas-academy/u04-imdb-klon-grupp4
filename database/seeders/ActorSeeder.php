<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actor;

class ActorSeeder extends Seeder
{
    
    public function run(): void
    {
        // Create 10 actors
        Actor::factory()->count(10)->create();
    }
}

