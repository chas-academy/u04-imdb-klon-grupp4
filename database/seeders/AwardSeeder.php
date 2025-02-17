<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Award;

class AwardSeeder extends Seeder
{
    
    public function run(): void
    {
       
        Award::factory()->count(5)->create();
    }
}

