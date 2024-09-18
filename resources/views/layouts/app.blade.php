<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    @vite('resources/css/app.css') <!-- Sesuaikan dengan aset Anda -->
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <x-sidebar />


        <!-- Main Content -->
        <main class="flex-1 p-4">
            <x-header />
            @yield('content')
        </main>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</html>

