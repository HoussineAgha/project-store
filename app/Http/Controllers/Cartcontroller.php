<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
class Cartcontroller extends Controller
{

    public function cartList(Product $product , Store $store)
    {
        $cartItems = \Cart::getContent();

        // dd($cartItems);
        return view('front customer.customer store.cart', compact('cartItems' , 'product' , 'store'));
    }

    public function addToCart(Request $request , Product $product , Store $store)
    {
        $cartItems = \Cart::getContent();
        if(empty($request->discount)){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
    }else{
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->discount,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
    }
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
