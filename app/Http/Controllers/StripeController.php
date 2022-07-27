<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\Store;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Client;
use App\Mail\ordercustomer;
use App\Mail\orderclient;
use App\Models\Profit;
use Illuminate\Support\Facades\Mail;
class StripeController extends Controller
{

    public function stripe(Store $store,Request $request,Order $order,Client $client){
/*
        $cartItems = \Cart::getContent();
        $totals = \Cart::getTotal();
        if(session('success')){
            \Cart::clear() ;
        }

        return view('front customer.customer store.paymentfinish',compact('store','cartItems','order','client'));
        */
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request , Store $store ,Order $order){

        $totals =0;
        $cartItems = \Cart::getContent();
        foreach($cartItems as $item){
            $totals += $item->price*$item->quantity + $item->shipping ;
            $profits = ($totals *95) /100 ;
        }

        $datavalidate = $request->validate([
            'cardnumber'=>'required',
            'exp_year'=>'required',
            'cvc'=>'required',
        ]);


        Stripe\Stripe::setApiKey( env('STRIPE_SECRET') );
        $stripe =Stripe\Charge::create ([
                "amount" => $totals *100,
                "currency" => "usd",
                "source" => 'tok_visa', //$request->stripeToken
                "description" => "This payment is tested purpose phpcodingstuff.com",

        ]);

        Session::flash('success', 'Thank You Payment successful!');

        $shipping = session::get('select_shipping');

        $product= $cartItems;
        $neworder = new Order();
        $neworder->receipt_id =  $stripe['id'];
        $neworder->patment_type = 'visa';
        $neworder->status = $stripe['status'];
        $neworder->product = $product;
        $neworder->shipping_info = $shipping;
        $neworder->client_id = \Auth::guard('client')->user()->id;
        $neworder->store_id = $store->id;
        $neworder->user_id = $store->user_id;
        $neworder->total = $totals;
        $neworder->shipping = 'Waiting';
        $neworder->cartnumber = $stripe['payment_method_details']['card']['last4'];

        if($stripe['status'] == 'succeeded')
        $neworder->shipping = 'On the way';

        if($neworder->save()){
            $profit = new Profit();
            $profit->amount = $profits;
            $profit->payment_method = 'visa';
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

