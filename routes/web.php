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
//     return view('welcome');
// });



Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
//test chrgily payment
Route::post('chargilypay/redirect','Admin\ChargilyPayController@redirect')->name("chargilypay.redirect");
Route::get('chargilypay/payments/success','Admin\ChargilyPayController@success')->name("chargilypay.payments.success");
Route::post('chargilypay/webhook','Admin\ChargilyPayController@webhook')->name("chargilypay.webhook_endpoint");