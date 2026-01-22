@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 animate-block-up">
        <div>
            <h1 class="text-4xl font-black heading-font text-slate-900 tracking-tight">Stock <span class="text-emerald-600">Inventory</span></h1>
            <p class="text-slate-500 mt-1 font-medium">Manage your products and intelligent stock alerts.</p>
        </div>
        <div class="mt-6 md:mt-0 flex space-x-4">
            <button class="flex items-center space-x-2 px-6 py-3 bg-white border-2 border-slate-200 rounded-2xl text-sm font-black text-slate-700 hover:border-emerald-500 transition-all shadow-sm">
                <i data-lucide="filter" class="w-4 h-4 text-emerald-600"></i>
                <span>Filter</span>
            </button>
            <button class="flex items-center space-x-2 px-8 py-3.5 bg-emerald-600 rounded-2xl text-sm font-black text-white hover:bg-emerald-700 transition-all shadow-xl shadow-emerald-200">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Add Product</span>
            </button>
        </div>
    </div>

    <!-- Inventory Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
        <div class="block-card p-8 flex items-center space-x-6 animate-block-up" style="animation-delay: 0.1s">
            <div class="w-16 h-16 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center border-2 border-emerald-100">
                <i data-lucide="package" class="w-8 h-8"></i>
            </div>
            <div>
                <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Total Items</p>
                <p class="text-3xl font-black text-slate-900">2,845</p>
            </div>
        </div>
        <div class="block-card p-8 flex items-center space-x-6 animate-block-up" style="animation-delay: 0.2s">
            <div class="w-16 h-16 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center border-2 border-rose-100">
                <i data-lucide="alert-triangle" class="w-8 h-8"></i>
            </div>
            <div>
                <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Low Stock</p>
                <p class="text-3xl font-black text-rose-600">12</p>
            </div>
        </div>
        <div class="block-card p-8 flex items-center space-x-6 animate-block-up" style="animation-delay: 0.3s">
            <div class="w-16 h-16 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center border-2 border-blue-100">
                <i data-lucide="check-circle" class="w-8 h-8"></i>
            </div>
            <div>
                <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Active Skus</p>
                <p class="text-3xl font-black text-slate-900">1,942</p>
            </div>
        </div>
    </div>

    <!-- Search and Table -->
    <div class="block-card overflow-hidden animate-block-up" style="animation-delay: 0.4s">
        <div class="p-8 border-b-2 border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-6 bg-slate-50/50">
            <div class="relative w-full md:w-[400px]">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                    <i data-lucide="search" class="w-5 h-5"></i>
                </span>
                <input type="text" class="bg-white border-2 border-slate-200 rounded-2xl py-3.5 pl-12 pr-4 text-sm font-bold focus:ring-0 focus:border-emerald-500 w-full transition-all outline-none" placeholder="Search inventory...">
            </div>
            <div class="flex items-center space-x-3">
                <button class="text-slate-900 font-black px-6 py-3 rounded-xl border-2 border-slate-200 hover:bg-white transition-all text-sm uppercase tracking-widest">Export</button>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[11px] font-black tracking-[0.2em]">
                    <tr>
                        <th class="px-10 py-6">Product details</th>
                        <th class="px-10 py-6">Price</th>
                        <th class="px-10 py-6">Level</th>
                        <th class="px-10 py-6">Status</th>
                        <th class="px-10 py-6"></th>
                    </tr>
                </thead>
                <tbody class="divide-y-2 divide-slate-100">
                    <tr class="hover:bg-emerald-50/50 transition-colors group">
                        <td class="px-10 py-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-14 h-14 bg-slate-100 rounded-xl flex items-center justify-center border-2 border-slate-200 group-hover:scale-110 transition-transform shadow-sm overflow-hidden">
                                     <i data-lucide="smartphone" class="w-7 h-7 text-emerald-600"></i>
                                </div>
                                <div>
                                    <p class="font-black text-slate-900 group-hover:text-emerald-700 transition-colors">Sony WH-1000XM4</p>
                                    <p class="text-xs font-mono font-black text-slate-400 mt-1">SNY-82910-XM4</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-6 text-lg font-black text-slate-900 tracking-tight">$348.00</td>
                        <td class="px-10 py-6">
                            <div class="flex flex-col space-y-2 w-40">
                                <div class="flex justify-between items-center text-[10px] font-black uppercase text-slate-400 tracking-widest">
                                    <span>82% stock</span>
                                </div>
                                <div class="w-full bg-slate-100 h-3 rounded-full border-2 border-slate-200 overflow-hidden">
                                    <div class="bg-emerald-500 h-full rounded-full shadow-[0_0_10px_rgba(16,185,129,0.3)]" style="width: 82%"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-6">
                            <span class="px-4 py-1.5 bg-emerald-50 text-emerald-600 border-2 border-emerald-100 rounded-xl text-[10px] font-black uppercase tracking-widest">Healthy</span>
                        </td>
                        <td class="px-10 py-6 text-right">
                            <button class="p-3 bg-slate-100 rounded-xl border-2 border-slate-200 text-slate-400 hover:text-emerald-600 hover:border-emerald-400 transition-all">
                                <i data-lucide="edit-3" class="w-5 h-5"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="p-8 border-t-2 border-slate-100 flex items-center justify-between bg-slate-50/30">
            <span class="text-slate-400 text-[11px] font-black uppercase tracking-[0.2em]">Showing 01 — 12 results</span>
            <div class="flex items-center space-x-3">
                <button class="p-3 bg-white border-2 border-slate-200 rounded-xl text-slate-400 hover:border-emerald-500 hover:text-emerald-600 transition-all"><i data-lucide="chevron-left" class="w-5 h-5"></i></button>
                <button class="p-3 bg-white border-2 border-slate-200 rounded-xl text-slate-400 hover:border-emerald-500 hover:text-emerald-600 transition-all"><i data-lucide="chevron-right" class="w-5 h-5"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection
