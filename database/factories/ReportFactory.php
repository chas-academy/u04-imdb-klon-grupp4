<?php

namespace Database\Factories;

use App\Models\Report;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    protected $model = Report::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Create a random user for each report
            'review_id' => Review::factory(), // Create a random review for each report
            'flags' => $this->faker->words(3), // Random flags
            'description' => $this->faker->sentence(), // Random description
        ];
    }
}
