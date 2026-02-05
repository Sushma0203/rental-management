@extends('layouts.app')

@section('content')

<div class="space-y-8">

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
    <div class="px-4 py-3 rounded-xl flex items-center gap-3 bg-emerald-50 border border-emerald-100 text-emerald-800">
        <i data-lucide="check-circle" class="w-5 h-5 text-emerald-500"></i>
        <span class="font-medium text-sm">{{ session('success') }}</span>
    </div>
    @endif

    <!-- FILTER FORM -->
    <form method="GET" action="{{ route('inventory.index') }}" class="space-y-6">
        
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
                <button type="button" onclick="document.getElementById('filter-section').classList.toggle('hidden')" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50 transition-colors text-sm font-medium shadow-sm flex items-center gap-2 {{ request('status') ? 'bg-slate-50 border-slate-300' : '' }}">
                    <i data-lucide="filter" class="w-4 h-4 text-slate-400"></i>
                    Filter
                </button>
                <a href="{{ route('inventory.create') }}" class="px-4 py-2 bg-rose-500 text-white rounded-xl hover:bg-rose-600 transition-colors text-sm font-medium shadow-sm shadow-rose-200 flex items-center gap-2">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    Add Asset
                </a>
            </div>
        </div>

        <!-- FILTER SECTION (Togglable) -->
        <div id="filter-section" class="{{ request('status') ? '' : 'hidden' }} bg-white p-4 rounded-xl border border-slate-200 shadow-sm transition-all">
            <div class="flex items-end gap-4">
                <div class="space-y-1 flex-1">
                    <label for="status" class="text-xs font-semibold text-slate-500 uppercase">Status</label>
                    <select name="status" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-rose-500">
                        <option value="all">All Statuses</option>
                        <option value="in_stock" {{ request('status') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                        <option value="low_stock" {{ request('status') == 'low_stock' ? 'selected' : '' }}>Low Stock</option>
                        <option value="out_of_stock" {{ request('status') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                    </select>
                </div>
                <!-- Add more filters here if needed -->
                <button type="submit" class="px-6 py-2 bg-slate-900 text-white rounded-lg text-sm font-medium hover:bg-slate-800">
                    Apply Filters
                </button>
                @if(request()->anyFilled(['status', 'search']))
                <a href="{{ route('inventory.index') }}" class="px-4 py-2 text-slate-500 text-sm font-medium hover:text-rose-500">
                    Clear
                </a>
                @endif
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
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search assets..."
                        onchange="this.form.submit()"
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
                        @forelse($assets as $asset)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                        <i data-lucide="{{ $asset['icon'] ?? 'package' }}" class="w-4 h-4"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-slate-700">{{ $asset['name'] }}</p>
                                        <p class="text-xs text-slate-400">{{ $asset['sku'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-600">Rs. {{ number_format($asset['price']) }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $statusClass = match($asset['status']) {
                                        'in_stock' => 'bg-emerald-50 text-emerald-700 border-emerald-100',
                                        'low_stock' => 'bg-amber-50 text-amber-700 border-amber-100',
                                        'out_of_stock' => 'bg-red-50 text-red-700 border-red-100',
                                        default => 'bg-slate-50 text-slate-700 border-slate-100'
                                    };
                                    $dotClass = match($asset['status']) {
                                        'in_stock' => 'bg-emerald-500',
                                        'low_stock' => 'bg-amber-500',
                                        'out_of_stock' => 'bg-red-500',
                                        default => 'bg-slate-500'
                                    };
                                    $label = match($asset['status']) {
                                        'in_stock' => 'In Stock',
                                        'low_stock' => 'Low Stock',
                                        'out_of_stock' => 'Out of Stock',
                                        default => ucfirst(str_replace('_', ' ', $asset['status']))
                                    };
                                @endphp
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium border {{ $statusClass }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $dotClass }}"></span>
                                    {{ $label }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-500">{{ $asset['updated_at'] }}</td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-slate-400 hover:text-slate-600">
                                    <i data-lucide="more-horizontal" class="w-5 h-5"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                                <i data-lucide="inbox" class="w-12 h-12 mx-auto mb-3 opacity-20"></i>
                                <p>No assets found matching your filters.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-6 border-t border-slate-50 flex justify-between items-center">
                <span class="text-sm text-slate-500">
                    Showing {{ $assets->count() }} results
                </span>
                <div class="flex gap-2">
                    <button type="button" class="px-3 py-1.5 border border-slate-200 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 disabled:opacity-50" disabled>Prev</button>
                    <button type="button" class="px-3 py-1.5 bg-slate-900 text-white border border-slate-900 rounded-lg text-xs font-medium hover:bg-slate-800" disabled>Next</button>
                </div>
            </div>

        </div>
    </form>

</div>

@endsection
