<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    //
public function store(Request $request){
  $request->validate([
    'title'=>'required',
    'description'=>'nullable',
    'project_id'=>'required|exists:projects,id',

  ]);
  Task::create([
    'project_id'=>$request->project_id,
    'title'=>$request->title,
    'description'=>$request->description,
  ]);
//   return redirect()->back()->with('success', 'Task added successfully.');
  return redirect()->route('tasks.store')->with('success', 'Task created successfully.');

}
public function allTasks(){
    $tasks = Task::with('project','user')->latest()->paginate(10); // Fetch tasks with project info
    $users = User::all();
    return view('tasks.showTask',compact('tasks','users'));


}
// public function showTask($id){
//     $project = Project::with('tasks')->findOrFail($id);
//     return view('components.show', compact('project'));

// }
public function assignTask(Request $request, $taskId)
{
    $task = Task::findOrFail($taskId);
    // $task->user_id = $request->user_id; // Assign user ID
    // $task->save();

    // return redirect()->back()->with('success', 'Task assigned successfully');

    if (!Auth::check() || !Auth::user()->is_admin) {
        return redirect()->back()->with('error', 'Only admins can assign tasks.');
    }

    // Proceed with assigning the task
    $task->user_id = $request->input('user_id');
    $task->save();

    return redirect()->route('tasks.allTasks')->with('success', 'Task assigned successfully.');
}
}
