<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\store;
use App\Models\Product;
use App\Models\User;
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
            'discription'=>'required|max:10000|min:5',
            'Baner'=>'required|mimes:jpeg,png,jpg|max:10000',
            'logo'=>'required|mimes:jpeg,png,jpg|max:10000',
            'text_top'=>'max:400'
        ]);

        $path= '/storage/'.request()->file('Baner',)->store('image_store',['disk'=>'public']);
        $path2= '/storage/'.request()->file('logo',)->store('logo_store',['disk'=>'public']);

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
        $newstore->	phone = request()->	phone;
        auth()->user()->stores()->save($newstore);

        return redirect('/user/account/stores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $Store,$id)
    {
        $store= Store::find($id);

        return view('front customer.customer store.index',compact('store'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(store $store)
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
    public function update( store $store)
    {
        $validateData= request()->validate([
            'name_store'=>'required|min:5',
            'discription'=>'required|max:10000|min:5',
            'Baner'=>'required|mimes:jpeg,png,jpg|max:10000',
            'logo'=>'required|mimes:jpeg,png,jpg|max:10000',
            'text_top'=>'max:400'
        ]);


        $path= '/storage/'.request()->file('Baner',)->store('image_store',['disk'=>'public']);
        $path2= '/storage/'.request()->file('logo',)->store('logo_store',['disk'=>'public']);

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
        $store->save();

        return redirect('/user/account/stores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(store $store)
    {
        $store->delete();
        return redirect('/user/account/stores');
    }

    public function products(store $store){
        if($store->user_id != auth()->user()->id)
        return back();

        return view('backend.customer.products',compact('store'));

    }


}
