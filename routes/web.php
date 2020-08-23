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

// Route::get('/', function () {
//     return view('master.master');
// });

Route::get('login', 'LoginController@getLogin');
Route::post('login', 'LoginController@postLogin')->name('login');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'products'], function () {
        Route::get('', 'ProductController@index')->name('products.index');
        Route::get('create', 'ProductController@create')->name('products.create');
        Route::post('', 'ProductController@store')->name('products.store');
    });
});