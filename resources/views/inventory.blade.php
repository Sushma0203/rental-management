@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 animate-fade-up">
        <div>
            <h1 class="text-3xl font-bold heading-font text-slate-900">Inventory Management</h1>
            <p class="text-slate-500 mt-1">Manage your stock, track products, and set intelligent alerts.</p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-3">
            <button class="flex items-center space-x-2 px-4 py-2.5 bg-white/50 backdrop-blur-md border border-slate-200 rounded-2xl text-sm font-bold text-slate-700 hover:bg-white transition-all">
                <i data-lucide="filter" class="w-4 h-4 text-indigo-500"></i>
                <span>Filters</span>
            </button>
            <button class="flex items-center space-x-2 px-6 py-2.5 bg-indigo-600 rounded-2xl text-sm font-bold text-white hover:bg-indigo-700 transition-all hover:shadow-lg hover:shadow-indigo-200">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Add Product</span>
            </button>
        </div>
    </div>

    <!-- Inventory Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="glass-card p-6 rounded-3xl animate-fade-up stagger-1 flex items-center space-x-4">
            <div class="w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center shadow-inner">
                <i data-lucide="package" class="w-7 h-7"></i>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Total Products</p>
                <p class="text-3xl font-bold text-slate-900">2,845</p>
            </div>
        </div>
        <div class="glass-card p-6 rounded-3xl animate-fade-up stagger-2 flex items-center space-x-4">
            <div class="w-14 h-14 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center shadow-inner">
                <i data-lucide="alert-triangle" class="w-7 h-7"></i>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Low Stock</p>
                <p class="text-3xl font-bold text-rose-600">12</p>
            </div>
        </div>
        <div class="glass-card p-6 rounded-3xl animate-fade-up stagger-3 flex items-center space-x-4">
            <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shadow-inner">
                <i data-lucide="check-circle" class="w-7 h-7"></i>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Active Skus</p>
                <p class="text-3xl font-bold text-slate-900">1,942</p>
            </div>
        </div>
    </div>

    <!-- Search and Table -->
    <div class="glass-card rounded-3xl overflow-hidden animate-fade-up stagger-4">
        <div class="p-8 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-6 bg-white/30">
            <div class="relative w-full md:w-96">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                    <i data-lucide="search" class="w-4 h-4"></i>
                </span>
                <input type="text" class="bg-white/50 border-slate-200 border rounded-2xl py-3 pl-11 pr-4 text-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 w-full transition-all outline-none" placeholder="Search inventory...">
            </div>
            <div class="flex items-center space-x-3">
                <button class="text-slate-600 font-bold px-5 py-2.5 rounded-2xl border border-slate-200 hover:bg-slate-50 transition-colors text-sm">Export</button>
                <button class="text-white bg-slate-900 font-bold px-5 py-2.5 rounded-2xl hover:bg-black transition-colors text-sm">Bulk Actions</button>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50/50 text-slate-400 uppercase text-xs font-black tracking-widest">
                    <tr>
                        <th class="px-8 py-5">Product Details</th>
                        <th class="px-8 py-5">Price</th>
                        <th class="px-8 py-5">Stock Level</th>
                        <th class="px-8 py-5">Status</th>
                        <th class="px-8 py-5"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/50">
                    <tr class="hover:bg-indigo-50/30 transition-colors group">
                        <td class="px-8 py-5">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-2xl bg-slate-100 flex items-center justify-center text-slate-400 group-hover:scale-110 transition-transform">
                                    <i data-lucide="smartphone" class="w-6 h-6 text-indigo-500"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900 group-hover:text-indigo-600 transition-colors">Sony WH-1000XM4</p>
                                    <p class="text-xs font-mono text-slate-400 mt-0.5">SNY-82910-XM4</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="text-lg font-black text-slate-900">$348</span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex flex-col space-y-1.5 w-32">
                                <div class="flex justify-between items-center text-[10px] font-black uppercase text-slate-400">
                                    <span>In Stock</span>
                                    <span>82%</span>
                                </div>
                                <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-gradient-to-r from-emerald-400 to-emerald-500 h-full rounded-full" style="width: 82%"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-600 border border-emerald-100 rounded-lg text-[10px] font-black uppercase">Healthy</span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <button class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-indigo-50/30 transition-colors group">
                        <td class="px-8 py-5">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-2xl bg-slate-100 flex items-center justify-center text-slate-400 group-hover:scale-110 transition-transform">
                                    <i data-lucide="laptop" class="w-6 h-6 text-indigo-500"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900 group-hover:text-indigo-600 transition-colors">MacBook Air M2</p>
                                    <p class="text-xs font-mono text-slate-400 mt-0.5">APL-MBA-M2-256</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="text-lg font-black text-slate-900">$1,199</span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex flex-col space-y-1.5 w-32">
                                <div class="flex justify-between items-center text-[10px] font-black uppercase text-slate-400">
                                    <span>Low Stock</span>
                                    <span>12%</span>
                                </div>
                                <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-gradient-to-r from-rose-400 to-rose-500 h-full rounded-full" style="width: 12%"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-rose-50 text-rose-600 border border-rose-100 rounded-lg text-[10px] font-black uppercase">Critical</span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <button class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="p-8 border-t border-slate-100 flex items-center justify-between bg-white/30">
            <span class="text-slate-400 text-[11px] font-black uppercase tracking-widest">Page 01 — 12</span>
            <div class="flex items-center space-x-3">
                <button class="p-2.5 border border-slate-200 rounded-xl text-slate-400 hover:bg-white hover:text-indigo-600 transition-all shadow-sm"><i data-lucide="chevron-left" class="w-4 h-4"></i></button>
                <button class="p-2.5 border border-slate-200 rounded-xl text-slate-400 hover:bg-white hover:text-indigo-600 transition-all shadow-sm"><i data-lucide="chevron-right" class="w-4 h-4"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection
@endsection
