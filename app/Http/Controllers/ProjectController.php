<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function getAllProject(){

        $projects = Project::with('users')->get();
         $users = User::whereHas('projects')->get(); // Users who have at least one project
         return view('components.projectLayout', compact('projects', 'users'));

    }
    public function show($id){
        $project = Project::findOrFail($id);
        return view('components.show', compact('project'));
    }


    // Checking if user is admin then only he can create the pproject
    public function create()
    {       $users = User::all();
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        // return view('projects.create');
        return view('projects.create',compact('users'));
    }

    public function store(Request $request)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'nullable|date',
            'users' => 'required|array',
        ]);

        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'due_date' => $request->due_date ?: null,  // Set to null if not provided
        ]);
        $project->users()->attach($request->users);

        // $project->users()->sync($request->users); // Use sync to attach users

        return redirect()->route('projects.create')->with('success', 'Project created successfully.');
    }
    // Using This for the purpose of Home Route
   public function countUsers_Projects(){
    $projectCount = Project::count();
    $userCount =User::count();
        return view('home',compact('projectCount','userCount'));
   }

 }
