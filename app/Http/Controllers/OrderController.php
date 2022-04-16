<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\Client;
use App\Models\Shipping;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\repostory\OrderRepostory;

use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdetails(Order $order,Store $store,Product $product,Shipping $shipping)
    {

        $totals =0;
        $cartItems = \Cart::getContent();
        foreach($order->product as $item){
            $totals += $item['price']*$item['quantity'] + $item['shipping'] ;
        }

        return view('backend.customer.orderdetailes',compact('order','store','product','shipping','totals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product,Store $store,Shipping $shipping)
    {
        $totals =0;
        $cartItems = \Cart::getContent();
        foreach($cartItems as $item){
            $totals += $item->price*$item->quantity + $item->shipping ;
        }

        return view('front customer.customer store.checkout',compact('product','store','cartItems','totals','shipping'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order,Store $store)
    {
        $cartItems = \Cart::getContent();
        $totals = \Cart::getTotal();
        return view('backend.customer.orderstore',compact('order','store','cartItems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return back();
    }
    public function chargeRequest(OrderRepostory $orderRepostory , Store $store, Request $request){

        $validate = Session::put('charge',[
            $name = \Auth::guard('client')->user()->id,
            $lastname = \Auth::guard('client')->user()->fullname,
            $email = \Auth::guard('client')->user()->email ,
            $phone = \Auth::guard('client')->user()->phone,
        ]);

        return redirect($orderRepostory->getchargerequest($lastname,$name,$email,$phone,$store->id));
}

    public function chargeupdate(OrderRepostory $orderRepostory,Store $store,Request $request , Product $product){

        $response = $orderRepostory ->validateRequest(request()->tap_id,request()->cartItems,request()->totals);
        //$response['card']['last_four']);
        $cartItems = \Cart::getContent();
        $totals =0;
        $cartItems = \Cart::getContent();
        foreach($cartItems as $item){
            $totals += $item->price*$item->quantity + $item->shipping ;
        }
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
        $product = $cartItems;
            $newOrder = new Order();
            $newOrder->receipt_id = $response['id'];
            $newOrder->patment_type = 'Mada';
            $newOrder->status = $response['status'];
            $newOrder->product =  $product;
            $newOrder->client_id = $response["customer"]["first_name"];
            $newOrder->store_id = $store->id;
            $newOrder->total = $totals;
            $newOrder->cartnumber = $response['card']['last_four'];
            $newOrder->shipping = 'test';
            $newOrder->save();

            if($response['status'] == 'CAPTURED'){
                Session::flash('success', 'Thank You Payment successful!');
            }else{
                Session::flash('errorpayment', 'The payment process was not done');
    }
    return redirect(route('strip.get', $store->id));

}

        public function all_order(Store $store){

            return view('backend.customer.order',compact('store'));
        }
}
