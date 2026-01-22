@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold heading-font text-slate-900">Analytics & Insights</h1>
            <p class="text-slate-500 mt-1">Deep dive into your retail performance and customer trends.</p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-3">
            <button class="flex items-center space-x-2 px-4 py-2 bg-indigo-600 rounded-xl text-sm font-bold text-white hover:bg-indigo-700 transition-shadow shadow-lg shadow-indigo-200">
                <i data-lucide="download" class="w-4 h-4"></i>
                <span>Download Report</span>
            </button>
        </div>
    </div>

    <!-- Analytics Cards -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
            <h3 class="text-lg font-bold text-slate-900 mb-6">Sales Category Breakdown</h3>
            <div class="h-64">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
        <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
            <h3 class="text-lg font-bold text-slate-900 mb-6">Customer Traffic by Hour</h3>
            <div class="h-64">
                <canvas id="trafficChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
            <h3 class="text-lg font-bold text-slate-900 mb-6">Profit Margin Over Time</h3>
            <div class="h-80">
                <canvas id="profitChart"></canvas>
            </div>
        </div>
        <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
            <h3 class="text-lg font-bold text-slate-900 mb-6">Customer Sentiment</h3>
            <div class="flex flex-col items-center justify-center h-full pb-8">
                <div class="w-24 h-24 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center text-4xl mb-4">
                    😊
                </div>
                <p class="text-2xl font-bold text-slate-900">Excellent</p>
                <p class="text-slate-500 text-sm mt-1">Based on 1,240 reviews</p>
                <div class="mt-8 space-y-4 w-full">
                    <div class="flex justify-between text-xs font-bold uppercase text-slate-400">
                        <span>Happiness Score</span>
                        <span>92/100</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2 rounded-full">
                        <div class="bg-emerald-500 h-full rounded-full" style="width: 92%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Category Chart
        new Chart(document.getElementById('categoryChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Electronics', 'Apparel', 'Home', 'Groceries'],
                datasets: [{
                    data: [42, 28, 18, 12],
                    backgroundColor: ['#6366f1', '#a855f7', '#3b82f6', '#f59e0b'],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20
                        }
                    }
                }
            }
        });

        // Traffic Chart
        new Chart(document.getElementById('trafficChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['9AM', '11AM', '1PM', '3PM', '5PM', '7PM', '9PM'],
                datasets: [{
                    label: 'Customers',
                    data: [45, 120, 180, 150, 210, 240, 110],
                    backgroundColor: 'rgba(99, 102, 241, 0.8)',
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, grid: { display: false } },
                    x: { grid: { display: false } }
                }
            }
        });

        // Profit Chart
        const profitCtx = document.getElementById('profitChart').getContext('2d');
        const profitGradient = profitCtx.createLinearGradient(0, 0, 0, 400);
        profitGradient.addColorStop(0, 'rgba(168, 85, 247, 0.2)');
        profitGradient.addColorStop(1, 'rgba(168, 85, 247, 0)');

        new Chart(profitCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Profit Margin (%)',
                    data: [24, 26, 23, 28, 32, 29],
                    borderColor: '#a855f7',
                    borderWidth: 3,
                    fill: true,
                    backgroundColor: profitGradient,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { 
                        beginAtZero: false,
                        ticks: { callback: v => v + '%' }
                    }
                }
            }
        });
    });
</script>
@endsection
