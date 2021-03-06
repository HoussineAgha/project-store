<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\store;
use App\Models\Product;
use App\Models\User;
use App\Models\Categury;
use App\Models\pages;
use App\Models\Client;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\StorestoreRequest;
use App\Http\Requests\UpdatestoreRequest;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$stores = Store::orderBy()->paginate(10);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(count(auth()->user()->stores) == 3 )
        return back();
        return view('backend.customer.creat_store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorestoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validateData=request()->validate([
            'name_store'=>'required|min:5|unique:stores',
            'discription'=>'required|min:5',
            'Baner'=>'required|mimes:jpeg,png,jpg|max:10000',
            'logo'=>'required|mimes:jpeg,png,jpg|max:10000',
            'text_top'=>'max:400',
            'adsimage'=>'mimes:jpeg,png,jpg|max:10000',
        ]);

        if(request()->hasFile('Baner'))
        $path= '/storage/'.request()->file('Baner')->store('image_store',['disk'=>'public']);
        if(request()->hasFile('logo'))
        $path2= '/storage/'.request()->file('logo')->store('logo_store',['disk'=>'public']);
        if(request()->hasFile('adsimage'))
        $path3 = '/storage/'.request()->file('adsimage')->store('image_store',['disk'=>'public']);

        $newstore = new store();
        $newstore->name_store = request()->name_store;
        $newstore->discription = request()->discription;
        $newstore->Baner = $path;
        $newstore->logo = $path2;
        $newstore->text_top = request()->text_top;
        $newstore->face = request()->face;
        $newstore->twite = request()->twite;
        $newstore->linkdine = request()->linkdine;
        $newstore->youtube = request()->youtube;
        $newstore->text_footer = request()->text_footer;
        $newstore->opening_times = request()->opening_times;
        $newstore->close_times = request()->close_times;
        $newstore->email = request()->email;
        $newstore->phone = request()->	phone;
        $newstore->adsimage =$path3;
        $newstore->urlads = request()->urlads;
        auth()->user()->stores()->save($newstore);

        return redirect('/user/account/stores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store, Product $product , $id ,Pages $pages,Client $client)
    {

            $store= Store::find($id);
            if($store->bloack == 1)
            return abort(403);
            if($store->review == 0)
            return abort(404);

        $latest = Product:: where([
                    ['store_id','=',$id],
                    ['review',1],
                    ['bloack',0],
                    ])->orderBy('created_at', 'desc')->limit('8')->get();

        $feature = Product:: where([
                                    ['store_id','=',$id],
                                    ['feature','=','1'],
                                    ['review',1],
                                    ['bloack',0],
                                ])->orderBy('created_at', 'asc')->limit('8')->get();

        $best = Product::where([
                            ['store_id',$id],
                            ['best_sellary','1'],
                            ['review',1],
                            ['bloack',0],
                        ])->orderBy('created_at', 'asc')->limit('8')->get();

        $categury= Categury:: where('store_id','=' ,$id)->orderBy('created_at','desc')->limit('6')->get();

        //$clients = Client::find($client);

        return view('front customer.customer store.index',compact('store','feature','latest','categury','pages','product','best'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        if($store->user_id != auth()->user()->id)
        return back();
        return view('backend.customer.edite',compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatestoreRequest  $request
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function update( Store $store)
    {
        $validateData= request()->validate([
            'name_store'=>'required|min:5',
            'discription'=>'required|min:5',
            'Baner'=>'mimes:jpeg,png,jpg|max:10000',
            'logo'=>'mimes:jpeg,png,jpg|max:10000',
            'text_top'=>'max:400'
        ]);

    if(request()->hasFile('Baner')){
        $path= '/storage/'.request()->file('Baner')->store('image_store',['disk'=>'public']);
    }else{
        $path = $store->Baner ;
    }
    if(request()->hasFile('logo')){
        $path2= '/storage/'.request()->file('logo')->store('logo_store',['disk'=>'public']);
    }else{
        $path2= $store->logo;
    }
    if(request()->hasFile('adsimage')){
        $path3= '/storage/'.request()->file('adsimage')->store('image_store',['disk'=>'public']);
    }else{
        $path3= $store->adsimage;
    }
        $store->name_store=request()->name_store;
        $store->discription=request()->discription;
        $store->Baner = $path;
        $store->logo = $path2;
        $store->text_top = request()->text_top;
        $store->face = request()->face;
        $store->twite = request()->twite;
        $store->linkdine = request()->linkdine;
        $store->youtube = request()->youtube;
        $store->text_footer = request()->text_footer;
        $store->opening_times = request()->opening_times;
        $store->close_times = request()->close_times;
        $store->email = request()->email;
        $store->phone = request()->phone;
        $store->adsimage = $path3;
        $store->urlads = request()->urlads;
        $store->save();

        return redirect('/user/account/stores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return redirect('/user/account/stores');
    }

    public function products(store $store , Product $product){
        if($store->user_id != auth()->user()->id)
        return back();
        return view('backend.customer.products',compact('store','product'));
    }

    public function category(Store $store){
        if($store->user_id != auth()->user()->id)
        return back();
        return view('backend.customer.show category',compact('store'));
    }

    public function allproduct(Categury $categury , Store $store){
        $minprice = Product::min('price');
        $maxprice = Product::max('price');
        if(request()->ajax()){
            $data ='';
            if(request()->data !=null){
                $data = request()->data ;
            }
            if($data == 'all'){
                $product = Product:: where([
                    ['store_id','=', $store->id],
                    ['review',1],
                    ['bloack',0],
                    ])->orderBy('created_at', 'desc')->paginate(24);
            }elseif ($data == 'low') {
                $product = Product:: where([
                    ['store_id','=', $store->id],
                    ['review',1],
                    ['bloack',0],
                    ['price',$minprice],

                    ])->orderBy('created_at', 'desc')->paginate(24);
            }elseif ($data == 'hiegt'){
                $product = Product:: where([
                    ['store_id','=', $store->id],
                    ['review',1],
                    ['bloack',0],
                    ['price',$maxprice],
                    ])->orderBy('created_at', 'desc')->paginate(24);
            }
            return view('front customer.modules.all_product',compact('product','store','categury'));
        }
        $product = Product:: where([
            ['store_id','=', $store->id],
            ['review',1],
            ['bloack',0],
            ])->orderBy('created_at', 'desc')->paginate(24);
        return view('front customer.customer store.products',compact('product','store','categury'));
    }

}






