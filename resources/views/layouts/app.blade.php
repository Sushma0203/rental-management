<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartRetail - Admin Panel</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Icons & Charts -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --emerald-primary: #10b981;
            --emerald-dark: #059669;
            --emerald-darker: #047857;
            --heading-font: 'Outfit', sans-serif;
            --body-font: 'Inter', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--body-font);
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
            min-height: 100vh;
            color: #1e293b;
            overflow-x: hidden;
        }

        .heading-font {
            font-family: var(--heading-font);
        }

        /* Background Pattern */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        /* Floating Card Style */
        .prof-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 2rem;
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 
                0 20px 50px -12px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.1) inset;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
        }

        .prof-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.8), transparent);
            opacity: 0.5;
        }

        .prof-card:hover {
            transform: translateY(-8px);
            box-shadow: 
                0 30px 70px -15px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(255, 255, 255, 0.2) inset;
        }

        /* Top Navigation */
        .top-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-item {
            position: relative;
            padding: 1rem 1.5rem;
            color: #64748b;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .nav-item:hover {
            color: var(--emerald-dark);
            background: rgba(16, 185, 129, 0.08);
        }

        .nav-item-active {
            color: white;
            background: linear-gradient(135deg, var(--emerald-primary) 0%, var(--emerald-dark) 100%);
            box-shadow: 0 8px 20px -4px rgba(16, 185, 129, 0.4);
        }

        .nav-item-active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 3px;
            background: var(--emerald-primary);
            border-radius: 999px;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(241, 245, 249, 0.5);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(148, 163, 184, 0.5);
            border-radius: 999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(100, 116, 139, 0.7);
        }

        /* Utility */
        .glass-effect {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>

<body>
<div class="min-h-screen flex flex-col relative z-10">

    <!-- Top Navigation Bar -->
    <nav class="top-nav">
        <div class="max-w-[1800px] mx-auto px-8 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-700 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-200">
                        <i data-lucide="leaf" class="text-white w-6 h-6"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black heading-font text-slate-900">NIWAS</h1>
                        <p class="text-xs uppercase tracking-widest text-emerald-600 font-bold">Management Hub</p>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="flex items-center gap-2">
                    <a href="/" class="nav-item {{ request()->is('/') ? 'nav-item-active' : '' }}">
                        <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                        <span>Dashboard</span>
                    </a>

                    <a href="/inventory" class="nav-item {{ request()->is('inventory') ? 'nav-item-active' : '' }}">
                        <i data-lucide="package" class="w-5 h-5"></i>
                        <span>Inventory</span>
                    </a>

                    <a href="/sales" class="nav-item {{ request()->is('sales') ? 'nav-item-active' : '' }}">
                        <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                        <span>POS Terminal</span>
                    </a>

                    <a href="/analytics" class="nav-item {{ request()->is('analytics') ? 'nav-item-active' : '' }}">
                        <i data-lucide="pie-chart" class="w-5 h-5"></i>
                        <span>Analytics</span>
                    </a>
                </div>

                <!-- Right Side Actions -->
                <div class="flex items-center gap-6">
                    <!-- Search -->
                    <div class="relative hidden lg:block">
                        <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"></i>
                        <input type="text" 
                               placeholder="Search anything..." 
                               class="pl-12 pr-6 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm font-medium transition-all outline-none w-64">
                    </div>

                    <!-- Notifications -->
                    <button class="relative p-3 rounded-xl hover:bg-slate-50 transition-all">
                        <i data-lucide="bell" class="w-5 h-5 text-slate-600"></i>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-rose-500 rounded-full"></span>
                    </button>

                    <!-- User Profile -->
                    <div class="flex items-center gap-3 pl-6 border-l border-slate-200">
                        <div class="text-right">
                            <p class="text-sm font-bold text-slate-900">Admin User</p>
                            <p class="text-xs text-slate-500">Store Manager</p>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=10b981&color=fff" 
                             class="w-11 h-11 rounded-xl border-2 border-emerald-100 shadow-md">
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-1 px-8 py-12">
        <div class="max-w-[1800px] mx-auto">
            @yield('content')
        </div>
    </main>

</div>

<script>
    lucide.createIcons();
</script>

</body>
</html>
