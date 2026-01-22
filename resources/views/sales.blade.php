@extends('layouts.app')

@section('content')
<div class="h-full flex flex-col">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 shrink-0 animate-block-up">
        <div>
            <h1 class="text-4xl font-black heading-font text-slate-900 tracking-tight">Rapid <span class="text-emerald-600">Checkout</span></h1>
            <p class="text-slate-500 mt-1 font-medium">Terminal ID: <span class="font-mono font-black text-emerald-600">#MINT-01</span> | Session Active</p>
        </div>
        <div class="mt-6 md:mt-0 flex space-x-3">
            <button class="flex items-center space-x-2 px-6 py-3 bg-white border-2 border-slate-200 rounded-2xl text-sm font-black text-slate-700 hover:border-emerald-500 transition-all shadow-sm">
                <i data-lucide="clock" class="w-5 h-5 text-emerald-600"></i>
                <span>Queue</span>
            </button>
        </div>
    </div>

    <div class="flex-1 flex flex-col lg:flex-row gap-10 min-h-0 overflow-hidden">
        <!-- Product Grid -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden animate-block-up" style="animation-delay: 0.1s">
            <div class="mb-8 flex space-x-3 overflow-x-auto pb-4 shrink-0 no-scrollbar">
                <button class="px-8 py-3 bg-slate-900 text-white rounded-2xl text-sm font-black shadow-lg shadow-slate-200 shrink-0">ALL PRODUCTS</button>
                <button class="px-8 py-3 bg-white border-2 border-slate-200 text-slate-500 rounded-2xl text-sm font-black shrink-0 hover:border-emerald-600 hover:text-emerald-600 transition-all">ELECTRONICS</button>
                <button class="px-8 py-3 bg-white border-2 border-slate-200 text-slate-500 rounded-2xl text-sm font-black shrink-0 hover:border-emerald-600 hover:text-emerald-600 transition-all">APPAREL</button>
                <button class="px-8 py-3 bg-white border-2 border-slate-200 text-slate-500 rounded-2xl text-sm font-black shrink-0 hover:border-emerald-600 hover:text-emerald-600 transition-all">ESSENTIALS</button>
            </div>

            <div class="flex-1 overflow-y-auto grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8 pr-6">
                <!-- Product Card -->
                <div class="block-card p-6 group cursor-pointer active:scale-95 transition-all bg-white relative">
                    <div class="aspect-square bg-slate-50 rounded-2xl mb-6 flex items-center justify-center text-slate-300 relative overflow-hidden border-2 border-slate-100">
                        <i data-lucide="package" class="w-16 h-16 group-hover:scale-110 transition-transform duration-300 group-hover:text-emerald-600"></i>
                        <div class="absolute inset-0 bg-emerald-600/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-black text-slate-900 group-hover:text-emerald-600 transition-colors">iPhone 15 Pro</p>
                            <p class="text-[10px] font-black uppercase text-slate-400 mt-1 tracking-widest">Titanium • 256GB</p>
                        </div>
                        <span class="text-xl font-black text-emerald-600">Rs. 1,45,000</span>
                    </div>
                </div>

                <div class="block-card p-6 group cursor-pointer active:scale-95 transition-all bg-white relative">
                    <div class="aspect-square bg-slate-50 rounded-2xl mb-6 flex items-center justify-center text-slate-300 relative overflow-hidden border-2 border-slate-100">
                        <i data-lucide="headphones" class="w-16 h-16 group-hover:scale-110 transition-transform duration-300 group-hover:text-emerald-600"></i>
                        <div class="absolute inset-0 bg-emerald-600/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-black text-slate-900 group-hover:text-emerald-600 transition-colors">AirPods Pro</p>
                            <p class="text-[10px] font-black uppercase text-slate-400 mt-1 tracking-widest">Noise Cancelling</p>
                        </div>
                        <span class="text-xl font-black text-emerald-600">Rs. 25,000</span>
                    </div>
                </div>

                <div class="block-card p-6 group cursor-pointer active:scale-95 transition-all bg-white relative">
                    <div class="aspect-square bg-slate-50 rounded-2xl mb-6 flex items-center justify-center text-slate-300 relative overflow-hidden border-2 border-slate-100">
                        <i data-lucide="watch" class="w-16 h-16 group-hover:scale-110 transition-transform duration-300 group-hover:text-emerald-600"></i>
                        <div class="absolute inset-0 bg-emerald-600/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-black text-slate-900 group-hover:text-emerald-600 transition-colors">Apple Watch Ultra</p>
                            <p class="text-[10px] font-black uppercase text-slate-400 mt-1 tracking-widest">Titanium Case</p>
                        </div>
                        <span class="text-xl font-black text-emerald-600">Rs. 1,20,000</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkout Sidebar -->
        <div class="w-full lg:w-[450px] flex flex-col shrink-0 animate-block-up" style="animation-delay: 0.2s">
            <div class="block-card h-full overflow-hidden flex flex-col bg-white">
                <div class="p-10 border-b-2 border-slate-100 shrink-0 bg-slate-50/50">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-black text-slate-900 heading-font">Your <span class="text-emerald-600">Basket</span></h3>
                        <span class="px-4 py-1.5 bg-emerald-100 text-emerald-700 rounded-xl text-[10px] font-black uppercase tracking-widest border-2 border-emerald-200">Processing</span>
                    </div>
                    <div class="flex items-center space-x-3 text-slate-400 font-mono text-xs font-black">
                        <i data-lucide="hash" class="w-3 h-3"></i>
                        <span>TXN_829103_MINT</span>
                    </div>
                </div>

                <div class="flex-1 overflow-y-auto p-10 space-y-10">
                    <!-- Order Items -->
                    <div class="flex items-center justify-between group">
                        <div class="flex items-center space-x-6">
                            <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center text-emerald-600 border-2 border-slate-100 group-hover:scale-110 transition-transform">
                                <i data-lucide="smartphone" class="w-8 h-8"></i>
                            </div>
                            <div>
                                <p class="text-base font-black text-slate-900 leading-tight">iPhone 15 Pro</p>
                                <p class="text-xs font-black text-slate-400 mt-1">Rs. 1,45,000 × 1</p>
                            </div>
                        </div>
                        <p class="text-lg font-black text-slate-900">Rs. 1,45,000</p>
                    </div>

                    <div class="flex items-center justify-between group">
                        <div class="flex items-center space-x-6">
                            <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center text-emerald-600 border-2 border-slate-100 group-hover:scale-110 transition-transform">
                                <i data-lucide="headphones" class="w-8 h-8"></i>
                            </div>
                            <div>
                                <p class="text-base font-black text-slate-900 leading-tight">AirPods Pro</p>
                                <p class="text-xs font-black text-slate-400 mt-1">Rs. 12,500 × 2</p>
                            </div>
                        </div>
                        <p class="text-lg font-black text-slate-900">Rs. 25,000</p>
                    </div>
                </div>

                <div class="p-10 bg-slate-900 space-y-8 shrink-0 relative">
                    <div class="flex justify-between text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                        <span>Subtotal</span>
                        <span class="text-white">Rs. 1,70,000</span>
                    </div>
                    <div class="flex justify-between text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                        <span>VAT (13%)</span>
                        <span class="text-white">Rs. 22,100</span>
                    </div>
                    <div class="h-0.5 bg-slate-800"></div>
                    <div class="flex justify-between items-end">
                        <span class="text-sm font-black text-slate-400 uppercase tracking-widest">Total Payable</span>
                        <span class="text-4xl font-black text-emerald-400 tracking-tighter leading-none">Rs. 1,92,100</span>
                    </div>

                    <button class="w-full py-6 bg-emerald-500 text-white rounded-2xl text-xl font-black shadow-2xl shadow-emerald-900/40 hover:bg-emerald-400 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center space-x-4 group overflow-hidden">
                        <i data-lucide="check-circle" class="w-7 h-7"></i>
                        <span>PAY NOW</span>
                    </button>
                    
                    <div class="grid grid-cols-2 gap-6">
                        <button class="py-4 bg-slate-800 rounded-2xl text-[10px] font-black uppercase text-slate-400 hover:text-white hover:bg-slate-700 transition-all tracking-widest border-2 border-slate-700">Park Order</button>
                        <button class="py-4 bg-rose-500/10 rounded-2xl text-[10px] font-black uppercase text-rose-500 hover:bg-rose-500 hover:text-white transition-all tracking-widest border-2 border-rose-500/20">Abort</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
