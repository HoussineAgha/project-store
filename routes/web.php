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
//Route::get('/{store}/{pages}','App\Http\controllers\Pagescontroller@show');

Route::prefix('user')->group(function(){
    Route::get('/control','App\Http\controllers\Usercontroller@index')->name('redirect');
    Route::get('/registration','App\Http\controllers\Usercontroller@creat');
    Route::post('/store','App\Http\controllers\Usercontroller@store');
    Route::get('/login','App\Http\controllers\Usercontroller@login')->name('login');
    Route::post('/selectlogin','App\Http\controllers\Usercontroller@selectlogin');
    Route::get('/logout','App\Http\controllers\Usercontroller@logout');
    Route::get('/account','App\Http\controllers\Usercontroller@account')->name('account.seller');
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
    Route::post('/{store}/client/login','App\Http\controllers\Storecontroller@login')->name('client.login');;
    Route::get('/{store}/client/login','App\Http\controllers\Storecontroller@loginclient')->name('client.loginee');
    Route::get('/{store}/client/registar','App\Http\controllers\Storecontroller@registar');
    Route::post('/{store}/client/registar','App\Http\controllers\Storecontroller@registration');

});

Route::prefix('product')->group(function(){
    Route::get('/{store}/All-Products','App\Http\controllers\Storecontroller@products')->name('allproduct');
    Route::get('/create/{store}','App\Http\controllers\ProductController@create');
    Route::post('/{store}','App\Http\controllers\ProductController@store')->name('creat.product');
    Route::get('/edite/{product}','App\Http\controllers\ProductController@edit')->name('edit.product');
    Route::put('/{product}','App\Http\controllers\ProductController@update');
    Route::get('/delete/{product}','App\Http\controllers\ProductController@destroy')->name('delete.product');
    Route:: get('/{store}/{product}','App\Http\controllers\ProductController@show');
});

Route::prefix('categories')->group(function(){
    Route::get('/create','App\Http\controllers\CateguryController@create')->name('creat Categories');
    Route::post('/store','App\Http\controllers\CateguryController@store');
    Route::get('/{store}/category','App\Http\controllers\Storecontroller@category')->name('view.category');
    Route::get('/{categury}/edit','App\Http\controllers\CateguryController@edit')->name('edit.category');
    Route::put('/{categury}/edit','App\Http\controllers\CateguryController@update')->name('update.category');
    Route::get('/{categury}/delete','App\Http\controllers\CateguryController@destroy')->name('delete.category');
    Route::get('/{categury}/{store}','App\Http\controllers\CateguryController@show')->name('show.category');
});

Route::prefix('pages')->group(function(){
    Route::get('/All-pages/{id}','App\Http\controllers\PagesController@index');
    Route::get('/create','App\Http\controllers\PagesController@create');
    Route::post('/store','App\Http\controllers\PagesController@store');
    Route::get('/delete/{pages}','App\Http\controllers\PagesController@destroy');
    Route::get('/edite/{pages}','App\Http\controllers\PagesController@edit');
    Route::put('/edite/{pages}','App\Http\controllers\PagesController@update');
});

Route::prefix('cart')->group(function(){
    //Route::get('/{store}','App\Http\controllers\Cartcontroller@index');
    Route::get('/{store}', 'App\Http\controllers\Cartcontroller@cartList')->name('cart.list');
    Route::post('/{store}', 'App\Http\controllers\Cartcontroller@addToCart')->name('cart.store');
    Route::post('/update-cart/{store}','App\Http\controllers\Cartcontroller@updateCart')->name('cart.update');
    Route::post('/remove/{store}','App\Http\controllers\Cartcontroller@removeCart')->name('cart.remove');
    Route::post('/clear/{store}', 'App\Http\controllers\Cartcontroller@clearAllCart')->name('cart.clear');
});
Route::prefix('order')->group(function(){
    Route::get('/{store}','App\Http\controllers\OrderController@create');
    Route::post('/{store}','App\Http\controllers\OrderController@create');
    Route::get('/{store}/charge','App\Http\controllers\OrderController@chargeRequest')->name('charge');
    Route::get('/{store}/chargeupdate','App\Http\controllers\OrderController@chargeupdate')->name('chargeupdate');
});

Route::prefix('payment')->group(function(){
    Route::post('/stripe/{store}', 'App\Http\controllers\StripeController@stripePost')->name('stripe.post');
    Route::get('/success/{store}', 'App\Http\controllers\StripeController@stripe')->name('strip.get');
});

Route::prefix('client')->group(function(){


});



