<?php

use App\Http\Controllers\Select2Controller\getDataCustomerController;
use App\Http\Controllers\Select2Controller\getDataProductController;
use App\Http\Controllers\Datatables\getDataTableOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\orderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\Datatables\getDataTableProductController;
use App\Http\Controllers\Datatables\getDataTableCustumersController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/getDataCustomer', getDataTableCustumersController::class)->name('data.customer');
Route::get('/getDataProduct', getDataTableProductController::class)->name('data.product');
Route::get('/getDataOrder', getDataTableOrderController::class)->name('data.order');
Route::get('/customerSelect2', getDataCustomerController::class)->name('data.customer.select');
Route::get('/productSelect2', getDataProductController::class)->name('data.product.select');


Route::prefix('Customers')->group(function () {
    Route::get('/index', [customerController::class,'index'])->name('customer.index');
    Route::post('/create', [customerController::class,'create'])->name('customer.create');
    Route::get('/edit/{customer}', [customerController::class,'edit'])->name('customer.edit');
    Route::put('/edit/{customer}/update', [customerController::class,'update'])->name('customer.update');
    Route::get('/delete/{customer}', [customerController::class,'delete'])->name('customer.delete');
});

Route::prefix('product')->group(function () {
    Route::get('/index', [ProductController::class,'index'])->name('product.index');
    Route::post('/create', [ProductController::class,'create'])->name('product.create');
    Route::get('/edit/{product}', [ProductController::class,'edit'])->name('product.edit');
    Route::put('/edit/{product}/update', [ProductController::class,'update'])->name('product.update');
});

Route::prefix('order')->group(function () {
    Route::get('/index',[orderController::class,'index'])->name('order.index');
    Route::post('/create',[orderController::class,'create'])->name('order.create');
    Route::get('/show/{slug}',[orderController::class,'show'])->name('order.show');
});
