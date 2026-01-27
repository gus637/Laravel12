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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property ?User $user
 * @property Project $project
 * @property Activity $activity
 * @property TaskLabel[] $TaskLabel
 * @property Carbon $beginDate
 * @property ?Carbon $endDate
 */
class Task extends Model
{
	use HasFactory;

    protected $guarded = [
        'task',
        'begindate',
        'enddate',
        'user_id',
        'project_id',
        'activity_id',
    ];

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
//	protected function casts(): array
//	{
//		return [
//			'begindate' => 'date',
//			'enddate' => 'date',
//		];
//	}
}
