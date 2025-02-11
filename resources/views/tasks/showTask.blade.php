<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tasks</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="container mx-auto px-6 py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">All Tasks</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-500 text-white p-3 rounded-md mb-4 text-center">
                {{ session('error') }}
            </div>
        @endif

        <!-- Task Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg p-6">
            <table class="min-w-full border border-gray-300 rounded-lg">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="px-4 py-2">Task Name</th>
                        <th class="px-4 py-2">Project</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Assigned To</th>
                        <th class="px-4 py-2">Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $task->title }}</td>
                            <td class="px-4 py-2">{{ $task->project->name }}</td>
                            <td class="px-4 py-2">
                                <span class="px-3 py-1 rounded-full text-sm
                                    {{ $task->status == 'completed' ? 'bg-green-500 text-white' : 'bg-yellow-400 text-black' }}">
                                    {{ ucfirst($task->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2">
                                <form action="{{ route('tasks.assign', $task->id) }}" method="POST">
                                    @csrf
                                    <select name="user_id" class="border rounded p-1">
                                        <option value="">Unassigned</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded ml-2">Assign</button>
                                </form>
                            </td>
                            {{-- <td class="px-4 py-2">
                                @if ($task->user)
                                    {{ $task->user->name }}
                                @else
                                    <span class="text-gray-500">Unassigned</span>
                                @endif
                            </td> --}}
                            <td class="px-4 py-2">{{ $task->due_date ?? 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-gray-500 py-4">No tasks available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    </div>

</body>
</html>
