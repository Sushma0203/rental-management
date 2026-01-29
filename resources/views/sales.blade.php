@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 px-6 py-8">

    <div class="flex flex-col lg:flex-row gap-10">

        <!-- PRODUCTS -->
        <div class="flex-1">

            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
                <div>
                    <p class="text-xs font-semibold text-emerald-600 uppercase tracking-widest mb-1">
                        Point of Sale
                    </p>
                    <h1 class="text-3xl font-bold text-slate-800">
                        POS Terminal
                    </h1>
                </div>

                <div class="relative w-full md:w-80 mt-4 md:mt-0">
                    <input type="text"
                        placeholder="Search or Scan SKU"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
            </div>

            <!-- Categories -->
            <div class="flex gap-3 mb-8 overflow-x-auto">
                <button class="px-5 py-2 bg-emerald-600 text-white rounded-lg text-xs font-semibold">
                    All
                </button>
                <button class="px-5 py-2 bg-white border rounded-lg text-xs font-semibold text-slate-600">
                    Electronics
                </button>
                <button class="px-5 py-2 bg-white border rounded-lg text-xs font-semibold text-slate-600">
                    Audio
                </button>
                <button class="px-5 py-2 bg-white border rounded-lg text-xs font-semibold text-slate-600">
                    Accessories
                </button>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">

                <!-- Product -->
                <div class="bg-white border rounded-xl p-4 hover:shadow-md transition cursor-pointer">
                    <div class="h-40 bg-slate-100 rounded-lg mb-4 flex items-center justify-center">
                        <i data-lucide="smartphone" class="w-10 h-10 text-slate-500"></i>
                    </div>
                    <p class="text-xs text-slate-400 uppercase mb-1">Apple</p>
                    <h4 class="font-semibold text-slate-800">iPhone 15 Pro Max</h4>
                    <p class="text-xs text-slate-500 mb-4">256GB</p>

                    <div class="flex justify-between items-center">
                        <span class="font-bold text-slate-800">Rs. 1,45,000</span>
                        <button class="px-3 py-2 bg-emerald-600 text-white rounded-lg text-xs">
                            Add
                        </button>
                    </div>
                </div>

                <!-- duplicate cards as needed -->

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

                <button class="w-full mt-4 py-3 bg-emerald-600 text-white rounded-lg font-semibold">
                    Process Payment
                </button>
            </div>

        </div>
    </div>
</div>
@endsection
