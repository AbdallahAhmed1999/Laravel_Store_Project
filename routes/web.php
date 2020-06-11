<?php

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
Route::redirect('/', '/home', 301);

Auth::routes();

//home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop', 'HomeController@products')->name('shop');
Route::get('/products/{product}', 'HomeController@showProduct')->name('product.show');

//cart
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('cart/{product}', 'CartController@addProduct')->name('cart.addProduct');
Route::delete('cart/{product}', 'CartController@delete')->name('cart.deleteProduct');

//orders
Route::get('orders', 'OrderController@index')->middleware('auth')->name('orders');
Route::get('orders/history', 'OrderController@history')->middleware('auth')->name('orders.history');
Route::get('orders/canceled', 'OrderController@canceled')->middleware('auth')->name('orders.canceled');
Route::post('orders', 'OrderController@store')->middleware('auth')->name('orders.store');
Route::delete('orders/{order}', 'OrderController@cancel')->middleware('auth')->name('orders.cancel');


//admin
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

    Route::resource('products', 'Admin\ProductController')->except('show');

    Route::resource('categories', 'Admin\CategoryController')->except(['show', 'create', 'edit']);

    Route::resource('roles', 'Admin\RolesController')->except('show');

    Route::resource('users', 'Admin\UsersController')->except(['show', 'create', 'store']);

    Route::get('orders/pending', 'Admin\OrderController@pending')->name('orders.pending');
    Route::get('orders/delivered', 'Admin\OrderController@delivered')->name('orders.delivered');
    Route::get('orders/canceled', 'Admin\OrderController@canceled')->name('orders.canceled');
    Route::get('orders/{order}','Admin\OrderController@show')->name('orders.show');
    Route::put('orders/{order}','Admin\OrderController@update')->name('orders.update');
});
