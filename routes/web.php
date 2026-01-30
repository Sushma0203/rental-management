<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Dashboard routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/export', [DashboardController::class, 'export'])->name('dashboard.export');
Route::get('/dashboard/new-entry', [DashboardController::class, 'showNewEntryForm'])->name('dashboard.new-entry');
Route::post('/dashboard/new-entry', [DashboardController::class, 'storeEntry'])->name('dashboard.store');

Route::get('/inventory', function () {
    return view('inventory');
})->name('inventory');

Route::get('/sales', function () {
    return view('sales');
})->name('sales');

Route::get('/analytics', function () {
    return view('analytics');
})->name('analytics');

Route::get('/customers', function () {
    // Placeholder for customers
    return view('welcome'); 
})->name('customers');
