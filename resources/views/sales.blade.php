@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 px-4 py-6">

    <div class="flex flex-col lg:flex-row gap-6">

        <!-- PRODUCTS -->
        <!-- PRODUCTS -->
        <div class="flex-1">

            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest mb-1" style="color: rgb(227, 184, 252);">
                        Point of Sale
                    </p>
                    <h1 class="text-2xl font-bold text-slate-800">
                        POS Terminal
                    </h1>
                </div>

                <div class="relative w-full md:w-80 mt-4 md:mt-0">
                    <form method="GET" action="{{ route('sales') }}">
                        <input type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search or Scan SKU"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 outline-none"
                            onchange="this.form.submit()">
                        <!-- Retain category if exists -->
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                    </form>
                </div>
            </div>

            <!-- Categories -->
            <div class="flex gap-3 mb-6 overflow-x-auto">
                @php
                    $categories = ['All', 'Electronics', 'Audio', 'Computers', 'Tablets'];
                    $currentCategory = request('category', 'All');
                @endphp
                
                @foreach($categories as $cat)
                    <a href="{{ route('sales', ['category' => $cat, 'search' => request('search')]) }}" 
                       class="px-5 py-2 rounded-lg text-xs font-semibold whitespace-nowrap transition-colors
                       {{ $currentCategory == $cat 
                           ? 'bg-[rgb(227,184,252)] text-gray-800' 
                           : 'bg-white border text-slate-600 hover:bg-slate-50' }}">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                
                @forelse($products as $product)
                <!-- Product -->
                <div class="bg-white border rounded-xl p-4 hover:shadow-md transition cursor-pointer group">
                    <div class="h-40 bg-slate-100 rounded-lg mb-4 flex items-center justify-center group-hover:bg-rose-50/50 transition-colors">
                        <i data-lucide="{{ $product['image_icon'] }}" class="w-10 h-10 text-slate-500 group-hover:text-rose-500 transition-colors"></i>
                    </div>
                    <p class="text-xs text-slate-400 uppercase mb-1">{{ $product['category'] }}</p>
                    <h4 class="font-semibold text-slate-800 line-clamp-1" title="{{ $product['name'] }}">{{ $product['name'] }}</h4>
                    <p class="text-xs text-slate-500 mb-4">{{ $product['sku'] }}</p>

                    <div class="flex justify-between items-center">
                        <span class="font-bold text-slate-800">Rs. {{ number_format($product['price']) }}</span>
                        <button class="px-3 py-2 rounded-lg text-xs font-medium hover:opacity-90 transition-opacity" style="background-color: rgb(227, 184, 252); color: #1f2937;">
                            Add
                        </button>
                    </div>
                </div>
                @empty
                <!-- Empty State -->
                <div class="col-span-full flex flex-col items-center justify-center py-12 text-center text-slate-500">
                    <i data-lucide="package-search" class="w-12 h-12 mb-3 text-slate-300"></i>
                    <p>No products found matching your search.</p>
                </div>
                @endforelse

            </div>
        </div>

        <!-- CART -->
        <div class="w-full lg:w-[420px] bg-white border rounded-xl flex flex-col">

            <!-- Cart Header -->
            <div class="p-6 border-b">
                <h3 class="text-xl font-semibold text-slate-800">Order Cart</h3>
                <p class="text-xs text-slate-500">Guest Customer</p>
            </div>

            <!-- Items -->
            <div class="flex-1 overflow-y-auto p-6 space-y-4">

                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-medium text-slate-800">iPhone 15 Pro</p>
                        <p class="text-xs text-slate-500">Rs. 1,45,000 × 1</p>
                    </div>
                    <span class="font-semibold text-slate-800">Rs. 1.45L</span>
                </div>

                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-medium text-slate-800">AirPods Pro</p>
                        <p class="text-xs text-slate-500">Rs. 85,000 × 1</p>
                    </div>
                    <span class="font-semibold text-slate-800">Rs. 85K</span>
                </div>

            </div>

            <!-- Totals -->
            <div class="p-6 border-t space-y-4 bg-slate-50">
                <div class="flex justify-between text-sm">
                    <span>Subtotal</span>
                    <span class="font-semibold">Rs. 2,30,000</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span>VAT (13%)</span>
                    <span class="font-semibold">Rs. 29,900</span>
                </div>

                <div class="flex justify-between text-lg font-bold pt-3 border-t">
                    <span>Total</span>
                    <span>Rs. 2,59,900</span>
                </div>

                <button class="w-full mt-4 py-3 rounded-lg font-semibold" style="background-color: rgb(227, 184, 252); color: #1f2937;">
                    Process Payment
                </button>
            </div>

        </div>
    </div>
</div>
@endsection
