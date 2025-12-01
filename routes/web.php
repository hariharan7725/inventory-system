<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products', function () {
    return redirect('/index');
});

Route::resource('products', ProductController::class);

// Route::resource('products', ProductController::class);
// Route::get('/products', [ProductController::class, 'index']);

// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');


// Route::resource('products', ProductController::class);

// Route::post('/products/bulk', [ProductController::class, 'bulkInsert']);

