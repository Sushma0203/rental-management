@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-12 animate-block-up">
        <div>
            <h1 class="text-4xl font-black heading-font text-slate-900 tracking-tight">Intelligence <span class="text-emerald-600">& Insights</span></h1>
            <p class="text-slate-500 mt-1 font-medium">Deep diving into your retail ecosystem performance.</p>
        </div>
        <div class="mt-8 md:mt-0 px-8 py-4 bg-emerald-50 rounded-2xl border-2 border-emerald-100 flex items-center space-x-6">
            <div class="text-right">
                <p class="text-[10px] font-black text-emerald-600 uppercase tracking-widest">Growth Index</p>
                <p class="text-2xl font-black text-emerald-900 leading-none">94.2</p>
            </div>
            <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-emerald-100">
                <i data-lucide="trending-up" class="w-6 h-6"></i>
            </div>
        </div>
    </div>

    <!-- Analytics Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-12">
        <div class="block-card p-10 animate-block-up" style="animation-delay: 0.1s">
            <h3 class="text-2xl font-black text-slate-900 heading-font mb-10 flex items-center justify-between">
                Sales by <span class="text-emerald-600 ml-2">Category</span>
                <i data-lucide="pie-chart" class="w-6 h-6 text-slate-300"></i>
            </h3>
            <div class="h-80">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
        <div class="block-card p-10 animate-block-up" style="animation-delay: 0.2s">
            <h3 class="text-2xl font-black text-slate-900 heading-font mb-10 flex items-center justify-between">
                Traffic <span class="text-emerald-600 ml-2">Density</span>
                <i data-lucide="map" class="w-6 h-6 text-slate-300"></i>
            </h3>
            <div class="h-80">
                <canvas id="trafficChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <div class="lg:col-span-2 block-card p-10 animate-block-up" style="animation-delay: 0.3s">
            <h3 class="text-2xl font-black text-slate-900 heading-font mb-10 flex items-center justify-between">
                Profit <span class="text-emerald-600 ml-2">Margin Trend</span>
                <i data-lucide="line-chart" class="w-6 h-6 text-slate-300"></i>
            </h3>
            <div class="h-80">
                <canvas id="profitChart"></canvas>
            </div>
        </div>
        <div class="block-card p-10 animate-block-up flex flex-col items-center justify-center text-center bg-slate-900 relative overflow-hidden" style="animation-delay: 0.4s">
            <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-600/10 rounded-full -mr-16 -mt-16 blur-3xl"></div>
            <div class="w-24 h-24 bg-emerald-500 rounded-3xl flex items-center justify-center mb-8 shadow-2xl shadow-emerald-500/50 border-4 border-emerald-400">
                <i data-lucide="smile" class="text-white w-12 h-12"></i>
            </div>
            <h3 class="text-3xl font-black text-white heading-font mb-2">92%</h3>
            <p class="text-[11px] font-black text-emerald-400 uppercase tracking-[0.2em] mb-8">Customer Happiness</p>
            <p class="text-sm font-bold text-slate-400 max-w-[200px]">Based on recent AI analysis of 450+ feedbacks.</p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Chart Style Defaults for Block Look
        Chart.defaults.font.family = "'Inter', sans-serif";
        Chart.defaults.font.weight = '700';
        Chart.defaults.color = '#94a3b8';

        // Category Chart
        new Chart(document.getElementById('categoryChart'), {
            type: 'doughnut',
            data: {
                labels: ['Electronics', 'Apparel', 'Essentials', 'Others'],
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: ['#059669', '#10b981', '#34d399', '#6ee7b7'],
                    borderWidth: 8,
                    borderColor: '#ffffff',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom', labels: { boxWidth: 12, padding: 20 } } },
                cutout: '75%'
            }
        });

        // Traffic Chart
        new Chart(document.getElementById('trafficChart'), {
            type: 'bar',
            data: {
                labels: ['9am', '12pm', '3pm', '6pm', '9pm'],
                datasets: [{
                    label: 'Visitors',
                    data: [120, 450, 380, 520, 290],
                    backgroundColor: '#059669',
                    borderRadius: 12,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { display: false } },
                    x: { grid: { display: false } }
                }
            }
        });

        // Profit Chart
        new Chart(document.getElementById('profitChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Margin',
                    data: [24, 26, 23, 28, 32, 29],
                    borderColor: '#059669',
                    borderWidth: 6,
                    fill: false,
                    tension: 0, // Sharp lines for block style
                    pointRadius: 8,
                    pointBackgroundColor: '#fff',
                    pointBorderWidth: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: false, grid: { color: '#f1f5f9' }, ticks: { callback: v => v + '%' } },
                    x: { grid: { display: false } }
                }
            }
        });
    });
</script>
@endsection
