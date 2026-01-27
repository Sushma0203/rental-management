@extends('layouts.app')

@section('content')
<div class="space-y-20 animate-fade-in-up">

    <!-- Hero Section -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-8 mb-20">
        <div class="space-y-4">
            <p class="text-sm font-semibold text-emerald-400 uppercase tracking-[0.15em]">Welcome Back</p>
            <h1 class="text-5xl lg:text-6xl font-extrabold heading-font text-white tracking-tight">
                Dashboard <span class="text-emerald-400">Overview</span>
            </h1>
            <p class="text-base lg:text-lg text-white/60 font-medium">{{ date('l, F d, Y') }} • <span id="live-clock" class="text-white">00:00:00</span></p>
        </div>
        <div class="flex items-center gap-6 lg:gap-8">
            <button class="px-6 py-3 bg-white/10 backdrop-blur-sm border border-white/20 text-white text-sm font-semibold hover:bg-white/20 transition-all shadow-md flex items-center gap-2">
                <i data-lucide="download" class="w-4 h-4"></i>
                <span>Export</span>
            </button>
            <button class="px-6 py-3 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white text-sm font-semibold hover:shadow-xl hover:shadow-emerald-400/30 transition-all shadow-md flex items-center gap-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>New Entry</span>
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-20">
        @php
        $stats = [
            ['label'=>'Total Revenue','value'=>'Rs. 4.29L','change'=>'+12%','icon'=>'dollar-sign','color'=>'emerald','note'=>'vs last month'],
            ['label'=>'Total Orders','value'=>'842','change'=>'+8%','icon'=>'shopping-bag','color'=>'blue','note'=>'This month'],
            ['label'=>'Active Customers','value'=>'1.2K','change'=>'Stable','icon'=>'users','color'=>'purple','note'=>'Registered users'],
            ['label'=>'Average Order','value'=>'Rs. 5.1K','change'=>'+5%','icon'=>'trending-up','color'=>'amber','note'=>'Per transaction'],
        ];
        @endphp

        @foreach($stats as $index => $stat)
        <div class="prof-card p-8 shadow-md animate-fade-in" style="animation-delay: {{0.1 + $index*0.1}}s">
            <div class="flex items-center justify-between mb-6">
                <div class="w-14 h-14 bg-gradient-to-br from-{{ $stat['color'] }}-500 to-{{ $stat['color'] }}-600 flex items-center justify-center shadow-sm">
                    <i data-lucide="{{ $stat['icon'] }}" class="w-6 h-6 text-white"></i>
                </div>
                <span class="px-3 py-1 bg-{{ $stat['color'] }}-50 text-{{ $stat['color'] }}-600 text-xs font-bold">{{ $stat['change'] }}</span>
            </div>
            <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-3">{{ $stat['label'] }}</p>
            <h3 class="text-3xl font-extrabold text-slate-900 mb-2">{{ $stat['value'] }}</h3>
            <p class="text-sm text-slate-500 font-medium">{{ $stat['note'] }}</p>
        </div>
        @endforeach
    </div>

    <!-- Charts & Alerts -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-20">

        <!-- Revenue Chart -->
        <div class="lg:col-span-2 prof-card p-10 shadow-md animate-fade-in" style="animation-delay: 0.5s">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h3 class="text-2xl font-extrabold text-slate-900 heading-font mb-1">Revenue Growth</h3>
                    <p class="text-sm text-slate-500 font-medium">Weekly performance metrics</p>
                </div>
                <div class="flex items-center gap-4">
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
        <div class="prof-card p-10 shadow-md animate-fade-in" style="animation-delay: 0.6s">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-2xl font-extrabold text-slate-900 heading-font">Stock Alerts</h3>
                <i data-lucide="alert-triangle" class="w-5 h-5 text-amber-500"></i>
            </div>
            <div class="space-y-8">
                @php
                    $alerts = [
                        ['name' => 'iPhone 15 Pro', 'stock' => 2, 'color' => 'rose', 'icon' => 'smartphone'],
                        ['name' => 'Sony XM4', 'stock' => 8, 'color' => 'amber', 'icon' => 'headphones'],
                        ['name' => 'Logitech MX', 'stock' => 4, 'color' => 'rose', 'icon' => 'mouse'],
                        ['name' => 'iPad Air', 'stock' => 6, 'color' => 'amber', 'icon' => 'tablet'],
                    ];
                @endphp
                @foreach($alerts as $alert)
                <div class="flex items-center justify-between p-6 bg-{{ $alert['color'] }}-50 border border-{{ $alert['color'] }}-100 hover:shadow-md transition-all group">
                    <div class="flex items-center gap-6">
                        <div class="w-14 h-14 bg-white flex items-center justify-center shadow-sm">
                            <i data-lucide="{{ $alert['icon'] }}" class="w-6 h-6 text-{{ $alert['color'] }}-600"></i>
                        </div>
                        <div>
                            <p class="text-base font-bold text-slate-900">{{ $alert['name'] }}</p>
                            <p class="text-sm text-slate-500 font-medium">{{ $alert['stock'] }} units left</p>
                        </div>
                    </div>
                    <button class="opacity-0 group-hover:opacity-100 transition-opacity">
                        <i data-lucide="arrow-right" class="w-5 h-5 text-{{ $alert['color'] }}-600"></i>
                    </button>
                </div>
                @endforeach
            </div>
            <button class="w-full mt-6 py-4 border-2 border-slate-200 text-sm font-bold text-slate-600 uppercase tracking-widest hover:bg-slate-50 hover:border-slate-300 transition-all">
                View All Alerts
            </button>
        </div>
    </div>

    <!-- Recent Activity Table -->
    <div class="prof-card overflow-hidden shadow-md animate-fade-in" style="animation-delay: 0.7s">
        <div class="p-10 border-b border-slate-100 flex items-center justify-between bg-gradient-to-r from-slate-50 to-white">
            <div>
                <h3 class="text-2xl font-extrabold text-slate-900 heading-font mb-1">Recent Activity</h3>
                <p class="text-sm text-slate-500 font-medium">Latest transactions and updates</p>
            </div>
            <button class="px-6 py-3 bg-slate-900 text-white text-sm font-semibold hover:bg-slate-800 transition-all shadow-md">
                View All
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-bold tracking-[0.15em]">
                    <tr>
                        <th class="px-8 py-5">Reference ID</th>
                        <th class="px-8 py-5">Customer</th>
                        <th class="px-8 py-5">Product</th>
                        <th class="px-8 py-5">Status</th>
                        <th class="px-8 py-5 text-right">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                    $activities = [
                        ['id'=>'#TRX-8291','name'=>'Bhuwan Kc','email'=>'bhuwan@example.com','product'=>'MacBook Pro 16"','status'=>'Completed','amount'=>'Rs. 12,900','avatar'=>'10b981'],
                        ['id'=>'#TRX-8292','name'=>'Sarah Shrestha','email'=>'sarah@example.com','product'=>'AirPods Pro','status'=>'Pending','amount'=>'Rs. 4,500','avatar'=>'3b82f6'],
                        ['id'=>'#TRX-8293','name'=>'Sulav Shakya','email'=>'sulav@example.com','product'=>'iPad Air 5th Gen','status'=>'Completed','amount'=>'Rs. 8,200','avatar'=>'8b5cf6'],
                    ];
                    @endphp
                    @foreach($activities as $activity)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-8 py-6">
                            <span class="text-sm font-mono font-bold text-slate-400">{{ $activity['id'] }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($activity['name']) }}&background={{ $activity['avatar'] }}&color=fff" class="w-10 h-10">
                                <div>
                                    <p class="text-sm font-bold text-slate-900">{{ $activity['name'] }}</p>
                                    <p class="text-xs text-slate-500">{{ $activity['email'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <p class="text-sm font-bold text-slate-700">{{ $activity['product'] }}</p>
                        </td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-{{ $activity['status']=='Completed'?'emerald':'amber' }}-50 text-{{ $activity['status']=='Completed'?'emerald':'amber' }}-600 text-xs font-bold uppercase border border-{{ $activity['status']=='Completed'?'emerald':'amber' }}-100">{{ $activity['status'] }}</span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <p class="text-sm font-bold text-slate-900">{{ $activity['amount'] }}</p>
                        </td>
                    </tr>
                    @endforeach
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
            labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
            datasets: [{
                label: 'Revenue',
                data: [32000,45000,41000,58000,49000,62000,75000],
                borderColor: '#10b981',
                borderWidth: 3,
                fill: true,
                backgroundColor: (ctx) => {
                    const gradient = ctx.chart.ctx.createLinearGradient(0,0,0,400);
                    gradient.addColorStop(0,'rgba(16,185,129,0.2)');
                    gradient.addColorStop(1,'rgba(16,185,129,0)');
                    return gradient;
                },
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#10b981',
                pointBorderWidth: 2,
                pointHoverRadius: 7
            }]
        },
        options:{
            responsive:true,
            maintainAspectRatio:false,
            plugins:{
                legend:{display:false},
                tooltip:{
                    backgroundColor:'#1e293b',
                    padding:10,
                    titleFont:{size:14,weight:'bold'},
                    bodyFont:{size:13},
                    borderColor:'#10b981',
                    borderWidth:1
                }
            },
            scales:{
                y:{
                    beginAtZero:true,
                    grid:{color:'#f1f5f9',drawBorder:false},
                    ticks:{
                        font:{size:12,weight:'600'},
                        color:'#64748b',
                        callback:value=>'Rs. '+(value/1000)+'K'
                    }
                },
                x:{
                    grid:{display:false,drawBorder:false},
                    ticks:{font:{size:12,weight:'600'},color:'#64748b'}
                }
            }
        }
    });
});
</script>
@endsection
