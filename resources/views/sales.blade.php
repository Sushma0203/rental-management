@extends('layouts.app')

@section('content')
<div class="h-[calc(100vh-200px)] flex flex-col lg:flex-row gap-8 animate-fade-in-up">
    
    <!-- Product Explorer -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 shrink-0">
            <div>
                <p class="text-sm font-bold text-emerald-400 uppercase tracking-[0.2em] mb-2">Point of Sale</p>
                <h1 class="text-5xl font-black heading-font text-white tracking-tight">
                    POS <span class="text-emerald-400">Terminal</span>
                </h1>
            </div>
            <div class="mt-6 md:mt-0 relative w-full md:w-96">
                <i data-lucide="search" class="absolute left-5 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                <input type="text" placeholder="Scan SKU or Search Products..." class="w-full pl-14 pr-6 py-4 bg-white/95 backdrop-blur-sm border-2 border-slate-200 rounded-2xl text-sm font-bold focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all outline-none shadow-lg">
            </div>
        </div>

        <!-- Category Filters -->
        <div class="mb-8 flex gap-3 overflow-x-auto pb-4 shrink-0 no-scrollbar">
            <button class="px-8 py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-2xl text-sm font-black tracking-widest shadow-xl shadow-emerald-500/30 shrink-0">ALL PRODUCTS</button>
            <button class="px-8 py-4 bg-white/95 backdrop-blur-sm border-2 border-slate-200 text-slate-600 rounded-2xl text-sm font-black tracking-widest shrink-0 hover:border-emerald-500 hover:text-emerald-600 transition-all shadow-lg">ELECTRONICS</button>
            <button class="px-8 py-4 bg-white/95 backdrop-blur-sm border-2 border-slate-200 text-slate-600 rounded-2xl text-sm font-black tracking-widest shrink-0 hover:border-emerald-500 hover:text-emerald-600 transition-all shadow-lg">AUDIO</button>
            <button class="px-8 py-4 bg-white/95 backdrop-blur-sm border-2 border-slate-200 text-slate-600 rounded-2xl text-sm font-black tracking-widest shrink-0 hover:border-emerald-500 hover:text-emerald-600 transition-all shadow-lg">ACCESSORIES</button>
        </div>

        <!-- Product Grid -->
        <div class="flex-1 overflow-y-auto grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-14 pr-4">
            <!-- Product Card 1 -->
            <div class="prof-card p-6 flex flex-col group cursor-pointer hover:shadow-2xl active:scale-95 transition-all">
                <div class="aspect-square bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl mb-6 flex items-center justify-center text-slate-400 relative overflow-hidden group-hover:from-emerald-50 group-hover:to-emerald-100 transition-all">
                    <i data-lucide="smartphone" class="w-16 h-16 group-hover:scale-110 group-hover:text-emerald-600 transition-all duration-500"></i>
                    <div class="absolute top-3 right-3 px-3 py-1 bg-emerald-500 text-white rounded-lg text-xs font-black shadow-lg">IN STOCK</div>
                </div>
                <div class="flex-1">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Apple Series</p>
                    <h4 class="text-lg font-black text-slate-900 leading-tight group-hover:text-emerald-600 transition-colors mb-2">iPhone 15 Pro Max</h4>
                    <p class="text-xs text-slate-500 font-medium">256GB, Titanium Blue</p>
                </div>
                <div class="mt-6 pt-6 border-t-2 border-slate-100 flex justify-between items-center">
                    <div>
                        <p class="text-xs text-slate-400 font-bold uppercase mb-1">Price</p>
                        <span class="text-2xl font-black text-slate-900">Rs. 1.45L</span>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-slate-900 to-slate-800 text-white rounded-2xl flex items-center justify-center group-hover:from-emerald-500 group-hover:to-emerald-600 transition-all shadow-lg group-hover:shadow-emerald-500/50">
                         <i data-lucide="plus" class="w-6 h-6"></i>
                    </div>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="prof-card p-6 flex flex-col group cursor-pointer hover:shadow-2xl active:scale-95 transition-all">
                <div class="aspect-square bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl mb-6 flex items-center justify-center text-slate-400 relative overflow-hidden group-hover:from-blue-50 group-hover:to-blue-100 transition-all">
                    <i data-lucide="headphones" class="w-16 h-16 group-hover:scale-110 group-hover:text-blue-600 transition-all duration-500"></i>
                    <div class="absolute top-3 right-3 px-3 py-1 bg-blue-500 text-white rounded-lg text-xs font-black shadow-lg">IN STOCK</div>
                </div>
                <div class="flex-1">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Audio Premium</p>
                    <h4 class="text-lg font-black text-slate-900 leading-tight group-hover:text-blue-600 transition-colors mb-2">AirPods Pro Max</h4>
                    <p class="text-xs text-slate-500 font-medium">Space Gray, Active Noise Cancellation</p>
                </div>
                <div class="mt-6 pt-6 border-t-2 border-slate-100 flex justify-between items-center">
                    <div>
                        <p class="text-xs text-slate-400 font-bold uppercase mb-1">Price</p>
                        <span class="text-2xl font-black text-slate-900">Rs. 85K</span>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-slate-900 to-slate-800 text-white rounded-2xl flex items-center justify-center group-hover:from-blue-500 group-hover:to-blue-600 transition-all shadow-lg group-hover:shadow-blue-500/50">
                         <i data-lucide="plus" class="w-6 h-6"></i>
                    </div>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="prof-card p-6 flex flex-col group cursor-pointer hover:shadow-2xl active:scale-95 transition-all">
                <div class="aspect-square bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl mb-6 flex items-center justify-center text-slate-400 relative overflow-hidden group-hover:from-purple-50 group-hover:to-purple-100 transition-all">
                    <i data-lucide="monitor" class="w-16 h-16 group-hover:scale-110 group-hover:text-purple-600 transition-all duration-500"></i>
                    <div class="absolute top-3 right-3 px-3 py-1 bg-purple-500 text-white rounded-lg text-xs font-black shadow-lg">IN STOCK</div>
                </div>
                <div class="flex-1">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Display Pro</p>
                    <h4 class="text-lg font-black text-slate-900 leading-tight group-hover:text-purple-600 transition-colors mb-2">Studio Display 5K</h4>
                    <p class="text-xs text-slate-500 font-medium">27-inch Retina 5K Display</p>
                </div>
                <div class="mt-6 pt-6 border-t-2 border-slate-100 flex justify-between items-center">
                    <div>
                        <p class="text-xs text-slate-400 font-bold uppercase mb-1">Price</p>
                        <span class="text-2xl font-black text-slate-900">Rs. 2.1L</span>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-slate-900 to-slate-800 text-white rounded-2xl flex items-center justify-center group-hover:from-purple-500 group-hover:to-purple-600 transition-all shadow-lg group-hover:shadow-purple-500/50">
                         <i data-lucide="plus" class="w-6 h-6"></i>
                    </div>
                </div>
            </div>

            <!-- Product Card 4 -->
            <div class="prof-card p-6 flex flex-col group cursor-pointer hover:shadow-2xl active:scale-95 transition-all">
                <div class="aspect-square bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl mb-6 flex items-center justify-center text-slate-400 relative overflow-hidden group-hover:from-amber-50 group-hover:to-amber-100 transition-all">
                    <i data-lucide="tablet" class="w-16 h-16 group-hover:scale-110 group-hover:text-amber-600 transition-all duration-500"></i>
                    <div class="absolute top-3 right-3 px-3 py-1 bg-amber-500 text-white rounded-lg text-xs font-black shadow-lg">LOW STOCK</div>
                </div>
                <div class="flex-1">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Tablet Series</p>
                    <h4 class="text-lg font-black text-slate-900 leading-tight group-hover:text-amber-600 transition-colors mb-2">iPad Air 5th Gen</h4>
                    <p class="text-xs text-slate-500 font-medium">64GB, Wi-Fi, Space Gray</p>
                </div>
                <div class="mt-6 pt-6 border-t-2 border-slate-100 flex justify-between items-center">
                    <div>
                        <p class="text-xs text-slate-400 font-bold uppercase mb-1">Price</p>
                        <span class="text-2xl font-black text-slate-900">Rs. 72K</span>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-slate-900 to-slate-800 text-white rounded-2xl flex items-center justify-center group-hover:from-amber-500 group-hover:to-amber-600 transition-all shadow-lg group-hover:shadow-amber-500/50">
                         <i data-lucide="plus" class="w-6 h-6"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Summary Sidebar -->
    <div class="w-full lg:w-[480px] flex flex-col shrink-0 prof-card shadow-2xl">
        <!-- Order Header -->
        <div class="p-10 shrink-0 border-b-2 border-slate-100 bg-gradient-to-r from-slate-50 to-white">
            <div class="flex justify-between items-start mb-8">
                <div>
                    <h3 class="text-3xl font-black text-slate-900 heading-font mb-1">Order <span class="text-emerald-600">Cart</span></h3>
                    <p class="text-sm font-medium text-slate-500 flex items-center gap-2">
                        <i data-lucide="user" class="w-4 h-4"></i>
                        Guest Customer
                    </p>
                </div>
                <button class="w-14 h-14 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 hover:bg-emerald-50 hover:text-emerald-600 transition-all border-2 border-slate-200 hover:border-emerald-200 shadow-sm">
                    <i data-lucide="user-plus" class="w-6 h-6"></i>
                </button>
            </div>
            <div class="p-6 bg-gradient-to-br from-slate-900 to-slate-800 rounded-3xl text-white flex items-center justify-between relative overflow-hidden group shadow-xl">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative z-10">
                    <p class="text-xs font-black uppercase tracking-widest text-emerald-400 mb-2">Transaction ID</p>
                    <p class="text-xl font-black font-mono">TXN_829103</p>
                </div>
                <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center border-2 border-white/20 relative z-10">
                    <i data-lucide="qr-code" class="w-7 h-7"></i>
                </div>
            </div>
        </div>

        <!-- Cart Items -->
        <div class="flex-1 overflow-y-auto p-10 space-y-8">
            <div class="flex items-center justify-between group p-4 rounded-2xl hover:bg-slate-50 transition-all">
                <div class="flex items-center gap-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600 border-2 border-emerald-200 shadow-md shrink-0">
                        <i data-lucide="smartphone" class="w-9 h-9"></i>
                    </div>
                    <div>
                        <p class="text-lg font-black text-slate-900 leading-tight mb-1">iPhone 15 Pro Max</p>
                        <p class="text-sm font-medium text-slate-500 mb-2">Rs. 1,45,000 × 1</p>
                        <div class="flex items-center gap-2">
                            <button class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center hover:bg-slate-200 transition-all">
                                <i data-lucide="minus" class="w-4 h-4 text-slate-600"></i>
                            </button>
                            <span class="w-10 text-center font-bold text-slate-900">1</span>
                            <button class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center hover:bg-slate-200 transition-all">
                                <i data-lucide="plus" class="w-4 h-4 text-slate-600"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-end gap-2">
                    <p class="text-xl font-black text-slate-900">Rs. 1.45L</p>
                    <button class="text-rose-500 text-xs font-black uppercase opacity-0 group-hover:opacity-100 transition-opacity hover:text-rose-600">
                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between group p-4 rounded-2xl hover:bg-slate-50 transition-all">
                <div class="flex items-center gap-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl flex items-center justify-center text-blue-600 border-2 border-blue-200 shadow-md shrink-0">
                        <i data-lucide="headphones" class="w-9 h-9"></i>
                    </div>
                    <div>
                        <p class="text-lg font-black text-slate-900 leading-tight mb-1">AirPods Pro Max</p>
                        <p class="text-sm font-medium text-slate-500 mb-2">Rs. 85,000 × 1</p>
                        <div class="flex items-center gap-2">
                            <button class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center hover:bg-slate-200 transition-all">
                                <i data-lucide="minus" class="w-4 h-4 text-slate-600"></i>
                            </button>
                            <span class="w-10 text-center font-bold text-slate-900">1</span>
                            <button class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center hover:bg-slate-200 transition-all">
                                <i data-lucide="plus" class="w-4 h-4 text-slate-600"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-end gap-2">
                    <p class="text-xl font-black text-slate-900">Rs. 85K</p>
                    <button class="text-rose-500 text-xs font-black uppercase opacity-0 group-hover:opacity-100 transition-opacity hover:text-rose-600">
                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Totals & Actions -->
        <div class="p-10 space-y-8 bg-slate-50/50 shrink-0 border-t-2 border-slate-100">
            <div class="space-y-5">
                <div class="flex justify-between text-sm font-bold text-slate-500">
                    <span>Subtotal</span>
                    <span class="text-slate-900 text-lg font-black">Rs. 2,30,000</span>
                </div>
                <div class="flex justify-between text-sm font-bold text-slate-500">
                    <span>VAT (13%)</span>
                    <span class="text-slate-900 text-lg font-black">Rs. 29,900</span>
                </div>
                <div class="pt-6 border-t-2 border-slate-200 flex justify-between items-end">
                    <div>
                        <p class="text-xs font-black text-emerald-600 uppercase mb-2">Total Amount</p>
                        <p class="text-5xl font-black text-slate-900 tracking-tighter tabular-nums">Rs. 2.6L</p>
                    </div>
                </div>
            </div>

            <button class="w-full bg-gradient-to-r from-emerald-500 to-emerald-600 text-white py-6 rounded-3xl text-xl font-black hover:shadow-2xl hover:shadow-emerald-500/50 transition-all shadow-xl flex items-center justify-center gap-4 group relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-emerald-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <i data-lucide="zap" class="w-7 h-7 relative z-10"></i>
                <span class="relative z-10">PROCESS PAYMENT</span>
            </button>
            
            <div class="grid grid-cols-2 gap-4">
                <button class="py-4 bg-white border-2 border-slate-200 rounded-2xl text-xs font-black uppercase text-slate-600 hover:text-slate-900 hover:border-slate-900 transition-all">Hold Order</button>
                <button class="py-4 bg-rose-50 text-rose-600 border-2 border-rose-200 rounded-2xl text-xs font-black uppercase hover:bg-rose-600 hover:text-white transition-all">Clear Cart</button>
            </div>
        </div>
    </div>

</div>
@endsection
