<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    //Auth Routes
    Route::get('login', [\App\Http\Controllers\Admin\AdminAuthController::class, 'login'])->name('login');

    Route::post('login', [\App\Http\Controllers\Admin\AdminAuthController::class, 'handleLogin'])->name('handle-login');

    Route::post('logout', [\App\Http\Controllers\Admin\AdminAuthController::class, 'logout'])->name('logout');
});


// Protected Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {

    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    // Route Categories
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);

    // Route Products
    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
    Route::get('product/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'show'])->name('product.show');

    // Route Orders
    Route::resource('order', \App\Http\Controllers\Admin\AdminOrderController::class);
    // Route Boxes
    Route::resource('boxs', \App\Http\Controllers\Admin\AdminBoxController::class);
    // Route update Status
    Route::get('update-status/{id}/{status}', [\App\Http\Controllers\Admin\AdminOrderController::class, 'updateStatus'])->name('order.updateStatus');
    // Route Boxes
    Route::resource('clients', \App\Http\Controllers\Admin\ClientController::class);
    //Route company footer
    Route::resource('company', \App\Http\Controllers\Admin\CompanyController::class);


});
