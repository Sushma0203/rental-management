@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#f8fafc] px-4 py-6 space-y-8">

    <!-- HEADER -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Dashboard
            </h1>
            <p class="text-sm text-slate-500 mt-1">
                {{ date('l, F d, Y') }} • <span id="live-clock"></span>
            </p>
        </div>

        <div class="flex gap-3">
            <button class="btn-outline">
                Export
            </button>
            <button class="btn-primary">
                + New Entry
            </button>
        </div>
    </div>

    <!-- STATS -->
    @php
        $stats = [
            ['label'=>'Revenue','value'=>'Rs. 4.29L'],
            ['label'=>'Orders','value'=>'842'],
            ['label'=>'Customers','value'=>'1,248'],
            ['label'=>'Avg Order','value'=>'Rs. 5,100'],
        ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($stats as $stat)
        <div class="glass-card">
            <p class="text-xs uppercase tracking-widest text-slate-400">
                {{ $stat['label'] }}
            </p>
            <h3 class="text-2xl font-semibold text-slate-800 mt-2">
                {{ $stat['value'] }}
            </h3>
        </div>
        @endforeach
    </div>

    <!-- MAIN GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- CHART -->
        <div class="glass-card lg:col-span-2">
            <h3 class="section-title">Revenue Overview</h3>
            <div class="h-72 mt-6">
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

        <div class="glass-card">
            <h3 class="section-title">Low Stock</h3>

            <div class="space-y-4 mt-6">
                @foreach($alerts as $alert)
                <div class="flex justify-between items-center border-b pb-3">
                    <div>
                        <p class="font-medium text-slate-700">
                            {{ $alert['name'] }}
                        </p>
                        <p class="text-xs text-slate-400">
                            {{ $alert['stock'] }} units remaining
                        </p>
                    </div>
                    <span class="text-xs font-semibold text-rose-600">
                        Alert
                    </span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- RECENT ACTIVITY -->
    <div class="glass-card">
        <h3 class="section-title mb-6">
            Recent Transactions
        </h3>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="text-left text-slate-400 border-b">
                    <tr>
                        <th class="pb-3">Ref</th>
                        <th class="pb-3">Customer</th>
                        <th class="pb-3">Product</th>
                        <th class="pb-3">Status</th>
                        <th class="pb-3 text-right">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach([
                        ['#8291','Bhuwan KC','MacBook','Done','12,900'],
                        ['#8292','Sarah S','AirPods','Pending','4,500'],
                        ['#8293','Sulav S','iPad','Done','8,200'],
                    ] as $row)
                    <tr>
                        <td class="py-4 text-slate-400">{{ $row[0] }}</td>
                        <td class="py-4 font-medium">{{ $row[1] }}</td>
                        <td class="py-4">{{ $row[2] }}</td>
                        <td class="py-4">
                            <span class="badge {{ $row[3]=='Done' ? 'badge-success' : 'badge-warn' }}">
                                {{ $row[3] }}
                            </span>
                        </td>
                        <td class="py-4 text-right font-semibold">
                            Rs. {{ $row[4] }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- STYLES -->
<style>
.glass-card {
    background: rgba(255,255,255,.7);
    backdrop-filter: blur(12px);
    border-radius: 12px;
    padding: 16px;
    border: 1px solid #e5e7eb;
}

.section-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #1f2937;
}

.btn-primary {
    background: #2563eb;
    color: white;
    padding: 10px 18px;
    border-radius: 10px;
    font-weight: 600;
}

.btn-outline {
    border: 1px solid #cbd5f5;
    padding: 10px 18px;
    border-radius: 10px;
    color: #2563eb;
    font-weight: 600;
}

.badge {
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 11px;
}

.badge-success {
    background: #dcfce7;
    color: #15803d;
}

.badge-warn {
    background: #fef3c7;
    color: #b45309;
}
</style>

<script>
setInterval(() => {
    document.getElementById('live-clock').innerText =
        new Date().toLocaleTimeString([], { hour12:false });
}, 1000);
</script>

@endsection
