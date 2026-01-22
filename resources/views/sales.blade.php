@extends('layouts.app')

@section('content')
<div class="h-full flex flex-col">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 shrink-0 animate-fade-up">
        <div>
            <h1 class="text-3xl font-bold heading-font text-slate-900">Sales & POS</h1>
            <p class="text-slate-500 mt-1">Terminal ID: <span class="font-mono font-bold text-indigo-600">#POS-04</span> | Operator: <span class="font-bold text-slate-700">Admin</span></p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-3">
            <button class="flex items-center space-x-2 px-5 py-2.5 bg-white/50 backdrop-blur-md border border-slate-200 rounded-2xl text-sm font-bold text-slate-700 hover:bg-white transition-all">
                <i data-lucide="history" class="w-4 h-4 text-indigo-500"></i>
                <span>Sales History</span>
            </button>
        </div>
    </div>

    <div class="flex-1 flex flex-col lg:flex-row gap-8 min-h-0 overflow-hidden">
        <!-- Product Grid -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden animate-fade-up stagger-1">
            <div class="mb-6 flex space-x-3 overflow-x-auto pb-4 shrink-0 no-scrollbar">
                <button class="px-5 py-2.5 bg-slate-900 text-white rounded-2xl text-sm font-bold shadow-lg shadow-slate-200 shrink-0">All</button>
                <button class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-2xl text-sm font-bold shrink-0 hover:border-indigo-500 hover:text-indigo-600 transition-all">Electronics</button>
                <button class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-2xl text-sm font-bold shrink-0 hover:border-indigo-500 hover:text-indigo-600 transition-all">Apparel</button>
                <button class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-2xl text-sm font-bold shrink-0 hover:border-indigo-500 hover:text-indigo-600 transition-all">Groceries</button>
            </div>

            <div class="flex-1 overflow-y-auto grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 pr-4">
                <!-- Product Card -->
                <div class="glass-card p-5 rounded-3xl group cursor-pointer active:scale-95 transition-all">
                    <div class="aspect-square bg-slate-100 rounded-2xl mb-5 flex items-center justify-center text-slate-300 relative overflow-hidden">
                        <i data-lucide="package" class="w-14 h-14 group-hover:scale-110 transition-transform duration-500"></i>
                        <div class="absolute top-3 right-3 bg-white/80 backdrop-blur-md px-2 py-1 rounded-lg border border-white/50 opacity-0 group-hover:opacity-100 transition-opacity">
                            <i data-lucide="plus" class="w-4 h-4 text-indigo-600"></i>
                        </div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-bold text-slate-900 group-hover:text-indigo-600 transition-colors">iPhone 15 Pro</p>
                            <p class="text-xs font-medium text-slate-400 mt-0.5">Titanium - 256GB</p>
                        </div>
                        <span class="text-lg font-black text-indigo-600">$999</span>
                    </div>
                </div>

                <div class="glass-card p-5 rounded-3xl group cursor-pointer active:scale-95 transition-all">
                    <div class="aspect-square bg-slate-100 rounded-2xl mb-5 flex items-center justify-center text-slate-300 relative overflow-hidden">
                        <i data-lucide="airplay" class="w-14 h-14 group-hover:scale-110 transition-transform duration-500"></i>
                        <div class="absolute top-3 right-3 bg-white/80 backdrop-blur-md px-2 py-1 rounded-lg border border-white/50 opacity-0 group-hover:opacity-100 transition-opacity">
                            <i data-lucide="plus" class="w-4 h-4 text-indigo-600"></i>
                        </div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-bold text-slate-900 group-hover:text-indigo-600 transition-colors">AirPods Pro</p>
                            <p class="text-xs font-medium text-slate-400 mt-0.5">MagSafe Case</p>
                        </div>
                        <span class="text-lg font-black text-indigo-600">$249</span>
                    </div>
                </div>

                <div class="glass-card p-5 rounded-3xl group cursor-pointer active:scale-95 transition-all">
                    <div class="aspect-square bg-slate-100 rounded-2xl mb-5 flex items-center justify-center text-slate-300 relative overflow-hidden">
                        <i data-lucide="watch" class="w-14 h-14 group-hover:scale-110 transition-transform duration-500"></i>
                        <div class="absolute top-3 right-3 bg-white/80 backdrop-blur-md px-2 py-1 rounded-lg border border-white/50 opacity-0 group-hover:opacity-100 transition-opacity">
                            <i data-lucide="plus" class="w-4 h-4 text-indigo-600"></i>
                        </div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-bold text-slate-900 group-hover:text-indigo-600 transition-colors">Apple Watch Ultra</p>
                            <p class="text-xs font-medium text-slate-400 mt-0.5">Ocean Band</p>
                        </div>
                        <span class="text-lg font-black text-indigo-600">$799</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkout Sidebar -->
        <div class="w-full lg:w-[400px] flex flex-col shrink-0 animate-fade-up stagger-2">
            <div class="glass-card h-full rounded-[32px] overflow-hidden flex flex-col">
                <div class="p-8 border-b border-slate-100 shrink-0 bg-white/50">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-bold text-slate-900 heading-font">Current Order</h3>
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg text-[10px] font-black uppercase tracking-wider">Active</span>
                    </div>
                    <p class="text-xs font-mono text-slate-400 mt-1">Transaction #829103</p>
                </div>

                <div class="flex-1 overflow-y-auto p-8 space-y-6">
                    <!-- Order Item -->
                    <div class="flex items-center justify-between group">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 rounded-2xl bg-indigo-50 flex items-center justify-center text-indigo-500 border border-indigo-100">
                                <i data-lucide="smartphone" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-900 leading-tight">iPhone 15 Pro</p>
                                <p class="text-xs font-bold text-slate-400 mt-1">$999 × 1</p>
                            </div>
                        </div>
                        <p class="text-sm font-black text-slate-900">$999</p>
                    </div>

                    <div class="flex items-center justify-between group">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 rounded-2xl bg-indigo-50 flex items-center justify-center text-indigo-500 border border-indigo-100">
                                <i data-lucide="headphones" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-900 leading-tight">AirPods Pro</p>
                                <p class="text-xs font-bold text-slate-400 mt-1">$249 × 2</p>
                            </div>
                        </div>
                        <p class="text-sm font-black text-slate-900">$498</p>
                    </div>
                </div>

                <div class="p-8 bg-slate-900 rounded-b-[32px] space-y-5 shrink-0 shadow-2xl shadow-indigo-200">
                    <div class="flex justify-between text-xs font-bold uppercase tracking-widest text-slate-400">
                        <span>Subtotal</span>
                        <span class="text-white">$1,497.00</span>
                    </div>
                    <div class="flex justify-between text-xs font-bold uppercase tracking-widest text-slate-400">
                        <span>Tax (8%)</span>
                        <span class="text-white">$119.76</span>
                    </div>
                    <div class="h-px bg-slate-800 my-1"></div>
                    <div class="flex justify-between items-end">
                        <span class="text-xl font-bold text-white heading-font">Total Payable</span>
                        <span class="text-3xl font-black text-indigo-400">$1,616.76</span>
                    </div>

                    <button class="w-full py-5 bg-indigo-600 text-white rounded-[24px] text-lg font-black shadow-xl shadow-indigo-900/50 hover:bg-indigo-500 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center space-x-3 group relative overflow-hidden mt-4">
                        <span class="relative z-10 flex items-center space-x-2">
                            <i data-lucide="sparkles" class="w-6 h-6"></i>
                            <span>Process Payment</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-400 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </button>
                    
                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <button class="py-3 bg-slate-800 rounded-2xl text-xs font-black uppercase text-slate-400 hover:text-white hover:bg-slate-700 transition-all tracking-widest">Hold Order</button>
                        <button class="py-3 bg-rose-500/10 rounded-2xl text-xs font-black uppercase text-rose-500 hover:bg-rose-500 hover:text-white transition-all tracking-widest">Void Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
