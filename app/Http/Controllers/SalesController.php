<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(Request $request)
    {
        // Mock Data - separate from InventoryController for now, but typically would come from a database
        $products = collect([
             [
                'name' => 'iPhone 15 Pro Max',
                'sku' => 'APL-IPH-15P-256',
                'price' => 145000,
                'category' => 'Electronics',
                'stock' => 12,
                'image_icon' => 'smartphone' // Lucide icon name
            ],
            [
                'name' => 'MacBook Pro 16"',
                'sku' => 'APL-MBP-16-M3',
                'price' => 345000,
                'category' => 'Electronics',
                'stock' => 5,
                'image_icon' => 'laptop'
            ],
            [
                'name' => 'Sony XM5 Headphones',
                'sku' => 'SNY-WH-1000XM5',
                'price' => 45000,
                'category' => 'Audio',
                'stock' => 25,
                'image_icon' => 'headphones'
            ],
            [
                'name' => 'Samsung S24 Ultra',
                'sku' => 'SAM-S24U-512',
                'price' => 185000,
                'category' => 'Electronics',
                'stock' => 0,
                'image_icon' => 'smartphone'
            ],
            [
                'name' => 'iPad Air 5',
                'sku' => 'APL-IPD-AIR-5G',
                'price' => 85000,
                'category' => 'Tablets',
                'stock' => 8,
                'image_icon' => 'tablet'
            ],
              [
                'name' => 'Dell XPS 15',
                'sku' => 'DEL-XPS-15-9530',
                'price' => 220000,
                'category' => 'Computers',
                'stock' => 3,
                'image_icon' => 'laptop'
            ],
        ]);

        // Search Logic
        if ($request->filled('search')) {
            $search = strtolower($request->search);
            $products = $products->filter(function ($item) use ($search) {
                return str_contains(strtolower($item['name']), $search) || 
                       str_contains(strtolower($item['sku']), $search);
            });
        }

        // Category Filter Logic
        if ($request->filled('category') && $request->category !== 'All') {
             $category = $request->category;
             $products = $products->filter(function ($item) use ($category) {
                return $item['category'] === $category;
            });
        }

        return view('sales', ['products' => $products]);
    }
}
