@extends('layouts.app')

@section('content')
<div class="h-full flex flex-col -m-8">
    <div class="flex-1 flex flex-col lg:flex-row min-h-0 overflow-hidden">
        <!-- Main Product Explorer -->
        <div class="flex-1 flex flex-col min-w-0 bg-[#f8fafc] p-10 overflow-hidden animate-fade-in">
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-12 shrink-0">
                <div>
                    <h1 class="text-4xl font-black heading-font text-slate-900 tracking-tight">Point of <span class="text-emerald-600">Sale</span></h1>
                    <p class="text-sm font-bold text-slate-400 mt-1 uppercase tracking-widest">Operator: <span class="text-slate-900">Admin_Terminal_01</span></p>
                </div>
                <div class="mt-8 md:mt-0 relative w-full md:w-80">
                    <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-300"></i>
                    <input type="text" placeholder="Scan SKU or Search..." class="w-full pl-12 pr-6 py-4 bg-white border border-slate-200 rounded-2xl text-sm font-bold focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 transition-all outline-none shadow-sm">
                </div>
            </div>

            <div class="mb-10 flex space-x-4 overflow-x-auto pb-4 shrink-0 no-scrollbar">
                <button class="px-8 py-3.5 bg-slate-900 text-white rounded-2xl text-xs font-black tracking-widest shadow-xl shadow-slate-200 shrink-0">ALL ASSETS</button>
                <button class="px-8 py-3.5 bg-white border border-slate-200 text-slate-500 rounded-2xl text-xs font-black tracking-widest shrink-0 hover:border-emerald-600 hover:text-emerald-600 transition-all">COMPUTERS</button>
                <button class="px-8 py-3.5 bg-white border border-slate-200 text-slate-500 rounded-2xl text-xs font-black tracking-widest shrink-0 hover:border-emerald-600 hover:text-emerald-600 transition-all">WEARABLES</button>
                <button class="px-8 py-3.5 bg-white border border-slate-200 text-slate-500 rounded-2xl text-xs font-black tracking-widest shrink-0 hover:border-emerald-600 hover:text-emerald-600 transition-all">PERIPHERALS</button>
            </div>

            <div class="flex-1 overflow-y-auto grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-10 pr-6">
                <!-- Product Card -->
                <div class="prof-card p-6 flex flex-col group cursor-pointer active:scale-95 transition-all relative">
                    <div class="aspect-square bg-slate-50 rounded-2xl mb-6 flex items-center justify-center text-slate-300 relative overflow-hidden group-hover:bg-emerald-50 transition-colors">
                        <i data-lucide="smartphone" class="w-12 h-12 group-hover:scale-110 transition-transform duration-500 group-hover:text-emerald-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Apple Series</p>
                        <h4 class="text-lg font-black text-slate-900 leading-tight group-hover:text-emerald-600 transition-colors">iPhone 15 Pro Max</h4>
                    </div>
                    <div class="mt-6 pt-6 border-t border-slate-100 flex justify-between items-center">
                        <span class="text-lg font-black text-slate-900">Rs. 1,45,000</span>
                        <div class="w-10 h-10 bg-slate-900 text-white rounded-xl flex items-center justify-center group-hover:bg-emerald-600 transition-all shadow-lg shadow-slate-200">
                             <i data-lucide="plus" class="w-5 h-5"></i>
                        </div>
                    </div>
                </div>

                <div class="prof-card p-6 flex flex-col group cursor-pointer active:scale-95 transition-all relative">
                    <div class="aspect-square bg-slate-50 rounded-2xl mb-6 flex items-center justify-center text-slate-300 relative overflow-hidden group-hover:bg-emerald-50 transition-colors">
                        <i data-lucide="headphones" class="w-12 h-12 group-hover:scale-110 transition-transform duration-500 group-hover:text-emerald-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Audio Vision</p>
                        <h4 class="text-lg font-black text-slate-900 leading-tight group-hover:text-emerald-600 transition-colors">AirPods Pro Max</h4>
                    </div>
                    <div class="mt-6 pt-6 border-t border-slate-100 flex justify-between items-center">
                        <span class="text-lg font-black text-slate-900">Rs. 85,000</span>
                        <div class="w-10 h-10 bg-slate-900 text-white rounded-xl flex items-center justify-center group-hover:bg-emerald-600 transition-all shadow-lg shadow-slate-200">
                             <i data-lucide="plus" class="w-5 h-5"></i>
                        </div>
                    </div>
                </div>

                <div class="prof-card p-6 flex flex-col group cursor-pointer active:scale-95 transition-all relative">
                    <div class="aspect-square bg-slate-50 rounded-2xl mb-6 flex items-center justify-center text-slate-300 relative overflow-hidden group-hover:bg-emerald-50 transition-colors">
                        <i data-lucide="monitor" class="w-12 h-12 group-hover:scale-110 transition-transform duration-500 group-hover:text-emerald-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Display Hub</p>
                        <h4 class="text-lg font-black text-slate-900 leading-tight group-hover:text-emerald-600 transition-colors">Studio Display 5K</h4>
                    </div>
                    <div class="mt-6 pt-6 border-t border-slate-100 flex justify-between items-center">
                        <span class="text-lg font-black text-slate-900">Rs. 2,10,000</span>
                        <div class="w-10 h-10 bg-slate-900 text-white rounded-xl flex items-center justify-center group-hover:bg-emerald-600 transition-all shadow-lg shadow-slate-200">
                             <i data-lucide="plus" class="w-5 h-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Terminal Sidebar / Order Summary -->
        <div class="w-full lg:w-[480px] flex flex-col shrink-0 bg-[#ffffff] border-l border-slate-200 animate-fade-in shadow-2xl" style="animation-delay: 0.2s">
            <!-- Order Context -->
            <div class="p-10 shrink-0 border-b border-slate-100">
                <div class="flex justify-between items-start mb-10">
                    <div>
                        <h3 class="text-2xl font-black text-slate-900 heading-font">Order <span class="text-emerald-600">Ledger</span></h3>
                        <p class="text-xs font-bold text-slate-400 mt-1 uppercase tracking-widest"><i data-lucide="user" class="inline w-3 h-3 mr-1"></i> Guest Customer</p>
                    </div>
                    <button class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 hover:bg-emerald-50 hover:text-emerald-600 transition-all border border-slate-100">
                        <i data-lucide="user-plus" class="w-5 h-5"></i>
                    </button>
                </div>
                <div class="p-6 bg-[#064e3b] rounded-3xl text-white flex items-center justify-between relative overflow-hidden group shadow-xl shadow-emerald-50">
                    <div class="absolute inset-0 bg-[linear-gradient(135deg,rgba(255,255,255,0.1)_0%,transparent_100%)] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-emerald-300 mb-1">Reference ID</p>
                        <p class="text-lg font-black font-mono">TXN_829103_MINT</p>
                    </div>
                    <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center border border-white/20">
                        <i data-lucide="qr-code" class="w-6 h-6"></i>
                    </div>
                </div>
            </div>

            <!-- Item List -->
            <div class="flex-1 overflow-y-auto p-10 space-y-12">
                <div class="flex items-center justify-between group">
                    <div class="flex items-center space-x-6">
                        <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 group-hover:text-emerald-600 transition-colors border border-slate-100 group-hover:border-emerald-200 shrink-0">
                            <i data-lucide="smartphone" class="w-8 h-8"></i>
                        </div>
                        <div>
                            <p class="text-lg font-black text-slate-900 leading-tight">iPhone 15 Pro Max</p>
                            <p class="text-xs font-bold text-slate-400 mt-1 uppercase tracking-widest">Rs. 1,45,000 × 1</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-end">
                        <p class="text-lg font-black text-slate-900">Rs. 1.45L</p>
                        <button class="text-rose-500 text-[10px] font-black uppercase mt-1 opacity-0 group-hover:opacity-100 transition-opacity">REMOVE</button>
                    </div>
                </div>

                <div class="flex items-center justify-between group">
                    <div class="flex items-center space-x-6">
                        <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 group-hover:text-emerald-600 transition-colors border border-slate-100 group-hover:border-emerald-200 shrink-0">
                            <i data-lucide="headphones" class="w-8 h-8"></i>
                        </div>
                        <div>
                            <p class="text-lg font-black text-slate-900 leading-tight">AirPods Pro Max</p>
                            <p class="text-xs font-bold text-slate-400 mt-1 uppercase tracking-widest">Rs. 85,000 × 1</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-end">
                        <p class="text-lg font-black text-slate-900">Rs. 85.0K</p>
                        <button class="text-rose-500 text-[10px] font-black uppercase mt-1 opacity-0 group-hover:opacity-100 transition-opacity">REMOVE</button>
                    </div>
                </div>
            </div>

            <!-- Totals & Actions -->
            <div class="p-10 space-y-8 bg-slate-50/50 shrink-0">
                <div class="space-y-4">
                    <div class="flex justify-between text-xs font-bold uppercase tracking-widest text-slate-400">
                        <span>Transaction Subtotal</span>
                        <span class="text-slate-900">Rs. 2,30,000</span>
                    </div>
                    <div class="flex justify-between text-xs font-bold uppercase tracking-widest text-slate-400">
                        <span>VAT Allocation (13%)</span>
                        <span class="text-slate-900">Rs. 29,900</span>
                    </div>
                    <div class="pt-6 border-t border-slate-200 flex justify-between items-end">
                        <span class="text-sm font-black text-slate-900 uppercase tracking-[0.2em]">Grand Total</span>
                        <div class="text-right">
                             <p class="text-[10px] font-black text-emerald-600 uppercase mb-1">Payable Amount</p>
                             <p class="text-4xl font-black text-slate-900 tracking-tighter tabular-nums">Rs. 2,59,900</p>
                        </div>
                    </div>
                </div>

                <div class="flex space-x-4">
                    <button class="flex-1 bg-slate-900 text-white py-6 rounded-3xl text-lg font-black hover:bg-emerald-600 transition-all shadow-2xl shadow-slate-300 flex items-center justify-center space-x-4 group overflow-hidden relative">
                        <div class="absolute inset-x-0 bottom-0 h-1 bg-emerald-400 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <i data-lucide="zap" class="w-6 h-6"></i>
                        <span>PROCESS PAYMENT</span>
                    </button>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <button class="py-4 bg-white border border-slate-200 rounded-2xl text-[10px] font-black uppercase text-slate-500 hover:text-slate-900 hover:border-slate-900 transition-all tracking-widest transition-all">Park Order</button>
                    <button class="py-4 bg-rose-50 text-rose-600 border border-rose-100 rounded-2xl text-[10px] font-black uppercase hover:bg-rose-600 hover:text-white transition-all tracking-widest transition-all">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
