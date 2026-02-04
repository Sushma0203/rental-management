<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NIWAS – Admin Panel</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons & Charts -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(rgba(248, 250, 252, 0.95), rgba(248, 250, 252, 0.95)), 
                        url('{{ asset('img/download.jpeg') }}') center/cover fixed;
            color: #0f172a;
        }

        /* NAV */
        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            color: #475569;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            background-color: #f1f5f9;
            color: #0f172a;
        }

        .nav-link.active {
            background-color: rgb(227, 184, 252);
            color: #1f2937;
        }

        /* CARD */
        .card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
        }

        /* SCROLLBAR */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5f5;
            border-radius: 999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body>

<div class="flex min-h-screen bg-slate-50">

    <!-- SIDEBAR -->
    <aside class="w-56 bg-white border-r border-slate-200 flex flex-col fixed inset-y-0 left-0 z-50" style="width: 14rem;">
        <!-- LOGO -->
        <div class="h-20 flex items-center gap-3 px-5 border-b border-slate-100" style="height: 5rem;">
            <img src="{{ asset('img/niwaslogo.png') }}" alt="NIWAS Logo" class="w-10 h-10 rounded-lg object-contain">
            <div>
                <h1 class="text-lg font-bold tracking-tight text-slate-800">NIWAS</h1>
                <p class="text-[10px] font-medium text-slate-500 uppercase tracking-wider">Manager Hub</p>
            </div>
        </div>

        <!-- NAV LINKS -->
        <div class="flex-1 overflow-y-auto py-6 px-3">
            <nav class="space-y-1">
                <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span>Dashboard</span>
                </a>

                <a href="/inventory" class="nav-link {{ request()->is('inventory*') ? 'active' : '' }}">
                    <i data-lucide="package" class="w-5 h-5"></i>
                    <span>Inventory</span>
                </a>

                <a href="/sales" class="nav-link {{ request()->is('sales*') ? 'active' : '' }}">
                    <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                    <span>POS System</span>
                </a>

                <a href="/analytics" class="nav-link {{ request()->is('analytics*') ? 'active' : '' }}">
                    <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
                    <span>Analytics</span>
                </a>
            </nav>
        </div>

        <!-- BOTTOM -->
        <div class="p-4 border-t border-slate-100">
            <p class="text-xs text-center text-slate-400">© {{ date('Y') }} NIWAS Manager</p>
        </div>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="flex-1 flex flex-col ml-56 transition-all duration-300" style="margin-left: 14rem;">
        
        <!-- TOP HEADER -->
        <header class="h-16 bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-40 px-6 flex items-center justify-between" style="height: 4rem;">
            <!-- Left: Search or Title (Optional) -->
            <div class="flex items-center gap-4">
                <h2 class="text-lg font-semibold text-slate-700">
                    @if(request()->is('/')) Dashboard
                    @elseif(request()->is('inventory*')) Inventory
                    @elseif(request()->is('sales*')) Point of Sale
                    @elseif(request()->is('analytics*')) Analytics
                    @else Overview
                    @endif
                </h2>
            </div>

            <!-- Right: Actions & User -->
            <div class="flex items-center gap-6">
                <!-- Notifications -->
                <button class="relative p-2 rounded-full hover:bg-slate-100 transition-colors">
                    <i data-lucide="bell" class="w-5 h-5 text-slate-500"></i>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-rose-500 rounded-full border border-white"></span>
                </button>

                <!-- User Profile -->
                <div class="flex items-center gap-3 pl-6 border-l border-slate-200">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-semibold text-slate-700">Admin User</p>
                        <p class="text-xs text-slate-500">Store Manager</p>
                    </div>
                    <img
                        src="https://ui-avatars.com/api/?name=Admin+User&background=0f172a&color=fff"
                        class="w-10 h-10 rounded-full border-2 border-white shadow-sm"
                        alt="Admin"
                    >
                </div>
            </div>
        </header>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-8 w-full">
            @yield('content')
        </main>

    </div>

</div>

<script>
    lucide.createIcons();
</script>

</body>
</html>
