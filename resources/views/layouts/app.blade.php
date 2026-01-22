<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartRetail - Admin Panel</title>
    <!-- Google Fonts: Inter & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        .heading-font {
            font-family: 'Outfit', sans-serif;
        }
        .glass-sidebar {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-right: 1px solid rgba(226, 232, 240, 0.8);
        }
        .nav-link-active {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            color: white !important;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }
        .nav-link:hover:not(.nav-link-active) {
            background: #f1f5f9;
        }
    </style>
</head>
<body class="antialiased text-slate-900">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 glass-sidebar h-full flex flex-col transition-all duration-300 ease-in-out">
            <div class="p-6 flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-600 to-purple-600 flex items-center justify-center text-white">
                    <i data-lucide="shopping-bag" class="w-6 h-6"></i>
                </div>
                <span class="text-xl font-bold heading-font tracking-tight">SmartRetail</span>
            </div>

            <nav class="flex-1 px-4 space-y-1 mt-4">
                <a href="/" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200 nav-link {{ request()->is('/') ? 'nav-link-active' : '' }}">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="/inventory" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200 text-slate-600 nav-link {{ request()->is('inventory') ? 'nav-link-active' : '' }}">
                    <i data-lucide="package" class="w-5 h-5"></i>
                    <span class="font-medium">Inventory</span>
                </a>
                <a href="/sales" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200 text-slate-600 nav-link {{ request()->is('sales') ? 'nav-link-active' : '' }}">
                    <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                    <span class="font-medium">Sales & POS</span>
                </a>
                <a href="/analytics" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200 text-slate-600 nav-link {{ request()->is('analytics') ? 'nav-link-active' : '' }}">
                    <i data-lucide="trending-up" class="w-5 h-5"></i>
                    <span class="font-medium">Analytics</span>
                </a>
                <a href="/customers" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200 text-slate-600 nav-link {{ request()->is('customers') ? 'nav-link-active' : '' }}">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    <span class="font-medium">Customers</span>
                </a>
            </nav>

            <div class="p-4 mt-auto">
                <div class="bg-indigo-50 rounded-2xl p-4">
                    <p class="text-xs font-semibold text-indigo-600 uppercase tracking-wider mb-2">Pro Plan</p>
                    <p class="text-xs text-indigo-900 leading-relaxed mb-3">Unlock advanced analytics and AI insights.</p>
                    <button class="w-full py-2 bg-indigo-600 text-white rounded-lg text-xs font-bold hover:bg-indigo-700 transition-colors">Upgrade Now</button>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col min-w-0 overflow-hidden bg-slate-50">
            <!-- Topbar -->
            <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0">
                <div class="flex items-center space-x-4">
                    <button class="text-slate-500 hover:text-slate-700 md:hidden">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                    <div class="relative hidden md:block">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <i data-lucide="search" class="w-4 h-4"></i>
                        </span>
                        <input type="text" class="bg-slate-100 border-none rounded-lg py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-indigo-500 w-64" placeholder="Search data...">
                    </div>
                </div>

                <div class="flex items-center space-x-6">
                    <button class="relative text-slate-500 hover:text-slate-700">
                        <i data-lucide="bell" class="w-6 h-6"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-rose-500 rounded-full border-2 border-white"></span>
                    </button>
                    <div class="h-8 w-px bg-slate-200"></div>
                    <div class="flex items-center space-x-3">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-semibold text-slate-900 leading-none">Admin User</p>
                            <p class="text-xs text-slate-500 mt-1">Store Manager</p>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=6366f1&color=fff" class="w-10 h-10 rounded-xl" alt="Avatar">
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="flex-1 overflow-y-auto p-8">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        // Initialize Lucide Icons
        lucide.createIcons();
    </script>
</body>
</html>
