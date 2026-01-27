@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 animate-fade-in">
        <div>
            <p class="text-sm font-bold text-emerald-300 uppercase tracking-[0.2em] mb-2">Inventory Intelligence</p>
            <h1 class="text-5xl font-black heading-font text-white tracking-tight">Asset <span class="text-emerald-300">Management</span></h1>
        </div>
        <div class="mt-8 md:mt-0 flex space-x-4">
            <button class="flex items-center space-x-3 px-6 py-4 bg-white/20 backdrop-blur-sm border border-white/30 rounded-2xl text-sm font-bold text-white hover:bg-white/30 transition-all">
                <i data-lucide="filter" class="w-4 h-4 text-emerald-300"></i>
                <span>Global Filter</span>
            </button>
            <button class="flex items-center space-x-3 px-8 py-4 bg-white/20 backdrop-blur-sm border border-white/30 text-white rounded-2xl text-sm font-bold hover:bg-white/30 transition-all shadow-xl">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Add New Asset</span>
            </button>
        </div>
    </div>

    <!-- Stats Matrix -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-16 mb-20">
        <div class="prof-card p-10 flex items-center space-x-8 animate-fade-in" style="animation-delay: 0.1s">
            <div class="w-16 h-16 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-100 shrink-0">
                <i data-lucide="database" class="w-8 h-8"></i>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Inventory</p>
                <p class="text-4xl font-black text-slate-900 tabular-nums">12,845</p>
            </div>
        </div>
        <div class="prof-card p-10 flex items-center space-x-8 animate-fade-in" style="animation-delay: 0.2s">
            <div class="w-16 h-16 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center border border-rose-100 shrink-0">
                <i data-lucide="alert-octagon" class="w-8 h-8"></i>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Critical Deficit</p>
                <p class="text-4xl font-black text-rose-600 tabular-nums">14</p>
            </div>
        </div>
        <div class="prof-card p-10 flex items-center space-x-8 animate-fade-in" style="animation-delay: 0.3s">
            <div class="w-16 h-16 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center border border-blue-100 shrink-0">
                <i data-lucide="clipboard-check" class="w-8 h-8"></i>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Involved SKUs</p>
                <p class="text-4xl font-black text-slate-900 tabular-nums">2,140</p>
            </div>
        </div>
    </div>

    <!-- Asset Browser -->
    <div class="prof-card overflow-hidden animate-fade-in" style="animation-delay: 0.4s">
        <div class="p-10 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-8">
            <div class="relative w-full md:w-[450px]">
                <i data-lucide="search" class="absolute left-5 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-300"></i>
                <input type="text" class="bg-slate-50 border border-slate-100 rounded-2xl py-4 pl-14 pr-6 text-sm font-medium focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 w-full transition-all outline-none" placeholder="Search by SKU, Name or Category...">
            </div>
            <div class="flex items-center space-x-4">
                <button class="text-slate-600 font-bold px-6 py-3 rounded-xl hover:bg-slate-50 transition-all text-sm">Download Ledger</button>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-[0.2em]">
                    <tr>
                        <th class="px-10 py-6">Asset Component</th>
                        <th class="px-10 py-6">Valuation</th>
                        <th class="px-10 py-6">Status Indicator</th>
                        <th class="px-10 py-6">Last Audit</th>
                        <th class="px-10 py-6"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-10 py-10">
                            <div class="flex items-center space-x-6">
                                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center border border-slate-200 group-hover:scale-105 transition-transform shadow-sm relative overflow-hidden shrink-0">
                                     <i data-lucide="monitor" class="w-7 h-7 text-emerald-600"></i>
                                     <div class="absolute inset-0 bg-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>
                                <div>
                                    <p class="text-base font-black text-slate-900 group-hover:text-emerald-700 transition-colors">MacBook Pro 16"</p>
                                    <p class="text-xs font-mono font-bold text-slate-400 mt-1">APL-MBP-16-M3</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-10">
                            <p class="text-lg font-black text-slate-900 tracking-tight">Rs. 3,45,000</p>
                            <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-widest">Base Unit Price</p>
                        </td>
                        <td class="px-10 py-10">
                            <div class="flex flex-col space-y-3 w-44">
                                <div class="flex justify-between items-center text-[10px] font-black uppercase text-slate-500 tracking-widest leading-none">
                                    <span>Nominal Supply</span>
                                    <span class="text-emerald-600">85%</span>
                                </div>
                                <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                                    <div class="bg-emerald-500 h-full rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-10">
                             <span class="px-4 py-1.5 bg-emerald-50 text-emerald-600 border border-emerald-100 rounded-xl text-[10px] font-black uppercase tracking-widest cursor-default">In Stock</span>
                        </td>
                        <td class="px-10 py-10 text-right">
                            <button class="p-3 bg-white rounded-xl border border-slate-200 text-slate-400 hover:text-emerald-600 hover:border-emerald-500 transition-all">
                                <i data-lucide="more-horizontal" class="w-5 h-5"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-10 py-10">
                            <div class="flex items-center space-x-6">
                                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center border border-slate-200 group-hover:scale-105 transition-transform shadow-sm relative overflow-hidden shrink-0">
                                     <i data-lucide="tablet" class="w-7 h-7 text-amber-600"></i>
                                     <div class="absolute inset-0 bg-amber-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>
                                <div>
                                    <p class="text-base font-black text-slate-900 group-hover:text-amber-700 transition-colors">iPad Air 5th Gen</p>
                                    <p class="text-xs font-mono font-bold text-slate-400 mt-1">APL-IPD-AIR-5G</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-10">
                            <p class="text-lg font-black text-slate-900 tracking-tight">Rs. 85,000</p>
                            <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-widest">Base Unit Price</p>
                        </td>
                        <td class="px-10 py-10">
                            <div class="flex flex-col space-y-3 w-44">
                                <div class="flex justify-between items-center text-[10px] font-black uppercase text-slate-500 tracking-widest leading-none">
                                    <span>Limited Yield</span>
                                    <span class="text-amber-600">12%</span>
                                </div>
                                <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                                    <div class="bg-amber-500 h-full rounded-full" style="width: 12%"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-10">
                             <span class="px-4 py-1.5 bg-amber-50 text-amber-600 border border-amber-100 rounded-xl text-[10px] font-black uppercase tracking-widest cursor-default">Low Stock</span>
                        </td>
                        <td class="px-10 py-10 text-right">
                            <button class="p-3 bg-white rounded-xl border border-slate-200 text-slate-400 hover:text-amber-600 hover:border-amber-500 transition-all">
                                <i data-lucide="more-horizontal" class="w-5 h-5"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="p-10 border-t border-slate-100 flex items-center justify-between bg-slate-50/30">
            <span class="text-slate-400 text-xs font-bold uppercase tracking-[0.15em]">Browsing page <span class="text-slate-900">01</span> — 12 results cataloged</span>
            <div class="flex items-center space-x-3">
                <button class="px-5 py-3 bg-white border border-slate-200 rounded-xl text-slate-400 hover:border-emerald-500 hover:text-emerald-600 transition-all text-xs font-black">PREVIOUS</button>
                <button class="px-5 py-3 bg-white border border-slate-200 rounded-xl text-slate-400 hover:border-emerald-500 hover:text-emerald-600 transition-all text-xs font-black">NEXT</button>
            </div>
        </div>
    </div>
</div>
@endsection
