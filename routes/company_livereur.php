<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| company-livereur Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*************** Supplier *************/
Route::prefix('company-livereur')->name('company-livereur.')->group(function(){
    // Admin controller
    Route::get('/','CompanyLivereur\CompanyLivereurController@index')->name('index')->middleware('auth:company_livereur','multiauthverified');
    Route::get('/dashboard','CompanyLivereur\CompanyLivereurController@index')->name('dashboard')->middleware('auth:company_livereur','multiauthverified');
    // Login controler
    Route::get('/login','CompanyLivereur\Auth\LoginController@showloginform')->name('login');
    Route::post('/login','CompanyLivereur\Auth\LoginController@login')->name('login.submit');
    Route::post('/logout','CompanyLivereur\Auth\LoginController@logout')->name('logout');
    // Reset Password Controller
    Route::get('/password/reset','CompanyLivereur\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email','CompanyLivereur\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    //
    Route::get('/password/reset/{token}','CompanyLivereur\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset','CompanyLivereur\Auth\ResetPasswordController@reset')->name('password.update');
    // Register Controller
    Route::get('/register','CompanyLivereur\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register','CompanyLivereur\Auth\RegisterController@register');
    //
    Route::get('email/verify','CompanyLivereur\Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}','CompanyLivereur\Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend','CompanyLivereur\Auth\VerificationController@resend')->name('verification.resend');
});