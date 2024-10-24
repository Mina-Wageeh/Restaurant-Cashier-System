<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('get-products-by-category/{categoryID}', [ProductController::class, 'getProductsByCategory'])->name('get.products.by.category');
Route::get('get-all-products', [ProductController::class, 'getAllProducts'])->name('get.all.products');
Route::get('get-product', [ProductController::class, 'getProduct'])->name('get.product');
