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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(store $store,Client $client){

        $cartItems = \Cart::getContent();

        return view('front customer.customer store.Add shipping',compact('store','client','cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShippingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(){

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
        $newshipping->save();


        return redirect(route('order.request',$store));
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
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShippingRequest  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShippingRequest $request, Shipping $shipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        //
    }
}
