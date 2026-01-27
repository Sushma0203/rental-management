<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartRetail - Admin Panel</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons & Charts -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --forest-primary: #059669;
            --forest-dark: #064e3b;
            --forest-light: #ecfdf5;
            --sidebar-expanded: 280px;
            --sidebar-collapsed: 90px;
            --heading-font: 'Outfit', sans-serif;
            --body-font: 'Inter', sans-serif;
        }

        body {
            background: url('/img/download.jpeg') center center / cover no-repeat fixed;
            font-family: var(--body-font);
            color: #334155;
            overflow: hidden;
        }

        /* Card */
        .prof-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 1.5rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px -2px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .prof-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px -8px rgba(0,0,0,0.08);
        }

        /* Sidebar */
        .prof-sidebar {
            width: var(--sidebar-expanded);
            background: url('/img/download.jpeg') center center / cover no-repeat;
            border-right: 1px solid #e2e8f0;
            transition: width 0.3s ease;
            position: relative;
        }
        
        .prof-sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.95);
            z-index: 0;
        }
        
        .prof-sidebar > * {
            position: relative;
            z-index: 1;
        }

        .prof-sidebar.collapsed {
            width: var(--sidebar-collapsed);
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 1.25rem;
            margin: 0.5rem 1rem;
            border-radius: 1rem;
            color: #64748b;
            font-weight: 600;
            position: relative;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            background: #d1fae5;
            color: var(--forest-dark);
            transform: translateX(4px);
        }

        .nav-link-active {
            background: var(--forest-primary);
            color: white;
            box-shadow: 0 8px 20px -4px rgba(5,150,105,0.4);
        }

        .nav-link-active::before {
            content: '';
            position: absolute;
            left: -8px;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 60%;
            background: white;
            border-radius: 999px;
        }

        /* Tooltip for collapsed */
        .nav-link::after {
            content: attr(title);
            position: absolute;
            left: 100%;
            margin-left: 12px;
            background: #0f172a;
            color: white;
            font-size: 12px;
            padding: 6px 10px;
            border-radius: 6px;
            opacity: 0;
            pointer-events: none;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .collapsed .nav-link:hover::after {
            opacity: 1;
        }

        .collapsed .nav-label,
        .collapsed .sidebar-header-text,
        .collapsed .sidebar-footer {
            display: none;
        }

        .collapsed .nav-link {
            justify-content: center;
        }

        /* Toggle */
        .sidebar-toggle {
            position: absolute;
            right: -12px;
            top: 40px;
            width: 24px;
            height: 24px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .sidebar-toggle:hover {
            transform: scale(1.1);
        }

        .collapsed .sidebar-toggle i {
            transform: rotate(180deg);
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }

        a, button { cursor: pointer; }
    </style>
</head>

<body>
<div class="flex h-screen">

    <!-- Sidebar -->
    <aside id="sidebar" class="prof-sidebar flex flex-col h-full shrink-0">
        <div class="sidebar-toggle" onclick="toggleSidebar()">
            <i data-lucide="chevron-left" class="w-3 h-3 text-slate-400"></i>
        </div>

        <div class="p-8">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i data-lucide="leaf" class="text-white w-5 h-5"></i>
                </div>
                <div class="sidebar-header-text">
                    <h1 class="text-2xl font-black font-[Outfit]">NIWAS</h1>
                    <p class="text-xs uppercase tracking-widest text-emerald-600">Management Hub</p>
                </div>
            </div>
        </div>

        <nav class="flex-1">
            <a href="/" class="nav-link {{ request()->is('/') ? 'nav-link-active' : '' }}" title="Dashboard">
                <i data-lucide="layout-dashboard"></i>
                <span class="nav-label">Dashboard</span>
            </a>

            <a href="/inventory" class="nav-link {{ request()->is('inventory') ? 'nav-link-active' : '' }}" title="Inventory">
                <i data-lucide="package"></i>
                <span class="nav-label">Inventory</span>
            </a>

            <a href="/sales" class="nav-link {{ request()->is('sales') ? 'nav-link-active' : '' }}" title="POS Terminal">
                <i data-lucide="shopping-cart"></i>
                <span class="nav-label">POS Terminal</span>
            </a>

            <a href="/analytics" class="nav-link {{ request()->is('analytics') ? 'nav-link-active' : '' }}" title="Analytics">
                <i data-lucide="pie-chart"></i>
                <span class="nav-label">Analytics</span>
            </a>
        </nav>

        <div class="p-6 sidebar-footer">
            <div class="bg-slate-50 p-4 rounded-xl border">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                    <span class="text-xs font-bold text-emerald-600">System Live</span>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main -->
    <main class="flex-1 flex flex-col overflow-hidden">

        <!-- Topbar -->
        <header class="h-16 bg-transparent border-b border-white/20 flex items-center justify-between px-8">
            <div class="relative">
                <i data-lucide="search" class="absolute left-3 top-2.5 w-4 h-4 text-white/60"></i>
                <input type="text" placeholder="Search inventory, sales..."
                       class="pl-10 pr-4 py-2 rounded-lg bg-white/20 backdrop-blur-sm border border-white/30 focus:ring-2 focus:ring-white/50 text-sm text-white placeholder-white/60">
            </div>

            <div class="flex items-center gap-6">
                <button class="relative text-white">
                    <i data-lucide="bell"></i>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-rose-500 rounded-full"></span>
                </button>

                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-white">Admin User</p>
                        <p class="text-xs text-white/70">Store Manager</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Admin+User" class="w-10 h-10 rounded-xl border-2 border-white/30">
                </div>
            </div>
        </header>

        <!-- Content -->
        <div class="flex-1 overflow-y-auto p-20 animate-fade-in">
            @yield('content')
        </div>

    </main>
</div>

<script>
    lucide.createIcons();

    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('collapsed');
        localStorage.setItem('sidebar-collapsed', sidebar.classList.contains('collapsed'));
    }

    document.addEventListener('DOMContentLoaded', () => {
        if (localStorage.getItem('sidebar-collapsed') === 'true') {
            document.getElementById('sidebar').classList.add('collapsed');
        }
    });
</script>

</body>
</html>
