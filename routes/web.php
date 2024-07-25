<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\frontend\HomeController::class, 'index']);
//Route::get('/', [\App\Http\Controllers\frontend\HomeController::class, 'index']);

// send Form
Route::post('sendform', [\App\Http\Controllers\OrderController::class, 'send'])->name('send-form');
//Product Details
Route::get('/product-details/{id}', [\App\Http\Controllers\frontend\ProductController::class, 'index'])->name('product-details');

//Route Categories Page
Route::get('/category/{id}', [\App\Http\Controllers\frontend\ProductController::class, 'showCategoryProducts'])->name('category.products');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
