<?php

use Illuminate\Routing\Route as RoutingRoute;
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
    return view('home');
});
Route::get('/products/search', [\App\Http\Controllers\ProductController::class, 'search'])->name('products.search');
Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/employees', \App\Http\Controllers\EmployeeController::class);
Route::resource('/customers', \App\Http\Controllers\CustomerController::class);
Route::resource('/orders', \App\Http\Controllers\OrderController::class);
Route::resource('/orderlist', \App\Http\Controllers\OrderListController::class);
Route::resource('/receipts', \App\Http\Controllers\ReceiptController::class);
