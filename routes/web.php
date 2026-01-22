<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

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
