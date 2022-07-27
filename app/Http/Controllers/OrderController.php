<?php

namespace App\Http\Controllers;
use App\Mail\ordercustomer;
use App\Mail\orderclient;
use Session;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use App\Models\Client;
use App\Models\Shipping;
use App\Models\Profit;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\repostory\OrderRepostory;
use Illuminate\Support\Facades\Mail;
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
        if(request()->ajax()){
            $filter = '';
            if(request()->filter != null){
                $filter = request()->filter;
            }
            if($filter == 'all'){
                $cartItems = \Cart::getContent();
                $totals = \Cart::getTotal();
                $orders = Order:: where('store_id',$store->id)->paginate(10);
            }elseif ($filter == 'paid') {
                $cartItems = \Cart::getContent();
                $totals = \Cart::getTotal();
                $orders = Order:: where([
                    ['store_id',$store->id],
                    ['status','!=','field'],
                    ])->orderBy('created_at','desc')->paginate(25);
            }elseif ($filter == 'mada') {
                $cartItems = \Cart::getContent();
                $totals = \Cart::getTotal();
                $orders = Order:: where([
                    ['store_id',$store->id],
                    ['patment_type','Mada'],
                    ])->orderBy('created_at','desc')->paginate(25);
            }elseif ($filter == 'stripe') {
                $cartItems = \Cart::getContent();
                $totals = \Cart::getTotal();
                $orders = Order:: where([
                    ['store_id',$store->id],
                    ['patment_type','visa'],
                    ])->orderBy('created_at','desc')->paginate(25);
            }elseif ($filter == 'paypal') {
                $cartItems = \Cart::getContent();
                $totals = \Cart::getTotal();
                $orders = Order:: where([
                    ['store_id',$store->id],
                    ['patment_type','paypal'],
                    ])->orderBy('created_at','desc')->paginate(25);
            }elseif ($filter == 'delivered') {
                $cartItems = \Cart::getContent();
                $totals = \Cart::getTotal();
                $orders = Order:: where([
                    ['store_id',$store->id],
                    ['shipping','delivered'],
                    ])->orderBy('created_at','desc')->paginate(25);
            }elseif ($filter == 'way') {
                $cartItems = \Cart::getContent();
                $totals = \Cart::getTotal();
                $orders = Order:: where([
                    ['store_id',$store->id],
                    ['shipping','On the way'],
                    ])->orderBy('created_at','desc')->paginate(25);
            }
            if($store->user_id != auth()->user()->id)
            return back();
            return view('backend.customer.modules.orderstore_ajax',compact('order','store','cartItems','orders'));
        }
        $cartItems = \Cart::getContent();
        $totals = \Cart::getTotal();
        $orders = Order:: where('store_id',$store->id)->paginate(10);
        if($store->user_id != auth()->user()->id)
        return back();
        return view('backend.customer.orderstore',compact('order','store','cartItems','orders'));
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
        $totals =0;
        $cartItems = \Cart::getContent();
        foreach($cartItems as $item){
            $totals += $item->price*$item->quantity + $item->shipping ;
        }
        $shipping = session::get('select_shipping');
        $validate = Session::put('charge',[
            $name = \Auth::guard('client')->user()->id,
            $lastname = \Auth::guard('client')->user()->fullname,
            $email = \Auth::guard('client')->user()->email ,
            $phone = \Auth::guard('client')->user()->phone,
        ]);

        return redirect($orderRepostory->getchargerequest($lastname,$name,$email,$phone,$store->id));
}

    public function chargeupdate(OrderRepostory $orderRepostory,Store $store,Request $request , Product $product,Order $order){
        $shipping = session::get('select_shipping');
        $response = $orderRepostory ->validateRequest(request()->tap_id);
        $cartItems = \Cart::getContent();
        $totals = $response["amount"];
        $profits = ($response["amount"]*95)/100 ;


        $ptoduct_details[] = Session::get('info_product',[
            'id'=>$response['metadata']['id'],
            'name' => $response['metadata']['name'],
            'price' => $response['metadata']['price'],
            'quantity' => $response['metadata']['quantity'],
            'shipping' => $response['metadata']['shipping'],
            'shipping_type' => $response['metadata']['shipping_type'],
            'image' => $response['metadata']['image'],
        ]);

        $shipping_info = Session::get('shipping',[
            'shipping_id'=>$response['metadata']['shipping_id'],
            'email'=>$response['metadata']['email'],
            'phone'=>$response['metadata']['phone'],
            'country'=>$response['metadata']['country'],
            'state'=>$response['metadata']['state'],
            'address'=>$response['metadata']['address'],
        ]);


            $newOrder = new Order();
            $newOrder->receipt_id = $response['id'];
            $newOrder->patment_type = 'Mada';
            $newOrder->status = $response['status'];
            $newOrder->product = $ptoduct_details;
            $newOrder->shipping_info = $shipping_info;
            $newOrder->client_id = $response["customer"]["first_name"];
            $newOrder->store_id = $store->id;
            $newOrder->user_id = $store->user_id;
            $newOrder->total = $response["amount"];
            $newOrder->cartnumber = $response['card']['last_four'];
            $newOrder->shipping = 'Waiting';

            if($response['status'] == 'CAPTURED')
                $newOrder->shipping = 'On the way';
                $newOrder->save();
            if($response['status'] == 'CAPTURED'){
                Session::flash('success', 'Thank You Payment successful!');
                $profit = new Profit();
                $profit->amount = $profits;
                $profit->payment_method = 'Mada';
                $profit->store_id = $store->id;
                $profit->order_id = $newOrder->id;
                $profit->user_id = $store->user_id ;
                $profit->save();
            }else{
                Session::flash('error payment', 'The payment process was not done');
    }
    Mail::to($newOrder->store->user)->send(new ordercustomer);
    Mail::to($newOrder->store->client)->send(new orderclient($order,$totals,$cartItems));
    $user = $profit->user_id ;
    $user_id = User:: find($user);
    $user_id->balance += $profits ;
    $user_id->save();

    return redirect()->route('payment.get',$store->id);

}

    public function cash_payment(Store $store , Order $order,Profit $profit , User $user){
        $recept = random_int(1,1000);
        $totals = 0;
        $profits = 0 ;
        $cartItems = \Cart::getContent();
        foreach($cartItems as $item){
            $totals += $item->price * $item->quantity + $item->shipping ;
            $profits = ($totals * 95) /100 ;
        }
        $shipping_info = Session::get('select_shipping');
        $cash = new Order();
        $cash->receipt_id = 'ch_'.$recept;
        $cash->patment_type = 'Cash';
        $cash->status = 'Waiting';
        $cash->product = $cartItems;
        $cash->shipping_info = $shipping_info;
        $cash->client_id = \Auth::guard('client')->user()->id;
        $cash->store_id = $store->id;
        $cash->user_id = $store->user_id;
        $cash->total = $totals;
        $cash->shipping = 'Waiting';

        if($cash->save()){
        Session::flash('success', 'Thank You Payment successful!');
        $profit = new Profit();
        $profit->amount = $profits;
        $profit->payment_method = 'Cash';
        $profit->store_id = $store->id;
        $profit->order_id = $cash->id;
        $profit->user_id = $store->user_id ;
        $profit->save();
    }

    Mail::to($cash->store->user)->send(new ordercustomer);
    Mail::to($cash->client)->send(new orderclient($order,$totals,$cartItems));
    $user = $profit->user_id ;
    $user_id = User:: find($user);
    $user_id->balance += $profits ;
    $user_id->save();
        return redirect()->route('payment.get',$store->id);
    }

    public function all_order(Store $store){

            return view('backend.customer.order',compact('store'));
    }

    public function select_shipping(Request $request,Client $client,Store $store,Shipping $shipping){

            $select = Session::put('select_shipping', [
                'shipping_id'=>$request->shipping_id,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'country'=>$request->country,
                'state'=>$request->state,
                'address'=>$request->address,
            ]);

            return redirect(route('order.request',$store->id));
    }

    public function delivered(Order $order){
            $order->shipping = 'delivered';
            if($order->save()){
                flash('Status updated successfully')->success();
            }else{
                flash('There is something wrong')->warning();
            }

            return back();
    }

    public function payment_cash(Order $order){
        $order->status = 'succeeded';

        if($order->status =='succeeded'){
            $order->shipping = 'On the way';
        }
        if($order->save()){
            flash('Status updated successfully')->success();
        }else{
            flash('There is something wrong')->warning();
        }

        return back();
    }

    public function payment_finish(Store $store,Request $request,Order $order,Client $client){
            $cartItems = \Cart::getContent();
            $totals = 0 ;
            foreach($cartItems as $item){
                $totals += $item->price * $item->quantity + $item->shipping ;
            }
            if(session('success')){
                \Cart::clear() ;
            }
            return view('front customer.customer store.paymentfinish',compact('store','cartItems','order','client','totals'));
    }
}
