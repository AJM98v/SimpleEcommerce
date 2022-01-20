<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('/dashboard')->middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::resource('product',\App\Http\Controllers\ProductController::class)->except(['show']);
    Route::resource('category',\App\Http\Controllers\CategoryController::class)->except(['show','create']);
    Route::resource('tags',\App\Http\Controllers\TagController::class)->except(['show','create']);
    Route::resource('orders',\App\Http\Controllers\orderController::class)->only(['index']);
});

Route::get('product/{product}',[\App\Http\Controllers\ProductController::class,'show'])->name('product');
Route::get('checkout',[\App\Http\Controllers\CheckOutController::class,'index'])->name('checkout');


