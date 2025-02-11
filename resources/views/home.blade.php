<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Wrapper -->
    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white p-5 space-y-4">
            <h1 class="text-2xl font-bold">Project Management</h1>
            <nav>
                {{-- {{ route('dashboard') }} --}}
                <a href="" class="block py-2 px-4 rounded hover:bg-gray-700">Dashboard</a>
                <a href=" {{ route('projects.getAllProject') }} " class="block py-2 px-4 rounded hover:bg-gray-700">Projects</a>
                <a href="{{ route('tasks.allTasks') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Tasks</a>
                {{-- {{ route('teams.index') }} --}}
                {{-- <a href="" class="block py-2 px-4 rounded hover:bg-gray-700">Teams</a> --}}
                {{-- {{ route('reports.index') }} --}}
                {{-- <a href="" class="block py-2 px-4 rounded hover:bg-gray-700">Reports</a> --}}
                {{-- {{ route('settings.index') }} --}}
                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 py-2 rounded">Logout</button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h2 class="text-3xl font-semibold mb-4">Dashboard Overview</h2>

            <!-- Project Stats -->
            <div class="grid md:grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-xl font-bold">Total Projects</h3>
                    <p class="text-gray-700 text-lg">{{ $projectCount}}</p>
                </div>
                {{-- <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-xl font-bold">Tasks Completed</h3>
                    <p class="text-gray-700 text-lg">{{ $completed_tasks }}</p>
                </div> --}}
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-xl font-bold">Registered Users</h3>
                    <p class="text-gray-700 text-lg">{{ $userCount }}</p>
                </div>
            </div>
        </main>

    </div>

</body>
</html>
