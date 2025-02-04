{{-- @section('content') --}}
{{-- @endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-900">
        <div class="w-full max-w-md bg-gray-800 p-8 rounded-lg shadow-lg">
            <h2 class="text-white text-2xl font-bold text-center mb-6">Register</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <input type="text" name="name" placeholder="Name" required
                    class="w-full px-4 py-2 border rounded-md bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <input type="email" name="email" placeholder="Email" required
                    class="w-full px-4 py-2 border rounded-md bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <input type="password" name="password" placeholder="Password" required
                    class="w-full px-4 py-2 border rounded-md bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                    class="w-full px-4 py-2 border rounded-md bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <button type="submit"
                    class="w-full py-2 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-md">
                    Register
                </button>

                <p class="text-gray-400 text-sm text-center">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-400 hover:underline">Login</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>

