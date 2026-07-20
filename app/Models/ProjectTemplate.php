<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStatus\HasStatuses;

class ProjectTemplate extends Model
{
    use HasStatuses, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the projects using this template.
     *
     * @return HasMany<Projects, $this>
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Projects::class, 'project_template_id');
    }
}
