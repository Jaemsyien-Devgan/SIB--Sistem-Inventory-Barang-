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
    </style>
</head>
<body class="bg-[url('https://images.unsplash.com/photo-1513151233558-d860c5398176?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] min-h-screen flex items-center justify-center bg-opacity-50 backdrop-blur-md ">
    <div class="w-full max-w-md items-center">
        <div class="text-center mb-8 justify-center">
            <div class="flex justify-center items-center mb-4">
                <h1 class="text-2xl font-bold text-white">SIB</h1>
            </div>
            <h2 class="text-3xl font-extrabold text-white">SISTEM INVENTORY BARANG</h2>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-8 relative">
            <div class="absolute -top-4 -right-4 w-24 h-24 bg-gradient-to-br from-gray-400 to-pink-400 rounded-full opacity-50"></div>
            <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-gradient-to-tr from-gray-400 to-pink-400 rounded-full opacity-50"></div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6 relative z-10">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Your email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                           class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                           placeholder="e.g. elon@tesla.com">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Your password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                           class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                           placeholder="e.g. ilovemangools123">
                </div>
                <div>
                    <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Sign in
                    </button>
                </div>
                <div class="flex items-center justify-between text-sm">
                    <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500">Don't have an account?</a>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500">{{ ('Forgot your password?') }}</a>
                @endif
                </div>
            </form>
        </div>

        <div class="mt-8 flex justify-center space-x-2">
            <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">KWFinder</span>
            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">SERPChecker</span>
            <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-medium">SERPWatcher</span>
            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">LinkMiner</span>
            <span class="px-3 py-1 bg-pink-100 text-pink-800 rounded-full text-xs font-medium">SiteProfiler</span>
        </div>
    </div>
</body>
</html>
