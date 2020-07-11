<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@home_page')->middleware('auth');

Route::get('/home/{id}', 'HomeController@get_prod')->where('id', '[0-9]+');


////////////////

        Route::middleware('auth')->middleware('adminChecker')->group(function (){

            Route::get('/admin', 'PhoneController@index');

            Route::get('/admin/{id}', 'PhoneController@show')->where('id', '[0-9]+');

            Route::get('/admin/create', 'PhoneController@create');

            Route::post('/admin/store', 'PhoneController@store');

            Route::get('/admin/edit/{id}', 'PhoneController@edit')->where('id', '[0-9]+');

            Route::put('/admin/update/{id}', 'PhoneController@update');

            Route::delete('/admin/destroy/{id}', 'PhoneController@destroy');
        });










