@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 px-6 lg:px-12 py-14 space-y-24">

    <!-- HEADER -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
        <div>
            <p class="text-xs font-semibold tracking-widest text-slate-400 uppercase mb-2">
                Business Intelligence
            </p>
            <h1 class="text-4xl font-bold text-slate-800">
                Analytics Overview
            </h1>
        </div>

        <div class="stat-pill">
            <span class="text-xs uppercase text-slate-500">Efficiency</span>
            <span class="text-2xl font-semibold text-emerald-600">94.2%</span>
        </div>
    </div>

    <!-- TOP CHARTS -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        <div class="card">
            <div class="card-header">
                <h3>Category Distribution</h3>
                <p>Asset classification</p>
            </div>
            <div class="h-72">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Operational Density</h3>
                <p>Hourly activity</p>
            </div>
            <div class="h-72">
                <canvas id="trafficChart"></canvas>
            </div>
        </div>

    </div>

    <!-- BOTTOM GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

        <div class="lg:col-span-2 card">
            <div class="card-header">
                <h3>Profit Variance Trend</h3>
                <p>Monthly performance</p>
            </div>
            <div class="h-80">
                <canvas id="profitChart"></canvas>
            </div>
        </div>

        <div class="card flex flex-col justify-center items-center text-center">
            <h2 class="text-5xl font-bold text-slate-800 mb-2">98%</h2>
            <p class="text-xs uppercase tracking-widest text-emerald-600 mb-4">
                Customer Satisfaction
            </p>
            <p class="text-sm text-slate-500 max-w-xs">
                Consistently high satisfaction across all service channels and interactions.
            </p>
        </div>

    </div>

</div>

<!-- CLEAN ANALYTICS STYLE -->
<style>
.card {
    background: #ffffff;
    border-radius: 14px;
    padding: 28px;
    border: 1px solid #e5e7eb;
}

.card-header h3 {
    font-size: 1.2rem;
    font-weight: 600;
    color: #1f2937;
}

.card-header p {
    font-size: 0.85rem;
    color: #64748b;
    margin-top: 2px;
}

.stat-pill {
    display: flex;
    align-items: center;
    gap: 12px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    padding: 10px 18px;
    border-radius: 999px;
}
</style>

@endsection
