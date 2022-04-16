<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\Store;
use App\Models\Product;
use App\Models\Order;

class StripeController extends Controller
{

    public function stripe(Store $store,Request $request){

        $cartItems = \Cart::getContent();
        $totals = \Cart::getTotal();
        if(session('success')){
            \Cart::clear() ;
        }

        return view('front customer.customer store.paymentfinish',compact('store','cartItems'));
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request , Store $store){

        //$totals = \Cart::getTotal();
        $cartItems = \Cart::getContent();
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

        Session::put('information',[
            'firstname'=>$request->firstname,
            'email'=>$request->email ,
            'lastname'=>$request->lastname,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'country'=>$request->country,
            'state'=>$request->state,
            'sameaddress'=>'Yes',
            'total'=>$totals,
            'paymentMethod'=>$request->paymentMethod,
        ]);

        Stripe\Stripe::setApiKey('sk_test_51IEzzjKfOvzmk3QD8hbRIBwcn513uiZ1GYxrMiu5g4ie4Go93nYmtN4aUBXmwJwSLQVacGdQlTGYurHbhQ0Tlywk00UvLSp5DH');
        $stripe =Stripe\Charge::create ([
                "amount" => $totals *100,
                "currency" => "usd",
                "source" => 'tok_visa', //$request->stripeToken
                "description" => "This payment is tested purpose phpcodingstuff.com",
        ]);

        Session::flash('success', 'Thank You Payment successful!');

        $product=$cartItems;
        $neworder = new Order();
        $neworder->receipt_id =  $stripe['id'];
        $neworder->patment_type = 'visa';
        $neworder->status = $stripe['status'];
        $neworder->product = $product;
        $neworder->client_id = \Auth::guard('client')->user()->id;
        $neworder->store_id = $store->id;
        $neworder->total = $request->totalss;
        $neworder->shipping = 'test';
        $neworder->cartnumber = $stripe['payment_method_details']['card']['last4'];
        $neworder->save();

        return redirect()->route('strip.get',$store->id);
    }

}

