<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return view('inventory');
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
