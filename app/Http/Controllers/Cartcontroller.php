<?php

namespace App\Http\Controllers;
use \Darryldecode\Cart\CartCondition;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
use App\Models\Client;
use Session;
class Cartcontroller extends Controller
{

    public function cartList(Product $product,Store $store,Client $client)
    {
        $cartItems = \Cart::getContent();
        $client = Client::first('id');

        // dd($cartItems);
        return view('front customer.customer store.cart', compact('cartItems','product','store','client'));
    }

    public function addToCart(Request $request , Product $product , Store $store)
    {
/*
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'voucher',
            'type' => 'voucher',
            'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => $request->shipping_cost
          ));
*/
        $cartItems = \Cart::getContent();
        if(empty($request->discount)){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'shipping' =>$request->shipping_cost,
            'attributes' => array(
                'image' => $request->image,
            ),

        ]);
    }else{
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->discount,
            'quantity' => $request->quantity,
            'shipping' =>$request->shipping_cost,
            'attributes' => array(
                'image' => $request->image,
            ),
        ]);
}


        Session::put('cartitems',$cartItems);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list',$store->id);
    }
    public function updateCart(Request $request ,Product $product , Store $store)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list', $store->id);
    }

    public function removeCart(Request $request,Product $product , Store $store)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list',$store->id);
    }

    public function clearAllCart(Product $product , Store $store)
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('store.show',$store->id);
    }

}
