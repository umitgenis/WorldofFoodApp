<?php

use Illuminate\Support\Facades\Artisan;
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

Route::prefix('admin')->name('admin.')->group(function (){

    Route::get('/',[\App\Http\Controllers\Admin\indexController::class, 'index'])->name('index');

    Route::prefix('search')->name('search.')->group(function (){

    });

});

Route::get('/',[\App\Http\Controllers\Store\HomeController::class, 'index'])->name('index');

Auth::routes();

Route::prefix('store')->name('store.')->group(function (){

    Route::prefix('search')->name('search.')->group(function (){
        Route::get('/search', [\App\Http\Controllers\Store\SearchController::class, 'restaurant'])->name('restaurant');
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

    });

});




