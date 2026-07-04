<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectRole extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(ProjectPermission::class, 'project_roles_permissions', 'project_role_id', 'project_permission_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(ProjectMember::class, 'role_id');
    }
}
