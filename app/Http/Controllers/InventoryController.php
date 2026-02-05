<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $assets = collect([
            [
                'name' => 'MacBook Pro 16"',
                'sku' => 'APL-MBP-16-M3',
                'price' => 345000,
                'stock' => 12,
                'status' => 'in_stock',
                'updated_at' => 'Today',
                'icon' => 'laptop'
            ],
            [
                'name' => 'iPad Air',
                'sku' => 'APL-IPD-AIR-5G',
                'price' => 85000,
                'stock' => 4,
                'status' => 'low_stock',
                'updated_at' => '2 days ago',
                'icon' => 'tablet'
            ],
            [
                'name' => 'Sony XM5',
                'sku' => 'SNY-WH-1000XM5',
                'price' => 32000,
                'stock' => 25,
                'status' => 'in_stock',
                'updated_at' => 'Yesterday',
                'icon' => 'headphones'
            ],
            [
                'name' => 'Samsung S24 Ultra',
                'sku' => 'SAM-S24U-512',
                'price' => 185000,
                'stock' => 0,
                'status' => 'out_of_stock',
                'updated_at' => '1 week ago',
                'icon' => 'smartphone'
            ],
            [
                'name' => 'Dell XPS 15',
                'sku' => 'DEL-XPS-15-9530',
                'price' => 220000,
                'stock' => 8,
                'status' => 'in_stock',
                'updated_at' => '3 days ago',
                'icon' => 'laptop'
            ],
        ]);

        if ($request->filled('search')) {
            $search = strtolower($request->search);
            $assets = $assets->filter(function ($item) use ($search) {
                return str_contains(strtolower($item['name']), $search) || 
                       str_contains(strtolower($item['sku']), $search);
            });
        }

        if ($request->filled('status') && $request->status !== 'all') {
            $assets = $assets->where('status', $request->status);
        }

        return view('inventory', ['assets' => $assets]);
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'asset_name' => 'required|string|max:255',
            'sku' => 'required|string|max:50', // unique logic would go here
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:in_stock,low_stock,out_of_stock',
        ]);

        // Database logic would go here.
        // Asset::create($validated);

        return redirect()->route('inventory.index')->with('success', 'Asset added successfully!');
    }
}
