<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'project_id', 'user_id', 'status', 'assigned_time', 'due_date'];

    // Relationship: A task belongs to a project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Relationship: A task is assigned to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}