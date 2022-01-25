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

Route::get('/', function () {
    return view('home');
});

Route::prefix('user')->group(function(){

    Route::get('/registration','App\Http\controllers\Usercontroller@creat');
    Route::post('/store','App\Http\controllers\Usercontroller@store');
    Route::get('/login','App\Http\controllers\Usercontroller@login')->name('login');
    Route::post('/selectlogin','App\Http\controllers\Usercontroller@selectlogin');
    Route::get('/logout','App\Http\controllers\Usercontroller@logout');
    Route::get('/account','App\Http\controllers\Usercontroller@account');
    Route::get('/account/stores','App\Http\controllers\Usercontroller@stores');
});

