<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Store;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Client;
use App\Mail\ordercustomer;
use App\Mail\orderclient;
use App\Models\Profit;
use Illuminate\Support\Facades\Mail;



class PaypalController extends Controller
{
    public function payment(Request $request , Store $store ,Order $order){
        if(request()->ajax()){
        $totals =0;
        $cartItems = \Cart::getContent();
        foreach($cartItems as $item){
            $totals += $item->price*$item->quantity + $item->shipping ;
            $profits = ($totals *95) /100 ;
        }
        $shipping = session::get('select_shipping');

        $product= $cartItems;
        $neworder = new Order();
        $neworder->receipt_id =  $request->input('payment_id');
        $neworder->patment_type = 'paypal';
        $neworder->status = $request->input('status');
        $neworder->product = $product;
        $neworder->shipping_info = $shipping;
        $neworder->client_id = \Auth::guard('client')->user()->id;
        $neworder->store_id = $store->id;
        $neworder->user_id = $store->user_id;
        $neworder->total = $totals;
        $neworder->shipping = 'Waiting';
        $neworder->shipping = 'On the way';

        if($neworder->save()){
            Session::flash('success', 'Thank You Payment successful!');
            $profit = new Profit();
            $profit->amount = $profits;
            $profit->payment_method = 'paypal';
            $profit->store_id = $store->id;
            $profit->order_id = $neworder->id;
            $profit->user_id = $store->user_id ;
            $profit->save();
        }
        Mail::to($neworder->store->user)->send(new ordercustomer);
        Mail::to($neworder->store->client)->send(new orderclient($order,$totals,$cartItems));
        $user = $profit->user_id ;
        $user_id = User:: find($user);
        $user_id->balance += $profits ;
        $user_id->save();
        return redirect()->route('payment.get',$store->id);
    }
}
}


