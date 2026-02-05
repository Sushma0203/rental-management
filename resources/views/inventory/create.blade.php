@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">
    
    <!-- HEADER -->
    <div class="mb-8">
        <a href="{{ route('inventory.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-800 transition-colors mb-3 font-medium">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Back to Inventory
        </a>
        <h1 class="text-3xl font-bold text-slate-800 tracking-tight">
            Add New Asset
        </h1>
        <p class="text-slate-500 mt-2">
            Register a new item into your inventory system.
        </p>
    </div>

    <!-- FORM CARD -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-8">
        <form action="{{ route('inventory.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Asset Name & SKU -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="asset_name" class="block text-sm font-semibold text-slate-700">
                        Asset Name
                    </label>
                    <input 
                        type="text" 
                        id="asset_name" 
                        name="asset_name" 
                        value="{{ old('asset_name') }}"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500 transition-all @error('asset_name') border-red-500 bg-red-50 text-red-900 @enderror"
                        placeholder="e.g. MacBook Pro 16"
                        required
                    >
                    @error('asset_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="sku" class="block text-sm font-semibold text-slate-700">
                        SKU / Serial No.
                    </label>
                    <input 
                        type="text" 
                        id="sku" 
                        name="sku" 
                        value="{{ old('sku') }}"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500 transition-all font-mono uppercase"
                        placeholder="e.g. MK-2024-001"
                        required
                    >
                    @error('sku')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Price & Stock -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="price" class="block text-sm font-semibold text-slate-700">
                        Price (Rs.)
                    </label>
                    <input 
                        type="number" 
                        id="price" 
                        name="price" 
                        value="{{ old('price') }}"
                        step="0.01"
                        min="0"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500 transition-all"
                        placeholder="0.00"
                        required
                    >
                    @error('price')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="stock" class="block text-sm font-semibold text-slate-700">
                        Initial Stock
                    </label>
                    <input 
                        type="number" 
                        id="stock" 
                        name="stock" 
                        value="{{ old('stock') }}"
                        min="0"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500 transition-all"
                        placeholder="0"
                        required
                    >
                    @error('stock')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Status -->
            <div class="space-y-2">
                <label for="status" class="block text-sm font-semibold text-slate-700">
                    Stock Status
                </label>
                <select 
                    id="status" 
                    name="status"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500 transition-all cursor-pointer"
                    required
                >
                    <option value="in_stock" selected>In Stock</option>
                    <option value="low_stock">Low Stock</option>
                    <option value="out_of_stock">Out of Stock</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="pt-6 flex gap-4">
                <a href="{{ route('inventory.index') }}" class="flex-1 px-4 py-3 border border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50 transition-colors text-sm font-semibold text-center">
                    Cancel
                </a>
                <button type="submit" class="flex-1 px-4 py-3 bg-slate-900 text-white rounded-xl hover:bg-slate-800 transition-all transform hover:scale-[1.02] text-sm font-semibold shadow-lg shadow-slate-900/20">
                    Save Asset
                </button>
            </div>

        </form>
    </div>

</div>

@endsection
