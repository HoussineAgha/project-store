<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use App\Models\Client;
use App\Models\Store;
use App\Models\Product;
use App\Models\User;
use Auth;
use Session;
use App\Http\Requests\StoreShippingRequest;
use App\Http\Requests\UpdateShippingRequest;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Store $store ,Client $client,Shipping $shipping)
    {
        return view('front customer.customer store.shipping_select',compact('store','client','shipping'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(store $store,Client $client ,Shipping $shipping){

        $cartItems = \Cart::getContent();

        return view('client.shipping_info',compact('store','client','cartItems','shipping'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShippingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Shipping $shipping,Store $store,Client $client){

        $totals = \Cart::getTotal();
        $cartItems = \Cart::getContent();
        $client = \Auth::guard('client')->user()->id;
        $store = request()->store_id;
        $newshipping = new Shipping();
        $newshipping->firstname = request()->firstname;
        $newshipping->lastname = request()->lastname;
        $newshipping->email = request()->email;
        $newshipping->phone = request()->phone;
        $newshipping->address = request()->address;
        $newshipping->country = request()->country;
        $newshipping->sameaddress = request()->sameaddress;
        $newshipping->state = request()->state;
        $newshipping->client_id = request()->client_id;
        $newshipping->store_id = request()->store_id;


        if(empty(request(['sameaddress']))){
            $newshipping->sameaddress ='0';
        }else{
            $newshipping->sameaddress ='1';
        }

        $newshipping->save();
        return redirect('/client/'.$store.'/all_shipping/'.$client );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store,Client $client,Shipping $shipping)
    {
        if($shipping->id != $shipping->id){
            return back();
        }else{
        return view('client.update_shipping',compact('store','client','shipping'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShippingRequest  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Store $store , Shipping $shipping, Client $client)
    {
        $shipping->firstname = request()->firstname;
        $shipping->lastname = request()->lastname;
        $shipping->email = request()->email;
        $shipping->phone = request()->phone;
        $shipping->address = request()->address;
        $shipping->country = request()->country;
        $shipping->sameaddress = request()->sameaddress;
        $shipping->state = request()->state;
        $shipping->client_id = request()->client_id;
        $shipping->store_id = request()->store_id;

        if(empty(request(['sameaddress']))){
            $shipping->sameaddress ='0';
        }else{
            $shipping->sameaddress ='1';
        }

        if($shipping->save()){
            flash('Shipping information Update successfully')->success();
        }else{
            flash('Sorry there is something wrong')->error();
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy( Store $store,Shipping $shipping)
    {
        if($shipping->delete()){
            flash('Shipping information deleted successfully')->success();
        }else{
            flash('noooo!')->error();
        }
        return back();
    }

    public function add(Shipping $shipping, Store $store , Client $client){
        return view('client.Add shipping',compact('store','client','shipping'));
    }

    public function model_shipping(Shipping $shipping,Store $store,Client $client){

        $totals = \Cart::getTotal();
        $cartItems = \Cart::getContent();
        $client = \Auth::guard('client')->user()->id;
        $store = request()->store_id;
        $newshipping = new Shipping();
        $newshipping->firstname = request()->firstname;
        $newshipping->lastname = request()->lastname;
        $newshipping->email = request()->email;
        $newshipping->phone = request()->phone;
        $newshipping->address = request()->address;
        $newshipping->country = request()->country;
        $newshipping->sameaddress = request()->sameaddress;
        $newshipping->state = request()->state;
        $newshipping->client_id = request()->client_id;
        $newshipping->store_id = request()->store_id;


        if(empty(request(['sameaddress']))){
            $newshipping->sameaddress ='0';
        }else{
            $newshipping->sameaddress ='1';
        }

        $newshipping->save();
        return back();
    }
}
