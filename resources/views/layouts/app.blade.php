<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    @vite('resources/css/app.css')
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow-x: hidden;
        }
        .wrapper {
            display: flex;
            min-height: 100vh;
        }
        #sidebar {
            flex-shrink: 0;
            transition: width 0.3s ease;
        }
        #mainContent {
            flex-grow: 1;
            width: 100%;
            transition: margin-left 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="wrapper">
        <x-sidebar id="sidebar" />
        <div id="mainContent">
            <x-header />
            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            function adjustMainContent() {
                const sidebarWidth = sidebar.offsetWidth;
                mainContent.style.marginLeft = sidebarWidth + 'px';
                mainContent.style.width = `calc(100% - ${sidebarWidth}px)`;
            }

            // Initial adjustment
            adjustMainContent();

            // Watch for changes in sidebar width
            const resizeObserver = new ResizeObserver(entries => {
                for (let entry of entries) {
                    if (entry.target === sidebar) {
                        adjustMainContent();
                    }
                }
            });

            resizeObserver.observe(sidebar);
        });
    </script>
</body>
</html>
