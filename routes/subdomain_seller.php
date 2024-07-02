<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| seller subdomains Routes
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
// Route::domain('{subdomain}.supplier.matajerdz.test')->group(function($subdomain){
    Route::get('/','Seller\TestController@test')->name('seller.test');
// })