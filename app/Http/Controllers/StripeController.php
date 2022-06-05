<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\Store;
use App\Models\Product;
use App\Models\Order;
use App\Models\Client;

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
        }

        $datavalidate = $request->validate([
            'cardnumber'=>'required',
            'exp_year'=>'required',
            'cvc'=>'required',
        ]);


        Stripe\Stripe::setApiKey('sk_test_51IEzzjKfOvzmk3QD8hbRIBwcn513uiZ1GYxrMiu5g4ie4Go93nYmtN4aUBXmwJwSLQVacGdQlTGYurHbhQ0Tlywk00UvLSp5DH');
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
        $neworder->total = $totals;
        $neworder->shipping = 'Waiting';
        $neworder->cartnumber = $stripe['payment_method_details']['card']['last4'];

        if($stripe['status'] == 'succeeded')
        $neworder->shipping = 'On the way';

        $neworder->save();

        return redirect()->route('payment.get',$store->id);
    }

}

