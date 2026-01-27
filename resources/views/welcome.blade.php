@extends('layouts.app')

@section('content')
<div class="space-y-32 animate-fade-in-up">
    
    <!-- Hero Section -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-8 mb-32">
        <div>
            <p class="text-sm font-bold text-emerald-400 uppercase tracking-[0.2em] mb-3">Welcome Back</p>
            <h1 class="text-6xl font-black heading-font text-white tracking-tight mb-3">
                Dashboard <span class="text-emerald-400">Overview</span>
            </h1>
            <p class="text-lg text-white/70 font-medium">{{ date('l, F d, Y') }} • <span id="live-clock" class="text-white">00:00:00</span></p>
        </div>
        <div class="flex items-center gap-4">
            <button class="px-8 py-4 bg-white/10 backdrop-blur-sm border border-white/20 text-white rounded-2xl text-sm font-bold hover:bg-white/20 transition-all shadow-xl flex items-center gap-3">
                <i data-lucide="download" class="w-5 h-5"></i>
                <span>Export Report</span>
            </button>
            <button class="px-8 py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-2xl text-sm font-bold hover:shadow-2xl hover:shadow-emerald-500/50 transition-all shadow-xl flex items-center gap-3">
                <i data-lucide="plus" class="w-5 h-5"></i>
                <span>New Entry</span>
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-32">
        <div class="prof-card p-8 animate-fade-in" style="animation-delay: 0.1s">
            <div class="flex items-start justify-between mb-6">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center shadow-lg shadow-emerald-200">
                    <i data-lucide="dollar-sign" class="w-7 h-7 text-white"></i>
                </div>
                <span class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-lg text-xs font-black">+12%</span>
            </div>
            <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Total Revenue</p>
            <h3 class="text-4xl font-black text-slate-900 mb-1">Rs. 4.29L</h3>
            <p class="text-sm text-slate-500 font-medium">vs last month</p>
        </div>

        <div class="prof-card p-8 animate-fade-in" style="animation-delay: 0.2s">
            <div class="flex items-start justify-between mb-6">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-lg shadow-blue-200">
                    <i data-lucide="shopping-bag" class="w-7 h-7 text-white"></i>
                </div>
                <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-black">+8%</span>
            </div>
            <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Total Orders</p>
            <h3 class="text-4xl font-black text-slate-900 mb-1">842</h3>
            <p class="text-sm text-slate-500 font-medium">This month</p>
        </div>

        <div class="prof-card p-8 animate-fade-in" style="animation-delay: 0.3s">
            <div class="flex items-start justify-between mb-6">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center shadow-lg shadow-purple-200">
                    <i data-lucide="users" class="w-7 h-7 text-white"></i>
                </div>
                <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-black">Stable</span>
            </div>
            <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Active Customers</p>
            <h3 class="text-4xl font-black text-slate-900 mb-1">1.2K</h3>
            <p class="text-sm text-slate-500 font-medium">Registered users</p>
        </div>

        <div class="prof-card p-8 animate-fade-in" style="animation-delay: 0.4s">
            <div class="flex items-start justify-between mb-6">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center shadow-lg shadow-amber-200">
                    <i data-lucide="trending-up" class="w-7 h-7 text-white"></i>
                </div>
                <span class="px-3 py-1 bg-amber-50 text-amber-600 rounded-lg text-xs font-black">+5%</span>
            </div>
            <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Average Order</p>
            <h3 class="text-4xl font-black text-slate-900 mb-1">Rs. 5.1K</h3>
            <p class="text-sm text-slate-500 font-medium">Per transaction</p>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-16 mb-32">
        <!-- Revenue Chart -->
        <div class="lg:col-span-2 prof-card p-10 animate-fade-in" style="animation-delay: 0.5s">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h3 class="text-2xl font-black text-slate-900 heading-font mb-1">Revenue Growth</h3>
                    <p class="text-sm text-slate-500 font-medium">Weekly performance metrics</p>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                        <span class="text-xs font-bold text-slate-500 uppercase">Live Data</span>
                    </div>
                </div>
            </div>
            <div class="h-80">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <!-- Stock Alerts -->
        <div class="prof-card p-10 animate-fade-in" style="animation-delay: 0.6s">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-2xl font-black text-slate-900 heading-font">Stock Alerts</h3>
                <i data-lucide="alert-triangle" class="w-5 h-5 text-amber-500"></i>
            </div>
            <div class="space-y-6">
                @php
                    $alerts = [
                        ['name' => 'iPhone 15 Pro', 'stock' => 2, 'color' => 'rose', 'icon' => 'smartphone'],
                        ['name' => 'Sony XM4', 'stock' => 8, 'color' => 'amber', 'icon' => 'headphones'],
                        ['name' => 'Logitech MX', 'stock' => 4, 'color' => 'rose', 'icon' => 'mouse'],
                        ['name' => 'iPad Air', 'stock' => 6, 'color' => 'amber', 'icon' => 'tablet'],
                    ];
                @endphp
                @foreach($alerts as $alert)
                <div class="flex items-center justify-between p-4 bg-{{ $alert['color'] }}-50 rounded-xl border border-{{ $alert['color'] }}-100 hover:shadow-md transition-all group">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-sm">
                            <i data-lucide="{{ $alert['icon'] }}" class="w-5 h-5 text-{{ $alert['color'] }}-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-slate-900">{{ $alert['name'] }}</p>
                            <p class="text-xs text-slate-500 font-medium">{{ $alert['stock'] }} units left</p>
                        </div>
                    </div>
                    <button class="opacity-0 group-hover:opacity-100 transition-opacity">
                        <i data-lucide="arrow-right" class="w-4 h-4 text-{{ $alert['color'] }}-600"></i>
                    </button>
                </div>
                @endforeach
            </div>
            <button class="w-full mt-6 py-4 border-2 border-slate-200 rounded-xl text-sm font-black text-slate-600 uppercase tracking-widest hover:bg-slate-50 hover:border-slate-300 transition-all">
                View All Alerts
            </button>
        </div>
    </div>

    <!-- Recent Activity Table -->
    <div class="prof-card overflow-hidden animate-fade-in" style="animation-delay: 0.7s">
        <div class="p-10 border-b border-slate-100 flex items-center justify-between bg-gradient-to-r from-slate-50 to-white">
            <div>
                <h3 class="text-2xl font-black text-slate-900 heading-font mb-1">Recent Activity</h3>
                <p class="text-sm text-slate-500 font-medium">Latest transactions and updates</p>
            </div>
            <button class="px-6 py-3 bg-slate-900 text-white rounded-xl text-sm font-bold hover:bg-slate-800 transition-all shadow-lg">
                View All
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-black tracking-[0.15em]">
                    <tr>
                        <th class="px-10 py-5">Reference ID</th>
                        <th class="px-10 py-5">Customer</th>
                        <th class="px-10 py-5">Product</th>
                        <th class="px-10 py-5">Status</th>
                        <th class="px-10 py-5 text-right">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-10 py-6">
                            <span class="text-sm font-mono font-bold text-slate-400">#TRX-8291</span>
                        </td>
                        <td class="px-10 py-6">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Bhuwan+Kc&background=10b981&color=fff" class="w-10 h-10 rounded-lg">
                                <div>
                                    <p class="text-sm font-bold text-slate-900">Bhuwan Kc</p>
                                    <p class="text-xs text-slate-500">bhuwan@example.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-6">
                            <p class="text-sm font-bold text-slate-700">MacBook Pro 16"</p>
                        </td>
                        <td class="px-10 py-6">
                            <span class="px-4 py-2 bg-emerald-50 text-emerald-600 rounded-lg text-xs font-black uppercase border border-emerald-100">Completed</span>
                        </td>
                        <td class="px-10 py-6 text-right">
                            <p class="text-lg font-black text-slate-900">Rs. 12,900</p>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-10 py-6">
                            <span class="text-sm font-mono font-bold text-slate-400">#TRX-8292</span>
                        </td>
                        <td class="px-10 py-6">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Sarah+Shrestha&background=3b82f6&color=fff" class="w-10 h-10 rounded-lg">
                                <div>
                                    <p class="text-sm font-bold text-slate-900">Sarah shrestha</p>
                                    <p class="text-xs text-slate-500">sarah@example.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-6">
                            <p class="text-sm font-bold text-slate-700">AirPods Pro</p>
                        </td>
                        <td class="px-10 py-6">
                            <span class="px-4 py-2 bg-amber-50 text-amber-600 rounded-lg text-xs font-black uppercase border border-amber-100">Pending</span>
                        </td>
                        <td class="px-10 py-6 text-right">
                            <p class="text-lg font-black text-slate-900">Rs. 4,500</p>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-10 py-6">
                            <span class="text-sm font-mono font-bold text-slate-400">#TRX-8293</span>
                        </td>
                        <td class="px-10 py-6">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Sulav+Shakya&background=8b5cf6&color=fff" class="w-10 h-10 rounded-lg">
                                <div>
                                    <p class="text-sm font-bold text-slate-900">Sulav Shakya</p>
                                    <p class="text-xs text-slate-500">sulav@example.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-6">
                            <p class="text-sm font-bold text-slate-700">iPad Air 5th Gen</p>
                        </td>
                        <td class="px-10 py-6">
                            <span class="px-4 py-2 bg-emerald-50 text-emerald-600 rounded-lg text-xs font-black uppercase border border-emerald-100">Completed</span>
                        </td>
                        <td class="px-10 py-6 text-right">
                            <p class="text-lg font-black text-slate-900">Rs. 8,200</p>
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

        // Revenue Chart
        const ctx = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Revenue',
                    data: [32000, 45000, 41000, 58000, 49000, 62000, 75000],
                    borderColor: '#10b981',
                    borderWidth: 4,
                    fill: true,
                    backgroundColor: (context) => {
                        const ctx = context.chart.ctx;
                        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
                        gradient.addColorStop(0, 'rgba(16, 185, 129, 0.2)');
                        gradient.addColorStop(1, 'rgba(16, 185, 129, 0)');
                        return gradient;
                    },
                    tension: 0.4,
                    pointRadius: 6,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#10b981',
                    pointBorderWidth: 3,
                    pointHoverRadius: 8,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        padding: 12,
                        titleFont: { size: 14, weight: 'bold' },
                        bodyFont: { size: 13 },
                        borderColor: '#10b981',
                        borderWidth: 1
                    }
                },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { color: '#f1f5f9', drawBorder: false },
                        ticks: { 
                            font: { size: 12, weight: '600' },
                            color: '#64748b',
                            callback: (value) => 'Rs. ' + (value/1000) + 'K'
                        }
                    },
                    x: { 
                        grid: { display: false, drawBorder: false },
                        ticks: { 
                            font: { size: 12, weight: '600' },
                            color: '#64748b'
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
