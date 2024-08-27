<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\contactcontroller;
use App\Http\Controllers\homeproductcontroller;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;

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
// use App\Http\Controllers\ProductController;

Route::get('/products', [homeproductcontroller::class, 'index']);


Route::resource('category', CategoriesController::class);
// Route::resource('homeproduct', homeproductcontroller::class);
Route::resource('user', Usercontroller::class);
Route::resource('product', ProductsController::class);
Route::resource('contact', contactcontroller::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('layout.master');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
