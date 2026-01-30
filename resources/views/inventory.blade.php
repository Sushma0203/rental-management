@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 px-4 py-6 space-y-8">

    <!-- HEADER -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div>
            <p class="text-xs uppercase tracking-widest text-slate-400 mb-1">
                Inventory
            </p>
            <h1 class="text-2xl font-semibold text-slate-800">
                Asset Management
            </h1>
        </div>

        <div class="flex gap-3">
            <button class="btn-outline">Filter</button>
            <button class="btn-primary">+ Add Asset</button>
        </div>
    </div>

    <!-- STATS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="stat-card">
            <p>Total Inventory</p>
            <h3>12,845</h3>
        </div>
        <div class="stat-card text-rose-600">
            <p>Low Stock</p>
            <h3>14</h3>
        </div>
        <div class="stat-card">
            <p>Active SKUs</p>
            <h3>2,140</h3>
        </div>
    </div>

    <!-- TABLE -->
    <div class="card overflow-hidden">

        <div class="p-6 border-b flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-semibold text-slate-800">
                    Asset Catalog
                </h3>
                <p class="text-sm text-slate-500">
                    Manage inventory items
                </p>
            </div>

            <input
                type="text"
                placeholder="Search assets…"
                class="search-input"
            />
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-100 text-slate-500">
                    <tr>
                        <th>Asset</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Updated</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    <tr>
                        <td>
                            <p class="font-medium">MacBook Pro 16"</p>
                            <span class="muted">APL-MBP-16-M3</span>
                        </td>
                        <td>Rs. 3,45,000</td>
                        <td><span class="badge green">In Stock</span></td>
                        <td>Today</td>
                        <td>⋯</td>
                    </tr>

                    <tr>
                        <td>
                            <p class="font-medium">iPad Air</p>
                            <span class="muted">APL-IPD-AIR-5G</span>
                        </td>
                        <td>Rs. 85,000</td>
                        <td><span class="badge amber">Low</span></td>
                        <td>2 days ago</td>
                        <td>⋯</td>
                    </tr>

                    <tr>
                        <td>
                            <p class="font-medium">Sony XM5</p>
                            <span class="muted">SNY-WH-1000XM5</span>
                        </td>
                        <td>Rs. 32,000</td>
                        <td><span class="badge blue">Good</span></td>
                        <td>Yesterday</td>
                        <td>⋯</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t flex justify-between items-center">
            <span class="text-sm text-slate-500">
                Showing 1–10 of 2,140
            </span>
            <div class="flex gap-2">
                <button class="btn-outline">Prev</button>
                <button class="btn-primary">Next</button>
            </div>
        </div>

    </div>

</div>

<style>
.card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
}

.stat-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 14px;
}
.stat-card p {
    font-size: 0.75rem;
    text-transform: uppercase;
    color: #64748b;
}
.stat-card h3 {
    font-size: 1.75rem;
    font-weight: 600;
    color: #1f2937;
}

.search-input {
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 8px 12px;
    font-size: 0.9rem;
}

.btn-primary {
    background: #2563eb;
    color: #fff;
    padding: 8px 14px;
    border-radius: 8px;
    font-weight: 500;
}

.btn-outline {
    border: 1px solid #cbd5e1;
    padding: 8px 14px;
    border-radius: 8px;
    color: #334155;
}

.badge {
    padding: 3px 8px;
    border-radius: 999px;
    font-size: 0.7rem;
    font-weight: 600;
}
.green { background:#dcfce7; color:#166534; }
.amber { background:#fef3c7; color:#92400e; }
.blue { background:#dbeafe; color:#1e40af; }

th, td {
    padding: 14px 16px;
    text-align: left;
}

.muted {
    font-size: 0.75rem;
    color: #94a3b8;
}
</style>

@endsection
