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
    Route::get('/registration','App\Http\controllers\Usercontroller@creat');
    Route::post('/store','App\Http\controllers\Usercontroller@store');
    Route::get('/login','App\Http\controllers\Usercontroller@login')->name('login');
    Route::post('/selectlogin','App\Http\controllers\Usercontroller@selectlogin');
    Route::get('/logout','App\Http\controllers\Usercontroller@logout');
    Route::group(['middleware'=>['auth']],function(){
        Route::get('/control','App\Http\controllers\Usercontroller@index')->name('redirect');
        Route::get('/account','App\Http\controllers\Usercontroller@account')->name('account.seller');
        Route::get('/account/stores','App\Http\controllers\Usercontroller@stores')->middleware('auth');
        Route::get('/profile','App\Http\controllers\Usercontroller@edit')->name('edit');
        Route::put('/upadte','App\Http\controllers\Usercontroller@update')->name('user.update');
        Route::get('/All-order','App\Http\controllers\OrderController@all_order')->name('store.allorder');
        Route::get('/All-client','App\Http\controllers\Usercontroller@all_client')->name('all.client');
        Route::get('/{store}/client-details','App\Http\controllers\Usercontroller@client_details')->name('client.stores');
        Route::get('/{client}/delete-client','App\Http\controllers\Usercontroller@delete_client')->name('delete.client');
        Route::get('/{client}/edit-client','App\Http\controllers\Usercontroller@edit_client')->name('edit.client');
        Route::put('/{client}/update-client','App\Http\controllers\Usercontroller@update_client')->name('update.client');
    });

});

Route::prefix('stores')->group(function(){
    Route::group(['middleware'=>['auth']],function(){
    Route::get('/creat','App\Http\controllers\Storecontroller@create');
    Route::post('/store','App\Http\controllers\Storecontroller@store')->name('submit');
    Route::get('/{store}/edite','App\Http\controllers\Storecontroller@edit')->name('edite');
    Route::put('/{store}','App\Http\controllers\Storecontroller@update')->name('update');
    Route::get('/delete/{store}','App\Http\controllers\Storecontroller@destroy')->name('store.delete');
    });
});

Route::prefix('product')->group(function(){
    Route:: get('/{store}/{product}','App\Http\controllers\ProductController@show');
Route::group(['middleware'=>['auth']],function(){
    Route::get('/{store}/All-Products','App\Http\controllers\Storecontroller@products')->name('allproduct');
    Route::get('/create/{store}','App\Http\controllers\ProductController@create');
    Route::post('/{store}','App\Http\controllers\ProductController@store')->name('creat.product');
    Route::get('/edite/{product}','App\Http\controllers\ProductController@edit')->name('edit.product');
    Route::put('/{product}','App\Http\controllers\ProductController@update');
    Route::get('/delete/{product}','App\Http\controllers\ProductController@destroy')->name('delete.product');

    });
});

Route::prefix('categories')->group(function(){

    Route::group(['middleware'=>['auth']],function(){
        Route::get('/create','App\Http\controllers\CateguryController@create')->name('creat Categories');
        Route::post('/store','App\Http\controllers\CateguryController@store');
        Route::get('/{store}/category','App\Http\controllers\Storecontroller@category')->name('view.category');
        Route::get('/{categury}/edit','App\Http\controllers\CateguryController@edit')->name('edit.category');
        Route::put('/{categury}/edit','App\Http\controllers\CateguryController@update')->name('update.category');
        Route::get('/{categury}/delete','App\Http\controllers\CateguryController@destroy')->name('delete.category');
    });

    Route::get('/{categury}/{store}','App\Http\controllers\CateguryController@show')->name('show.category');
});

Route::group(['prefix'=>'pages','middleware'=>'auth'],function(){
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
Route::prefix('client')->group(function(){
    Route::get('/{store}/client/registar','App\Http\controllers\Clientcontroller@create')->name('client.registar');
    Route::post('/{store}/client/registar','App\Http\controllers\Clientcontroller@store');
    Route::get('/{store}/login','App\Http\controllers\Clientcontroller@loginclient')->name('client.loginee');
    Route::post('/{store}/client/login','App\Http\controllers\Clientcontroller@login')->name('client.login');
    Route::get('/{store}/logout','App\Http\controllers\Clientcontroller@logoutclient');
Route::group(['middleware'=>['web','auth:client']],function(){
    Route::get('/dashboard/{store}','App\Http\controllers\Clientcontroller@dashboard')->name('client.dashboard');
    Route::get('/order/{store}','App\Http\controllers\Clientcontroller@All_order')->name('order.client');
    Route::get('/order-details/{order}/{store}','App\Http\controllers\Clientcontroller@order_details')->name('order.details');
    Route::get('/{store}/profile/{client}','App\Http\controllers\Clientcontroller@edit')->name('client.profile');
    Route::put('/update/{client}','App\Http\controllers\Clientcontroller@update')->name('update.profile');
    Route::get('/{store}/Add_shipping/{client}','App\Http\Controllers\Shippingcontroller@add')->name('Add.shiping');
    Route::get('/{store}/all_shipping/{client}','App\Http\Controllers\Shippingcontroller@create')->name('All.shiping');
    Route::post('/{client}/shipping','App\Http\Controllers\Shippingcontroller@store')->name('insert.shipping');
    Route::get('/{store}/delete_shipping/{shipping}','App\Http\Controllers\Shippingcontroller@destroy')->name('delete.shiping');
    Route::get('/{store}/edit_shipping/{shipping}','App\Http\Controllers\Shippingcontroller@edit')->name('edit.shiping');
    Route::put('/{store}/update_shipping/{shipping}','App\Http\Controllers\Shippingcontroller@update')->name('update.shiping');
    });
});
Route::prefix('shipping')->group(function(){
    Route::get('/select-shipping/{store}','App\Http\Controllers\ShippingController@index')->name('select.shipping');
    Route::get('/{store}','App\Http\controllers\OrderController@create')->middleware('auth')->name('order.request');
    Route::post('/{client}/shipping','App\Http\Controllers\Shippingcontroller@model_shipping')->name('model.shipping');
});
Route::group(['prefix'=>'order','middleware'=>'auth'],function(){
    //Route::get('/{store}','App\Http\controllers\OrderController@create')->name('order.request');
    Route::post('/{store}/charge','App\Http\controllers\OrderController@chargeRequest')->name('charge');
    Route::get('/{store}/chargeupdate','App\Http\controllers\OrderController@chargeupdate')->name('chargeupdate');
    Route::get('/{store}','App\Http\controllers\OrderController@show')->name('order.perstore');
    Route::get('/delets/{order}','App\Http\controllers\OrderController@destroy')->name('order.delet');
    Route::get('/details/{order}','App\Http\controllers\OrderController@indexdetails')->name('order.details');
    Route::post('/details/{order}','App\Http\controllers\OrderController@indexdetails')->name('orderpost.details');
    Route::get('/delivered/{order}','App\Http\controllers\OrderController@delivered')->name('order.delivered');
    Route::get('/payment-cash/{order}','App\Http\controllers\OrderController@payment_cash')->name('order.cash');
    Route::post('/select-shipping/{store}','App\Http\controllers\OrderController@select_shipping')->name('shiping');
    Route::get('/success/{store}', 'App\Http\controllers\OrderController@payment_finish')->name('payment.get');
});

Route::prefix('payment')->group(function(){
    Route::post('/stripe/{store}', 'App\Http\controllers\StripeController@stripePost')->name('stripe.post');
    Route::post('/cash/{store}','App\Http\controllers\OrderController@cash_payment')->name('cash.post');

});

Route::prefix('contact-us')->group(function(){
   Route::group(['middleware'=>['auth']],function(){
    Route::get('/contact-us','App\Http\Controllers\Contactcontroller@create')->name('contactus');
    Route::get('/messages/{store}','App\Http\Controllers\Contactcontroller@index')->name('contact.store');

    Route::post('/{store}','App\Http\Controllers\Contactcontroller@store')->name('contact.send');
    Route::get('/{contact}/delete','App\Http\Controllers\Contactcontroller@destroy')->name('delete.contact');
    Route::get('/{contact}/details','App\Http\Controllers\Contactcontroller@view')->name('view.contact');
   });
   Route::get('/{store}','App\Http\Controllers\Contactcontroller@show')->name('contact.front');
});







