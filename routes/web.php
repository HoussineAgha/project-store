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
    Route::get('/profile','App\Http\controllers\Usercontroller@edit')->name('edit');
    Route::put('/upadte','App\Http\controllers\Usercontroller@update')->name('user.update');

});

Route::prefix('stores')->group(function(){

    Route::get('/creat','App\Http\controllers\Storecontroller@create');
    Route::post('/store','App\Http\controllers\Storecontroller@store')->name('submit');
    Route::get('/{store}/edite','App\Http\controllers\Storecontroller@edit')->name('edite');
    Route::put('/{store}','App\Http\controllers\Storecontroller@update')->name('update');

});

Route::prefix('profile')->group(function(){

});


