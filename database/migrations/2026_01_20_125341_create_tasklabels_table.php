<?php

use App\Models\Label;
use App\Models\Task;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void
	{
		Schema::create('tasklabels', function (Blueprint $table) {
			$table->id();
			$table->foreignIdFor(Label::class)->constrained('labels');
			$table->foreignIdFor(Task::class)->constrained('tasks');
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('tasklabels');
	}
};
