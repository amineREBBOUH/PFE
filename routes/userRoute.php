<?php
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
   Route::resource('store/', UserController::class);
     //store
     Route::post('/store/filter',[UserController::class, 'filterCategory'])->name('store.filter');

     Route::get('/store/shopping_cart',[UserController::class, 'shopping_cart'])->name('store.shopping.cart');
     Route::post('/store/add_to__cart',[UserController::class, 'add_to_cart'])->name('store.add_to.cart');

    //  Route::get('/store/shopping_cart',function (Request $req)
    //  {
    //      return view('store.cart');
    //  })->name('store.shopping.cart');
    Route::get('/store/wichlist',[UserController::class, 'wichlist'])->name('store.wichlist');

    //   Route::get('/store/wichlist',function (Request $req)
    //  {
    //      return view('store.wichlist');
    //  })->name('store.wichlist');
    Route::get('/store/categories/{type}',[UserController::class, 'categories'])->name('store.categories');

    //  Route::get('/store/categories',function (Request $req)
    //  {
    //      return view('store.category');
    //  })->name('store.categories');
    Route::get('/store/seeting',[UserController::class, 'seeting'])->name('store.seeting');
    Route::post('/store/seeting',[UserController::class, 'seetingPost'])->name('store.seetingPost');

    //  Route::get('/store/seeting',function (Request $req)
    //  {
    //      return view('store.seeting.accountInfo');
    //  })->name('store.seeting');
    Route::get('/store/seeting/password',[UserController::class, 'password'])->name('store.password');
    Route::post('/store/seeting/password',[UserController::class, 'passwordPost'])->name('store.passwordPost');

    //  Route::get('/store/seeting/password',function (Request $req)
    //  {
    //      return view('store.seeting.password');
    //  })->name('store.password');
    Route::get('/store/search',[UserController::class, 'search'])->name('store.search');

    //  Route::get('/store/search',function (Request $req)
    //  {
    //      return view('store.search');
    //  })->name('store.search');
    Route::post('/store/chekout',[UserController::class, 'chekout'])->name('store.chekout');
    Route::post('/store/removeAll',[UserController::class, 'removeAll'])->name('store.removeAll');
    Route::post('/store/removeItem',[UserController::class, 'removeItem'])->name('store.removeItem');

    Route::get('/store/success',[UserController::class, 'success'])->name('store.success');

    Route::get('/store/cancel',[UserController::class, 'cancel'])->name('store.cancel');
    Route::post('/store/order',[UserController::class, 'order'])->name('store.order');


