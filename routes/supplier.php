<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Supplier Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*************** Supplier *************/
Route::prefix('supplier')->name('supplier.')->group(function(){
    // Admin controller
    Route::get('/','Supplier\SupplierController@index')->name('index')->middleware('auth:supplier','multiauthverified');
    Route::get('/dashboard','Supplier\SupplierController@index')->name('dashboard')->middleware('auth:supplier','multiauthverified');
    // Login controler
    Route::get('/login','Supplier\Auth\LoginController@showloginform')->name('login');
    Route::post('/login','Supplier\Auth\LoginController@login')->name('login.submit');
    Route::post('/logout','Supplier\Auth\LoginController@logout')->name('logout');
    // Reset Password Controller
    Route::get('/password/reset','Supplier\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email','Supplier\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    //
    Route::get('/password/reset/{token}','Supplier\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset','Supplier\Auth\ResetPasswordController@reset')->name('password.update');
    // Register Controller
    Route::get('/register','Supplier\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register','Supplier\Auth\RegisterController@register');
    //
    Route::get('email/verify','Supplier\Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}','Supplier\Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend','Supplier\Auth\VerificationController@resend')->name('verification.resend');
});