<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [LogController::class,'index'])->name('log.index');
Route::get('/products', [ProductController::class,'index'])->name('product.index');
Route::post('/log', [LogController::class,'store'])->name('log.store');
Route::post('/product', [ProductController::class,'store'])->name('product.store');
Route::get('/reports', [LogController::class,'reports'])->name('log.report');
Route::get('/report', [LogController::class,'getreport'])->name('log.report');
Route::delete('/product/{id}', [ProductController::class,'destroy'])->name('product.destroy');

Route::get('/product/{id}/edit', [ProductController::class,'edit'])->name('product.show');
Route::patch('/product/{id}', [ProductController::class,'update'])->name('product.update');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.showmodal');
