<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| dropshiper Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*************** Supplier *************/
Route::prefix('dropshiper')->name('dropshiper.')->group(function(){
    // Admin controller
    Route::get('/','Dropshiper\DropshiperController@index')->name('index')->middleware('auth:dropshiper','multiauthverified');
    Route::get('/dashboard','Dropshiper\DropshiperController@index')->name('dashboard')->middleware('auth:dropshiper','multiauthverified');
    // Login controler
    Route::get('/login','Dropshiper\Auth\LoginController@showloginform')->name('login');
    Route::post('/login','Dropshiper\Auth\LoginController@login')->name('login.submit');
    Route::post('/logout','Dropshiper\Auth\LoginController@logout')->name('logout');
    // Reset Password Controller
    Route::get('/password/reset','Dropshiper\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email','Dropshiper\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    //
    Route::get('/password/reset/{token}','Dropshiper\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset','Dropshiper\Auth\ResetPasswordController@reset')->name('password.update');
    // Register Controller
    Route::get('/register','Dropshiper\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register','Dropshiper\Auth\RegisterController@register');
    //
    Route::get('email/verify','Dropshiper\Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}','Dropshiper\Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend','Dropshiper\Auth\VerificationController@resend')->name('verification.resend');
});