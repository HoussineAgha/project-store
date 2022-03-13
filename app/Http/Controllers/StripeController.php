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

    public function stripe(Store $store ,Request $request ){
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

        $validatedata = request()->validate([
            'firstname'=>'required|min:3',
            'email'=>'required|min:12',
            'lastname'=>'required|min:3',
            'phone'=>'required|min:5',
            'address'=>'required|min:3',
            'country'=>'required|min:3',
        ]);

        $totals = \Cart::getTotal();
        $cartItems = \Cart::getContent();

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

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe =Stripe\Charge::create ([
                "amount" => $totals *100,
                "currency" => "usd",
                "source" => 'tok_visa', //$request->stripeToken
                "description" => "This payment is tested purpose phpcodingstuff.com",
        ]);

        Session::flash('success', 'Thank You Payment successful!');

        $product[]=$cartItems;

        $neworder = new Order();
        $neworder->receipt_id =  $stripe['id'];
        $neworder->patment_type = 'visa';
        $neworder->status = $stripe['status'];
        $neworder->product = $product;
        $neworder->user_id = 15;
        $neworder->store_id = $store->id;
        $neworder->save();

        return redirect()->route('strip.get',$store->id);
    }

}

