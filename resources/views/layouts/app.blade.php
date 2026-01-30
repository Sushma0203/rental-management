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
            background-color: #f8fafc;
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

<div class="min-h-screen flex flex-col">

    <!-- TOP NAVBAR -->
    <header class="bg-white border-b">
        <div class="max-w-[1920px] mx-auto px-4 py-3 flex items-center justify-between">

            <!-- LOGO -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgb(227, 184, 252);">
                    <i data-lucide="leaf" class="w-5 h-5 text-slate-800"></i>
                </div>
                <div>
                    <h1 class="text-lg font-semibold">NIWAS</h1>
                    <p class="text-xs text-slate-500">Management Hub</p>
                </div>
            </div>

            <!-- NAV LINKS -->
            <nav class="flex items-center gap-2">
                <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    Dashboard
                </a>

                <a href="/inventory" class="nav-link {{ request()->is('inventory') ? 'active' : '' }}">
                    <i data-lucide="package" class="w-4 h-4"></i>
                    Inventory
                </a>

                <a href="/sales" class="nav-link {{ request()->is('sales') ? 'active' : '' }}">
                    <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                    POS
                </a>

                <a href="/analytics" class="nav-link {{ request()->is('analytics') ? 'active' : '' }}">
                    <i data-lucide="bar-chart-3" class="w-4 h-4"></i>
                    Analytics
                </a>
            </nav>

            <!-- USER -->
            <div class="flex items-center gap-4">
                <button class="relative">
                    <i data-lucide="bell" class="w-5 h-5 text-slate-500"></i>
                    <span class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>

                <div class="flex items-center gap-3">
                    <img
                        src="https://ui-avatars.com/api/?name=Admin+User&background=10b981&color=fff"
                        class="w-9 h-9 rounded-full"
                        alt="Admin"
                    >
                    <div class="text-sm">
                        <p class="font-medium">Admin User</p>
                        <p class="text-xs text-slate-500">Store Manager</p>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="flex-1 max-w-[1920px] mx-auto w-full px-4 py-6">
        @yield('content')
    </main>

</div>

<script>
    lucide.createIcons();
</script>

</body>
</html>
