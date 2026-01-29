@extends('layouts.app')

@section('content')

<!-- Page Background -->
<div class="bg-slate-100 min-h-screen p-8 lg:p-12 animate-fade-in-up space-y-24">

    <!-- HERO SECTION -->
    <div class="bg-slate-900 rounded-3xl p-10 lg:p-14 flex flex-col lg:flex-row lg:items-center justify-between gap-10 shadow-xl">
        <div class="space-y-4">
            <p class="text-sm font-semibold text-emerald-400 uppercase tracking-[0.15em]">
                Welcome Back
            </p>
            <h1 class="text-5xl lg:text-6xl font-extrabold text-white tracking-tight">
                Dashboard <span class="text-emerald-400">Overview</span>
            </h1>
            <p class="text-base text-white/70 font-medium">
                {{ date('l, F d, Y') }} • <span id="live-clock" class="text-white">00:00:00</span>
            </p>
        </div>

        <div class="flex items-center gap-6">
            <button class="px-6 py-3 bg-white/10 border border-white/20 text-white text-sm font-semibold hover:bg-white/20 transition-all flex items-center gap-2 rounded-xl">
                <i data-lucide="download" class="w-4 h-4"></i>
                Export
            </button>
            <button class="px-6 py-3 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white text-sm font-semibold hover:shadow-xl hover:shadow-emerald-400/30 transition-all flex items-center gap-2 rounded-xl">
                <i data-lucide="plus" class="w-4 h-4"></i>
                New Entry
            </button>
        </div>
    </div>

    <!-- STATS GRID -->
    @php
        $stats = [
            ['label'=>'Total Revenue','value'=>'Rs. 4.29L','change'=>'+12%','icon'=>'dollar-sign','color'=>'emerald','note'=>'vs last month'],
            ['label'=>'Total Orders','value'=>'842','change'=>'+8%','icon'=>'shopping-bag','color'=>'blue','note'=>'This month'],
            ['label'=>'Active Customers','value'=>'1.2K','change'=>'Stable','icon'=>'users','color'=>'purple','note'=>'Registered users'],
            ['label'=>'Average Order','value'=>'Rs. 5.1K','change'=>'+5%','icon'=>'trending-up','color'=>'amber','note'=>'Per transaction'],
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
        @foreach($stats as $index => $stat)
        <div class="prof-card p-8 animate-fade-in" style="animation-delay: {{0.1 + $index*0.1}}s">
            <div class="flex items-center justify-between mb-6">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-{{ $stat['color'] }}-500 to-{{ $stat['color'] }}-600 flex items-center justify-center">
                    <i data-lucide="{{ $stat['icon'] }}" class="w-6 h-6 text-white"></i>
                </div>
                <span class="px-3 py-1 bg-{{ $stat['color'] }}-50 text-{{ $stat['color'] }}-600 text-xs font-bold rounded-full">
                    {{ $stat['change'] }}
                </span>
            </div>

            <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">
                {{ $stat['label'] }}
            </p>
            <h3 class="text-3xl font-extrabold text-slate-900 mb-1">
                {{ $stat['value'] }}
            </h3>
            <p class="text-sm text-slate-500 font-medium">
                {{ $stat['note'] }}
            </p>
        </div>
        @endforeach
    </div>

    <!-- DIVIDER -->
    <div class="h-px bg-slate-300"></div>

    <!-- CHART + ALERTS -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

        <!-- REVENUE CHART -->
        <div class="lg:col-span-2 prof-card p-10">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-1">
                        Revenue Growth
                    </h3>
                    <p class="text-sm text-slate-500 font-medium">
                        Weekly performance metrics
                    </p>
                </div>
                <div class="flex items-center gap-2 text-xs font-bold text-slate-500 uppercase">
                    <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                    Live Data
                </div>
            </div>

            <div class="h-80">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <!-- STOCK ALERTS -->
        @php
            $alerts = [
                ['name' => 'iPhone 15 Pro', 'stock' => 2, 'color' => 'rose', 'icon' => 'smartphone'],
                ['name' => 'Sony XM4', 'stock' => 8, 'color' => 'amber', 'icon' => 'headphones'],
                ['name' => 'Logitech MX', 'stock' => 4, 'color' => 'rose', 'icon' => 'mouse'],
                ['name' => 'iPad Air', 'stock' => 6, 'color' => 'amber', 'icon' => 'tablet'],
            ];
        @endphp

        <div class="prof-card p-10">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-2xl font-extrabold text-slate-900">
                    Stock Alerts
                </h3>
                <i data-lucide="alert-triangle" class="w-5 h-5 text-amber-500"></i>
            </div>

            <div class="space-y-6">
                @foreach($alerts as $alert)
                <div class="flex items-center justify-between p-5 bg-{{ $alert['color'] }}-50 border border-{{ $alert['color'] }}-100 rounded-xl">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                            <i data-lucide="{{ $alert['icon'] }}" class="w-6 h-6 text-{{ $alert['color'] }}-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-slate-900">{{ $alert['name'] }}</p>
                            <p class="text-xs text-slate-500">{{ $alert['stock'] }} units left</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <button class="w-full mt-8 py-3 border-2 border-slate-200 text-sm font-bold text-slate-600 uppercase tracking-widest rounded-xl hover:bg-slate-50 transition">
                View All Alerts
            </button>
        </div>
    </div>

    <!-- DIVIDER -->
    <div class="h-px bg-slate-300"></div>

    <!-- RECENT ACTIVITY -->
    <div class="prof-card overflow-hidden">
        <div class="p-10 border-b border-slate-200 bg-slate-50 flex justify-between items-center">
            <div>
                <h3 class="text-2xl font-extrabold text-slate-900 mb-1">
                    Recent Activity
                </h3>
                <p class="text-sm text-slate-500">
                    Latest transactions
                </p>
            </div>
            <button class="px-6 py-3 bg-slate-900 text-white text-sm font-semibold rounded-xl hover:bg-slate-800">
                View All
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-white text-slate-500 uppercase text-xs font-bold tracking-widest">
                    <tr>
                        <th class="px-8 py-5 text-left">Reference</th>
                        <th class="px-8 py-5 text-left">Customer</th>
                        <th class="px-8 py-5 text-left">Product</th>
                        <th class="px-8 py-5 text-left">Status</th>
                        <th class="px-8 py-5 text-right">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach([
                        ['#TRX-8291','Bhuwan KC','MacBook Pro','Completed','Rs. 12,900'],
                        ['#TRX-8292','Sarah Shrestha','AirPods Pro','Pending','Rs. 4,500'],
                        ['#TRX-8293','Sulav Shakya','iPad Air','Completed','Rs. 8,200'],
                    ] as $row)
                    <tr class="hover:bg-slate-50">
                        <td class="px-8 py-6 font-mono text-sm text-slate-400">{{ $row[0] }}</td>
                        <td class="px-8 py-6 font-bold text-slate-900">{{ $row[1] }}</td>
                        <td class="px-8 py-6 text-slate-700">{{ $row[2] }}</td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 rounded-full text-xs font-bold {{ $row[3]=='Completed' ? 'bg-emerald-50 text-emerald-600' : 'bg-amber-50 text-amber-600' }}">
                                {{ $row[3] }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right font-bold text-slate-900">{{ $row[4] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- CARD STYLE -->
<style>
.prof-card {
    background: #ffffff;
    border-radius: 18px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
    transition: transform .25s ease, box-shadow .25s ease;
}
.prof-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 16px 32px rgba(15, 23, 42, 0.1);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    setInterval(() => {
        document.getElementById('live-clock').textContent =
            new Date().toLocaleTimeString([], { hour12: false });
    }, 1000);
});
</script>

@endsection
