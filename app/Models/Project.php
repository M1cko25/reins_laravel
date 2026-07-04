<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use SoftDeletes;

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

    protected $casts = [
        'start_date' => 'datetime',
        'target_end_date' => 'datetime',
    ];

    public function template(): BelongsTo
    {
        return $this->belongsTo(ProjectTemplate::class, 'project_template_id');
    }

    public function access(): BelongsTo
    {
        return $this->belongsTo(ProjectAccess::class, 'access_id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(ProjectMember::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_members')
            ->withPivot('role_id', 'joined_at', 'status')
            ->withTimestamps();
    }

    public function statuses(): BelongsToMany
    {
        return $this->belongsToMany(Status::class, 'project_statuses')
            ->withTimestamps();
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }

    public function epics(): HasMany
    {
        return $this->hasMany(Epic::class);
    }

    public function sprints(): HasMany
    {
        return $this->hasMany(Sprint::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
