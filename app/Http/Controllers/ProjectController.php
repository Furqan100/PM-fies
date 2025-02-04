<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function getAllProject(){
        // $projects = Project::all();
        // $users = User::whereHas('projects')->get();
        // return view('components.projectLayout',compact('projects','users'));
        $projects = Project::with('users')->get(); // Load projects with users
         $users = User::whereHas('projects')->get(); // Users who have at least one project
         return view('components.projectLayout', compact('projects', 'users'));

    }
    public function show($id){
        $project = Project::findOrFail($id); // Fetch project or show 404 error if not found
        return view('components.show', compact('project'));
    }

}
