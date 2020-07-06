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

Route::redirect('/home', '/redirect')->name('home');
Route::get('/redirect', 'RedirectController')->name('dashboard');

Route::resource('product', 'ProductController');
Route::resource('users', 'UserController');
Route::resource('fault', 'FaultController');
Route::group(['prefix' => 'customer','as' => 'customer.'], function () {
    Route::get('/orders','CustomerController@orders')->name('orders');
    Route::get('/fix-gadgets','CustomerController@fix')->name('fix');
    Route::get('/buy', 'CustomerController@buy')->name('buy');
    Route::get('/faulty-gadgets','CustomerController@faultyGadgets')->name('faults');
    Route::get('/order-details','CustomerController@showOrder')->name('order-details');
    Route::get('/expert-details/{fid}','CustomerController@showExperts')->name('expert-details');
});

Route::group(['prefix' => 'admin','as' => 'admin.'], function () {
    Route::get('/dashboard','AdminController@index')->name('dashboard');
});
