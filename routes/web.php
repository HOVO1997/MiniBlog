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

Route::get('locale/{locale}','PhoneController@locale')->name('locale');


Route::middleware(['set_locale'])->group(function (){

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/home', 'HomeController@home_page')->middleware('auth')->middleware('verified');

Route::get('/home/{id}', 'HomeController@get_prod')->where('id', '[0-9]+');


////////////////

        Route::middleware('auth')->middleware('adminChecker')->group(function (){

            Route::get('/admin', 'PhoneController@index');

            Route::get('/admin/{id}', 'PhoneController@show')->where('id', '[0-9]+');

            Route::get('/admin/create', 'PhoneController@create')->middleware('verified');

            Route::post('/admin/store', 'PhoneController@store');

            Route::get('/admin/edit/{id}', 'PhoneController@edit')->middleware('verified')->where('id', '[0-9]+');

            Route::put('/admin/update/{id}', 'PhoneController@update');

            Route::delete('/admin/destroy/{id}', 'PhoneController@destroy');
        });
//// Basket
Route::get('home/basket','BasketController@basket_view')->name('basket_view');
Route::post('home/{id}','BasketController@basket_add')->name('add_basket');
Route::post('home/basket/{id}','BasketController@basket_delete')->name('delete_basket');

    Route::get('/home/stripe',function (){
        return view('stripe');
    })->name('to_stripe');


    Route::post('stripe-payment', 'PaymentController@store')->name('stripe.store');
});

Route::get('/login/{website}', 'Auth\LoginController@LoginSocialite');
Route::get('/login/{website}/callback', 'Auth\LoginController@LoginSocialiteCallback');



