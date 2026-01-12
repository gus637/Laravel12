<?php

namespace Database\Factories;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->realTextBetween(10, 45),
            'description' => fake()->paragraphs(2, true),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()->addDays(10),
        ];
    }
}
