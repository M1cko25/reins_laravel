<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectRolePermission extends Pivot
{
    protected $table = 'project_roles_permissions';

    protected $fillable = ['project_role_id', 'project_permission_id'];
}
