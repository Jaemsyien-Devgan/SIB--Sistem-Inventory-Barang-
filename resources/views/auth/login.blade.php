<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIB Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .text-shadow {
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body class="bg-[url('https://pbs.twimg.com/media/DVP6aLLUQAAQN-R.jpg')] bg-cover bg-center min-h-screen flex items-center justify-center bg-opacity-60 backdrop-blur-sm">
    <div class="w-full max-w-md p-6 bg-gray-800 bg-opacity-90 rounded-lg shadow-lg">
        <div class="text-center mb-6">
            <h1 class="text-4xl font-bold text-yellow-300 text-shadow">SIB</h1>
            <h2 class="text-2xl font-extrabold text-yellow-300 text-shadow">SISTEM INVENTORY BARANG</h2>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-200 mb-1">Your email</label>
                <input id="email" name="email" type="email" autocomplete="email" required
                       class="block w-full px-4 py-3 border border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 bg-gray-700 text-white"
                       placeholder="e.g. elon@tesla.com">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-200 mb-1">Your password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required
                       class="block w-full px-4 py-3 border border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 bg-gray-700 text-white"
                       placeholder="e.g. ilovemangools123">
            </div>
            <div>
                <button type="submit"
                        class="w-full py-3 px-4 border border-transparent rounded-md shadow-md text-sm font-medium text-white bg-gradient-to-r from-green-500 to-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Sign in
                </button>
            </div>
        </form>
    </div>
</body>
</html>
