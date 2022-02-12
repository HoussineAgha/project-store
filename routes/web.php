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

Route::get('/{id}','App\Http\controllers\Storecontroller@show')->name('store.show');
Route::get('/All-Product/{store}','App\Http\controllers\Storecontroller@allproduct')->name('page.product');

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
    Route::get('/delete/{store}','App\Http\controllers\Storecontroller@destroy')->name('store.delete');


});


Route::prefix('product')->group(function(){

    Route::get('/{store}/All-Products','App\Http\controllers\Storecontroller@products')->name('allproduct');
    Route::get('/create/{store}','App\Http\controllers\ProductController@create');
    Route::post('/{store}','App\Http\controllers\ProductController@store')->name('creat.product');
    Route::get('/edite/{product}','App\Http\controllers\ProductController@edit')->name('edit.product');
    Route::put('/{product}','App\Http\controllers\ProductController@update');
    Route::get('/delete/{product}','App\Http\controllers\ProductController@destroy')->name('delete.product');

});

Route::prefix('categories')->group(function(){
    Route::get('/create','App\Http\controllers\CateguryController@create')->name('creat Categories');
    Route::post('/store','App\Http\controllers\CateguryController@store');
    Route::get('/{store}/category','App\Http\controllers\Storecontroller@category')->name('view.category');
    Route::get('/{categury}/edit','App\Http\controllers\CateguryController@edit')->name('edit.category');
    Route::put('/{categury}/edit','App\Http\controllers\CateguryController@update')->name('update.category');
    Route::get('/{categury}/delete','App\Http\controllers\CateguryController@destroy')->name('delete.category');
});
