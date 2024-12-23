<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['task_name', 'project_id', 'description', 'status'];

    public function project():BelongsTo{
        return $this->belongsTo(Project::class, 'project_id');
    }
}
