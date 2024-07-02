<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Seller Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*************** Seller *************/
Route::prefix('seller')->name('seller.')->group(function(){
    // Admin controller
    Route::get('/','Seller\SellerController@index')->name('index')->middleware('auth:seller','multiauthverified');
    Route::get('/dashboard','Seller\SellerController@index')->name('dashboard')->middleware('auth:seller','multiauthverified');
    // Login controler
    Route::get('/login','Seller\Auth\LoginController@showloginform')->name('login');
    Route::post('/login','Seller\Auth\LoginController@login')->name('login.submit');
    Route::post('/logout','Seller\Auth\LoginController@logout')->name('logout');
    // Reset Password Controller
    Route::get('/password/reset','Seller\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email','Seller\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    //
    Route::get('/password/reset/{token}','Seller\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset','Seller\Auth\ResetPasswordController@reset')->name('password.update');
    // Register Controller
    Route::get('/register','Seller\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register','Seller\Auth\RegisterController@register');
    //
    Route::get('email/verify','Seller\Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}','Seller\Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend','Seller\Auth\VerificationController@resend')->name('verification.resend');
});