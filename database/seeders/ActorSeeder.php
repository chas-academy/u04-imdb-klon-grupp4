<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actor;

class ActorSeeder extends Seeder
{
    public function run()
    {
        Actor::factory()->count(10)->create(); // This will create 10 actors
    }
}

