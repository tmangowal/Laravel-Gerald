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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product', 'ProductsController@index')->name('product');
Route::get('/product/detail/{id}', 'ProductsController@detail')->name('productDetail');

Route::get('/cart/{userId}', 'CartsController@index')->name('cart');
Route::get('/cart/edit/{cartId}', 'CartsController@editCart')->name('cartEdit');
Route::get('/cart', 'CartsController@edit')->name('updateCart');
Route::get('/deleteCart', 'CartsController@destroy')->name('destroyCart');
Route::post('/cart/store', 'ProductsController@addToCart')->name('productStore');

Route::post('/transaction', 'TransactionsController@create')->name('createTransaction');

Route::get('/admin/product', 'AdminController@index')->middleware('isAdmin');
Route::get('/admin/product/edit/{productId}', 'AdminController@editProduct')->middleware('isAdmin');
Route::get('/admin/product/edit', 'AdminController@editProductDB')->middleware('isAdmin');
Route::post('/admin/product', 'AdminController@createProduct')->middleware('isAdmin');
Route::get('/admin/product/delete/{productId}', 'AdminController@deleteProduct')->middleware('isAdmin');
