<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    @vite('resources/css/app.css')
    <style>
        body,
        html {
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
            padding: 0.7rem 1rem;
            display: flex;
            flex-direction: column;
        }

        #mainContent>header {
            transition: all 0.3s ease;
        }

        #innerContent {
            flex-grow: 1;
            width: 100%;
            transition: all 0.3s ease;
        }

        @media (max-width: 640px) {
            #mainContent {
                padding: 0.5rem;
            }

            #innerContent {
                margin: 0.5rem;
            }

            #mainContent>header {
                border-radius: 1rem;
            }
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="wrapper">
        <x-sidebar id="sidebar" />
        <div id="mainContent">
            <x-header />
            <div id="innerContent">
                <main class="mt-4">
                    @hasSection('content')
                        @yield('content')
                    @else
                        {{ $slot ?? '' }}
                    @endif
                </main>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const innerContent = document.getElementById('innerContent');

            function adjustMainContent() {
                const sidebarWidth = sidebar.offsetWidth;
                setTimeout(() => {
                    mainContent.style.marginLeft = sidebarWidth + 'px';
                    mainContent.style.width = `calc(100% - ${sidebarWidth}px)`;

                    if (window.innerWidth <= 640) {
                        innerContent.style.width = 'calc(100% - 1rem)';
                    } else {
                        innerContent.style.width = '100%';
                    }
                }, 50);
            }

            adjustMainContent();

            const resizeObserver = new ResizeObserver(() => {
                requestAnimationFrame(adjustMainContent);
            });

            resizeObserver.observe(sidebar);
            window.addEventListener('resize', adjustMainContent);
        });
    </script>
</body>

</html>
