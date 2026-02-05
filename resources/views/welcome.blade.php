@extends('layouts.app')

@section('content')

<div class="space-y-8">

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
    <div class="px-4 py-3 rounded-xl flex items-center gap-3 bg-emerald-50 border border-emerald-100 text-emerald-800">
        <i data-lucide="check-circle" class="w-5 h-5 text-emerald-500"></i>
        <span class="font-medium text-sm">{{ session('success') }}</span>
    </div>
    @endif

    <!-- HEADER -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-800 tracking-tight">
                Dashboard Overview
            </h1>
            <p class="text-slate-500 mt-2 flex items-center gap-2">
                <i data-lucide="calendar" class="w-4 h-4"></i>
                {{ date('l, F d, Y') }}
                <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                <span id="live-clock" class="font-mono"></span>
            </p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard.export') }}" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50 transition-colors text-sm font-medium shadow-sm inline-flex items-center gap-2">
                <i data-lucide="download" class="w-4 h-4"></i>
                Export Report
            </a>
            <a href="{{ route('dashboard.new-entry') }}" class="px-4 py-2 bg-rose-500 text-white rounded-xl hover:bg-rose-600 transition-colors text-sm font-medium shadow-sm shadow-rose-200 inline-flex items-center gap-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                New Entry
            </a>
        </div>
    </div>

    <!-- STATS -->
    @php
        $stats = [
            ['label'=>'Total Revenue', 'value'=>'Rs. 4.29L', 'icon'=>'indian-rupee', 'trend'=>'+12%'],
            ['label'=>'Total Orders', 'value'=>'842', 'icon'=>'shopping-bag', 'trend'=>'+5%'],
            ['label'=>'Active Customers', 'value'=>'1,248', 'icon'=>'users', 'trend'=>'+8%'],
            ['label'=>'Avg Order Value', 'value'=>'Rs. 5,100', 'icon'=>'bar-chart-2', 'trend'=>'-2%'],
        ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($stats as $stat)
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm group hover:border-rose-100 hover:shadow-md transition-all">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">{{ $stat['label'] }}</p>
                    <h3 class="text-2xl font-bold text-slate-800 mt-2">{{ $stat['value'] }}</h3>
                </div>
                <div class="p-2 rounded-lg bg-slate-50 text-slate-400 group-hover:bg-rose-50 group-hover:text-rose-500 transition-colors">
                    <i data-lucide="{{ $stat['icon'] ?? 'activity' }}" class="w-5 h-5"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <span class="text-xs font-medium {{ str_contains($stat['trend'], '+') ? 'text-emerald-600 bg-emerald-50' : 'text-rose-600 bg-rose-50' }} px-2 py-0.5 rounded-full">
                    {{ $stat['trend'] }}
                </span>
                <span class="text-xs text-slate-400">vs last month</span>
            </div>
        </div>
        @endforeach
    </div>

    <!-- MAIN GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- CHART -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 lg:col-span-2">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-slate-800">Revenue Overview</h3>
                <button class="text-sm text-slate-400 hover:text-rose-500 transition-colors">View Details</button>
            </div>
            <div class="h-80 w-full">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <!-- STOCK ALERTS -->
        @php
            $alerts = [
                ['name'=>'iPhone 15 Pro','stock'=>2],
                ['name'=>'Sony XM4','stock'=>8],
                ['name'=>'Logitech MX','stock'=>4],
            ];
        @endphp

        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-slate-800">Low Stock Alerts</h3>
                <span class="px-2 py-1 bg-rose-50 text-rose-600 text-xs font-bold rounded-lg">{{ count($alerts) }} Items</span>
            </div>

            <div class="space-y-4">
                @foreach($alerts as $alert)
                <div class="flex justify-between items-center p-3 rounded-xl bg-slate-50 border border-slate-100">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-rose-500 shadow-sm">
                            <i data-lucide="alert-triangle" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="font-medium text-sm text-slate-700">
                                {{ $alert['name'] }}
                            </p>
                            <p class="text-xs text-slate-500">
                                {{ $alert['stock'] }} units remaining
                            </p>
                        </div>
                    </div>
                    <button class="text-xs font-semibold text-rose-600 hover:text-rose-700 hover:underline">
                        Restock
                    </button>
                </div>
                @endforeach
            </div>
            
            <button class="w-full mt-6 py-2 text-sm font-medium text-slate-500 hover:text-slate-800 border-t border-slate-100 transition-colors">
                View All Inventory
            </button>
        </div>
    </div>

    <!-- RECENT ACTIVITY -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-50 flex justify-between items-center">
            <h3 class="text-lg font-bold text-slate-800">
                Recent Transactions
            </h3>
            <button class="text-sm text-slate-400 hover:text-rose-500 transition-colors">View All</button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50/50 text-slate-500 font-medium">
                    <tr>
                        <th class="px-6 py-4">Ref ID</th>
                        <th class="px-6 py-4">Customer</th>
                        <th class="px-6 py-4">Product</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach([
                        ['#8291','Bhuwan KC','MacBook Pro M3','Done','12,900'],
                        ['#8292','Sarah S','AirPods Pro','Pending','4,500'],
                        ['#8293','Sulav S','iPad Air','Done','8,200'],
                        ['#8294','John D','Magic Keyboard','Done','3,100'],
                    ] as $row)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4 font-mono text-slate-400 text-xs">{{ $row[0] }}</td>
                        <td class="px-6 py-4 font-medium text-slate-700">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center text-xs font-bold text-slate-400">
                                    {{ substr($row[1], 0, 1) }}
                                </div>
                                {{ $row[1] }}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-slate-600">{{ $row[2] }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium {{ $row[3]=='Done' ? 'bg-emerald-50 text-emerald-700 border border-emerald-100' : 'bg-amber-50 text-amber-700 border border-amber-100' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $row[3]=='Done' ? 'bg-emerald-500' : 'bg-amber-500' }}"></span>
                                {{ $row[3] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right font-semibold text-slate-700">
                            Rs. {{ $row[4] }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    // Live Clock
    setInterval(() => {
        document.getElementById('live-clock').innerText =
            new Date().toLocaleTimeString([], { hour12:false });
    }, 1000);

    // Revenue Chart
    const ctx = document.getElementById('revenueChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Revenue (Rs.)',
                data: [12000, 19000, 15000, 25000, 22000, 30000, 42000],
                borderColor: '#f43f5e', // rose-500
                backgroundColor: 'rgba(244, 63, 94, 0.1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#f43f5e',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#1e293b',
                    padding: 12,
                    titleFont: { size: 13, family: "'Outfit', sans-serif" },
                    bodyFont: { size: 13, family: "'Outfit', sans-serif" },
                    cornerRadius: 8,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return 'Rs. ' + context.parsed.y.toLocaleString();
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f1f5f9',
                        drawBorder: false
                    },
                    ticks: {
                        font: { family: "'Outfit', sans-serif", size: 11 },
                        color: '#94a3b8',
                        callback: function(value) {
                            return 'Rs. ' + (value / 1000) + 'k';
                        }
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        font: { family: "'Outfit', sans-serif", size: 11 },
                        color: '#94a3b8'
                    }
                }
            }
        }
    });
</script>

@endsection
