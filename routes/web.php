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
Route::resource('products', ProductController::class);
Route::resource('clients', ClientController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('sales', SaleController::class);
Route::resource('returns', ReturnController::class);
Route::resource('analytics', AnalyticsController::class);
