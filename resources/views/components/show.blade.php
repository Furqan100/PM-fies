<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-10">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-xl  text-gray-800">
                <strong class="text-blue-700">Name of the Project is :- </strong>{{ $project->name }}</h1>
            <h2 class="my-4  text-gray-800 text-xl">
               <strong class=" text-blue-700">Due date of the project is :- </strong>{{$project->due_date}}</h2>

            <p class="text-gray-800 mt-4 mb-4 text-xl">
                <strong class=" text-blue-700">Description of the project is :-</strong>{{ $project->description }}</p>


            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">

                <label class="block text-gray-700 font-medium">Task Title</label>
                <input type="text" name="title" class="w-1/3 p-2 border rounded-lg" required>

                <label class="block text-gray-700 font-medium">Description</label>
                <textarea name="description" class="w-full p-2 border rounded-lg"></textarea>

                    <label class="block text-gray-700 font-medium">Due Date</label>
                    <input type="date" name="due_date" class="w-full p-2 border rounded-lg">

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-4">Add Task</button>
            </form>
            <h2 class="text-xl font-bold mt-6">Tasks for {{ $project->name }}</h2>

           @if ($project->tasks->isEmpty())
          <p>No tasks available for this project.</p>
           @else
              <ul class="mt-4 space-y-2">
               @foreach ($project->tasks as $task)
                  <li class="p-4 bg-gray-800 text-white rounded-lg shadow">
                   <strong>{{ $task->title }}</strong> - {{ $task->status }} - {{ $task->due_date }}
                   </li>
                @endforeach
                </ul>
            @endif
            <a href="{{ route('projects.getAllProject') }}" class="mt-6 inline-block text-blue-500 hover:text-blue-700">
                ← Back to Projects
            </a>
        </div>


    </div>
    {{-- "{{ route('tasks.store') }}" --}}

</body>
</html>
