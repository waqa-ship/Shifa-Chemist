<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MedicineCategoryController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('dashboard'); // This will load dashboard.blade.php
});

Route::resource('customers',CustomerController::class);



// optionally protect with auth:
// Route::resource('customers', CustomerController::class)->middleware('auth');



Route::resource('categories', MedicineCategoryController::class);

Route::get('/pos', [PosController::class, 'index'])->name('pos.index');

Route::resource('products', ProductController::class);