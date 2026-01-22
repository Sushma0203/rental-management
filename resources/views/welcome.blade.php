@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold heading-font text-slate-900">Dashboard Overview</h1>
            <p class="text-slate-500 mt-1">Welcome back, here's what's happening today.</p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-3">
            <button class="flex items-center space-x-2 px-4 py-2 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-50 transition-colors">
                <i data-lucide="calendar" class="w-4 h-4"></i>
                <span>Jan 22, 2026</span>
            </button>
            <button class="flex items-center space-x-2 px-4 py-2 bg-indigo-600 rounded-xl text-sm font-bold text-white hover:bg-indigo-700 transition-shadow shadow-lg shadow-indigo-200">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>New Sale</span>
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="dollar-sign" class="w-6 h-6"></i>
                </div>
                <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full">+12.5%</span>
            </div>
            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider">Total Revenue</p>
            <h3 class="text-2xl font-bold text-slate-900 mt-1">$45,285.00</h3>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="shopping-bag" class="w-6 h-6"></i>
                </div>
                <span class="text-xs font-bold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full">+8.2%</span>
            </div>
            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider">Total Sales</p>
            <h3 class="text-2xl font-bold text-slate-900 mt-1">1,240</h3>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
                <span class="text-xs font-bold text-slate-400 bg-slate-50 px-2.5 py-1 rounded-full">Static</span>
            </div>
            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider">New Customers</p>
            <h3 class="text-2xl font-bold text-slate-900 mt-1">148</h3>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center">
                    <i data-lucide="activity" class="w-6 h-6"></i>
                </div>
                <span class="text-xs font-bold text-rose-600 bg-rose-50 px-2.5 py-1 rounded-full">-2.4%</span>
            </div>
            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider">Avg. Order Value</p>
            <h3 class="text-2xl font-bold text-slate-900 mt-1">$36.50</h3>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Sales Chart -->
        <div class="lg:col-span-2 bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Revenue Analytics</h3>
                    <p class="text-sm text-slate-500">Sales performance over the last 7 days</p>
                </div>
                <select class="text-sm border-none bg-slate-50 rounded-lg py-1 px-3 focus:ring-0">
                    <option>Last 7 Days</option>
                    <option>Last 30 Days</option>
                </select>
            </div>
            <div class="h-80">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <!-- Top Products -->
        <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
            <h3 class="text-lg font-bold text-slate-900 mb-6">Top Selling Categoris</h3>
            <div class="space-y-6">
                <div>
                    <div class="flex justify-between mb-2">
                        <span class="text-sm font-semibold text-slate-700">Electronics</span>
                        <span class="text-sm font-bold text-slate-900">42%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-indigo-600 h-full rounded-full" style="width: 42%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <span class="text-sm font-semibold text-slate-700">Apparel</span>
                        <span class="text-sm font-bold text-slate-900">28%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-purple-600 h-full rounded-full" style="width: 28%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <span class="text-sm font-semibold text-slate-700">Home & Kitchen</span>
                        <span class="text-sm font-bold text-slate-900">18%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-blue-600 h-full rounded-full" style="width: 18%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <span class="text-sm font-semibold text-slate-700">Groceries</span>
                        <span class="text-sm font-bold text-slate-900">12%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-orange-600 h-full rounded-full" style="width: 12%"></div>
                    </div>
                </div>
            </div>
            <button class="w-full mt-8 py-3 border border-slate-200 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-50 transition-colors">
                View Full Category Report
            </button>
        </div>
    </div>

    <!-- Recent Transactions -->
    <div class="mt-8 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-8 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-lg font-bold text-slate-900">Recent Transactions</h3>
            <button class="text-indigo-600 font-bold text-sm hover:text-indigo-700">View All</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-bold">
                    <tr>
                        <th class="px-8 py-4">Transaction ID</th>
                        <th class="px-8 py-4">Customer</th>
                        <th class="px-8 py-4">Product</th>
                        <th class="px-8 py-4">Amount</th>
                        <th class="px-8 py-4">Status</th>
                        <th class="px-8 py-4">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr>
                        <td class="px-8 py-4 text-sm font-medium text-slate-900">#TRX-8291</td>
                        <td class="px-8 py-4 flex items-center space-x-3">
                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=random" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-semibold text-slate-700">John Doe</span>
                        </td>
                        <td class="px-8 py-4 text-sm text-slate-600">Wireless Headphones</td>
                        <td class="px-8 py-4 text-sm font-bold text-slate-900">$129.00</td>
                        <td class="px-8 py-4">
                            <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 text-xs font-bold rounded-full border border-emerald-100">Paid</span>
                        </td>
                        <td class="px-8 py-4 text-sm text-slate-500">2 mins ago</td>
                    </tr>
                    <tr>
                        <td class="px-8 py-4 text-sm font-medium text-slate-900">#TRX-8290</td>
                        <td class="px-8 py-4 flex items-center space-x-3">
                            <img src="https://ui-avatars.com/api/?name=Sarah+Smith&background=random" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-semibold text-slate-700">Sarah Smith</span>
                        </td>
                        <td class="px-8 py-4 text-sm text-slate-600">Smart Watch Pro</td>
                        <td class="px-8 py-4 text-sm font-bold text-slate-900">$299.00</td>
                        <td class="px-8 py-4">
                            <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 text-xs font-bold rounded-full border border-emerald-100">Paid</span>
                        </td>
                        <td class="px-8 py-4 text-sm text-slate-500">15 mins ago</td>
                    </tr>
                    <tr>
                        <td class="px-8 py-4 text-sm font-medium text-slate-900">#TRX-8289</td>
                        <td class="px-8 py-4 flex items-center space-x-3">
                            <img src="https://ui-avatars.com/api/?name=Mike+Ross&background=random" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-semibold text-slate-700">Mike Ross</span>
                        </td>
                        <td class="px-8 py-4 text-sm text-slate-600">Bluetooth Speaker</td>
                        <td class="px-8 py-4 text-sm font-bold text-slate-900">$79.00</td>
                        <td class="px-8 py-4">
                            <span class="px-2.5 py-1 bg-amber-50 text-amber-600 text-xs font-bold rounded-full border border-amber-100">Pending</span>
                        </td>
                        <td class="px-8 py-4 text-sm text-slate-500">1 hour ago</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const ctx = document.getElementById('revenueChart').getContext('2d');
        
        // Gradient for the chart
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(99, 102, 241, 0.2)');
        gradient.addColorStop(1, 'rgba(99, 102, 241, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Revenue',
                    data: [3200, 4500, 4100, 5800, 4900, 6200, 7500],
                    borderColor: '#6366f1',
                    borderWidth: 3,
                    fill: true,
                    backgroundColor: gradient,
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#6366f1',
                    pointHoverRadius: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f1f5f9'
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value;
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
