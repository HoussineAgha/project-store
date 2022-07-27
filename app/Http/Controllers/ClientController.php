<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Store;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

use Auth;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
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
    public function create(Store $store)
    {
            return view('front customer.customer store.form.registar',compact('store'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $store,Client $client)
    {

            $valdateData = request()->validate([
                //'Phone'=>"required|min:6|unique:clients",
                'email'=>"required|unique:clients",
                'fullname'=>"required",
                'password'=>'required|min:5',
                'phone' => 'required|unique:clients|min:3'
            ]);

            $newclient = new client();
            $newclient->fullname = request()->fullname;
            $newclient->email = request()->email;
            $newclient->password =bcrypt(request()->password);
            $newclient->phone = request()->phone;
            $newclient->image = request()->image;
            $newclient->role = request()->role;
            $newclient->store_id = $store->id;
            $newclient->user_id = $store->user_id;
            $newclient->save();

            return redirect(route('client.loginee',$store->id));
        }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store,Client $client)
    {
        if($client->id != Auth::guard('client')->user()->id)
        return back();

        return view('client.profile',compact('store','client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Client $client,Store $store)
    {
    if(request()->hasFile('image')){
        $path = '/storage/'.request()->file('image')->store('image_client',['disk' => 'public']);
    }else{
        $path = asset('img\zz.png');
    }
        $client = Auth::guard('client')->user();
        $client->fullname = request()->fullname;
        $client->email = request()->email;
        $client->phone = request()->phone;
        $client->password = bcrypt(request()->password);
        $client->image= $path;

         if($client->save()){
            flash('Your information has been successfully updated')->success();
        }else{
            flash('noooo!')->error();
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    public function loginclient(Store $store){

    return view('front customer.customer store.form.login',compact('store'));

}

    public function login(Store $store){
        $cartItems = \Cart::getContent();

        $valdateData= request()->validate([
            'email'=>'required',
            'password'=>'required|min:5'
        ]);

        if(auth('client')->attempt(['email' => request()->email, 'password' =>request()-> password])){
            request()->session()->regenerate();
                return redirect(route('client.dashboard',$store->id));
            //return redirect('/shipping/'.$store->id.'/Add_shipping/'.\Auth::guard('client')->user()->id);
        }else{
            return back()->withErrors(['Wrong login information']);
        }
    }

    public function check(){
        // دالة التحقق اذا المستخدم مسجل دخول ولا لأ
        if(auth('client')->check()){
            return redirect('/');
        }else{
            return view('form.login');
        }
    }
//دالة تسجيل الخروج للزبون فقط ولا تؤثر على خروج صاحب المتجر في حال سجل في متجر تاني كزبون وحب يشتري منتج من متجر تاني
    public function logoutclient(Store $store,Client $client){
        auth('client')->logout();
        //session('client')->flush();
        return redirect(route('store.show',$store->id));
    }
    public function dashboard(Store $store,Client $client){
        // دالة التحقق اذا المستخدم مسجل دخول ولا لأ
        if(auth('client')->check()){
            $client = Auth::guard('client')->user()->id;
            return view('client.dashboard',compact('store','client'));
        }else{
            return redirect(route('client.loginee',$store->id));
        }
    }

    public function All_order(Store $store,Client $client,Order $order){
        $orders = Order:: where('client_id','=',Auth::guard('client')->user()->id)->orderBy('created_at', 'desc')->paginate(3);
        return view('client.order',compact('store','client','order','orders'));
    }

    public function order_details(Client $client,Order $order,Store $store){

        $subtotal = 0;
        $shipping =0;
        foreach($order->product as $item){
            $subtotal += $item['price']*$item['quantity'];
            $shipping += $item['shipping'];
        }

        return view('client.orderdetails',compact('client','order','store','subtotal','shipping'));
    }

}
