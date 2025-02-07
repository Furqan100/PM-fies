<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Doc</title>
</head>
<body>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Create a New Project</h2>

        @if(session('success'))
            <div class="mb-4 p-2 bg-green-500 text-white rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Project Name</label>
                <input type="text" name="name" class="w-full p-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Description</label>
                <textarea name="description" class="w-full p-2 border rounded-lg" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Due Date</label>
                <input type="date" name="due_date" class="w-full p-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Assign Users</label>
                <div class="grid grid-cols-2 gap-2">
                    @foreach ($users as $user)
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="users[]" value="{{ $user->id }}" class="form-checkbox text-blue-500">
                            <span class="text-gray-700">{{ $user->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Create Project</button>
            <a href="{{ route('projects.getAllProject') }}" class=" bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                <-Back to Projects
            </a>
            </div>

        </form>
    </div>

</body>
</html>
