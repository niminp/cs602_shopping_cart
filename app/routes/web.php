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

// Route::get('/', function () {
//     return "Hello World 1";
// });

// Route::get('/login', function () {
//     return "Hello World 1";
// });

Route::get('/', 'CartController@home');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::resource('products', 'ProductController');
Route::resource('orders', 'OrderController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
