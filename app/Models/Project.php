<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;
    // public function showProjects(){
    //     $project = Project::all();
    //     echo $project->name;
    // }
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    // public function creator()
    // {
    //     return $this->belongsTo(User::class, 'created_by');
    // }
}
