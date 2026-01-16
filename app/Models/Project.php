<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
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
}
