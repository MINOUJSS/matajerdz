<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Super Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/********* supper admin demo ************ */
Route::prefix('demo/super-admin')->group(function(){
    Route::get('/','Admin\AdminController@index')->name('super-admin.home');
});
/*************** Supper Admin *************/
Route::prefix('super-admin')->name('super-admin.')->group(function(){
    // Login controler
    Route::get('/login','Admin\Auth\LoginController@showloginform')->name('login');
    Route::post('/login','Admin\Auth\LoginController@login')->name('login.submit');
    Route::post('/logout','Admin\Auth\LoginController@logout')->name('logout');
    // Reset Password Controller
    Route::get('/password/reset','Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email','Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    //
    Route::get('/password/reset/{token}','Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset','Admin\Auth\ResetPasswordController@reset')->name('password.update');
    // Admin controller
    Route::middleware('auth:super_admin')->group(function(){
    //dashboard
    Route::get('/','Admin\AdminController@index')->name('index');
    Route::get('/dashboard','Admin\AdminController@index')->name('dashboard');
    //suppliers
    Route::get('/suppliers','Admin\SupplierController@index')->name('suppliers');
    Route::delete('/supplier/destroy/{id}','Admin\SupplierController@destroy')->name('supplier.destroy');
    Route::post('/supplier/ban/{id}','Admin\SupplierController@banSupplier')->name('supplier.ban');
    Route::post('/supplier/unban/{id}','Admin\SupplierController@unbanSupplier')->name('supplier.unban');
    Route::get('/supplier/search','Admin\SupplierController@search')->name('supplier.search');
    Route::get('/supplier/{email}','Admin\SupplierController@supplier')->name('supplier');
    //sellers
    Route::get('/sellers','Admin\SellerController@index')->name('sellers');
    Route::delete('/seller/destroy/{id}','Admin\SellerController@destroy')->name('seller.destroy');
    Route::post('/seller/ban/{id}','Admin\SellerController@banSeller')->name('seller.ban');
    Route::post('/seller/unban/{id}','Admin\SellerController@unbanSeller')->name('seller.unban');
    Route::get('/seller/search','Admin\SellerController@search')->name('seller.search');
    Route::get('/seller/{email}','Admin\SellerController@seller')->name('seller');
    //Dropshipers
    Route::get('/dropshipers','Admin\DropshiperController@index')->name('dropshipers');
    Route::delete('/dropshiper/destroy/{id}','Admin\DropshiperController@destroy')->name('dropshiper.destroy');
    Route::post('/dropshiper/ban/{id}','Admin\DropshiperController@banDropshiper')->name('dropshiper.ban');
    Route::post('/dropshiper/unban/{id}','Admin\DropshiperController@unbanDropshiper')->name('dropshiper.unban');
    Route::get('/dropshiper/search','Admin\DropshiperController@search')->name('dropshiper.search');
    Route::get('/dropshiper/{email}','Admin\DropshiperController@dropshiper')->name('dropshiper');
    //LocalLivereurs
    Route::get('/local-livereurs','Admin\LocalLivereurController@index')->name('local-livereurs');
    Route::delete('/local-livereur/destroy/{id}','Admin\LocalLivereurController@destroy')->name('local-livereur.destroy');
    Route::post('/local-livereur/ban/{id}','Admin\LocalLivereurController@banLocalLivereur')->name('local-livereur.ban');
    Route::post('/local-livereur/unban/{id}','Admin\LocalLivereurController@unbanLocalLivereur')->name('local-livereur.unban');
    Route::get('/local-livereur/search','Admin\LocalLivereurController@search')->name('local-livereur.search');
    Route::get('/local-livereur/{email}','Admin\LocalLivereurController@local_livereur')->name('local-livereur');
    //CompanyLivereurs
    Route::get('/company-livereurs','Admin\CompanyLivereurController@index')->name('company-livereurs');
    Route::delete('/company-livereur/destroy/{id}','Admin\CompanyLivereurController@destroy')->name('company-livereur.destroy');
    Route::post('/company-livereur/ban/{id}','Admin\CompanyLivereurController@banCompanyLivereur')->name('company-livereur.ban');
    Route::post('/company-livereur/unban/{id}','Admin\CompanyLivereurController@unbanCompanyLivereur')->name('company-livereur.unban');
    Route::get('/company-livereur/search','Admin\CompanyLivereurController@search')->name('company-livereur.search');
    Route::get('/company-livereur/{email}','Admin\CompanyLivereurController@company_livereur')->name('company-livereur');
    //Users
    Route::get('/users','Admin\UserController@index')->name('users');
    Route::delete('/user/destroy/{id}','Admin\UserController@destroy')->name('user.destroy');
    Route::post('/user/ban/{id}','Admin\UserController@banUser')->name('user.ban');
    Route::post('/user/unban/{id}','Admin\UserController@unbanUser')->name('user.unban');
    Route::get('/user/search','Admin\UserController@search')->name('user.search');
    Route::get('/users/pagination','Admin\UserController@pagination');
    Route::get('/user/{email}','Admin\UserController@user')->name('user');
    //notifications
    Route::get('/notifications','Admin\NotificationController@index')->name('notifications');
    Route::get('/notification/read/all','Admin\NotificationController@read_all')->name('notification.read_all');
});//end group middleware (auth:super_admin)
});//end group prefix super-admin and name super-admin.