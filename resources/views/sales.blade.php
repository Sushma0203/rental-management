@extends('layouts.app')

@section('content')
<div class="h-full flex flex-col">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 shrink-0">
        <div>
            <h1 class="text-3xl font-bold heading-font text-slate-900">Sales & POS</h1>
            <p class="text-slate-500 mt-1">Terminal ID: #POS-04 | Operator: Admin</p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-3">
            <button class="flex items-center space-x-2 px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl text-sm font-bold hover:bg-indigo-100 transition-colors">
                <i data-lucide="history" class="w-4 h-4"></i>
                <span>Sales History</span>
            </button>
        </div>
    </div>

    <div class="flex-1 flex flex-col lg:flex-row gap-8 min-h-0 overflow-hidden">
        <!-- Product Grid -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <div class="mb-6 flex space-x-4 overflow-x-auto pb-2 shrink-0">
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-bold shrink-0">All Categories</button>
                <button class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl text-sm font-semibold shrink-0 hover:bg-slate-50">Electronics</button>
                <button class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl text-sm font-semibold shrink-0 hover:bg-slate-50">Apparel</button>
                <button class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl text-sm font-semibold shrink-0 hover:bg-slate-50">Groceries</button>
                <button class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl text-sm font-semibold shrink-0 hover:bg-slate-50">Accessories</button>
            </div>

            <div class="flex-1 overflow-y-auto grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 pr-2">
                <!-- Product Card -->
                <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm hover:border-indigo-300 transition-all cursor-pointer group">
                    <div class="aspect-square bg-slate-50 rounded-xl mb-4 flex items-center justify-center text-slate-300 group-hover:scale-105 transition-transform duration-300">
                        <i data-lucide="package" class="w-12 h-12"></i>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-bold text-slate-900">iPhone 15 Pro</p>
                            <p class="text-xs text-slate-500">Natural Titanium - 256GB</p>
                        </div>
                        <span class="font-bold text-indigo-600">$999.00</span>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm hover:border-indigo-300 transition-all cursor-pointer group">
                    <div class="aspect-square bg-slate-50 rounded-xl mb-4 flex items-center justify-center text-slate-300 group-hover:scale-105 transition-transform duration-300">
                        <i data-lucide="package" class="w-12 h-12"></i>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-bold text-slate-900">AirPods Pro (2nd Gen)</p>
                            <p class="text-xs text-slate-500">Wireless Noise Cancelling</p>
                        </div>
                        <span class="font-bold text-indigo-600">$249.00</span>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm hover:border-indigo-300 transition-all cursor-pointer group">
                    <div class="aspect-square bg-slate-50 rounded-xl mb-4 flex items-center justify-center text-slate-300 group-hover:scale-105 transition-transform duration-300">
                        <i data-lucide="package" class="w-12 h-12"></i>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-bold text-slate-900">Apple Watch Ultra 2</p>
                            <p class="text-xs text-slate-500">Titanium Case - Ocean Band</p>
                        </div>
                        <span class="font-bold text-indigo-600">$799.00</span>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm hover:border-indigo-300 transition-all cursor-pointer group">
                    <div class="aspect-square bg-slate-50 rounded-xl mb-4 flex items-center justify-center text-slate-300 group-hover:scale-105 transition-transform duration-300">
                        <i data-lucide="package" class="w-12 h-12"></i>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-bold text-slate-900">Sony DualSense Edge</p>
                            <p class="text-xs text-slate-500">Wireless Controller</p>
                        </div>
                        <span class="font-bold text-indigo-600">$199.00</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkout Sidebar -->
        <div class="w-full lg:w-96 flex flex-col shrink-0">
            <div class="bg-white h-full rounded-2xl border border-slate-200 shadow-sm flex flex-col">
                <div class="p-6 border-b border-slate-100 shrink-0">
                    <h3 class="font-bold text-slate-900">Current Order</h3>
                    <p class="text-xs text-slate-500 mt-1">Order #829103</p>
                </div>

                <div class="flex-1 overflow-y-auto p-6 space-y-6">
                    <!-- Order Items -->
                    <div class="flex items-center justify-between group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                <i data-lucide="package" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-900 leading-none">iPhone 15 Pro</p>
                                <p class="text-xs text-slate-500 mt-1">$999.00 x 1</p>
                            </div>
                        </div>
                        <p class="text-sm font-bold text-slate-900">$999.00</p>
                    </div>

                    <div class="flex items-center justify-between group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                <i data-lucide="package" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-900 leading-none">AirPods Pro</p>
                                <p class="text-xs text-slate-500 mt-1">$249.00 x 2</p>
                            </div>
                        </div>
                        <p class="text-sm font-bold text-slate-900">$498.00</p>
                    </div>
                </div>

                <div class="p-6 bg-slate-50 rounded-b-2xl border-t border-slate-100 space-y-4 shrink-0">
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500 font-medium">Subtotal</span>
                        <span class="font-bold text-slate-900">$1,497.00</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500 font-medium">Tax (8%)</span>
                        <span class="font-bold text-slate-900">$119.76</span>
                    </div>
                    <div class="h-px bg-slate-200 my-2"></div>
                    <div class="flex justify-between">
                        <span class="text-lg font-bold text-slate-900">Total</span>
                        <span class="text-lg font-bold text-indigo-600">$1,616.76</span>
                    </div>

                    <div class="grid grid-cols-2 gap-3 mt-6">
                        <button class="py-3 bg-white border border-slate-200 rounded-xl text-sm font-bold text-slate-700 hover:bg-slate-50">Hold</button>
                        <button class="py-3 bg-rose-50 border border-rose-100 rounded-xl text-sm font-bold text-rose-600 hover:bg-rose-100">Cancel</button>
                    </div>
                    <button class="w-full py-4 bg-indigo-600 text-white rounded-xl text-lg font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all flex items-center justify-center space-x-2 mt-4">
                        <i data-lucide="credit-card" class="w-5 h-5"></i>
                        <span>Checkout</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
