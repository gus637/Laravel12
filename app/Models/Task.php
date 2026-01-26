<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @method static paginate(int $int): Task[]
 * @property int $id
 * @property string $task
 * @property Carbon $begindate
 * @property Carbon $enddate
 * @property int $user_id
 * @property int $project_id
 * @property int $activity_id
 */
class Task extends Model
{
	use HasFactory;

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function project(): BelongsTo
	{
		return $this->belongsTo(Project::class);
	}

	public function activity(): BelongsTo
	{
		return $this->belongsTo(Activity::class);
	}

    public function TaskLabel(): HasMany
    {
        return $this->hasMany(TaskLabel::class);
    }
	protected function casts(): array
	{
		return [
			'begindate' => 'date',
			'enddate' => 'date',
		];
	}
}
