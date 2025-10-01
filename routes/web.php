<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MedicineCategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;









Route::get('/',function(){
    return view('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
Route::resource('customers',CustomerController::class);







Route::resource('categories', MedicineCategoryController::class);

Route::get('/pos', [PosController::class, 'index'])->name('pos.index');

Route::resource('products', ProductController::class);


Route::resource('sales', SaleController::class);
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);                                                                                            