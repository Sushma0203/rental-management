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
    <style>
        :root {
            --primary: #059669; /* Emerald 600 */
            --primary-light: #d1fae5; /* Emerald 100 */
            --bg-mint: #f0fdf4; /* Mint Green Background */
            --sidebar-bg: #ffffff;
            --card-bg: #ffffff;
            --border-color: #e2e8f0;
            --heading-font: 'Outfit', sans-serif;
            --body-font: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-mint);
            font-family: var(--body-font);
            color: #1e293b;
        }

        .heading-font { font-family: var(--heading-font); }

        /* Block Style Components */
        .block-sidebar {
            background: var(--sidebar-bg);
            border-right: 3px solid var(--border-color);
            box-shadow: 6px 0 0 rgba(0, 0, 0, 0.02);
        }

        .block-card {
            background: var(--card-bg);
            border: 3px solid var(--border-color);
            border-radius: 1.25rem;
            box-shadow: 6px 6px 0 rgba(0, 0, 0, 0.05);
            transition: all 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .block-card:hover {
            transform: translate(-3px, -3px);
            box-shadow: 10px 10px 0 rgba(5, 150, 105, 0.1);
            border-color: var(--primary);
        }

        .nav-link-active {
            background: var(--primary);
            color: white !important;
            box-shadow: 4px 4px 0 rgba(4, 120, 87, 0.3);
        }

        .nav-link {
            transition: all 0.2s ease;
            border: 2px solid transparent;
        }

        .nav-link:hover:not(.nav-link-active) {
            background: var(--primary-light);
            color: var(--primary);
            border-color: var(--primary);
            transform: scale(1.02);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: var(--bg-mint); }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border: 2px solid var(--bg-mint);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover { background: var(--primary); }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-block-up {
            animation: slideIn 0.4s ease-out forwards;
        }
    </style>
</head>
<body class="antialiased text-slate-900">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 block-sidebar h-full flex flex-col z-20">
            <div class="p-8">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-200">
                        <i data-lucide="leaf" class="text-white w-7 h-7"></i>
                    </div>
                    <div>
                        <span class="text-2xl font-black heading-font tracking-tight text-slate-900 leading-none">MINT</span>
                        <p class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-600">Smart Retail</p>
                    </div>
                </div>
            </div>

            <nav class="flex-1 px-4 space-y-2 mt-4">
                <a href="/" class="flex items-center space-x-3 px-4 py-3.5 rounded-2xl font-bold nav-link {{ request()->is('/') ? 'nav-link-active' : 'text-slate-500 hover:bg-slate-50' }}">
                    <i data-lucide="layout-grid" class="w-5 h-5"></i>
                    <span>Overview</span>
                </a>
                <a href="/inventory" class="flex items-center space-x-3 px-4 py-3.5 rounded-2xl font-bold nav-link {{ request()->is('inventory') ? 'nav-link-active' : 'text-slate-500 hover:bg-slate-50' }}">
                    <i data-lucide="box" class="w-5 h-5"></i>
                    <span>Inventory</span>
                </a>
                <a href="/sales" class="flex items-center space-x-3 px-4 py-3.5 rounded-2xl font-bold nav-link {{ request()->is('sales') ? 'nav-link-active' : 'text-slate-500 hover:bg-slate-50' }}">
                    <i data-lucide="zap" class="w-5 h-5"></i>
                    <span>Checkout</span>
                </a>
                <a href="/analytics" class="flex items-center space-x-3 px-4 py-3.5 rounded-2xl font-bold nav-link {{ request()->is('analytics') ? 'nav-link-active' : 'text-slate-500 hover:bg-slate-50' }}">
                    <i data-lucide="line-chart" class="w-5 h-5"></i>
                    <span>Insights</span>
                </a>
            </nav>

            <div class="p-6 mt-auto">
                <div class="bg-emerald-50 rounded-2xl p-5 border-2 border-emerald-100">
                    <p class="text-xs font-black text-emerald-600 uppercase tracking-widest mb-1">Status</p>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                        <p class="text-sm font-bold text-emerald-900">System Online</p>
                    </div>
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
