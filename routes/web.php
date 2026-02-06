<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\InventoryController;

// Dashboard routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/export', [DashboardController::class, 'export'])->name('dashboard.export');
Route::get('/dashboard/new-entry', [DashboardController::class, 'showNewEntryForm'])->name('dashboard.new-entry');
Route::post('/dashboard/new-entry', [DashboardController::class, 'storeEntry'])->name('dashboard.store');

// Inventory Routes
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');

Route::get('/sales', [App\Http\Controllers\SalesController::class, 'index'])->name('sales');

Route::get('/analytics', function () {
    return view('analytics');
})->name('analytics');

Route::get('/customers', function () {
    // Placeholder for customers
    return view('welcome'); 
})->name('customers');
