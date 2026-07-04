<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectPermission extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(ProjectRole::class, 'project_roles_permissions', 'project_permission_id', 'project_role_id');
    }
}
