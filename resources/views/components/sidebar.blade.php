
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-expanded {
            width: 250px;
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .sidebar-collapsed {
            width: 70px;
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .sidebar-content {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .sidebar-expanded .sidebar-content {
            opacity: 1;
        }
        .tooltip {
            position: relative;
        }
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #4a5568;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            left: 125%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0;
            transition: opacity 0.3s, visibility 0.3s;
        }
        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
        .menu-item {
            position: relative;
            height: 40px;
            display: flex;
            align-items: center;
            padding: 0 16px;
            transition: background-color 0.2s ease;
        }
        .icon-container {
            width: 24px;
            height: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 16px;
            flex-shrink: 0;
        }
        .dropdown-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s cubic-bezier(0, 1, 0, 1);
        }
        .dropdown-content.show {
            max-height: 1000px;
            transition: max-height 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .dropdown-item {
            padding-left: 56px;
            height: 32px;
            display: flex;
            align-items: center;
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .dropdown-content.show .dropdown-item {
            opacity: 1;
            transform: translateY(0);
        }
        .dropdown-content.show .dropdown-item:nth-child(1) { transition-delay: 0.1s; }
        .dropdown-content.show .dropdown-item:nth-child(2) { transition-delay: 0.2s; }
        .dropdown-content.show .dropdown-item:nth-child(3) { transition-delay: 0.3s; }
        .dropdown-content.show .dropdown-item:nth-child(4) { transition-delay: 0.4s; }
        .chevron-icon {
            transition: transform 0.3s ease;
        }
        .chevron-icon.rotate {
            transform: rotate(180deg);
        }
    </style>
</head>
<body class="bg-gray-100 ">
    <div class="flex">
        <!-- Sidebar -->
        <aside id="sidebar" class="bg-gray-800 text-white h-screen sidebar-collapsed flex flex-col">
            <div class="ml-2 p-4 flex items-center">
                <button id="toggleSidebar" class="text-white focus:outline-none">
                    <i id="sidebarIcon" class="fas fa-bars fa-lg"></i>
                </button>
                <span class="sidebar-content ml-4 font-bold text-xl">SIB</span>
            </div>
            <div class="border-b border-gray-600 my-2"></div>
            <nav class="mt-4 flex-grow">
                <ul>
                    <a href="{{ route('dashboard') }}" class="sidebar-link">
                        <li class="menu-item mb-2 hover:bg-gray-700 rounded-lg">
                            <div class="tooltip icon-container">
                                <i class="fas fa-tachometer-alt text-blue-400"></i>
                                <span class="tooltiptext">Dashboard</span>
                            </div>
                            <span class="sidebar-content">Dashboard</span>
                        </li>
                    </a>
                    <div class="sidebar-link">
                        <li class="menu-item mb-2 hover:bg-gray-700 rounded-lg cursor-pointer" id="aapDropdown">
                            <div class="tooltip icon-container">
                                <i class="fas fa-users text-green-400"></i>
                                <span class="tooltiptext">Administrasi Aplikasi</span>
                            </div>
                            <span class="sidebar-content">Administrasi Aplikasi</span>
                            <i class="fas fa-chevron-down ml-auto sidebar-content chevron-icon"></i>
                        </li>
                        <ul class="dropdown-content bg-gray-700 rounded-lg mt-1">
                            <li class="dropdown-item hover:bg-gray-600 rounded-lg">
                                <a href="" class="w-full flex items-center ">
                                    <i class="fas fa-project-diagram text-yellow-400 mr-2 "></i>
                                    <span>Tabel Proyek</span>
                                </a>
                            </li>
                            <li class="dropdown-item hover:bg-gray-600 rounded-lg">
                                <a href="{{ route('product') }}" class="w-full flex items-center">
                                    <i class="fas fa-box-open text-purple-400 mr-2"></i>
                                    <span>Tabel Produk</span>
                                </a>
                            </li>
                            <li class="dropdown-item hover:bg-gray-600 rounded-lg">
                                <a href="" class="w-full flex items-center">
                                    <i class="fas fa-handshake text-orange-400 mr-2"></i>
                                    <span>Tabel Rekanan</span>
                                </a>
                            </li>
                            <li class="dropdown-item hover:bg-gray-600 rounded-lg">
                                <a href="" class="w-full flex items-center">
                                    <i class="fas fa-balance-scale text-pink-400 mr-2"></i>
                                    <span>Tabel Satuan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('inventory') }}" class="sidebar-link">
                        <li class="menu-item mb-2 hover:bg-gray-700 rounded-lg">
                            <div class="tooltip icon-container">
                                <i class="fas fa-box text-red-400"></i>
                                <span class="tooltiptext">Inventory</span>
                            </div>
                            <span class="sidebar-content">Inventory</span>
                        </li>
                    </a>
                    <a href="#" class="sidebar-link">
                        <li class="menu-item mb-2 hover:bg-gray-700 rounded-lg">
                            <div class="tooltip icon-container">
                                <i class="fa-solid fa-user-secret text-indigo-400"></i>
                                <span class="tooltiptext">Admin</span>
                            </div>
                            <span class="sidebar-content">Admin</span>
                        </li>
                    </a>
                </ul>
            </nav>
            <div class="mt-auto">
                <ul>
                    <li class="menu-item mb-2 hover:bg-gray-700 sidebar-link rounded-lg">
                        <div class="tooltip icon-container">
                            <i class="fas fa-cog text-gray-400"></i>
                            <span class="tooltiptext">Settings</span>
                        </div>
                        <span class="sidebar-content">Settings</span>
                    </li>
                </ul>
            </div>
        </aside>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const toggleButton = document.getElementById('toggleSidebar');
            const sidebarIcon = document.getElementById('sidebarIcon');
            const aapDropdown = document.getElementById('aapDropdown');
            const dropdownContent = aapDropdown.nextElementSibling;
            const chevronIcon = aapDropdown.querySelector('.chevron-icon');

            function setSidebarState(isExpanded) {
                localStorage.setItem('sidebarExpanded', isExpanded);
                if (isExpanded) {
                    sidebar.classList.add('sidebar-expanded');
                    sidebar.classList.remove('sidebar-collapsed');
                    sidebarIcon.classList.remove('fa-bars');
                    sidebarIcon.classList.add('fa-times');
                } else {
                    sidebar.classList.remove('sidebar-expanded');
                    sidebar.classList.add('sidebar-collapsed');
                    sidebarIcon.classList.remove('fa-times');
                    sidebarIcon.classList.add('fa-bars');
                    dropdownContent.classList.remove('show');
                    chevronIcon.classList.remove('rotate');
                }
            }

            const sidebarExpanded = localStorage.getItem('sidebarExpanded') === 'true';
            setSidebarState(sidebarExpanded);

            toggleButton.addEventListener('click', function(e) {
                e.stopPropagation();
                const newState = !sidebar.classList.contains('sidebar-expanded');
                setSidebarState(newState);
            });

            aapDropdown.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                if (sidebar.classList.contains('sidebar-expanded')) {
                    dropdownContent.classList.toggle('show');
                    chevronIcon.classList.toggle('rotate');
                }
            });

            const sidebarLinks = document.querySelectorAll('.sidebar-link');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });

            sidebar.addEventListener('click', function(e) {
                e.stopPropagation();
            });

            document.addEventListener('click', function() {
                if (sidebar.classList.contains('sidebar-expanded')) {
                    dropdownContent.classList.remove('show');
                    chevronIcon.classList.remove('rotate');
                }
            });
        });
    </script>
</body>
</html>
