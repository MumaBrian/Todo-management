<!-- filepath: /home/muma/Desktop/Laravel/tasks-management/resources/views/admin/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks Management - Admin Panel</title>
    <meta name="author" content="La_Gachette">
    <meta name="description" content="">

    <!-- Tailwind -->
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #1a202c;
        }

        .cta-btn {
            color: #1a202c;
        }

        .upgrade-btn {
            background: #4a5568;
        }

        .upgrade-btn:hover {
            background: #2d3748;
        }

        .active-nav-link {
            background: #2d3748;
        }

        .nav-item:hover {
            background: #2d3748;
        }

        .account-link:hover {
            background: #1a202c;
        }
    </style>
    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);

        .active\:bg-gray-50:active {
            --tw-bg-opacity: 1;
            background-color: rgba(249, 250, 251, var(--tw-bg-opacity));
        }
    </style>
    @livewireStyles
</head>

<body class="bg-gray-100 font-family-karla flex flex-col min-h-screen">

    <!-- Top Navigation Bar -->
    <header class="bg-sidebar text-white shadow-lg">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <div class="flex items-center">
                <a href="{{ route('admin.index') }}" class="text-3xl font-semibold uppercase hover:text-gray-300">
                    @can('admin-only')
                        Admin
                    @else
                        Employee
                    @endcan
                </a>
            </div>
            <nav class="flex space-x-4">
                <a href="{{ route('admin.index') }}"
                    class="{{ request()->routeIs('admin.index') ? 'active-nav-link' : 'opacity-85 hover:opacity-100' }} py-2 px-4 nav-item">
                    Dashboard
                </a>
                @can('admin-only')
                    <a href="{{ route('admin.users.index') }}"
                        class="{{ request()->routeIs('admin.users.index') ? 'active-nav-link' : 'opacity-85 hover:opacity-100' }} py-2 px-4 nav-item">
                        Users
                    </a>
                    <a href="{{ route('admin.categories.index') }}"
                        class="{{ request()->routeIs('admin.categories.index') ? 'active-nav-link' : 'opacity-85 hover:opacity-100' }} py-2 px-4 nav-item">
                        Categories
                    </a>
                    <a href="{{ route('admin.tasks.index') }}"
                        class="{{ request()->routeIs('admin.tasks.index') ? 'active-nav-link' : 'opacity-85 hover:opacity-100' }} py-2 px-4 nav-item">
                        Tasks
                    </a>
                @endcan
                <a href="{{ route('admin.auth_tasks.index') }}"
                    class="{{ request()->routeIs('admin.auth_tasks.index') ? 'active-nav-link' : 'opacity-85 hover:opacity-100' }} py-2 px-4 nav-item">
                    My Assigned Tasks
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="py-2 px-4 nav-item">
                        Sign Out
                    </button>
                </form>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="flex-grow container mx-auto p-6">
        @if ($errors->any())
            <div role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2 mx-4">
                    Validation Errors
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 mx-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <main class="w-full flex-grow p-6">
            {{ $slot }}
        </main>
    </div>

    <!-- AlpineJS -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    @livewireScripts
</body>

</html>