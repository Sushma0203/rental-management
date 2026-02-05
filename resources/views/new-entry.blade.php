@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">
    
    <!-- HEADER -->
    <div class="mb-8">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-800 transition-colors mb-3 font-medium">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Back to Dashboard
        </a>
        <h1 class="text-3xl font-bold text-slate-800 tracking-tight">
            New Transaction Entry
        </h1>
        <p class="text-slate-500 mt-2">
            Record a new sale or inventory movement in the system.
        </p>
    </div>

    <!-- FORM CARD -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-8">
        <form action="{{ route('dashboard.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Customer Name -->
            <div class="space-y-2">
                <label for="customer_name" class="block text-sm font-semibold text-slate-700">
                    Customer Name
                </label>
                <input 
                    type="text" 
                    id="customer_name" 
                    name="customer_name" 
                    value="{{ old('customer_name') }}"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500 transition-all @error('customer_name') border-red-500 bg-red-50 text-red-900 @enderror"
                    placeholder="Enter customer name"
                    required
                >
                @error('customer_name')
                    <p class="text-red-500 text-xs flex items-center gap-1">
                        <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Product -->
            <div class="space-y-2">
                <label for="product" class="block text-sm font-semibold text-slate-700">
                    Product
                </label>
                <select 
                    id="product" 
                    name="product" 
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500 transition-all appearance-none"
                    required
                >
                    <option value="" disabled selected>Select a product...</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Monitor">Monitor</option>
                    <option value="Keyboard">Keyboard</option>
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Amount -->
                <div class="space-y-2">
                    <label for="amount" class="block text-sm font-semibold text-slate-700">
                        Amount (Rs.)
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-medium text-sm">Rs.</span>
                        <input 
                            type="number" 
                            id="amount" 
                            name="amount" 
                            value="{{ old('amount') }}"
                            step="0.01"
                            min="0"
                            class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500 transition-all font-mono"
                            placeholder="0.00"
                            required
                        >
                    </div>
                </div>

                <!-- Status -->
                <div class="space-y-2">
                    <label for="status" class="block text-sm font-semibold text-slate-700">
                        Status
                    </label>
                    <select 
                        id="status" 
                        name="status"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500 transition-all cursor-pointer"
                        required
                    >
                        <option value="">Select status</option>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
                    </select>
                </div>
            </div>

            <!-- Buttons -->
            <div class="pt-6 flex gap-4">
                <a href="{{ route('dashboard') }}" class="flex-1 px-4 py-3 border border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50 transition-colors text-sm font-semibold text-center">
                    Cancel
                </a>
                <button type="submit" class="flex-1 px-4 py-3 bg-slate-900 text-white rounded-xl hover:bg-slate-800 transition-all transform hover:scale-[1.02] text-sm font-semibold shadow-lg shadow-slate-900/20">
                    Save Entry
                </button>
            </div>

        </form>
    </div>

</div>

@endsection
