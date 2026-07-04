<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Status extends Model
{
    use SoftDeletes;

    protected $table = 'statuses';

    protected $fillable = ['name', 'color'];

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_statuses')
            ->withTimestamps();
    }
}
