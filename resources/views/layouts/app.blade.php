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
            --forest-primary: #059669;
            --forest-dark: #064e3b;
            --forest-light: #ecfdf5;
            --slate-base: #f8fafc;
            --card-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05), 0 2px 10px -2px rgba(0, 0, 0, 0.03);
            --heading-font: 'Outfit', sans-serif;
            --body-font: 'Inter', sans-serif;
        }

        body {
            background-color: var(--slate-base);
            font-family: var(--body-font);
            color: #334155;
            -webkit-font-smoothing: antialiased;
        }

        .heading-font { font-family: var(--heading-font); }

        /* Professional Card System */
        .prof-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 1.5rem;
            box-shadow: var(--card-shadow);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .prof-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.08);
            border-color: #cbd5e1;
        }

        /* Sidebar Styling */
        .prof-sidebar {
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
        }

        .nav-link {
            transition: all 0.25s ease;
            position: relative;
            color: #64748b;
        }

        .nav-link:hover {
            color: var(--forest-primary);
            background: var(--forest-light);
        }

        .nav-link-active {
            color: var(--forest-primary) !important;
            background: var(--forest-light);
            font-weight: 700;
        }

        .nav-link-active::after {
            content: '';
            position: absolute;
            right: 0;
            top: 25%;
            height: 50%;
            width: 4px;
            background: var(--forest-primary);
            border-radius: 4px 0 0 4px;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--slate-base); }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
</head>
<body class="antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-72 prof-sidebar h-full flex flex-col z-20 shrink-0">
            <div class="p-10">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-forest-dark bg-[linear-gradient(135deg,#064e3b_0%,#059669_100%)] rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-100">
                        <i data-lucide="leaf" class="text-white w-6 h-6"></i>
                    </div>
                    <div>
                        <span class="text-2xl font-black heading-font tracking-tight text-slate-900 leading-none">MINT</span>
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-600 mt-0.5">Retail Solutions</p>
                    </div>
                </div>
            </div>

            <nav class="flex-1 px-6 space-y-2 mt-4">
                <a href="/" class="flex items-center space-x-4 px-5 py-4 rounded-2xl text-[15px] nav-link {{ request()->is('/') ? 'nav-link-active' : '' }}">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="/inventory" class="flex items-center space-x-4 px-5 py-4 rounded-2xl text-[15px] nav-link {{ request()->is('inventory') ? 'nav-link-active' : '' }}">
                    <i data-lucide="package" class="w-5 h-5"></i>
                    <span>Inventory Hub</span>
                </a>
                <a href="/sales" class="flex items-center space-x-4 px-5 py-4 rounded-2xl text-[15px] nav-link {{ request()->is('sales') ? 'nav-link-active' : '' }}">
                    <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                    <span>POS Terminal</span>
                </a>
                <a href="/analytics" class="flex items-center space-x-4 px-5 py-4 rounded-2xl text-[15px] nav-link {{ request()->is('analytics') ? 'nav-link-active' : '' }}">
                    <i data-lucide="pie-chart" class="w-5 h-5"></i>
                    <span>Deep Analytics</span>
                </a>
            </nav>

            <div class="p-8 mt-auto">
                <div class="bg-forest-light rounded-3xl p-6 border border-emerald-100 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 w-20 h-20 bg-emerald-500/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                    <p class="text-[10px] font-black text-emerald-600 uppercase tracking-widest mb-2">Live Statistics</p>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-slate-500">Node Status</p>
                            <p class="text-sm font-black text-slate-800">Operational</p>
                        </div>
                        <div class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-pulse shadow-[0_0_8px_rgba(16,185,129,0.5)]"></div>
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
