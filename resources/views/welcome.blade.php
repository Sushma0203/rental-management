@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-2">
    <!-- Clean Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 animate-fade-in">
        <div>
            <h1 class="text-3xl font-black heading-font text-slate-900 tracking-tight">Dashboard <span class="text-emerald-600">Core</span></h1>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Operational Summary • {{ date('M d, Y') }}</p>
        </div>
        <div class="mt-6 md:mt-0 flex items-center space-x-4">
            <div class="text-right mr-4">
                <span id="live-clock" class="text-xl font-bold font-mono text-slate-700">00:00:00</span>
            </div>
            <button class="bg-slate-900 text-white px-6 py-3 rounded-xl text-xs font-bold hover:bg-emerald-600 transition-all shadow-lg shadow-slate-100 flex items-center space-x-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>NEW ENTRY</span>
            </button>
        </div>
    </div>

    <!-- Stats Grid (Compact) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="prof-card p-6 animate-fade-in" style="animation-delay: 0.1s">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Revenue</p>
            <div class="flex items-end justify-between">
                <h3 class="text-2xl font-black text-slate-900">Rs. 4.29L</h3>
                <span class="text-[10px] font-bold text-emerald-600">+12%</span>
            </div>
        </div>

        <div class="prof-card p-6 animate-fade-in" style="animation-delay: 0.2s">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Orders</p>
            <div class="flex items-end justify-between">
                <h3 class="text-2xl font-black text-slate-900">842</h3>
                <span class="text-[10px] font-bold text-emerald-600">+8%</span>
            </div>
        </div>

        <div class="prof-card p-6 animate-fade-in" style="animation-delay: 0.3s">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Customers</p>
            <div class="flex items-end justify-between">
                <h3 class="text-2xl font-black text-slate-900">1.2K</h3>
                <span class="text-[10px] font-bold text-slate-400">Stable</span>
            </div>
        </div>

        <div class="prof-card p-6 animate-fade-in" style="animation-delay: 0.4s">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Average</p>
            <div class="flex items-end justify-between">
                <h3 class="text-2xl font-black text-slate-900">Rs. 5.1K</h3>
                <span class="text-[10px] font-bold text-emerald-600">+5%</span>
            </div>
        </div>
    </div>

    <!-- Analytics Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <div class="lg:col-span-2 prof-card p-8 animate-fade-in" style="animation-delay: 0.5s">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest">Growth Curve</h3>
                <div class="flex space-x-2">
                    <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                    <span class="text-[10px] font-bold text-slate-400 uppercase">Live Metrics</span>
                </div>
            </div>
            <div class="h-80">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <div class="prof-card p-8 animate-fade-in" style="animation-delay: 0.6s">
            <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest mb-8">Stock Alerts</h3>
            <div class="space-y-6">
                @php
                    $alerts = [
                        ['name' => 'iPhone 15 Pro', 'stock' => 2, 'color' => 'rose'],
                        ['name' => 'Sony XM4', 'stock' => 8, 'color' => 'amber'],
                        ['name' => 'Logitech MX', 'stock' => 4, 'color' => 'rose'],
                    ];
                @endphp
                @foreach($alerts as $alert)
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 rounded-full bg-{{ $alert['color'] }}-500 animate-pulse"></div>
                        <span class="text-xs font-bold text-slate-700">{{ $alert['name'] }}</span>
                    </div>
                    <span class="text-[10px] font-black text-slate-400 uppercase">{{ $alert['stock'] }} left</span>
                </div>
                @endforeach
            </div>
            <button class="w-full mt-10 py-3 border border-slate-100 rounded-xl text-[10px] font-black text-slate-400 uppercase tracking-widest hover:bg-slate-50 transition-all">
                System Ledger
            </button>
        </div>
    </div>

    <!-- Minimalist Table -->
    <div class="prof-card overflow-hidden animate-fade-in" style="animation-delay: 0.7s">
        <div class="p-8 border-b border-slate-50 flex items-center justify-between bg-white">
            <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest">Recent Activity</h3>
            <button class="text-[10px] font-black text-emerald-600 uppercase tracking-widest">View All</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[9px] font-black tracking-[0.2em]">
                    <tr>
                        <th class="px-8 py-4">Reference</th>
                        <th class="px-8 py-4">Customer</th>
                        <th class="px-8 py-4">Status</th>
                        <th class="px-8 py-4 text-right">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-6 text-xs font-mono font-bold text-slate-400">#TRX-8291</td>
                        <td class="px-8 py-6 text-xs font-bold text-slate-800">John B. Doe</td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-lg text-[9px] font-black uppercase">Success</span>
                        </td>
                        <td class="px-8 py-6 text-xs font-black text-slate-900 text-right">Rs. 12,900</td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-6 text-xs font-mono font-bold text-slate-400">#TRX-8292</td>
                        <td class="px-8 py-6 text-xs font-bold text-slate-800">Sarah Jenkins</td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-amber-50 text-amber-600 rounded-lg text-[9px] font-black uppercase">Pending</span>
                        </td>
                        <td class="px-8 py-6 text-xs font-black text-slate-900 text-right">Rs. 4,500</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Clock
        setInterval(() => {
            const now = new Date();
            document.getElementById('live-clock').textContent = now.toLocaleTimeString([], { hour12: false });
        }, 1000);

        const ctx = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
                datasets: [{
                    data: [32, 45, 41, 58, 49, 62, 75],
                    borderColor: '#059669',
                    borderWidth: 3,
                    fill: false,
                    tension: 0.4,
                    pointRadius: 0,
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: '#059669',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { display: false },
                    x: { grid: { display: false }, ticks: { font: { size: 9 } } }
                }
            }
        });
    });
</script>
@endsection
