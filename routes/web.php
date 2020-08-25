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

Route::get('/', 'FrontController@getIndex')->name('front.index');
Route::get('/about', 'FrontController@getAbout')->name('front.about');
Route::get('/contact', 'FrontController@getContact')->name('front.contact');

Route::group(['prefix' => 'products'], function () {
    Route::get('/{id}','FrontController@showDetail')->name('product.detail');
    Route::get('{id}/add-to-cart', 'CartController@addCart')->name('cart.add');
});


Route::group(['prefix' => 'cart'], function () {
    Route::get('', 'CartController@getCart')->name('cart.index');
    Route::get('confirm', 'CartController@confirmCart')->name('cart.confirm');
    Route::post('payment', 'CartController@payment')->name('cart.payment');
    Route::get('payment', 'CartController@success')->name('cart.success');
});

Route::get('login', 'LoginController@getLogin');
Route::post('login', 'LoginController@postLogin')->name('login');

// Route::group(['middleware' => ['groupName']], function () {
    
// });

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'products'], function () {
        Route::get('', 'ProductController@index')->name('products.index');
        Route::get('create', 'ProductController@create')->name('products.create');
        Route::post('store', 'ProductController@store')->name('products.store');
        Route::get('{id}/edit', 'ProductController@edit')->name('products.edit');
        Route::post('{id}/update', 'ProductController@update')->name('products.update');
        Route::get('{id}/destroy', 'ProductController@destroy')->name('products.destroy');
    });

    Route::group(['prefix' => 'bills'], function () {
        Route::get('/', 'BillController@index')->name('bills.index');
        Route::get('/{id}/detail', 'BillController@detail')->name('bills.detail');
    });
    
});