@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 animate-fade-in">
        <div>
            <p class="text-sm font-bold text-emerald-300 uppercase tracking-[0.2em] mb-2">Advanced Intelligence</p>
            <h1 class="text-5xl font-black heading-font text-white tracking-tight">Business <span class="text-emerald-300">Analytics</span></h1>
        </div>
        <div class="mt-8 md:mt-0 px-8 py-5 prof-card rounded-[2rem] border-emerald-100 flex items-center space-x-8 bg-emerald-50/30">
            <div class="text-right border-r border-emerald-200 pr-8">
                <p class="text-[10px] font-black text-emerald-600 uppercase tracking-widest mb-1">Efficiency Index</p>
                <div class="flex items-center space-x-2">
                    <p class="text-3xl font-black text-slate-900 leading-none">94.2%</p>
                    <i data-lucide="trending-up" class="w-5 h-5 text-emerald-600"></i>
                </div>
            </div>
            <div class="w-14 h-14 bg-emerald-600 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-emerald-200">
                <i data-lucide="zap" class="w-8 h-8"></i>
            </div>
        </div>
    </div>

    <!-- Analytics Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mb-20">
        <div class="prof-card p-10 animate-fade-in" style="animation-delay: 0.1s">
            <div class="flex justify-between items-center mb-10">
                <h3 class="text-xl font-black text-slate-900 heading-font uppercase tracking-widest">Asset Category Split</h3>
                <i data-lucide="layers-3" class="w-5 h-5 text-slate-300"></i>
            </div>
            <div class="h-80">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
        <div class="prof-card p-10 animate-fade-in" style="animation-delay: 0.2s">
            <div class="flex justify-between items-center mb-10">
                <h3 class="text-xl font-black text-slate-900 heading-font uppercase tracking-widest">Operational Density</h3>
                <i data-lucide="activity" class="w-5 h-5 text-slate-300"></i>
            </div>
            <div class="h-80">
                <canvas id="trafficChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
        <div class="lg:col-span-2 prof-card p-10 animate-fade-in" style="animation-delay: 0.3s">
            <div class="flex justify-between items-center mb-10">
                <h3 class="text-xl font-black text-slate-900 heading-font uppercase tracking-widest">Profit Variance Trend</h3>
                <i data-lucide="trending-up" class="w-5 h-5 text-slate-300"></i>
            </div>
            <div class="h-80">
                <canvas id="profitChart"></canvas>
            </div>
        </div>
        <div class="prof-card p-12 animate-fade-in flex flex-col items-center justify-center text-center bg-slate-900 relative overflow-hidden group shadow-2xl shadow-slate-300" style="animation-delay: 0.4s">
            <div class="absolute -top-12 -right-12 w-48 h-48 bg-emerald-500/10 rounded-full blur-[80px]"></div>
            <div class="absolute -bottom-12 -left-12 w-48 h-48 bg-emerald-500/5 rounded-full blur-[80px]"></div>
            
            <div class="relative">
                <div class="w-28 h-28 bg-[linear-gradient(135deg,#064e3b_0%,#059669_100%)] rounded-[2rem] flex items-center justify-center mb-10 shadow-2xl shadow-emerald-900/40 transform group-hover:rotate-6 transition-transform duration-500">
                    <i data-lucide="smile" class="text-white w-14 h-14"></i>
                </div>
                <div class="absolute -top-4 -right-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg border-4 border-slate-900">
                    <span class="text-[10px] font-black text-emerald-600">AI</span>
                </div>
            </div>

            <h3 class="text-5xl font-black text-white heading-font mb-3 tracking-tighter">98%</h3>
            <p class="text-[10px] font-black text-emerald-400 uppercase tracking-[0.3em] mb-10">Retention Score</p>
            <p class="text-sm font-bold text-slate-400 leading-relaxed">System analysis indicates an exceptional customer satisfaction rating across all nodes.</p>
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
                    backgroundColor: ['#064e3b', '#059669', '#10b981', '#6ee7b7'],
                    borderWidth: 10,
                    borderColor: '#ffffff',
                    hoverOffset: 15
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'right', labels: { boxWidth: 12, padding: 30, font: { size: 11 } } } },
                cutout: '70%',
                animation: { animateScale: true }
            }
        });

        // Operational Density
        new Chart(document.getElementById('trafficChart'), {
            type: 'bar',
            data: {
                labels: ['09:00', '12:00', '15:00', '18:00', '21:00'],
                datasets: [{
                    label: 'Efficiency',
                    data: [120, 450, 380, 520, 290],
                    backgroundColor: '#059669',
                    borderRadius: 16,
                    barThickness: 40
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { display: true, color: '#f1f5f9', borderDash: [2, 2] },
                        ticks: { font: { size: 10 } }
                    },
                    x: { grid: { display: false }, ticks: { font: { size: 10 } } }
                }
            }
        });

        // Profit Trend
        new Chart(document.getElementById('profitChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Margin',
                    data: [24, 26, 23, 28, 32, 29],
                    borderColor: '#059669',
                    borderWidth: 4,
                    fill: true,
                    backgroundColor: 'rgba(16, 185, 129, 0.05)',
                    tension: 0.4,
                    pointRadius: 0,
                    pointHoverRadius: 8,
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: '#059669',
                    pointHoverBorderWidth: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        beginAtZero: false, 
                        grid: { color: '#f1f5f9' }, 
                        ticks: { font: { size: 10 }, callback: v => v + '%' } 
                    },
                    x: { grid: { display: false }, ticks: { font: { size: 10 } } }
                }
            }
        });
    });
</script>
@endsection
