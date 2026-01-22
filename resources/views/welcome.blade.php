@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 animate-fade-up">
        <div>
            <h1 class="text-3xl font-bold heading-font text-slate-900">Dashboard Overview</h1>
            <p class="text-slate-500 mt-1">Welcome back, Admin. Here's your real-time performance summary.</p>
        </div>
        <div class="mt-4 md:mt-0 flex items-center space-x-4">
            <!-- Live Clock Widget -->
            <div class="hidden lg:flex items-center space-x-3 px-4 py-2 bg-white/50 backdrop-blur-md border border-white rounded-2xl shadow-sm">
                <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                <div class="text-sm font-bold text-slate-700 font-mono" id="live-clock">12:49:44 PM</div>
            </div>
            <button class="flex items-center space-x-2 px-4 py-2 bg-indigo-600 rounded-xl text-sm font-bold text-white hover:bg-indigo-700 transition-all hover:shadow-lg hover:shadow-indigo-200">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>New Sale</span>
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="glass-card p-6 rounded-3xl animate-fade-up stagger-1">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-600 text-white flex items-center justify-center shadow-lg shadow-emerald-100">
                    <i data-lucide="dollar-sign" class="w-6 h-6"></i>
                </div>
                <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-100">+12.5%</span>
            </div>
            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider">Total Revenue</p>
            <h3 class="text-3xl font-bold text-slate-900 mt-1">$45,285</h3>
            <div class="mt-4 flex items-center text-xs text-slate-400">
                <i data-lucide="trending-up" class="w-3 h-3 mr-1 text-emerald-500"></i>
                <span>$5.2k from yesterday</span>
            </div>
        </div>

        <div class="glass-card p-6 rounded-3xl animate-fade-up stagger-2">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-400 to-indigo-600 text-white flex items-center justify-center shadow-lg shadow-indigo-100">
                    <i data-lucide="shopping-bag" class="w-6 h-6"></i>
                </div>
                <span class="text-xs font-bold text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-full border border-indigo-100">+8.2%</span>
            </div>
            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider">Total Sales</p>
            <h3 class="text-3xl font-bold text-slate-900 mt-1">1,240</h3>
            <div class="mt-4 flex items-center text-xs text-slate-400">
                <i data-lucide="arrow-up" class="w-3 h-3 mr-1 text-indigo-500"></i>
                <span>12 new orders</span>
            </div>
        </div>

        <div class="glass-card p-6 rounded-3xl animate-fade-up stagger-3">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-purple-400 to-purple-600 text-white flex items-center justify-center shadow-lg shadow-purple-100">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
                <span class="text-xs font-bold text-slate-400 bg-slate-50 px-2.5 py-1 rounded-full border border-slate-200">Static</span>
            </div>
            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider">New Customers</p>
            <h3 class="text-3xl font-bold text-slate-900 mt-1">148</h3>
            <div class="mt-4 flex items-center text-xs text-slate-400">
                <i data-lucide="user-plus" class="w-3 h-3 mr-1 text-purple-500"></i>
                <span>Average 4.2/day</span>
            </div>
        </div>

        <div class="glass-card p-6 rounded-3xl animate-fade-up stagger-4">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-rose-400 to-rose-600 text-white flex items-center justify-center shadow-lg shadow-rose-100">
                    <i data-lucide="activity" class="w-6 h-6"></i>
                </div>
                <span class="text-xs font-bold text-rose-600 bg-rose-50 px-2.5 py-1 rounded-full border border-rose-100">-2.4%</span>
            </div>
            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider">Avg. Order Value</p>
            <h3 class="text-3xl font-bold text-slate-900 mt-1">$36.50</h3>
            <div class="mt-4 flex items-center text-xs text-slate-400">
                <i data-lucide="trending-down" class="w-3 h-3 mr-1 text-rose-500"></i>
                <span>Minimized by 1.2%</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Sales Chart -->
        <div class="lg:col-span-2 glass-card p-8 rounded-3xl animate-fade-up stagger-1">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-xl font-bold text-slate-900 heading-font">Revenue Analytics</h3>
                    <p class="text-sm text-slate-500">Sales performance over the last 7 days</p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="w-3 h-3 rounded-full bg-indigo-500"></span>
                    <span class="text-xs font-bold text-slate-500 uppercase">Live Data</span>
                </div>
            </div>
            <div class="h-80">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <!-- Top Products -->
        <div class="glass-card p-8 rounded-3xl animate-fade-up stagger-2">
            <h3 class="text-xl font-bold text-slate-900 mb-6 heading-font">Top Categories</h3>
            <div class="space-y-6">
                <div>
                    <div class="flex justify-between mb-2">
                        <span class="text-sm font-semibold text-slate-700">Electronics</span>
                        <span class="text-sm font-bold text-slate-900">42%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
                        <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 h-full rounded-full" style="width: 42%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <span class="text-sm font-semibold text-slate-700">Apparel</span>
                        <span class="text-sm font-bold text-slate-900">28%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-full rounded-full" style="width: 28%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <span class="text-sm font-semibold text-slate-700">Home & Kitchen</span>
                        <span class="text-sm font-bold text-slate-900">18%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-full rounded-full" style="width: 18%"></div>
                    </div>
                </div>
            </div>
            <button class="w-full mt-8 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-bold text-slate-600 hover:bg-slate-100 transition-colors">
                View Full Category Report
            </button>
        </div>
    </div>

    <!-- Recent Transactions -->
    <div class="mt-8 glass-card rounded-3xl overflow-hidden animate-fade-up stagger-3">
        <div class="p-8 border-b border-slate-100 flex items-center justify-between bg-white/30">
            <h3 class="text-xl font-bold text-slate-900 heading-font">Recent Activity</h3>
            <button class="text-indigo-600 font-bold text-sm hover:text-indigo-700">View History</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50/50 text-slate-500 uppercase text-xs font-bold tracking-widest">
                    <tr>
                        <th class="px-8 py-5">Transaction ID</th>
                        <th class="px-8 py-5">Customer</th>
                        <th class="px-8 py-5">Product</th>
                        <th class="px-8 py-5">Amount</th>
                        <th class="px-8 py-5">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/50">
                    <tr class="hover:bg-indigo-50/30 transition-colors cursor-pointer group">
                        <td class="px-8 py-5 text-sm font-mono text-slate-500">#TRX-8291</td>
                        <td class="px-8 py-5 flex items-center space-x-3">
                            <div class="p-0.5 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500">
                                <img src="https://ui-avatars.com/api/?name=John+Doe&background=fff&color=111" class="w-8 h-8 rounded-full border-2 border-white">
                            </div>
                            <span class="text-sm font-semibold text-slate-700">John Doe</span>
                        </td>
                        <td class="px-8 py-5 text-sm text-slate-600">Wireless Headphones</td>
                        <td class="px-8 py-5 text-sm font-black text-slate-900">$129.00</td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-emerald-500 text-white text-[10px] font-black uppercase rounded-lg shadow-sm shadow-emerald-100">Paid</span>
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
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(99, 102, 241, 0.4)');
        gradient.addColorStop(1, 'rgba(99, 102, 241, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Revenue',
                    data: [3200, 4500, 4100, 5800, 4900, 6200, 7500],
                    borderColor: '#6366f1',
                    borderWidth: 4,
                    fill: true,
                    backgroundColor: gradient,
                    tension: 0.45,
                    pointRadius: 6,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#6366f1',
                    pointBorderWidth: 3,
                    pointHoverRadius: 8,
                    pointHoverBackgroundColor: '#6366f1',
                    pointHoverBorderColor: '#fff',
                    pointHoverBorderWidth: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { color: 'rgba(0,0,0,0.03)' },
                        ticks: { font: { weight: 'bold' }, color: '#94a3b8', callback: v => '$' + v }
                    },
                    x: { grid: { display: false }, ticks: { font: { weight: 'bold' }, color: '#94a3b8' } }
                }
            }
        });
    });
</script>
@endsection
@endsection
