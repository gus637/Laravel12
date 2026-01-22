<?php

use App\Models\Activity;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void
	{
		Schema::create('tasks', function (Blueprint $table) {
            // task database fields
			$table->id();
			$table->string('task');
			$table->date('begindate');
			$table->date('enddate');

            // foreign keys
			$table->foreignIdFor(User::class)
                ->constrained('users');

			$table->foreignIdFor(Project::class)
                ->constrained('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

			$table->foreignIdFor(Activity::class)
                ->constrained('activities')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            // timestamps
			$table->timestamps();

		});
	}

	public function down(): void
	{
		Schema::dropIfExists('tasks');
	}
};
