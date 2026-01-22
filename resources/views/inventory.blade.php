@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold heading-font text-slate-900">Inventory Management</h1>
            <p class="text-slate-500 mt-1">Manage your stock, track products, and set alerts.</p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-3">
            <button class="flex items-center space-x-2 px-4 py-2 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-50 transition-colors">
                <i data-lucide="filter" class="w-4 h-4"></i>
                <span>Filters</span>
            </button>
            <button class="flex items-center space-x-2 px-4 py-2 bg-indigo-600 rounded-xl text-sm font-bold text-white hover:bg-indigo-700 transition-shadow shadow-lg shadow-indigo-200">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Add Product</span>
            </button>
        </div>
    </div>

    <!-- Inventory Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center space-x-4">
            <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                <i data-lucide="package" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Products</p>
                <p class="text-2xl font-bold text-slate-900">2,845</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center space-x-4">
            <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center">
                <i data-lucide="alert-triangle" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Low Stock items</p>
                <p class="text-2xl font-bold text-slate-900">12</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center space-x-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <i data-lucide="check-circle" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Fulfilled Orders</p>
                <p class="text-2xl font-bold text-slate-900">184</p>
            </div>
        </div>
    </div>

    <!-- Search and Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden text-sm">
        <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="relative w-full md:w-96">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                    <i data-lucide="search" class="w-4 h-4"></i>
                </span>
                <input type="text" class="bg-slate-50 border-slate-200 border rounded-lg py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-indigo-500 w-full" placeholder="Search by name, SKU, or category...">
            </div>
            <div class="flex items-center space-x-3">
                <button class="text-slate-600 font-semibold px-4 py-2 border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">Export CSV</button>
                <button class="text-white bg-indigo-600 font-bold px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">Bulk Actions</button>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-bold">
                    <tr>
                        <th class="px-8 py-4">Product Name</th>
                        <th class="px-8 py-4">SKU</th>
                        <th class="px-8 py-4">Category</th>
                        <th class="px-8 py-4">Price</th>
                        <th class="px-8 py-4">Stock Level</th>
                        <th class="px-8 py-4">Status</th>
                        <th class="px-8 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr>
                        <td class="px-8 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                    <i data-lucide="image" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900">Sony WH-1000XM4</p>
                                    <p class="text-xs text-slate-500">Wireless Headphones</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-4 font-mono text-xs text-slate-500 tracking-tighter">SNY-82910-XM4</td>
                        <td class="px-8 py-4"><span class="px-2 py-1 bg-indigo-50 text-indigo-600 rounded-md text-xs font-semibold">Electronics</span></td>
                        <td class="px-8 py-4 font-bold text-slate-900">$348.00</td>
                        <td class="px-8 py-4">
                            <div class="flex items-center space-x-2">
                                <span class="text-slate-900 font-bold">145</span>
                                <div class="w-16 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                    <div class="bg-emerald-500 h-full w-4/5"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-4"><span class="px-2 py-1 bg-emerald-50 text-emerald-600 border border-emerald-100 rounded-full text-xs font-bold">In Stock</span></td>
                        <td class="px-8 py-4">
                            <button class="text-slate-400 hover:text-indigo-600 transition-colors"><i data-lucide="more-horizontal" class="w-5 h-5"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-8 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                    <i data-lucide="image" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900">MacBook Air M2</p>
                                    <p class="text-xs text-slate-500">Laptop / Computing</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-4 font-mono text-xs text-slate-500 tracking-tighter">APL-MBA-M2-256</td>
                        <td class="px-8 py-4"><span class="px-2 py-1 bg-indigo-50 text-indigo-600 rounded-md text-xs font-semibold">Electronics</span></td>
                        <td class="px-8 py-4 font-bold text-slate-900">$1,199.00</td>
                        <td class="px-8 py-4">
                            <div class="flex items-center space-x-2">
                                <span class="text-slate-900 font-bold">8</span>
                                <div class="w-16 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                    <div class="bg-rose-500 h-full w-1/5"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-4"><span class="px-2 py-1 bg-rose-50 text-rose-600 border border-rose-100 rounded-full text-xs font-bold">Low Stock</span></td>
                        <td class="px-8 py-4">
                            <button class="text-slate-400 hover:text-indigo-600 transition-colors"><i data-lucide="more-horizontal" class="w-5 h-5"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-8 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                    <i data-lucide="image" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900">Nike Air Max 270</p>
                                    <p class="text-xs text-slate-500">Footwear / Sport</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-4 font-mono text-xs text-slate-500 tracking-tighter">NKE-AM270-BLU</td>
                        <td class="px-8 py-4"><span class="px-2 py-1 bg-purple-50 text-purple-600 rounded-md text-xs font-semibold">Apparel</span></td>
                        <td class="px-8 py-4 font-bold text-slate-900">$150.00</td>
                        <td class="px-8 py-4">
                            <div class="flex items-center space-x-2">
                                <span class="text-slate-900 font-bold">42</span>
                                <div class="w-16 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                    <div class="bg-emerald-500 h-full w-3/5"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-4"><span class="px-2 py-1 bg-emerald-50 text-emerald-600 border border-emerald-100 rounded-full text-xs font-bold">In Stock</span></td>
                        <td class="px-8 py-4">
                            <button class="text-slate-400 hover:text-indigo-600 transition-colors"><i data-lucide="more-horizontal" class="w-5 h-5"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="p-6 border-t border-slate-100 flex items-center justify-between">
            <span class="text-slate-500 text-xs font-medium uppercase tracking-wider">Page 1 of 12</span>
            <div class="flex items-center space-x-2">
                <button class="p-2 border border-slate-200 rounded-lg text-slate-400 hover:bg-slate-50"><i data-lucide="chevron-left" class="w-4 h-4"></i></button>
                <button class="p-2 border border-slate-200 rounded-lg text-slate-400 hover:bg-slate-50"><i data-lucide="chevron-right" class="w-4 h-4"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection
