<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function export()
    {
        // Sample data - replace with actual database queries
        $data = [
            ['Ref' => '#8291', 'Customer' => 'Bhuwan KC', 'Product' => 'MacBook', 'Status' => 'Done', 'Amount' => '12,900'],
            ['Ref' => '#8292', 'Customer' => 'Sarah S', 'Product' => 'AirPods', 'Status' => 'Pending', 'Amount' => '4,500'],
            ['Ref' => '#8293', 'Customer' => 'Sulav S', 'Product' => 'iPad', 'Status' => 'Done', 'Amount' => '8,200'],
        ];

        $filename = 'dashboard_export_' . date('Y-m-d_His') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($data) {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($file, ['Reference', 'Customer', 'Product', 'Status', 'Amount (Rs.)']);
            
            // Add data rows
            foreach ($data as $row) {
                fputcsv($file, $row);
            }
            
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function showNewEntryForm()
    {
        return view('new-entry');
    }

    public function storeEntry(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,done',
        ]);

        // Here you would typically save to database
        // For now, we'll just redirect back with success message
        
        return redirect()->route('dashboard')->with('success', 'Entry added successfully!');
    }
}
