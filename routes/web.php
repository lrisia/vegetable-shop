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
Route::get('/orders/{id}/cancel', [\App\Http\Controllers\OrderController::class, 'cancelOrder'])->name('orders.cancel');
Route::get('/orders/{id}/accept', [\App\Http\Controllers\OrderController::class, 'acceptOrder'])->name('orders.acceptOrder');
Route::get('/orders/{id}/paid', [\App\Http\Controllers\OrderController::class, 'paidOrder'])->name('orders.paid');
Route::get('/orders/{id}/take', [\App\Http\Controllers\OrderController::class, 'takeOrder'])->name('orders.take');
Route::get('/orders/ordering', [\App\Http\Controllers\OrderController::class, 'orderingPage'])->name('orders.ordering');
Route::get('/orders/accept', [\App\Http\Controllers\OrderController::class, 'acceptPage'])->name('orders.accept');
Route::get('/orders/denied', [\App\Http\Controllers\OrderController::class, 'deniedPage'])->name('orders.denied');
Route::get('/orders/waiting', [\App\Http\Controllers\OrderController::class, 'waitingPage'])->name('orders.waiting');
Route::get('/orders/done', [\App\Http\Controllers\OrderController::class, 'donePage'])->name('orders.done');
Route::get('/products/search', [\App\Http\Controllers\ProductController::class, 'search'])->name('products.search');
Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/employees', \App\Http\Controllers\EmployeeController::class);
Route::resource('/customers', \App\Http\Controllers\CustomerController::class);
Route::resource('/orders', \App\Http\Controllers\OrderController::class);
Route::resource('/orderlist', \App\Http\Controllers\OrderListController::class);
Route::resource('/receipts', \App\Http\Controllers\ReceiptController::class);
