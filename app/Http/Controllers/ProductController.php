<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Store;
use App\Models\Categury;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product , store $store )
    {

        if($store->user_id != auth()->user()->id)

        return back();

        return view('backend.customer.creat product',compact('product','store'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(store $store)
    {

        $datavalidation= request()-> validate([
            'name'=>'required|min:4',
            'price'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg|max:10000',
            'gallery.*'=>'mimes:jpeg,png,jpg,jft,pdf|max:10000',
            'discription'=>'required',
        ]);
        if(request()->hasFile('image'))
        $path='/storage/'.request()->file('image')->store('image_cat',['disk'=>'public']);

        $path2=array();
        $galleries = request()->gallery;
        if(count($galleries) > 0){
        for($i=0 , $imax = count($galleries) ; $i < $imax ; $i++){
        $path2[$i]='/storage/'.$galleries[$i]->store('image_cat',['disk'=>'public']);
        }
    }

        $newproduct= new Product();
        $newproduct->name = request()->name;
        $newproduct->price = request()->price;
        $newproduct->discount = request()->discount;
        $newproduct->image = $path;
        $newproduct->gallery = $path2;
        $newproduct->discription = request()->discription;
        $newproduct->ship = request()->ship;
        $newproduct->Inventory = request()->Inventory;
        $newproduct->discription_long = request()->discription_long;
        $newproduct->feature = request()->feature;
        $newproduct->unity = request()->unity;
        $newproduct->qyt = request()->qyt;
        $newproduct->cat_id = request()->cat_id;

        if(empty(request(['feature']))){
            $newproduct->feature = '0';
        }else{
            $newproduct->feature = '1';
        }

        $store->product()->save($newproduct);



        return redirect('/product/'.$store->id.'/All-Products');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store , Product $product)
    {

        $products = Product:: where('store_id','=',$store->id)->inRandomOrder()->limit(4)->get();
        return view('front customer.customer store.single-product',compact('product','store','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        if($product->store->user_id != auth()->user()->id)
        return back();

        $categury = Categury:: where('store_id', $product->store_id)->get();

        return view('backend.customer.edite product',compact('product','categury'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product  , store $store)
    {
        $datavalidation= request()-> validate([
            'name'=>'required|min:4',
            'price'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg|max:10000',
            'gallery.*'=>'mimes:jpeg,png,jpg|max:10000',
            'discription'=>'required',
        ]);
        if(request()->hasFile('image'))
        $path='/storage/'.request()->file('image')->store('image_cat',['disk'=>'public']);

        $path2=array();
        $galleries = request()->gallery;
        if(count($galleries) > 0){
        for($i=0 , $imax = count($galleries) ; $i < $imax ; $i++){
        $path2[$i]='/storage/'.$galleries[$i]->store('image_cat',['disk'=>'public']);
        }
    }

        $product->name = request()->name;
        $product->price = request()->price;
        $product->discount = request()->discount;
        $product->image = $path;
        $product->gallery = $path2;
        $product->discription = request()->discription;
        $product->ship = request()->ship;
        $product->Inventory = request()->Inventory;
        $product->discription_long = request()->discription_long;
        $product->feature = request()->feature;
        $product->unity = request()->unity;
        $product->qyt = request()->qyt;
        $product->cat_id = request()->cat_id;

        if(empty(request(['feature']))){
            $product->feature='0';
        }else{
            $product->feature='1';
        }

        $product->save();

        return redirect('/product/'.$product->store->id.'/All-Products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product , Store $store)
    {
        $product->delete();

        return back();

        return redirect(route('allproduct',$store->id));
    }
}
