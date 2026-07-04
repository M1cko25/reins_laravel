<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectTemplate extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
