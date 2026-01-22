<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory()->times(5)->create();
        Project::All()->each(function (Project $project) {
            $project->tasks()->createMany(
                Task::factory()->times(2)->make()->toArray()
            );
        });
    }
}
