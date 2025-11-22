<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyKuliah - Student Planner')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        }
                    }
                }
            }
        }
    </script>
    @stack('styles')
</head>

<body class="h-full">
    <div class="min-h-full">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <div class="lg:pl-64 flex flex-col flex-1">
            <!-- Topbar -->
            @include('partials.topbar')

            <!-- Page Content -->
            <main class="flex-1">
                <div class="py-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Modals -->
    @include('partials.modals.add-task')
    @include('partials.modals.add-exam')
    @include('partials.modals.add-subject')

    <script>
        // Mobile Sidebar Toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('mobile-sidebar');
            sidebar.classList.toggle('hidden');
        }

        // Close sidebar when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('mobile-sidebar');
            const toggleBtn = document.getElementById('sidebar-toggle');
            if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                if (!sidebar.classList.contains('hidden')) {
                    sidebar.classList.add('hidden');
                }
            }
        });

        // Modal Functions
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Dropdown Toggle
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            dropdown.classList.toggle('hidden');
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.dropdown-container')) {
                document.querySelectorAll('[id$="-dropdown"]').forEach(dropdown => {
                    dropdown.classList.add('hidden');
                });
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
