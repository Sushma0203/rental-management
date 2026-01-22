@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 animate-block-up">
        <div>
            <h1 class="text-4xl font-black heading-font text-slate-900 tracking-tight">Daily <span class="text-emerald-600">Overview</span></h1>
            <p class="text-slate-500 mt-1 font-medium">Welcome back! Here's what's happening today.</p>
        </div>
        <div class="mt-6 md:mt-0 flex items-center space-x-4">
            <div class="block-card px-6 py-3 bg-white flex items-center space-x-4">
                <div class="w-3 h-3 bg-emerald-500 rounded-full animate-ping"></div>
                <span id="live-clock" class="text-xl font-black font-mono text-slate-800">00:00:00</span>
            </div>
            <button class="bg-slate-900 text-white px-6 py-3.5 rounded-2xl font-black text-sm hover:bg-emerald-600 transition-all shadow-xl shadow-slate-200">
                Refresh Data
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
        <div class="block-card p-8 animate-block-up" style="animation-delay: 0.1s">
            <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-6 border-2 border-emerald-100">
                <i data-lucide="dollar-sign" class="w-7 h-7"></i>
            </div>
            <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Revenue</p>
            <h3 class="text-3xl font-black text-slate-900 tracking-tight">$42,910</h3>
            <div class="mt-4 flex items-center text-emerald-600 text-sm font-bold">
                <i data-lucide="trending-up" class="w-4 h-4 mr-1"></i>
                <span>+12.5%</span>
            </div>
        </div>

        <div class="block-card p-8 animate-block-up" style="animation-delay: 0.2s">
            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 border-2 border-blue-100">
                <i data-lucide="shopping-bag" class="w-7 h-7"></i>
            </div>
            <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Sales</p>
            <h3 class="text-3xl font-black text-slate-900 tracking-tight">842</h3>
            <div class="mt-4 flex items-center text-emerald-600 text-sm font-bold">
                <i data-lucide="trending-up" class="w-4 h-4 mr-1"></i>
                <span>+8.2%</span>
            </div>
        </div>

        <div class="block-card p-8 animate-block-up" style="animation-delay: 0.3s">
            <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-6 border-2 border-purple-100">
                <i data-lucide="users" class="w-7 h-7"></i>
            </div>
            <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest mb-1">New Customers</p>
            <h3 class="text-3xl font-black text-slate-900 tracking-tight">124</h3>
            <div class="mt-4 flex items-center text-rose-500 text-sm font-bold">
                <i data-lucide="trending-down" class="w-4 h-4 mr-1"></i>
                <span>-2.4%</span>
            </div>
        </div>

        <div class="block-card p-8 animate-block-up" style="animation-delay: 0.4s">
            <div class="w-14 h-14 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center mb-6 border-2 border-orange-100">
                <i data-lucide="credit-card" class="w-7 h-7"></i>
            </div>
            <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest mb-1">Avg. Order</p>
            <h3 class="text-3xl font-black text-slate-900 tracking-tight">$51.20</h3>
            <div class="mt-4 flex items-center text-emerald-600 text-sm font-bold">
                <i data-lucide="trending-up" class="w-4 h-4 mr-1"></i>
                <span>+5.1%</span>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
        <div class="lg:col-span-2 block-card p-10 animate-block-up" style="animation-delay: 0.5s">
            <div class="flex items-center justify-between mb-10">
                <h3 class="text-2xl font-black text-slate-900 heading-font">Revenue <span class="text-emerald-600">Analytics</span></h3>
                <div class="flex bg-slate-100 p-1.5 rounded-xl border-2 border-slate-200">
                    <button class="px-4 py-1.5 bg-white rounded-lg text-xs font-black shadow-sm">WEEKLY</button>
                    <button class="px-4 py-1.5 text-xs font-black text-slate-500">MONTHLY</button>
                </div>
            </div>
            <div class="h-[400px]">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <div class="block-card p-10 animate-block-up" style="animation-delay: 0.6s">
            <h3 class="text-2xl font-black text-slate-900 heading-font mb-10">Inventory <span class="text-emerald-600">Status</span></h3>
            <div class="space-y-8">
                <div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm font-black text-slate-600 uppercase tracking-widest">Electronics</span>
                        <span class="text-sm font-black text-emerald-600">82%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-4 rounded-full border-2 border-slate-200 overflow-hidden">
                        <div class="bg-emerald-500 h-full rounded-full" style="width: 82%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm font-black text-slate-600 uppercase tracking-widest">Apparel</span>
                        <span class="text-sm font-black text-blue-600">64%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-4 rounded-full border-2 border-slate-200 overflow-hidden">
                        <div class="bg-blue-500 h-full rounded-full" style="width: 64%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm font-black text-slate-600 uppercase tracking-widest">Groceries</span>
                        <span class="text-sm font-black text-orange-600">24%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-4 rounded-full border-2 border-slate-200 overflow-hidden">
                        <div class="bg-orange-500 h-full rounded-full" style="width: 24%"></div>
                    </div>
                </div>
            </div>

            <div class="mt-12 p-6 bg-emerald-50 rounded-2xl border-2 border-emerald-100">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center border-2 border-emerald-200">
                        <i data-lucide="alert-circle" class="text-emerald-600 w-6 h-6"></i>
                    </div>
                    <div>
                        <p class="text-sm font-black text-emerald-900">12 Items Low Stock</p>
                        <p class="text-xs font-bold text-emerald-600 mt-0.5">Needs action soon.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="block-card overflow-hidden animate-block-up" style="animation-delay: 0.7s">
        <div class="p-8 border-b-2 border-slate-100 flex items-center justify-between">
            <h3 class="text-2xl font-black text-slate-900 heading-font">Recent <span class="text-emerald-600">Activity</span></h3>
            <button class="bg-slate-100 text-slate-900 px-5 py-2 rounded-xl text-xs font-black border-2 border-slate-200 hover:bg-emerald-50 hover:border-emerald-200 transition-all">Export Report</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[11px] font-black tracking-[0.15em]">
                    <tr>
                        <th class="px-10 py-6">ID</th>
                        <th class="px-10 py-6">Customer</th>
                        <th class="px-10 py-6">Order</th>
                        <th class="px-10 py-6">Amount</th>
                        <th class="px-10 py-6">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y-2 divide-slate-100">
                    <tr class="hover:bg-emerald-50/50 transition-colors group">
                        <td class="px-10 py-6 text-sm font-black text-slate-400 tracking-tighter">#TRX-8291</td>
                        <td class="px-10 py-6">
                            <div class="flex items-center space-x-3">
                                <div class="w-9 h-9 rounded-xl bg-slate-200 border-2 border-white overflow-hidden shadow-sm">
                                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=10b981&color=fff" alt="">
                                </div>
                                <span class="text-sm font-black text-slate-900">John Doe</span>
                            </div>
                        </td>
                        <td class="px-10 py-6 text-sm font-bold text-slate-600">Wireless Headphones</td>
                        <td class="px-10 py-6 text-sm font-black text-slate-900 tracking-tight">$129.00</td>
                        <td class="px-10 py-6">
                            <span class="px-4 py-1.5 bg-emerald-500 text-white text-[10px] font-black uppercase rounded-lg shadow-lg shadow-emerald-100">Completed</span>
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
            document.getElementById('live-clock').textContent = now.toLocaleTimeString();
        }, 1000);

        const ctx = document.getElementById('revenueChart').getContext('2d');
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Revenue',
                    data: [3200, 4500, 4100, 5800, 4900, 6200, 7500],
                    backgroundColor: '#059669',
                    borderRadius: 12,
                    borderWidth: 0,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { display: false },
                        ticks: { font: { weight: 'bold' }, color: '#94a3b8', callback: v => '$' + v }
                    },
                    x: { 
                        grid: { display: false }, 
                        ticks: { font: { weight: 'bold' }, color: '#94a3b8' } 
                    }
                }
            }
        });
    });
</script>
@endsection
