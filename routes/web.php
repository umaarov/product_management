<?php

use App\Http\Controllers\AnalyticsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReturnController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', CategoryController::class);

Route::resource('products', ProductController::class)->only(['index', 'edit', 'update', 'destroy']);
Route::get('/products/suppliers', [ProductController::class, 'showSupplierProducts'])->name('products.supplierProducts');
Route::post('/products/{product}/purchase-from-supplier', [ProductController::class, 'purchaseFromSupplier'])->name('products.purchaseFromSupplier');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::resource('clients', ClientController::class);

Route::resource('suppliers', SupplierController::class);
Route::get('/suppliers/{supplier}/add-product', [SupplierController::class, 'addProduct'])->name('suppliers.addProduct');
Route::post('/suppliers/{supplier}/store-product', [SupplierController::class, 'storeProduct'])->name('suppliers.storeProduct');

Route::resource('sales', SaleController::class);
