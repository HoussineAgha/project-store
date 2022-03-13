<?php

namespace App\Http\Controllers;

use App\Models\Categury;
use App\Http\Requests\StoreCateguryRequest;
use App\Http\Requests\UpdateCateguryRequest;
use App\Models\User;
use App\Models\store;
use App\Models\Product;

class CateguryController extends Controller
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
    public function create()
    {
        return view('backend.customer.create Categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCateguryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $datavaldation= request()->validate([
            'name'=>'required|unique:categuries',
            'slug'=>'required'
        ]);

        $path= '/storage/'.request()->File('image')->store('image_cat',['disk'=>'public']);

        $newcat= new Categury();
        $newcat->name = request()->name;
        $newcat->discription = request()->discription;
        $newcat->slug = request()->slug;
        $newcat->image = $path;
        $newcat->store_id = request()->store;
        $newcat->save();

        return redirect('/user/account/stores');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categury  $categury
     * @return \Illuminate\Http\Response
     */
    public function show(Categury $categury , Store $store)
    {
        if($categury->store_id != $store->id)
        return back();

        $product= Product::where([
            ['cat_id','=',$categury->id],
            ['store_id','=',$store->id],
        ])->get();
        return view('front customer.customer store.show categury', compact('categury','store','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categury  $categury
     * @return \Illuminate\Http\Response
     */
    public function edit(Categury $categury , Store $store)
    {
        if($categury->store->user_id != auth()->user()->id)

        return back();

        return view('backend.customer.edite category',compact('categury','store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCateguryRequest  $request
     * @param  \App\Models\Categury  $categury
     * @return \Illuminate\Http\Response
     */
    public function update(Categury $categury)
    {
        $datavaldation= request()->validate([
            'name'=>'required',
            'slug'=>'required'
        ]);
        $path= '/storage/'.request()->File('image')->store('image_cat',['disk'=>'public']);

        $categury->name =request()->name;
        $categury->slug =request()->slug;
        $categury->discription = request()->discription;
        $categury->store_id = request()->store;
        $categury->image =$path;

        $categury->save();

        return redirect('/user/account/stores');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categury  $categury
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categury $categury)
    {
        $categury->delete();

        return back();
    }
}
