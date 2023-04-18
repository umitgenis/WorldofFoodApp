<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::prefix('admin')->name('admin.')->group(function (){

    Route::get('/',[\App\Http\Controllers\Admin\indexController::class, 'index'])->name('index');

    Route::prefix('restaurant')->name('restaurant.')->group(function (){
        Route::get('/',[\App\Http\Controllers\Admin\RestaurantController::class,'index'])->name('index');
        Route::get('/create',[\App\Http\Controllers\Admin\RestaurantController::class,'create'])->name('create');
        Route::post('/store',[\App\Http\Controllers\Admin\RestaurantController::class,'store'])->name('store');
        Route::get('/edit/{id}',[\App\Http\Controllers\Admin\RestaurantController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[\App\Http\Controllers\Admin\RestaurantController::class,'update'])->name('update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\RestaurantController::class,'delete'])->name('delete');
        Route::get('/status/{id}',[\App\Http\Controllers\Admin\RestaurantController::class,'status'])->name('status');
    });

    Route::prefix('category')->name('category.')->group(function (){
        Route::get('/{restaurant_id}',[\App\Http\Controllers\Admin\CategoryController::class,'index'])->name('index');
        Route::get('/create/{restaurant_id}',[\App\Http\Controllers\Admin\CategoryController::class,'create'])->name('create');
        Route::post('/store/{restaurant_id}',[\App\Http\Controllers\Admin\CategoryController::class,'store'])->name('store');
        Route::get('/edit/{category_id}',[\App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('edit');
        Route::post('/update/{category_id}',[\App\Http\Controllers\Admin\CategoryController::class,'update'])->name('update');
        Route::get('/delete/{category_id}',[\App\Http\Controllers\Admin\CategoryController::class,'delete'])->name('delete');
    });

    Route::prefix('product')->name('product.')->group(function (){
        Route::get('/create/{restaurant_id}/{category_id}',[\App\Http\Controllers\Admin\ProductController::class,'create'])->name('create');
        Route::post('/store/{restaurant_id}/{category_id}',[\App\Http\Controllers\Admin\ProductController::class,'store'])->name('store');
        Route::get('/edit/{product_id}',[\App\Http\Controllers\Admin\ProductController::class,'edit'])->name('edit');
        Route::post('/update/{product_id}',[\App\Http\Controllers\Admin\ProductController::class,'update'])->name('update');
        Route::get('/delete/{product_id}',[\App\Http\Controllers\Admin\ProductController::class,'delete'])->name('delete');
        Route::get('/{restaurant_id}/{category_id}',[\App\Http\Controllers\Admin\ProductController::class,'index'])->name('index');
    });
    Route::prefix('order')->name('order.')->group(function (){

        Route::get('/detail/{order_number}',[\App\Http\Controllers\Admin\OrderController::class,'detail'])->name('detail');
        Route::get('/order-items/{order_id}',[\App\Http\Controllers\Admin\OrderController::class,'orderItems'])->name('orderItems');
        Route::get('/status/{order_id}',[\App\Http\Controllers\Admin\OrderController::class,'status'])->name('status');
        Route::get('/',[\App\Http\Controllers\Admin\OrderController::class,'index'])->name('index');
    });

});


Route::get('/',[\App\Http\Controllers\Store\HomeController::class, 'index'])->name('index');



Route::prefix('store')->name('store.')->group(function (){

    Route::prefix('search')->name('search.')->group(function (){
        Route::get('/searchCity', [\App\Http\Controllers\Store\SearchController::class, 'city'])->name('city');
    });

    Route::prefix('restaurant')->name('restaurant.')->group(function (){
        Route::get('/{id}', [\App\Http\Controllers\Store\RestaurantController::class, 'detail'])->name('detail');

    });

    Route::prefix('profile')->name('profile.')->middleware('auth')->group(function (){
        Route::get('/detail/{id}', [\App\Http\Controllers\Store\ProfileController::class, 'detail'])->name('detail');
        Route::get('/address/{id}', [\App\Http\Controllers\Store\ProfileController::class, 'address'])->name('address');
        Route::post('/update-password', [\App\Http\Controllers\Store\ProfileController::class, 'updatePassword'])->name('update-password');
        Route::post('/update-profile/{id}', [\App\Http\Controllers\Store\ProfileController::class, 'update'])->name('update');
        Route::post('/add-address/{id}', [\App\Http\Controllers\Store\ProfileController::class, 'address_add'])->name('address_add');
        Route::post('/update-address/{address_id}', [\App\Http\Controllers\Store\ProfileController::class, 'address_update'])->name('address_update');
        Route::get('/delete-address/{address_id}', [\App\Http\Controllers\Store\ProfileController::class, 'address_delete'])->name('address_delete');
        Route::post('/current-location', [\App\Http\Controllers\Store\ProfileController::class, 'changeAddress'])->name('changeAddress');

    });

    Route::prefix('cart')->name('cart.')->middleware('auth')->group(function (){
        Route::get('/add/{product_id}/{quantity}', [\App\Http\Controllers\Store\CartController::class, 'addItem'])->name('add');
        Route::get('/empty', [\App\Http\Controllers\Store\CartController::class, 'empty'])->name('empty');
        Route::get('/detail', [\App\Http\Controllers\Store\CartController::class, 'detail'])->name('detail');
        Route::get('/test', [\App\Http\Controllers\Store\CartController::class, 'test'])->name('test');
    });

    Route::prefix('checkout')->name('checkout.')->middleware('auth')->group(function (){
        Route::post('/', [\App\Http\Controllers\Store\CheckoutController::class, 'index'])->name('index');
    });



});




