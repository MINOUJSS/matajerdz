<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| local-livereur Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*************** Supplier *************/
Route::prefix('local-livereur')->name('local-livereur.')->group(function(){
    // Admin controller
    Route::get('/','LocalLivereur\LocalLivereurController@index')->name('index')->middleware('auth:local_livereur','multiauthverified');
    Route::get('/dashboard','LocalLivereur\LocalLivereurController@index')->name('dashboard')->middleware('auth:local_livereur','multiauthverified');
    // Login controler
    Route::get('/login','LocalLivereur\Auth\LoginController@showloginform')->name('login');
    Route::post('/login','LocalLivereur\Auth\LoginController@login')->name('login.submit');
    Route::post('/logout','LocalLivereur\Auth\LoginController@logout')->name('logout');
    // Reset Password Controller
    Route::get('/password/reset','LocalLivereur\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email','LocalLivereur\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    //
    Route::get('/password/reset/{token}','LocalLivereur\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset','LocalLivereur\Auth\ResetPasswordController@reset')->name('password.update');
    // Register Controller
    Route::get('/register','LocalLivereur\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register','LocalLivereur\Auth\RegisterController@register');
    //
    Route::get('email/verify','LocalLivereur\Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}','LocalLivereur\Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend','LocalLivereur\Auth\VerificationController@resend')->name('verification.resend');
});