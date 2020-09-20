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

Route::get('/', 'HomeController@index')->name('/');
Route::get('/detail/{slug}', 'DetailController@index')->name('detail');
Route::post('/checkout/{id}', 'CheckoutsController@store')
        ->name('checkout_process')
        ->middleware(['auth']);

Route::get('/checkout/{id}', 'CheckoutsController@index')
        ->name('checkout')
        ->middleware(['auth']);

Route::post('/checkout/create/{detail_id}', 'CheckoutsController@create')
        ->name('checkout-create')
        ->middleware(['auth']);

Route::get('/checkout/remove/{detail_id}', 'CheckoutsController@destroy')
        ->name('checkout-remove')
        ->middleware(['auth']);

Route::get('/checkout/confirm/{id}', 'CheckoutsController@success')
        ->name('checkout-success')
        ->middleware(['auth']);

// Route::get('/checkout', 'CheckoutsController@index')->name('checkout');
// Route::get('/checkout/success', 'CheckoutsController@success')->name('success');

//tidak lagi memanggil nama folder
Route::prefix('admin')
        ->namespace('Admin')
        ->middleware(['auth','admin'])
        ->group(function(){
            Route::get('dashboard', 'DashboardController@index')->name('dashboard');
            Route::resource('travel-package', 'TravelPackageController');
            Route::resource('gallery', 'GalleryController');
            Route::resource('transaction', 'TransactionController');
        });
            // ['verify' => true] ferifikasi email dari model user
Auth::routes(['verify' => true]);

