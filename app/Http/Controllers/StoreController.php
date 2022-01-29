<?php

namespace App\Http\Controllers;

use App\Models\store;
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
            'discription'=>'required|max:1000|min:5',
            'image'=>'required|mimes:jpeg,png,jpg|max:10000',
        ]);

        $path= '/storage/'.request()->file('image')->store('image_store',['disk'=>'public']);

        $newstore = new store();
        $newstore->name_store = request()->name_store;
        $newstore->discription = request()->discription;
        $newstore->image = $path;
        auth()->user()->stores()->save($newstore);

        return redirect('/user/account/stores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(store $store)
    {

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
            'name_store'=>'required|min:5|unique:stores',
            'discription'=>'required|max:1000|min:5',
            'image'=>'required|mimes:jpeg,png,jpg|max:10000',
        ]);

        $path=$store->image;
        $path= '/storage/'.request()->file('image')->store('image_store',['disk'=>'public']);

        $store->name_store=request()->name_store;
        $store->discription=request()->discription;
        $store->image=$path;
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
        //
    }


}
