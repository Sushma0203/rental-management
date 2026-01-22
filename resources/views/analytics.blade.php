@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 animate-fade-up">
        <div>
            <h1 class="text-3xl font-bold heading-font text-slate-900">Analytics & Insights</h1>
            <p class="text-slate-500 mt-1">Deep dive into your retail performance and AI-driven trends.</p>
        </div>
        <div class="mt-4 md:mt-0">
            <button class="flex items-center space-x-2 px-6 py-2.5 bg-indigo-600 rounded-2xl text-sm font-bold text-white hover:bg-indigo-700 transition-all hover:shadow-lg hover:shadow-indigo-200">
                <i data-lucide="download" class="w-4 h-4"></i>
                <span>Generate Report</span>
            </button>
        </div>
    </div>

    <!-- Top Row Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <div class="glass-card p-8 rounded-[32px] animate-fade-up stagger-1">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-xl font-bold text-slate-900 heading-font">Sales Category</h3>
                <span class="text-xs font-black text-indigo-500 uppercase">Q1 2026</span>
            </div>
            <div class="h-64 relative">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
        <div class="glass-card p-8 rounded-[32px] animate-fade-up stagger-2">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-xl font-bold text-slate-900 heading-font">Traffic Density</h3>
                <div class="flex space-x-1">
                    <div class="w-1.5 h-1.5 rounded-full bg-slate-200"></div>
                    <div class="w-1.5 h-1.5 rounded-full bg-indigo-500"></div>
                    <div class="w-1.5 h-1.5 rounded-full bg-slate-200"></div>
                </div>
            </div>
            <div class="h-64">
                <canvas id="trafficChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Bottom Row Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 glass-card p-8 rounded-[32px] animate-fade-up stagger-3">
            <h3 class="text-xl font-bold text-slate-900 mb-8 heading-font">Profit Margin Trend</h3>
            <div class="h-80">
                <canvas id="profitChart"></canvas>
            </div>
        </div>
        <div class="glass-card p-8 rounded-[32px] animate-fade-up stagger-4 flex flex-col items-center justify-center text-center">
            <div class="relative mb-6">
                <div class="absolute inset-0 bg-emerald-400 rounded-full blur-2xl opacity-20 animate-pulse"></div>
                <div class="relative w-24 h-24 rounded-full bg-gradient-to-tr from-emerald-400 to-emerald-600 text-white flex items-center justify-center text-4xl shadow-xl shadow-emerald-100">
                    <i data-lucide="smile" class="w-12 h-12"></i>
                </div>
            </div>
            <h4 class="text-2xl font-bold text-slate-900">92% Happiness</h4>
            <p class="text-sm text-slate-500 mt-2">Overall customer sentiment is <span class="text-emerald-600 font-bold uppercase tracking-tighter">Excellent</span></p>
            
            <div class="mt-10 space-y-5 w-full">
                <div class="flex flex-col space-y-2">
                    <div class="flex justify-between text-[10px] font-black uppercase text-slate-400">
                        <span>Sentiment Score</span>
                        <span class="text-slate-900">92/100</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-gradient-to-r from-emerald-400 to-emerald-600 h-full rounded-full" style="width: 92%"></div>
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
                    borderWidth: 8,
                    borderColor: 'rgba(255,255,255,0)',
                    hoverOffset: 15
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '75%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 30,
                            font: { size: 12, weight: 'bold' }
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
                    backgroundColor: '#6366f1',
                    borderRadius: 12,
                    hoverBackgroundColor: '#4f46e5'
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
                        ticks: { display: false }
                    },
                    x: { 
                        grid: { display: false },
                        ticks: { font: { weight: 'bold' }, color: '#94a3b8' }
                    }
                }
            }
        });

        // Profit Chart
        const profitCtx = document.getElementById('profitChart').getContext('2d');
        const profitGradient = profitCtx.createLinearGradient(0, 0, 0, 400);
        profitGradient.addColorStop(0, 'rgba(168, 85, 247, 0.4)');
        profitGradient.addColorStop(1, 'rgba(168, 85, 247, 0)');

        new Chart(profitCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Margin',
                    data: [24, 26, 23, 28, 32, 29],
                    borderColor: '#a855f7',
                    borderWidth: 5,
                    fill: true,
                    backgroundColor: profitGradient,
                    tension: 0.5,
                    pointRadius: 0,
                    pointHoverRadius: 10,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        beginAtZero: false,
                        grid: { color: 'rgba(0,0,0,0.03)' },
                        ticks: { font: { weight: 'bold' }, color: '#94a3b8', callback: v => v + '%' }
                    },
                    x: { grid: { display: false } }
                }
            }
        });
    });
</script>
@endsection
@endsection
