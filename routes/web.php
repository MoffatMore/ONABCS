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

Route::get('/', function(){
    return view('home');
});

Auth::routes();

Route::redirect('/home', '/redirect')->name('home');
Route::get('/redirect', 'RedirectController')->name('dashboard');

Route::resource('product', 'ProductController');
Route::resource('users', 'UserController');
Route::resource('fault', 'FaultController');
Route::resource('order', 'OrderController');
Route::resource('rating', 'RatingController');

Route::group(['prefix' => 'customer','as' => 'customer.'], function () {
    Route::post('/mark-as-read', 'HomeController@markNotification')->name('markNotification');
    Route::get('/orders','CustomerController@orders')->name('orders');
    Route::get('/fix-gadgets','CustomerController@fix')->name('fix');
    Route::get('/delete/{order}', 'CustomerController@deleteOrder')->name('deleteOrder');
    Route::get('/buy', 'CustomerController@buy')->name('buy');
    Route::get('/rate/{expert}/{fault}','CustomerController@rateExpert')->name('rateExpert');
    Route::get('/faulty-gadgets','CustomerController@faultyGadgets')->name('faults');
    Route::get('/order-details/{product}','CustomerController@showOrder')->name('order-details');
    Route::get('/expert-details/{fid}','CustomerController@showExperts')->name('expert-details');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.',], function () {

    Route::get('/dashboard','AdminController@index')->name('dashboard');
    Route::get('/orders','AdminController@orders')->name('orders');
    Route::get('/products','AdminController@products')->name('products');
    Route::get('/registered/users','AdminController@users')->name('users');

    Route::get('/registered/users','AdminController@users')->name('users');
    Route::get('/delete/{product}','AdminController@deleteProduct')->name('deleteProduct');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
});

Route::group(['prefix'=>'expert','as'=>'expert.'],function (){
    Route::get('/requests','ExpertController@requests')->name('requests');
    Route::get('/ratings','ExpertController@ratings')->name('ratings');
});
