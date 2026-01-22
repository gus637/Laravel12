<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/** @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task> */
class TaskFactory extends Factory
{
	protected $model = Task::class;

	public function definition(): array
	{
        $creating_date = Carbon::now()->subDays(random_int(1, 60));
        $updating_date = (clone $creating_date)->addDays(random_int(0, 100));
        do {
            $task = $this->faker->word();
            $len = strlen($task);
        } while (Task::where('task', $task)->exists()|| $len < 10 || $len > 200);
		return [
			'task' => $task,
			'begindate' => Carbon::now()->subDays(random_int(1, 60)),
			'enddate' => Carbon::now()->addDays(random_int(0, 60)),
			'created_at' => $creating_date,
			'updated_at' => $updating_date,

			'user_id' => User::all()->random()->id,
			'project_id' => Project::all()->random()->id,
			'activity_id' => Activity::all()->random()->id,
		];
	}
}
