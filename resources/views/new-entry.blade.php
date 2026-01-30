@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#f8fafc] px-4 py-6">

    <div class="max-w-2xl mx-auto">
        
        <!-- HEADER -->
        <div class="mb-6">
            <a href="{{ route('dashboard') }}" class="text-sm text-slate-500 hover:text-slate-700 mb-2 inline-flex items-center gap-2">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Back to Dashboard
            </a>
            <h1 class="text-2xl font-bold text-slate-800 mt-3">
                New Transaction Entry
            </h1>
            <p class="text-sm text-slate-500 mt-1">
                Add a new transaction to the system
            </p>
        </div>

        <!-- FORM CARD -->
        <div class="glass-card">
            <form action="{{ route('dashboard.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Customer Name -->
                <div>
                    <label for="customer_name" class="block text-sm font-medium text-slate-700 mb-2">
                        Customer Name
                    </label>
                    <input 
                        type="text" 
                        id="customer_name" 
                        name="customer_name" 
                        value="{{ old('customer_name') }}"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 outline-none @error('customer_name') border-red-500 @enderror"
                        placeholder="Enter customer name"
                        required
                    >
                    @error('customer_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product -->
                <div>
                    <label for="product" class="block text-sm font-medium text-slate-700 mb-2">
                        Product
                    </label>
                    <input 
                        type="text" 
                        id="product" 
                        name="product" 
                        value="{{ old('product') }}"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 outline-none @error('product') border-red-500 @enderror"
                        placeholder="Enter product name"
                        required
                    >
                    @error('product')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Amount -->
                <div>
                    <label for="amount" class="block text-sm font-medium text-slate-700 mb-2">
                        Amount (Rs.)
                    </label>
                    <input 
                        type="number" 
                        id="amount" 
                        name="amount" 
                        value="{{ old('amount') }}"
                        step="0.01"
                        min="0"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 outline-none @error('amount') border-red-500 @enderror"
                        placeholder="0.00"
                        required
                    >
                    @error('amount')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-slate-700 mb-2">
                        Status
                    </label>
                    <select 
                        id="status" 
                        name="status"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 outline-none @error('status') border-red-500 @enderror"
                        required
                    >
                        <option value="">Select status</option>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex gap-3 pt-4">
                    <a href="{{ route('dashboard') }}" class="btn-outline flex-1 text-center">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary flex-1">
                        Save Entry
                    </button>
                </div>

            </form>
        </div>

    </div>

</div>

<style>
.glass-card {
    background: rgba(255,255,255,.7);
    backdrop-filter: blur(12px);
    border-radius: 12px;
    padding: 24px;
    border: 1px solid #e5e7eb;
}

.btn-primary {
    background: #2563eb;
    color: white;
    padding: 10px 18px;
    border-radius: 10px;
    font-weight: 600;
}

.btn-outline {
    border: 1px solid #cbd5f5;
    padding: 10px 18px;
    border-radius: 10px;
    color: #2563eb;
    font-weight: 600;
}
</style>

@endsection
