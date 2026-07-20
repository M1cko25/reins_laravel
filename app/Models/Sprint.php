<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sprint extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'project_id',
        'name',
        'start_date',
        'end_date',
        'status_id',
        'is_active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'project_id' => 'integer',
            'status_id' => 'integer',
            'is_active' => 'boolean',
            'start_date' => 'datetime',
            'end_date' => 'datetime',
        ];
    }

    /**
     * Get the project that this sprint belongs to.
     *
     * @return BelongsTo<Projects, $this>
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Projects::class, 'project_id');
    }

    /**
     * Get the tasks in this sprint.
     *
     * @return HasMany<Task, $this>
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'sprint_id');
    }
}
