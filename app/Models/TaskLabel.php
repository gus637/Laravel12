<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $label_id
 * @property int $task_id
 */
class TaskLabel extends Model
{
	protected $table = 'tasklabels';

	public function label(): BelongsTo
	{
		return $this->belongsTo(Label::class);
	}

	public function tasks(): BelongsTo
	{
		return $this->belongsTo(Task::class);
	}
}
