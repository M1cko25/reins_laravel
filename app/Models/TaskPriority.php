<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskPriority extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'color',
    ];

    /**
     * Get the tasks with this priority.
     *
     * @return HasMany<Task, $this>
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'priority_id');
    }
}
