<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static paginate(int $int)
 * @property int $id
 * @property string $name
 * @property string $description
 */
class Project extends Model
{
    use HasFactory;
    protected $guarded = ["name", "description"];

    public static function create(mixed $validated): self
    {
        $project = new self;
        $project->name = $validated["name"];
        $project->description = $validated["description"];
        $project->save();
        return $project;
    }
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
