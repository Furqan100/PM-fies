<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body class="bg-black">

    <div class="container mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-white mb-6 text-center">Project List</h1>
        @if($projects->isEmpty())
            <p class="text-center text-black">No projects available.</p>
         @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 ">
            @foreach($projects as $project)
            <div class="p-6 rounded-xl shadow-lg bg-gray-800  border-2 border-gray-500 hover:border-white transition-all duration-300 transform hover:scale-105">
                <h2 class="text-2xl font-bold text-gray-200">{{ $project->name }}</h2>
                <a href="{{ route('projects.show', $project->id) }}" class="mt-4 inline-block text-blue-400 font-semibold hover:text-blue-300 transition duration-300 ease-in-out">
                    View Details
                    </a>
                    <h3 class="text-lg font-semibold text-gray-300 mt-4 border-b pb-2 border-gray-600">Assigned Users:</h3>
                    <ul class="mt-2 space-y-2">
                        @foreach ($project->users as $user)
                        <li class="text-sm text-gray-300 bg-gray-700 rounded-lg px-3 py-1  hover:bg-gray-600 transition">
                            {{ $user->name }}
                            </li>
                        @endforeach
                    </ul>
                    {{-- @foreach ($project->users as $user)
                      <h2 class="text-sm text-gray-700">{{ $user->name }}</h2>
                        @endforeach --}}
                 </div>

            @endforeach
        </div>
       @endif
    </div>

</body>
</html>
