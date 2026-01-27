@extends('layouts.app')

@section('content')
<div class="space-y-32 animate-fade-in-up">
    
    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-32">
        <div>
            <p class="text-sm font-bold text-emerald-400 uppercase tracking-[0.2em] mb-3">Inventory Intelligence</p>
            <h1 class="text-6xl font-black heading-font text-white tracking-tight">
                Asset <span class="text-emerald-400">Management</span>
            </h1>
        </div>
        <div class="flex items-center gap-4">
            <button class="flex items-center gap-3 px-8 py-4 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-sm font-bold text-white hover:bg-white/20 transition-all shadow-xl">
                <i data-lucide="filter" class="w-5 h-5"></i>
                <span>Filter Assets</span>
            </button>
            <button class="flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-2xl text-sm font-bold hover:shadow-2xl hover:shadow-emerald-500/50 transition-all shadow-xl">
                <i data-lucide="plus" class="w-5 h-5"></i>
                <span>Add New Asset</span>
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-16 mb-32">
        <div class="prof-card p-10 flex items-center gap-8 animate-fade-in" style="animation-delay: 0.1s">
            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center shadow-lg shadow-emerald-200 shrink-0">
                <i data-lucide="database" class="w-10 h-10 text-white"></i>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Total Inventory</p>
                <p class="text-5xl font-black text-slate-900 tabular-nums">12,845</p>
                <p class="text-sm text-slate-500 font-medium mt-1">Active items</p>
            </div>
        </div>
        
        <div class="prof-card p-10 flex items-center gap-8 animate-fade-in" style="animation-delay: 0.2s">
            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-rose-500 to-rose-600 flex items-center justify-center shadow-lg shadow-rose-200 shrink-0">
                <i data-lucide="alert-octagon" class="w-10 h-10 text-white"></i>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Critical Deficit</p>
                <p class="text-5xl font-black text-rose-600 tabular-nums">14</p>
                <p class="text-sm text-slate-500 font-medium mt-1">Needs restock</p>
            </div>
        </div>
        
        <div class="prof-card p-10 flex items-center gap-8 animate-fade-in" style="animation-delay: 0.3s">
            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-lg shadow-blue-200 shrink-0">
                <i data-lucide="clipboard-check" class="w-10 h-10 text-white"></i>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Active SKUs</p>
                <p class="text-5xl font-black text-slate-900 tabular-nums">2,140</p>
                <p class="text-sm text-slate-500 font-medium mt-1">Unique products</p>
            </div>
        </div>
    </div>

    <!-- Asset Browser -->
    <div class="prof-card overflow-hidden animate-fade-in" style="animation-delay: 0.4s">
        <div class="p-10 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-6 bg-gradient-to-r from-slate-50 to-white">
            <div>
                <h3 class="text-2xl font-black text-slate-900 heading-font mb-1">Asset Catalog</h3>
                <p class="text-sm text-slate-500 font-medium">Browse and manage your inventory</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="relative w-full lg:w-96">
                    <i data-lucide="search" class="absolute left-5 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                    <input type="text" class="w-full bg-white border-2 border-slate-200 rounded-2xl py-4 pl-14 pr-6 text-sm font-bold focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all outline-none shadow-sm" placeholder="Search by SKU, Name or Category...">
                </div>
                <button class="px-6 py-4 bg-slate-900 text-white rounded-xl text-sm font-bold hover:bg-slate-800 transition-all shadow-lg whitespace-nowrap">
                    Download Report
                </button>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-black tracking-[0.15em]">
                    <tr>
                        <th class="px-10 py-6">Asset Details</th>
                        <th class="px-10 py-6">Valuation</th>
                        <th class="px-10 py-6">Stock Status</th>
                        <th class="px-10 py-6">Last Updated</th>
                        <th class="px-10 py-6"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-10 py-8">
                            <div class="flex items-center gap-6">
                                <div class="w-20 h-20 bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-2xl flex items-center justify-center border-2 border-emerald-200 group-hover:scale-105 transition-transform shadow-md relative overflow-hidden shrink-0">
                                     <i data-lucide="monitor" class="w-9 h-9 text-emerald-600 relative z-10"></i>
                                     <div class="absolute inset-0 bg-emerald-500/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>
                                <div>
                                    <p class="text-lg font-black text-slate-900 group-hover:text-emerald-600 transition-colors mb-1">MacBook Pro 16"</p>
                                    <p class="text-sm font-mono font-bold text-slate-400">SKU: APL-MBP-16-M3</p>
                                    <span class="inline-block mt-2 px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-bold border border-blue-100">Electronics</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-8">
                            <p class="text-2xl font-black text-slate-900 tracking-tight mb-1">Rs. 3,45,000</p>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Per Unit</p>
                        </td>
                        <td class="px-10 py-8">
                            <div class="flex flex-col gap-3 w-52">
                                <div class="flex justify-between items-center text-xs font-black uppercase text-slate-500 tracking-widest leading-none">
                                    <span>In Stock</span>
                                    <span class="text-emerald-600">85%</span>
                                </div>
                                <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden">
                                    <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 h-full rounded-full shadow-sm" style="width: 85%"></div>
                                </div>
                                <span class="text-xs font-bold text-slate-500">24 units available</span>
                            </div>
                        </td>
                        <td class="px-10 py-8">
                             <span class="px-4 py-2 bg-emerald-50 text-emerald-600 border border-emerald-100 rounded-xl text-xs font-black uppercase">Today</span>
                        </td>
                        <td class="px-10 py-8 text-right">
                            <button class="p-4 bg-white rounded-xl border-2 border-slate-200 text-slate-400 hover:text-emerald-600 hover:border-emerald-500 hover:shadow-md transition-all">
                                <i data-lucide="more-horizontal" class="w-5 h-5"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-10 py-8">
                            <div class="flex items-center gap-6">
                                <div class="w-20 h-20 bg-gradient-to-br from-amber-50 to-amber-100 rounded-2xl flex items-center justify-center border-2 border-amber-200 group-hover:scale-105 transition-transform shadow-md relative overflow-hidden shrink-0">
                                     <i data-lucide="tablet" class="w-9 h-9 text-amber-600 relative z-10"></i>
                                     <div class="absolute inset-0 bg-amber-500/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>
                                <div>
                                    <p class="text-lg font-black text-slate-900 group-hover:text-amber-600 transition-colors mb-1">iPad Air 5th Gen</p>
                                    <p class="text-sm font-mono font-bold text-slate-400">SKU: APL-IPD-AIR-5G</p>
                                    <span class="inline-block mt-2 px-3 py-1 bg-purple-50 text-purple-600 rounded-lg text-xs font-bold border border-purple-100">Tablets</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-8">
                            <p class="text-2xl font-black text-slate-900 tracking-tight mb-1">Rs. 85,000</p>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Per Unit</p>
                        </td>
                        <td class="px-10 py-8">
                            <div class="flex flex-col gap-3 w-52">
                                <div class="flex justify-between items-center text-xs font-black uppercase text-slate-500 tracking-widest leading-none">
                                    <span>Low Stock</span>
                                    <span class="text-amber-600">12%</span>
                                </div>
                                <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden">
                                    <div class="bg-gradient-to-r from-amber-500 to-amber-600 h-full rounded-full shadow-sm" style="width: 12%"></div>
                                </div>
                                <span class="text-xs font-bold text-slate-500">3 units available</span>
                            </div>
                        </td>
                        <td class="px-10 py-8">
                             <span class="px-4 py-2 bg-amber-50 text-amber-600 border border-amber-100 rounded-xl text-xs font-black uppercase">2 days ago</span>
                        </td>
                        <td class="px-10 py-8 text-right">
                            <button class="p-4 bg-white rounded-xl border-2 border-slate-200 text-slate-400 hover:text-amber-600 hover:border-amber-500 hover:shadow-md transition-all">
                                <i data-lucide="more-horizontal" class="w-5 h-5"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-10 py-8">
                            <div class="flex items-center gap-6">
                                <div class="w-20 h-20 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl flex items-center justify-center border-2 border-blue-200 group-hover:scale-105 transition-transform shadow-md relative overflow-hidden shrink-0">
                                     <i data-lucide="headphones" class="w-9 h-9 text-blue-600 relative z-10"></i>
                                     <div class="absolute inset-0 bg-blue-500/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>
                                <div>
                                    <p class="text-lg font-black text-slate-900 group-hover:text-blue-600 transition-colors mb-1">Sony WH-1000XM5</p>
                                    <p class="text-sm font-mono font-bold text-slate-400">SKU: SNY-WH-1000XM5</p>
                                    <span class="inline-block mt-2 px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg text-xs font-bold border border-indigo-100">Audio</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-8">
                            <p class="text-2xl font-black text-slate-900 tracking-tight mb-1">Rs. 32,000</p>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Per Unit</p>
                        </td>
                        <td class="px-10 py-8">
                            <div class="flex flex-col gap-3 w-52">
                                <div class="flex justify-between items-center text-xs font-black uppercase text-slate-500 tracking-widest leading-none">
                                    <span>Good Stock</span>
                                    <span class="text-blue-600">64%</span>
                                </div>
                                <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden">
                                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-full rounded-full shadow-sm" style="width: 64%"></div>
                                </div>
                                <span class="text-xs font-bold text-slate-500">18 units available</span>
                            </div>
                        </td>
                        <td class="px-10 py-8">
                             <span class="px-4 py-2 bg-blue-50 text-blue-600 border border-blue-100 rounded-xl text-xs font-black uppercase">Yesterday</span>
                        </td>
                        <td class="px-10 py-8 text-right">
                            <button class="p-4 bg-white rounded-xl border-2 border-slate-200 text-slate-400 hover:text-blue-600 hover:border-blue-500 hover:shadow-md transition-all">
                                <i data-lucide="more-horizontal" class="w-5 h-5"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="p-10 border-t border-slate-100 flex items-center justify-between bg-slate-50/50">
            <span class="text-slate-500 text-sm font-bold uppercase tracking-[0.1em]">Showing <span class="text-slate-900 font-black">1-10</span> of <span class="text-slate-900 font-black">2,140</span> items</span>
            <div class="flex items-center gap-3">
                <button class="px-6 py-3 bg-white border-2 border-slate-200 rounded-xl text-slate-600 hover:border-emerald-500 hover:text-emerald-600 hover:shadow-md transition-all text-sm font-black">PREVIOUS</button>
                <button class="px-6 py-3 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-xl hover:shadow-lg hover:shadow-emerald-500/50 transition-all text-sm font-black">NEXT</button>
            </div>
        </div>
    </div>

</div>
@endsection
