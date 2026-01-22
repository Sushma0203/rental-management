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
        :root {
            --forest-primary: #059669;
            --forest-dark: #064e3b;
            --forest-light: #ecfdf5;
            --slate-base: #f8fafc;
            --mint-btn: #d1fae5;
            --sidebar-expanded: 280px;
            --sidebar-collapsed: 90px;
            --heading-font: 'Outfit', sans-serif;
            --body-font: 'Inter', sans-serif;
        }

        body {
            background-color: var(--slate-base);
            font-family: var(--body-font);
            color: #334155;
            -webkit-font-smoothing: antialiased;
            overflow: hidden;
        }

        .heading-font { font-family: var(--heading-font); }

        /* Professional Card System */
        .prof-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 1.5rem;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Block Button Sidebar */
        .prof-sidebar {
            width: var(--sidebar-expanded);
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .prof-sidebar.collapsed {
            width: var(--sidebar-collapsed);
        }

        .nav-link {
            transition: all 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            color: #64748b;
            display: flex;
            align-items: center;
            padding: 1rem 1.25rem;
            margin: 0.5rem 1rem;
            border-radius: 1rem;
            background: transparent;
            border: 1px solid transparent;
            font-weight: 600;
        }

        .nav-link:hover {
            background: var(--mint-btn);
            color: var(--forest-dark);
            transform: translateX(4px);
            border-color: #a7f3d0;
        }

        .nav-link-active {
            background: var(--forest-primary) !important;
            color: white !important;
            box-shadow: 0 8px 20px -4px rgba(5, 150, 105, 0.4);
            transform: scale(1.02);
            border: 1px solid var(--forest-dark);
        }

        .collapsed .nav-link {
            justify-content: center;
            padding: 1rem 0;
            margin: 0.5rem 0.75rem;
        }

        .nav-label {
            transition: opacity 0.2s ease;
            margin-left: 0.75rem;
            font-size: 0.875rem;
        }

        .collapsed .nav-label, .collapsed .sidebar-header-text, .collapsed .sidebar-footer {
            display: none !important;
        }

        /* Toggle Button */
        .sidebar-toggle {
            position: absolute;
            right: -12px;
            top: 40px;
            width: 24px;
            height: 24px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 30;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .collapsed .sidebar-toggle i { transform: rotate(180deg); }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in { animation: fadeIn 0.4s ease-out forwards; }
    </style>
</head>
<body class="antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="prof-sidebar h-full flex flex-col z-20 shrink-0">
            <!-- Toggle Button -->
            <div class="sidebar-toggle" onclick="toggleSidebar()">
                <i data-lucide="chevron-left" class="w-3 h-3 text-slate-400"></i>
            </div>

            <div class="p-8 pb-10">
                <div class="flex items-center space-x-3 sidebar-brand-icon">
                    <div class="w-10 h-10 bg-forest-dark bg-[linear-gradient(135deg,#064e3b_0%,#059669_100%)] rounded-xl flex items-center justify-center shadow-lg shadow-emerald-100 shrink-0">
                        <i data-lucide="leaf" class="text-white w-5 h-5"></i>
                    </div>
                    <div class="sidebar-header-text">
                        <span class="text-3xl font-black heading-font tracking-tighter text-slate-900 leading-none block">NIWAS</span>
                        <p class="text-[10px] font-black uppercase tracking-[0.3em] text-emerald-600 mt-1">Management Hub</p>
                    </div>
                </div>
            </div>

            <nav class="flex-1 space-y-2 mt-4">
                <a href="/" class="nav-link {{ request()->is('/') ? 'nav-link-active' : '' }}" title="Dashboard">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 shrink-0"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
                <a href="/inventory" class="nav-link {{ request()->is('inventory') ? 'nav-link-active' : '' }}" title="Inventory">
                    <i data-lucide="package" class="w-5 h-5 shrink-0"></i>
                    <span class="nav-label">Inventory</span>
                </a>
                <a href="/sales" class="nav-link {{ request()->is('sales') ? 'nav-link-active' : '' }}" title="Checkout">
                    <i data-lucide="shopping-cart" class="w-5 h-5 shrink-0"></i>
                    <span class="nav-label">POS Terminal</span>
                </a>
                <a href="/analytics" class="nav-link {{ request()->is('analytics') ? 'nav-link-active' : '' }}" title="Analytics">
                    <i data-lucide="pie-chart" class="w-5 h-5 shrink-0"></i>
                    <span class="nav-label">Analytics</span>
                </a>
            </nav>

            <div class="p-6 mt-auto sidebar-footer">
                <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100 relative overflow-hidden group">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                        <p class="text-[10px] font-black text-emerald-600 uppercase tracking-widest">System Live</p>
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

        // Sidebar Toggle Logic
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
            
            // Save preference
            localStorage.setItem('sidebar-collapsed', sidebar.classList.contains('collapsed'));
        }

        // Apply preference on load
        document.addEventListener('DOMContentLoaded', () => {
            if (localStorage.getItem('sidebar-collapsed') === 'true') {
                document.getElementById('sidebar').classList.add('collapsed');
            }
        });
    </script>
</body>
</html>
