<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStatus\HasStatuses;

class Projects extends Model
{
    use HasStatuses, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'key',
        'project_template_id',
        'status',
        'access_id',
        'start_date',
        'target_end_date',
        'owner_id',
        'url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => 'integer',
            'start_date' => 'datetime',
            'target_end_date' => 'datetime',
        ];
    }

    /**
     * Get the template this project uses.
     *
     * @return BelongsTo<ProjectTemplate, $this>
     */
    public function template(): BelongsTo
    {
        return $this->belongsTo(ProjectTemplate::class, 'project_template_id');
    }

    /**
     * Get the access level this project has.
     *
     * @return BelongsTo<ProjectAccess, $this>
     */
    public function access(): BelongsTo
    {
        return $this->belongsTo(ProjectAccess::class, 'access_id');
    }

    /**
     * Get the owner of this project.
     *
     * @return BelongsTo<User, $this>
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Get the members associated with this project.
     *
     * @return BelongsToMany<User, $this>
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_members', 'project_id', 'user_id')
            ->withPivot(['role_id', 'joined_at', 'status'])
            ->withTimestamps();
    }

    /**
     * Get the epics associated with this project.
     *
     * @return HasMany<Epic, $this>
     */
    public function epics(): HasMany
    {
        return $this->hasMany(Epic::class, 'project_id');
    }

    /**
     * Get the sprints associated with this project.
     *
     * @return HasMany<Sprint, $this>
     */
    public function sprints(): HasMany
    {
        return $this->hasMany(Sprint::class, 'project_id');
    }

    /**
     * Get the tasks associated with this project.
     *
     * @return HasMany<Task, $this>
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'project_id');
    }
}
