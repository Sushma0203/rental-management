@extends('layouts.app')

@section('content')
<div class="space-y-32 animate-fade-in-up">
    
    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-32">
        <div>
            <p class="text-sm font-bold text-emerald-400 uppercase tracking-[0.2em] mb-3">Advanced Intelligence</p>
            <h1 class="text-6xl font-black heading-font text-white tracking-tight">
                Business <span class="text-emerald-400">Analytics</span>
            </h1>
        </div>
        <div class="px-10 py-6 prof-card rounded-3xl flex items-center gap-8 shadow-2xl">
            <div class="text-right border-r border-slate-200 pr-8">
                <p class="text-xs font-black text-emerald-600 uppercase tracking-widest mb-1">Efficiency Index</p>
                <div class="flex items-center gap-2">
                    <p class="text-4xl font-black text-slate-900 leading-none">94.2%</p>
                    <i data-lucide="trending-up" class="w-6 h-6 text-emerald-600"></i>
                </div>
            </div>
            <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                <i data-lucide="zap" class="w-8 h-8"></i>
            </div>
        </div>
    </div>

    <!-- Analytics Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mb-32">
        <div class="prof-card p-10 animate-fade-in" style="animation-delay: 0.1s">
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h3 class="text-2xl font-black text-slate-900 heading-font mb-1">Category Distribution</h3>
                    <p class="text-sm text-slate-500 font-medium">Asset breakdown by type</p>
                </div>
                <i data-lucide="layers-3" class="w-6 h-6 text-slate-300"></i>
            </div>
            <div class="h-80">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
        
        <div class="prof-card p-10 animate-fade-in" style="animation-delay: 0.2s">
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h3 class="text-2xl font-black text-slate-900 heading-font mb-1">Operational Density</h3>
                    <p class="text-sm text-slate-500 font-medium">Hourly activity metrics</p>
                </div>
                <i data-lucide="activity" class="w-6 h-6 text-slate-300"></i>
            </div>
            <div class="h-80">
                <canvas id="trafficChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
        <div class="lg:col-span-2 prof-card p-10 animate-fade-in" style="animation-delay: 0.3s">
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h3 class="text-2xl font-black text-slate-900 heading-font mb-1">Profit Variance Trend</h3>
                    <p class="text-sm text-slate-500 font-medium">Monthly performance analysis</p>
                </div>
                <i data-lucide="trending-up" class="w-6 h-6 text-slate-300"></i>
            </div>
            <div class="h-96">
                <canvas id="profitChart"></canvas>
            </div>
        </div>
        
        <div class="prof-card p-12 animate-fade-in flex flex-col items-center justify-center text-center relative overflow-hidden group shadow-2xl" style="animation-delay: 0.4s; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
            <div class="absolute -top-12 -right-12 w-48 h-48 bg-emerald-500/20 rounded-full blur-[80px]"></div>
            <div class="absolute -bottom-12 -left-12 w-48 h-48 bg-emerald-500/10 rounded-full blur-[80px]"></div>
            
            <div class="relative">
                <div class="w-32 h-32 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-3xl flex items-center justify-center mb-10 shadow-2xl shadow-emerald-900/40 transform group-hover:rotate-6 transition-transform duration-500">
                    <i data-lucide="smile" class="text-white w-16 h-16"></i>
                </div>
                <div class="absolute -top-4 -right-4 w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg border-4 border-slate-900">
                    <span class="text-xs font-black text-emerald-600">AI</span>
                </div>
            </div>

            <h3 class="text-6xl font-black text-white heading-font mb-3 tracking-tighter">98%</h3>
            <p class="text-xs font-black text-emerald-400 uppercase tracking-[0.3em] mb-10">Customer Satisfaction</p>
            <p class="text-sm font-bold text-slate-400 leading-relaxed max-w-xs">Exceptional retention rating across all customer touchpoints and service channels.</p>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Professional Theme Defaults
        Chart.defaults.font.family = "'Inter', sans-serif";
        Chart.defaults.font.weight = '600';
        Chart.defaults.color = '#94a3b8';

        // Category Split
        new Chart(document.getElementById('categoryChart'), {
            type: 'doughnut',
            data: {
                labels: ['Electronics', 'Personal', 'Essentials', 'Others'],
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: [
                        '#10b981',
                        '#3b82f6',
                        '#8b5cf6',
                        '#f59e0b'
                    ],
                    borderWidth: 8,
                    borderColor: '#ffffff',
                    hoverOffset: 20
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { 
                        position: 'right', 
                        labels: { 
                            boxWidth: 16, 
                            padding: 20, 
                            font: { size: 13, weight: 'bold' },
                            color: '#475569'
                        } 
                    },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        padding: 12,
                        titleFont: { size: 14, weight: 'bold' },
                        bodyFont: { size: 13 },
                        borderColor: '#10b981',
                        borderWidth: 1
                    }
                },
                cutout: '65%',
                animation: { animateScale: true, animateRotate: true }
            }
        });

        // Operational Density
        new Chart(document.getElementById('trafficChart'), {
            type: 'bar',
            data: {
                labels: ['09:00', '12:00', '15:00', '18:00', '21:00'],
                datasets: [{
                    label: 'Activity Level',
                    data: [120, 450, 380, 520, 290],
                    backgroundColor: (context) => {
                        const ctx = context.chart.ctx;
                        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
                        gradient.addColorStop(0, '#10b981');
                        gradient.addColorStop(1, '#059669');
                        return gradient;
                    },
                    borderRadius: 12,
                    barThickness: 50
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
                        grid: { display: true, color: '#f1f5f9', borderDash: [3, 3], drawBorder: false },
                        ticks: { font: { size: 12, weight: '600' }, color: '#64748b' }
                    },
                    x: { 
                        grid: { display: false, drawBorder: false }, 
                        ticks: { font: { size: 12, weight: '600' }, color: '#64748b' } 
                    }
                }
            }
        });

        // Profit Trend
        new Chart(document.getElementById('profitChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Profit Margin',
                    data: [24, 26, 23, 28, 32, 29],
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
                    pointHoverRadius: 10,
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: '#10b981',
                    pointHoverBorderWidth: 4
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
                        borderWidth: 1,
                        callbacks: {
                            label: (context) => 'Margin: ' + context.parsed.y + '%'
                        }
                    }
                },
                scales: {
                    y: { 
                        beginAtZero: false, 
                        grid: { color: '#f1f5f9', drawBorder: false }, 
                        ticks: { 
                            font: { size: 12, weight: '600' }, 
                            color: '#64748b',
                            callback: v => v + '%' 
                        } 
                    },
                    x: { 
                        grid: { display: false, drawBorder: false }, 
                        ticks: { font: { size: 12, weight: '600' }, color: '#64748b' } 
                    }
                }
            }
        });
    });
</script>
@endsection
