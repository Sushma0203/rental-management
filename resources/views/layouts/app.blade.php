<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KIRO – Admin Panel</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons & Charts -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f8fafc;
            color: #334155;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 99px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body class="antialiased selection:bg-rose-100 selection:text-rose-900">

<div class="flex min-h-screen bg-slate-50/50">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r border-slate-100 fixed inset-y-0 left-0 z-50 transition-all duration-300 shadow-[2px_0_20px_rgba(0,0,0,0.02)]">
        <!-- LOGO -->
        <div class="h-20 flex items-center px-8 border-b border-slate-50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-rose-400 to-purple-500 flex items-center justify-center text-white shadow-lg shadow-rose-200">
                    <span class="font-bold text-lg">K</span>
                </div>
                <div>
                    <h1 class="text-lg font-bold tracking-tight text-slate-800 leading-none">KIRO</h1>
                    <p class="text-[10px] font-medium text-slate-400 uppercase tracking-wider mt-1">Management Hub</p>
                </div>
            </div>
        </div>

        <!-- NAV LINKS -->
        <div class="flex-1 overflow-y-auto py-8 px-4 space-y-1">
            <nav class="space-y-1.5">
                <a href="/" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->is('/') ? 'bg-rose-50 text-rose-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 {{ request()->is('/') ? 'text-rose-500' : 'text-slate-400' }}"></i>
                    <span>Dashboard</span>
                </a>

                <a href="/inventory" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->is('inventory*') ? 'bg-rose-50 text-rose-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                    <i data-lucide="package" class="w-5 h-5 {{ request()->is('inventory*') ? 'text-rose-500' : 'text-slate-400' }}"></i>
                    <span>Inventory</span>
                </a>

                <a href="/sales" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->is('sales*') ? 'bg-rose-50 text-rose-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                    <i data-lucide="shopping-cart" class="w-5 h-5 {{ request()->is('sales*') ? 'text-rose-500' : 'text-slate-400' }}"></i>
                    <span>POS System</span>
                </a>

                <a href="/analytics" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->is('analytics*') ? 'bg-rose-50 text-rose-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                    <i data-lucide="bar-chart-3" class="w-5 h-5 {{ request()->is('analytics*') ? 'text-rose-500' : 'text-slate-400' }}"></i>
                    <span>Analytics</span>
                </a>
            </nav>
        </div>

        <!-- BOTTOM -->
        <div class="p-4 mx-4 mb-4 rounded-2xl bg-slate-50 border border-slate-100/50">
            <div class="flex items-center gap-3">
                 <div class="w-8 h-8 rounded-full bg-slate-200 overflow-hidden shrink-0">
                    <img src="https://ui-avatars.com/api/?name=Admin+User&background=cbd5e1&color=fff" class="w-full h-full object-cover">
                 </div>
                 <div class="overflow-hidden">
                     <p class="text-sm font-medium text-slate-700 truncate">Admin User</p>
                     <p class="text-xs text-slate-400 truncate">Store Manager</p>
                 </div>
            </div>
        </div>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="flex-1 flex flex-col pl-64 transition-all duration-300">
        
        <!-- TOP HEADER -->
        <header class="h-20 bg-white/50 backdrop-blur-xl border-b border-slate-200/50 sticky top-0 z-40 px-8 flex items-center justify-between transition-all duration-300">
            <!-- Left: Breadcrumb/Title -->
            <div>
                <h2 class="text-xl font-semibold text-slate-800">
                    @if(request()->is('/')) Dashboard Overview
                    @elseif(request()->is('inventory*')) Inventory Management
                    @elseif(request()->is('sales*')) Point of Sale
                    @elseif(request()->is('analytics*')) Analytics & Reports
                    @else Overview
                    @endif
                </h2>
                <p class="text-sm text-slate-400 mt-0.5">Welcome back, Admin</p>
            </div>

            <!-- Right: Actions -->
            <div class="flex items-center gap-4">
                <button class="w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:text-rose-500 hover:border-rose-200 transition-colors shadow-sm relative group">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    <span class="absolute top-2.5 right-3 w-2 h-2 bg-rose-500 rounded-full border border-white"></span>
                </button>
            </div>
        </header>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-8 w-full max-w-[1600px] mx-auto">
            @yield('content')
        </main>

    </div>

</div>

<script>
    lucide.createIcons();
</script>

</body>
</html>
