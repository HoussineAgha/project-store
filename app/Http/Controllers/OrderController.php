<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\repostory\OrderRepostory;
use Session;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product , Store $store)
    {
        $cartItems = \Cart::getContent();

        $totals = \Cart::getTotal();

        return view('front customer.customer store.checkout',compact('product','store','cartItems','totals'));
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
    public function show(Order $order)
    {
        //
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
        //
    }
    public function chargeRequest(OrderRepostory $orderRepostory , Store $store, Request $request){


        $validate = Session::put('information',[
            $name = 'firstname'=>$request->firstname,
            $email = 'email'=>$request->email ,
            'lastname'=>$request->lastname,
            $phone = 'phone'=>$request->phone,

        ]);

        return redirect($orderRepostory->getchargerequest($name,$email,$phone,$store->id));
}

    public function chargeupdate(OrderRepostory $orderRepostory ,Store $store , Request $request){

        $response = $orderRepostory ->validateRequest(request()->tap_id);

        Session::flash('success', 'Thank You Payment successful!');

        $totals = \Cart::getTotal();
        $cartItems = \Cart::getContent();

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

            $product[] =  $cartItems ;

            $newOrder = new Order();
            $newOrder->receipt_id = $response['id'];
            $newOrder->patment_type = 'Mada';
            $newOrder->status = $response['status'];
            $newOrder->product = $product;
            $newOrder->user_id = 15;
            $newOrder->store_id = $store->id;
            $newOrder->save();

            if($response['status'] != 'CAPTURED'){
                //
            }
            return redirect(route('strip.get', $store->id));
    }


}
