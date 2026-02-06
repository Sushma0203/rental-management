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
                        <div class="relative group">
                            <input type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Search products..."
                                class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-2xl text-sm text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-rose-100 focus:border-rose-400 transition-all shadow-sm group-hover:shadow-md"
                                onchange="this.form.submit()">
                            <i data-lucide="search" class="absolute left-4 top-3.5 w-4 h-4 text-slate-400 group-hover:text-rose-400 transition-colors"></i>
                        </div>
                        
                        <!-- Retain category if exists -->
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                    </form>
                </div>
            </div>

            <!-- Categories -->
            <div class="flex items-center gap-3 mb-8 overflow-x-auto pb-2">
                @php
                    $categories = ['All', 'Electronics', 'Audio', 'Computers', 'Tablets'];
                    $currentCategory = request('category', 'All');
                @endphp
                
                @foreach($categories as $cat)
                    <a href="{{ route('sales', ['category' => $cat, 'search' => request('search')]) }}" 
                       class="relative px-6 py-2.5 rounded-2xl text-sm font-medium whitespace-nowrap transition-all duration-300 overflow-hidden group
                       {{ $currentCategory == $cat 
                           ? 'text-white shadow-lg shadow-rose-200 ring-1 ring-rose-300 ring-offset-1' 
                           : 'bg-white text-slate-500 border border-slate-100 shadow-sm hover:shadow-md hover:border-rose-100 hover:text-rose-600' }}">
                        
                        @if($currentCategory == $cat)
                            <div class="absolute inset-0 bg-gradient-to-br from-rose-400 to-purple-500"></div>
                        @endif

                        <span class="relative z-10">{{ $cat }}</span>
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
                        <button onclick="addToCart(@js($product))" class="px-3 py-2 rounded-lg text-xs font-medium hover:opacity-90 transition-opacity" style="background-color: rgb(227, 184, 252); color: #1f2937;">
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
            <!-- Items -->
            <div id="cart-items" class="flex-1 overflow-y-auto p-6 space-y-4">
                <!-- Cart items will be injected here via JS -->
                <div class="text-center text-slate-400 mt-10">
                    <p class="text-sm">Cart is empty</p>
                </div>
            </div>

            <!-- Totals -->
            <!-- Totals -->
            <div class="p-6 border-t space-y-4 bg-slate-50">
                <div class="flex justify-between text-sm">
                    <span>Subtotal</span>
                    <span id="cart-subtotal" class="font-semibold">Rs. 0</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span>VAT (13%)</span>
                    <span id="cart-vat" class="font-semibold">Rs. 0</span>
                </div>

                <div class="flex justify-between text-lg font-bold pt-3 border-t">
                    <span>Total</span>
                    <span id="cart-total">Rs. 0</span>
                </div>

                <button onclick="processPayment()" id="pay-btn" class="w-full mt-4 py-3 rounded-lg font-semibold hover:opacity-95 transition-opacity disabled:opacity-50 disabled:cursor-not-allowed" style="background-color: rgb(227, 184, 252); color: #1f2937;">
                    Process Payment
                </button>
            </div>

        </div>
    </div>
</div>

<script>
    let cart = [];

    function addToCart(product) {
        const existingItem = cart.find(item => item.sku === product.sku);
        if (existingItem) {
            existingItem.quantity++;
        } else {
            cart.push({ ...product, quantity: 1 });
        }
        updateCartUI();
    }

    function removeFromCart(sku) {
        cart = cart.filter(item => item.sku !== sku);
        updateCartUI();
    }

    function updateCartUI() {
        const container = document.getElementById('cart-items');
        const subtotalEl = document.getElementById('cart-subtotal');
        const vatEl = document.getElementById('cart-vat');
        const totalEl = document.getElementById('cart-total');

        // Clear container
        container.innerHTML = '';

        if (cart.length === 0) {
            container.innerHTML = `
                <div class="text-center text-slate-400 mt-10">
                    <p class="text-sm">Cart is empty</p>
                </div>
            `;
            subtotalEl.innerText = 'Rs. 0';
            vatEl.innerText = 'Rs. 0';
            totalEl.innerText = 'Rs. 0';
            return;
        }

        let subtotal = 0;

        cart.forEach(item => {
            const itemTotal = item.price * item.quantity;
            subtotal += itemTotal;

            const div = document.createElement('div');
            div.className = 'flex justify-between items-center mb-3 group';
            div.innerHTML = `
                <div>
                    <p class="font-medium text-slate-800 text-sm">${item.name}</p>
                    <p class="text-xs text-slate-500">Rs. ${item.price.toLocaleString()} × ${item.quantity}</p>
                </div>
                <div class="flex items-center gap-3">
                     <span class="font-semibold text-slate-800 text-sm">Rs. ${(itemTotal / 1000 >= 1 ? (itemTotal/1000).toFixed(1) + 'k' : itemTotal)}</span>
                     <button onclick="removeFromCart('${item.sku}')" class="text-slate-300 hover:text-red-500 transition-colors p-1">
                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                     </button>
                </div>
            `;
            container.appendChild(div);
        });

        const vat = subtotal * 0.13;
        const total = subtotal + vat;

        subtotalEl.innerText = 'Rs. ' + subtotal.toLocaleString();
        vatEl.innerText = 'Rs. ' + vat.toLocaleString();
        totalEl.innerText = 'Rs. ' + total.toLocaleString();

        // Refresh icons
        if (window.lucide) {
            lucide.createIcons();
        }
    }
    }

    async function processPayment() {
        if (cart.length === 0) return;

        const btn = document.getElementById('pay-btn');
        const originalText = btn.innerText;
        btn.disabled = true;
        btn.innerText = 'Processing...';

        try {
            const response = await fetch("{{ route('sales.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({ items: cart })
            });

            const data = await response.json();

            if (data.success) {
                alert('Payment Successful! Sale ID: ' + data.sale_id);
                cart = [];
                updateCartUI();
            } else {
                alert('Payment Failed: ' + (data.message || 'Unknown error'));
            }
        } catch (error) {
            console.error(error);
            alert('An error occurred while processing payment.');
        } finally {
            btn.disabled = false;
            btn.innerText = originalText;
        }
    }
</script>
@endsection
