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
            <h2 class="text-white text-2xl font-bold text-center mb-6">Login</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <input type="email" name="email" placeholder="Email" required
                    class="w-full px-4 py-2 border rounded-md bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <input type="password" name="password" placeholder="Password" required
                    class="w-full px-4 py-2 border rounded-md bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <button type="submit"
                    class="w-full py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md">
                    Login
                </button>

                <p class="text-gray-400 text-sm text-center">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-blue-400 hover:underline">Register</a>
                </p>
            </form>
        </div>
    </div>

</body>
</html>
