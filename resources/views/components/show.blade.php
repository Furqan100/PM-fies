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

            <p class="text-gray-800 mt-4 text-xl">
                <strong class=" text-blue-700">Description of the project is :-</strong>{{ $project->description }}</p>
            <a href="{{ route('projects.getAllProject') }}" class="mt-6 inline-block text-blue-500 hover:text-blue-700">
                ← Back to Projects
            </a>
        </div>
    </div>

</body>
</html>
