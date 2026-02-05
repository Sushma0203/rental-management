@extends('layouts.app')

@section('content')

<div class="space-y-8">

    <!-- HEADER -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Asset Management
            </h1>
            <p class="text-sm text-slate-500 mt-1">
                View and manage your entire inventory system
            </p>
        </div>

        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50 transition-colors text-sm font-medium shadow-sm">
                <i data-lucide="filter" class="w-4 h-4 inline-block mr-2 text-slate-400"></i>
                Filter
            </button>
            <button class="px-4 py-2 bg-rose-500 text-white rounded-xl hover:bg-rose-600 transition-colors text-sm font-medium shadow-sm shadow-rose-200 flex items-center gap-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                Add Asset
            </button>
        </div>
    </div>

    <!-- STATS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between group hover:border-rose-100 hover:shadow-md transition-all">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Total Inventory</p>
                <h3 class="text-3xl font-bold text-slate-800 mt-2">12,845</h3>
            </div>
            <div class="w-12 h-12 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-rose-50 group-hover:text-rose-500 transition-colors">
                <i data-lucide="box" class="w-6 h-6"></i>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between group hover:border-rose-100 hover:shadow-md transition-all">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Low Stock</p>
                <h3 class="text-3xl font-bold text-rose-600 mt-2">14</h3>
            </div>
            <div class="w-12 h-12 rounded-full bg-rose-50 flex items-center justify-center text-rose-500">
                <i data-lucide="alert-circle" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between group hover:border-rose-100 hover:shadow-md transition-all">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Active SKUs</p>
                <h3 class="text-3xl font-bold text-slate-800 mt-2">2,140</h3>
            </div>
            <div class="w-12 h-12 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-rose-50 group-hover:text-rose-500 transition-colors">
                <i data-lucide="tag" class="w-6 h-6"></i>
            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

        <div class="p-6 border-b border-slate-50 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <div>
                <h3 class="text-base font-semibold text-slate-800">
                    Asset Catalog
                </h3>
            </div>

            <div class="relative">
                <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"></i>
                <input
                    type="text"
                    placeholder="Search assets..."
                    class="pl-9 pr-4 py-2 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500 transition-all w-64"
                />
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50/50 text-slate-500 font-medium">
                    <tr>
                        <th class="px-6 py-4">Asset Name</th>
                        <th class="px-6 py-4">Price</th>
                        <th class="px-6 py-4">Stock Status</th>
                        <th class="px-6 py-4">Last Updated</th>
                        <th class="px-6 py-4"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-50">
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                    <i data-lucide="laptop" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-slate-700">MacBook Pro 16"</p>
                                    <p class="text-xs text-slate-400">APL-MBP-16-M3</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-medium text-slate-600">Rs. 3,45,000</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                In Stock
                            </span>
                        </td>
                        <td class="px-6 py-4 text-slate-500">Today</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-slate-400 hover:text-slate-600">
                                <i data-lucide="more-horizontal" class="w-5 h-5"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                    <i data-lucide="tablet" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-slate-700">iPad Air</p>
                                    <p class="text-xs text-slate-400">APL-IPD-AIR-5G</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-medium text-slate-600">Rs. 85,000</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                Low Stock
                            </span>
                        </td>
                        <td class="px-6 py-4 text-slate-500">2 days ago</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-slate-400 hover:text-slate-600">
                                <i data-lucide="more-horizontal" class="w-5 h-5"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition-colors">
                       <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                    <i data-lucide="headphones" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-slate-700">Sony XM5</p>
                                    <p class="text-xs text-slate-400">SNY-WH-1000XM5</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-medium text-slate-600">Rs. 32,000</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                Good
                            </span>
                        </td>
                        <td class="px-6 py-4 text-slate-500">Yesterday</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-slate-400 hover:text-slate-600">
                                <i data-lucide="more-horizontal" class="w-5 h-5"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-slate-50 flex justify-between items-center">
            <span class="text-sm text-slate-500">
                Showing 1–10 of 2,140
            </span>
            <div class="flex gap-2">
                <button class="px-3 py-1.5 border border-slate-200 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 disabled:opacity-50">Prev</button>
                <button class="px-3 py-1.5 bg-slate-900 text-white border border-slate-900 rounded-lg text-xs font-medium hover:bg-slate-800">Next</button>
            </div>
        </div>

    </div>

</div>

@endsection
