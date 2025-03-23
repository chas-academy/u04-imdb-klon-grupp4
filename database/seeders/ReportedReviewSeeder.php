<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportedReviewSeeder extends Seeder
{
    public function run()
    {
        // Create 10 reported reviews
        Report::factory()->count(10)->create();
    }
}
