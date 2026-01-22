<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/** @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity> */
class ActivityFactory extends Factory
{
	protected $model = Activity::class;

	public function definition(): array
	{
		return [
			'name' => $this->faker->word(),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()->addDays(10),
		];
	}
}
