<?php
use Illuminate\Http\Request;

use App\Http\Controllers\AdminController;


Route::resource('dashboard/', AdminController::class)->names([
    'index' => 'dashboard.index',
]);;
Route::get('dashboard/products',[AdminController::class, 'products'])->name('dashboard.products');
Route::get('dashboard/products/add',[AdminController::class, 'add'])->name('dashboard.add');
Route::post('dashboard/products/add',[AdminController::class, 'storeProduct'])->name('dashboard.storeProduct');
Route::get('dashboard/products/type',[AdminController::class, 'type'])->name('dashboard.type');
Route::delete('dashboard/products/type',[AdminController::class, 'destroyP'])->name('destroy.product');
Route::post('dashboard/products/type/add_key',[AdminController::class, 'add_key'])->name('add_key.product');
Route::post('dashboard/products/type/add_account',[AdminController::class, 'add_account'])->name('add_account0.product');
Route::get('dashboard/products/show/{id}',[AdminController::class, 'showP'])->name('product.showP');
Route::post('dashboard/products/edite',[AdminController::class, 'showPost'])->name('product.showPost');

Route::get('dashboard/Revenue',[AdminController::class, 'revenue'])->name('dashboard.Revenue');
Route::get('dashboard/order',[AdminController::class, 'order'])->name('dashboard.order');
Route::post('dashboard/order',[AdminController::class, 'orderN'])->name('dashboard.orderN');

