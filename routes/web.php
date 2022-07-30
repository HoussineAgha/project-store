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
Route::get('/admin','App\Http\controllers\Paneladmincontroller@index');
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

Route::group(['middleware'=>['auth']],function(){
    Route::get('/{store}/All-Products','App\Http\Controllers\StoreController@products')->name('all.product');
    Route::get('/create/{store}','App\Http\Controllers\ProductController@create');
    Route::post('/{store}','App\Http\controllers\ProductController@store')->name('creat.product');
    Route::get('/edite/{product}','App\Http\controllers\ProductController@edit')->name('edit.product');
    Route::put('/{product}','App\Http\controllers\ProductController@update');
    Route::get('/delete/{product}','App\Http\controllers\ProductController@destroy')->name('delete.product');

    });
    Route:: get('/{store}/{product}','App\Http\controllers\ProductController@show');
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
    Route::get('/order-details/{order}/{store}','App\Http\controllers\Clientcontroller@order_details')->name('order.detailss');
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
    Route::get('/{store}','App\Http\controllers\OrderController@create')->name('order.request');
    Route::post('/{client}/shipping','App\Http\Controllers\Shippingcontroller@model_shipping')->name('model.shipping');
});
Route::prefix('order')->group(function(){
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
    Route::get('/paytabs-payment/{store}','App\Http\Controllers\PaytabsController@paypage')->name('paytabs.get');
    Route::post('/paytabs-payment/{store}','App\Http\Controllers\PaytabsController@paypage')->name('paytabs.post');
    Route::post('/paypal/{store}','App\Http\Controllers\PaypalController@payment')->name('paypal.post');
    //Route::get('/success/{store}', 'App\Http\Controllers\PaypalController@success')->name('paypal.success');
    //Route::get('paypal-cancel',[PaypalController::class,'cancel'])->name('paypal.cancel');

});

Route::prefix('contact-us')->group(function(){
    Route::post('/{store}','App\Http\Controllers\Contactcontroller@store')->name('contact.send');
   Route::group(['middleware'=>['auth']],function(){
    Route::get('/contact-us','App\Http\Controllers\Contactcontroller@create')->name('contactus');
    Route::get('/messages/{store}','App\Http\Controllers\Contactcontroller@index')->name('contact.store');
    Route::get('/{contact}/delete','App\Http\Controllers\Contactcontroller@destroy')->name('delete.contact');
    Route::get('/{contact}/details','App\Http\Controllers\Contactcontroller@view')->name('view.contact');
   });
   Route::get('/{store}','App\Http\Controllers\Contactcontroller@show')->name('contact.front');
});

Route::prefix('admin')->group(function(){
    Route::post('/check','App\Http\controllers\Paneladmincontroller@login_admin')->name('login.admin');
    Route::get('/logout','App\Http\controllers\Paneladmincontroller@logout')->name('admin.logout');
    Route::group(['middleware'=>['admin']],function(){
    Route::get('/profile','App\Http\controllers\Paneladmincontroller@profile')->name('admin.profile');
    Route::get('/edit-profile','App\Http\controllers\Paneladmincontroller@edit_profile')->name('admin.editprofile');
    Route::put('/update-profile','App\Http\controllers\Paneladmincontroller@update_profile')->name('admin.update');
    Route::get('/All-store','App\Http\controllers\Paneladmincontroller@all_store')->name('admin.stores');
    Route::get('/create-store','App\Http\controllers\Paneladmincontroller@index_store')->name('admin.creatnewstores');
    Route::post('/create-store','App\Http\controllers\Paneladmincontroller@creat_store')->name('admin.creatstores');
    Route::get('/delete-store/{store}','App\Http\controllers\Paneladmincontroller@delete_store')->name('admin.deletestore');
    Route::get('/edit-store/{store}','App\Http\controllers\Paneladmincontroller@edit_store')->name('admin.editstore');
    Route::put('/update-store/{store}','App\Http\controllers\Paneladmincontroller@update_store')->name('admin.updatestore');
    Route::get('/All-seller','App\Http\controllers\Paneladmincontroller@all_seller')->name('admin.sellers');
    Route::get('/details-seller/{user}','App\Http\controllers\Paneladmincontroller@details_seller')->name('admin.detailssellers');
    Route::get('/create-seller','App\Http\controllers\Paneladmincontroller@index_seller')->name('admin.createsellers');
    Route::post('/create-seller','App\Http\controllers\Paneladmincontroller@create_seller')->name('admin.createddsellers');
    Route::get('/delete-seller/{user}','App\Http\controllers\Paneladmincontroller@delete_seller')->name('admin.deleteseller');
    Route::get('/edit-seller/{user}','App\Http\controllers\Paneladmincontroller@edit_seller')->name('admin.editseller');
    Route::put('/update-seller/{user}','App\Http\controllers\Paneladmincontroller@update_seller')->name('admin.updateseller');
    Route::get('/settings','App\Http\Controllers\SettingController@show')->name('admin.settings');
    Route::post('/settings','App\Http\Controllers\SettingController@store')->name('admin.storesettings');
    Route::get('/edit-settings','App\Http\Controllers\SettingController@edit')->name('admin.editsettings');
    Route::put('/settings/{setting}','App\Http\Controllers\SettingController@update')->name('admin.updatesettings');
    Route::get('/delet-settings/{setting}','App\Http\Controllers\SettingController@destroy')->name('admin.deletesettings');
    Route::get('/All-Client','App\Http\Controllers\Homecontroller@all_client')->name('admin.client');
    Route::get('/delete-Client/{client}','App\Http\Controllers\Homecontroller@delete_client')->name('admin.deleteclient');
    Route::get('/edit-Client/{client}','App\Http\Controllers\Homecontroller@edit_client')->name('admin.editclient');
    Route::put('/update-client/{client}','App\Http\Controllers\Homecontroller@update_client')->name('admin.updateclient');
    Route::get('/Payment','App\Http\Controllers\Homecontroller@payment')->name('admin.payment');
    Route::get('/all-Withdrawal','App\Http\Controllers\WithdrawalController@admin_Withdrawal')->name('admin.allWithdrawal');
    Route::get('/Withdrawal/{id}/user/{user}','App\Http\Controllers\WithdrawalController@show')->name('admin.showWithdrawal');
    Route::get('/done-Withdrawal/{id}','App\Http\Controllers\WithdrawalController@done_Withdrawal')->name('admin.doneWithdrawal');
    Route::get('/rejected-Withdrawal/{id}','App\Http\Controllers\WithdrawalController@rejected_Withdrawal')->name('admin.rejectedWithdrawal');
    Route::get('/creat-message','App\Http\Controllers\MessagesController@show')->name('admin.creatmessage');
    Route::post('/send-message','App\Http\Controllers\MessagesController@store')->name('admin.creatmessagestore');
    Route::get('/All-message','App\Http\Controllers\MessagesController@index')->name('admin.allmessage');
    Route::get('/details-message/{messages}','App\Http\Controllers\MessagesController@details_message')->name('admin.detailsmessage');
    Route::get('/delete-message/{messages}','App\Http\Controllers\MessagesController@destroy')->name('admin.deletemessage');
    Route::get('/all-tickets','App\Http\Controllers\TicketController@index')->name('admin.tickets');
    Route::get('/details-tickets/{ticket}','App\Http\Controllers\TicketController@details_ticket_admin')->name('admin.detailstickets');
    Route::get('/solve-tickets/{ticket}','App\Http\Controllers\TicketController@solved_ticket')->name('admin.solvedstickets');
    Route::post('/replay-tickets/{ticket}','App\Http\Controllers\ReplayController@store')->name('admin.replaystickets');
    Route::get('/product-pendding','App\Http\Controllers\Paneladmin2Controller@product_pendding')->name('admin.productpendding');
    Route::get('/edite-product/{product}','App\Http\Controllers\Paneladmin2Controller@product_edit')->name('admin.productedit');
    Route::put('/updat-product/{product}','App\Http\Controllers\Paneladmin2Controller@update_product')->name('admin.productupdate');
    Route::get('/product-delete/{product}','App\Http\Controllers\Paneladmin2Controller@product_delete')->name('admin.productdelete');
    Route::get('/product-publish','App\Http\Controllers\Paneladmin2Controller@product_publish')->name('admin.productpublish');
    Route::get('/product-bloack','App\Http\Controllers\Paneladmin2Controller@product_bloack')->name('admin.productbloack');
    Route::get('/all-order','App\Http\Controllers\Paneladmin2Controller@all_order')->name('admin.allorder');
    });
});

Route::group(['prefix'=>'Profit','middleware'=>'auth'],function(){
    Route::get('/All-store','App\Http\Controllers\ProfitController@show')->name('profit.store');
    Route::get('/All-profits/{store}','App\Http\Controllers\ProfitController@profits_store')->name('profit.profitstore');
});

Route::group(['prefix'=>'Withdrawal','middleware'=>'auth'],function(){
    Route::get('/request','App\Http\Controllers\WithdrawalController@index')->name('withdrawal');
    Route::post('/store','App\Http\Controllers\WithdrawalController@store')->name('withdrawal.request');
});

Route::group(['prefix'=>'Message','middleware'=>'auth'],function(){
    Route::get('/all-privet','App\Http\Controllers\MessagesController@user_all_messages')->name('user.allmessages');
    Route::get('/all-general','App\Http\Controllers\MessagesController@user_all_messages_general')->name('user.generalmessages');
    Route::get('/privet/{messages}','App\Http\Controllers\MessagesController@user_details_message')->name('user.detailsmessages');
    Route::get('/general/{messages}','App\Http\Controllers\MessagesController@user_details_general_message')->name('user.detailsgeneralmessages');
});
Route::group(['prefix'=>'tickets','middleware'=>'auth'],function(){
    Route::get('/addnew','App\Http\Controllers\TicketController@show')->name('user.tickets');
    Route::post('/store','App\Http\Controllers\TicketController@store')->name('user.storeticket');
    Route::get('/details/{ticket}','App\Http\Controllers\TicketController@details_ticket_user')->name('user.detailsticket');
    Route::post('/replay-ticket/{ticket}','App\Http\Controllers\ReplayController@store')->name('user.replaystickets');

});


