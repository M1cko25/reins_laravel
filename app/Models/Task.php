<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uid',
        'project_id',
        'title',
        'description',
        'status_id',
        'priority_id',
        'assignee_id',
        'reporter_id',
        'epic_id',
        'sprint_id',
        'parent_task_id',
        'url',
        'due_date',
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
            'priority_id' => 'integer',
            'assignee_id' => 'integer',
            'reporter_id' => 'integer',
            'epic_id' => 'integer',
            'sprint_id' => 'integer',
            'parent_task_id' => 'integer',
            'due_date' => 'datetime',
        ];
    }

    /**
     * Get the project that this task belongs to.
     *
     * @return BelongsTo<Projects, $this>
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Projects::class, 'project_id');
    }

    /**
     * Get the priority level for this task.
     *
     * @return BelongsTo<TaskPriority, $this>
     */
    public function priority(): BelongsTo
    {
        return $this->belongsTo(TaskPriority::class, 'priority_id');
    }

    /**
     * Get the user assigned to this task.
     *
     * @return BelongsTo<User, $this>
     */
    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    /**
     * Get the user who reported this task.
     *
     * @return BelongsTo<User, $this>
     */
    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    /**
     * Get the epic that contains this task.
     *
     * @return BelongsTo<Epic, $this>
     */
    public function epic(): BelongsTo
    {
        return $this->belongsTo(Epic::class, 'epic_id');
    }

    /**
     * Get the sprint this task is assigned to.
     *
     * @return BelongsTo<Sprint, $this>
     */
    public function sprint(): BelongsTo
    {
        return $this->belongsTo(Sprint::class, 'sprint_id');
    }

    /**
     * Get the parent task if this is a subtask.
     *
     * @return BelongsTo<Task, $this>
     */
    public function parentTask(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_task_id');
    }

    /**
     * Get the subtasks for this task.
     *
     * @return HasMany<Task, $this>
     */
    public function subtasks(): HasMany
    {
        return $this->hasMany(self::class, 'parent_task_id');
    }

    /**
     * Get the comments on this task.
     *
     * @return HasMany<Comment, $this>
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'task_id');
    }
}
