@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-4">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 animate-fade-in">
        <div>
            <p class="text-sm font-bold text-emerald-600 uppercase tracking-[0.2em] mb-2">Performance Dashboard</p>
            <h1 class="text-5xl font-black heading-font text-slate-900 tracking-tight">System <span class="bg-[linear-gradient(135deg,#064e3b_0%,#059669_100%)] bg-clip-text text-transparent">Insights</span></h1>
        </div>
        <div class="mt-8 md:mt-0 flex items-center space-x-6">
            <div class="flex flex-col items-end">
                <span id="live-clock" class="text-2xl font-black font-mono text-slate-800 tabular-nums">00:00:00</span>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Real-time sync</span>
            </div>
            <button class="bg-slate-900 text-white px-8 py-4 rounded-2xl font-bold text-sm hover:bg-emerald-600 transition-all shadow-xl shadow-slate-200 flex items-center space-x-2">
                <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                <span>Re-sync Data</span>
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <div class="prof-card p-8 animate-fade-in" style="animation-delay: 0.1s">
            <div class="flex justify-between items-start mb-8">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center">
                    <i data-lucide="bar-chart-3" class="w-6 h-6"></i>
                </div>
                <div class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg text-[10px] font-black uppercase">
                    +14%
                </div>
            </div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Total Revenue</p>
            <h3 class="text-3xl font-black text-slate-900 tracking-tight">Rs. 4,29,100</h3>
        </div>

        <div class="prof-card p-8 animate-fade-in" style="animation-delay: 0.2s">
            <div class="flex justify-between items-start mb-8">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
                    <i data-lucide="shopping-cart" class="w-6 h-6"></i>
                </div>
                <div class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-[10px] font-black uppercase">
                    +8%
                </div>
            </div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Total Orders</p>
            <h3 class="text-3xl font-black text-slate-900 tracking-tight">842</h3>
        </div>

        <div class="prof-card p-8 animate-fade-in" style="animation-delay: 0.3s">
            <div class="flex justify-between items-start mb-8">
                <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
                <div class="px-3 py-1 bg-purple-100 text-purple-700 rounded-lg text-[10px] font-black uppercase">
                    New
                </div>
            </div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Customer Base</p>
            <h3 class="text-3xl font-black text-slate-900 tracking-tight">1,240</h3>
        </div>

        <div class="prof-card p-8 animate-fade-in" style="animation-delay: 0.4s">
            <div class="flex justify-between items-start mb-8">
                <div class="w-14 h-14 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center">
                    <i data-lucide="credit-card" class="w-6 h-6"></i>
                </div>
                <div class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg text-[10px] font-black uppercase">
                    High
                </div>
            </div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Avg Ticket</p>
            <h3 class="text-3xl font-black text-slate-900 tracking-tight">Rs. 5,120</h3>
        </div>
    </div>

    <!-- Main Analytics Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
        <div class="lg:col-span-2 prof-card p-10 animate-fade-in" style="animation-delay: 0.5s">
            <div class="flex items-center justify-between mb-12">
                <div>
                    <h3 class="text-2xl font-black text-slate-900 heading-font">Revenue Trend</h3>
                    <p class="text-sm text-slate-400">Weekly financial performance overview</p>
                </div>
                <div class="flex bg-slate-100 p-1 rounded-xl">
                    <button class="px-6 py-2 bg-white rounded-lg text-xs font-bold shadow-sm">WEEKLY</button>
                    <button class="px-6 py-2 text-xs font-bold text-slate-500">MONTHLY</button>
                </div>
            </div>
            <div class="h-[400px]">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <div class="prof-card p-10 animate-fade-in" style="animation-delay: 0.6s">
            <h3 class="text-2xl font-black text-slate-900 heading-font mb-8">Stock Alerts</h3>
            <div class="space-y-8">
                <div class="flex items-center space-x-5 group p-2 -m-2 rounded-2xl hover:bg-slate-50 transition-colors">
                    <div class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center border border-slate-200 shrink-0">
                        <i data-lucide="smartphone" class="w-6 h-6 text-slate-400"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-bold text-slate-900">iPhone 15 Pro</p>
                        <div class="flex items-center justify-between mt-1">
                            <span class="text-[10px] font-black text-rose-500 uppercase">Critical Stock</span>
                            <span class="text-[10px] font-black text-slate-400">2 Left</span>
                        </div>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full mt-2">
                            <div class="bg-rose-500 h-full rounded-full" style="width: 15%"></div>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center space-x-5 group p-2 -m-2 rounded-2xl hover:bg-slate-50 transition-colors">
                    <div class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center border border-slate-200 shrink-0">
                        <i data-lucide="headphones" class="w-6 h-6 text-slate-400"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-bold text-slate-900">Sony XM4</p>
                        <div class="flex items-center justify-between mt-1">
                            <span class="text-[10px] font-black text-amber-500 uppercase">Low Stock</span>
                            <span class="text-[10px] font-black text-slate-400">8 Left</span>
                        </div>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full mt-2">
                            <div class="bg-amber-500 h-full rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="w-full mt-10 py-4 border-2 border-dashed border-slate-200 rounded-2xl text-[11px] font-black text-slate-400 uppercase tracking-widest hover:border-emerald-500 hover:text-emerald-600 transition-all">
                View All Alerts
            </button>
        </div>
    </div>

    <!-- Activity Table -->
    <div class="prof-card overflow-hidden animate-fade-in" style="animation-delay: 0.7s">
        <div class="p-10 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-2xl font-black text-slate-900 heading-font">Recent Transactions</h3>
            <div class="flex items-center space-x-4">
                 <div class="relative">
                    <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-300"></i>
                    <input type="text" placeholder="Search transactions..." class="pl-11 pr-6 py-2.5 bg-slate-50 border-none rounded-xl text-xs font-medium focus:ring-1 focus:ring-emerald-500 w-64">
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-[0.2em]">
                    <tr>
                        <th class="px-10 py-6">Reference No.</th>
                        <th class="px-10 py-6">Client Entity</th>
                        <th class="px-10 py-6">Asset Category</th>
                        <th class="px-10 py-6">Valuation</th>
                        <th class="px-10 py-6">Fulfillment</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50/80 transition-colors group">
                        <td class="px-10 py-8 text-xs font-mono font-bold text-slate-400">#NPR-8291-03X</td>
                        <td class="px-10 py-8">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-xl bg-slate-100 overflow-hidden border border-slate-200">
                                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=ecfdf5&color=059669" alt="">
                                </div>
                                <span class="text-sm font-bold text-slate-800">John B. Doe</span>
                            </div>
                        </td>
                        <td class="px-10 py-8 text-sm font-medium text-slate-500">Premium Audio Devices</td>
                        <td class="px-10 py-8 text-sm font-black text-slate-900">Rs. 12,900</td>
                        <td class="px-10 py-8">
                            <span class="flex items-center space-x-2 text-[10px] font-black uppercase text-emerald-600">
                                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                                <span>Dispatched</span>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Live Clock
        setInterval(() => {
            const now = new Date();
            document.getElementById('live-clock').textContent = now.toLocaleTimeString([], { hour12: false });
        }, 1000);

        const ctx = document.getElementById('revenueChart').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(16, 185, 129, 0.15)');
        gradient.addColorStop(1, 'rgba(16, 185, 129, 0)');
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Revenue',
                    data: [32000, 45000, 41000, 58000, 49000, 62000, 75000],
                    borderColor: '#059669',
                    borderWidth: 4,
                    fill: true,
                    backgroundColor: gradient,
                    tension: 0.4,
                    pointRadius: 6,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#059669',
                    pointBorderWidth: 3,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { borderDash: [5, 5], color: '#f1f5f9' },
                        ticks: { font: { weight: '600', size: 10 }, color: '#94a3b8', callback: v => 'Rs. ' + v.toLocaleString() }
                    },
                    x: { 
                        grid: { display: false }, 
                        ticks: { font: { weight: '600', size: 10 }, color: '#94a3b8' } 
                    }
                }
            }
        });
    });
</script>
@endsection
