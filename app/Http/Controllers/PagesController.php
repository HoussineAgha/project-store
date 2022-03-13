<?php

namespace App\Http\Controllers;

use App\Models\pages;
use App\Models\Store;
use App\Http\Requests\StorepagesRequest;
use App\Http\Requests\UpdatepagesRequest;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Store $store , Pages $pages , $id)
    {

        $pages = pages:: where('user_id',auth()->user()->id);

        return view('backend.customer.pages',compact('store','pages','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Store $store)
    {

        return view('backend.customer.create pages',compact('store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $store)
    {
        $datavalidate=request()->validate([
            'title'=>'required|min:3',
            'discription'=>'required|min:10',
            'image'=>'mimes:jpeg,png,jpg|max:10000'
        ]);

        if(request()->hasFile('image'))
        $path= '/storage/'.request()->file('image')->store('image_store',['disk'=>'public']);

        $new_pages = new pages();
        $new_pages->title = request()->title;
        $new_pages->slug = request()->slug;
        $new_pages->discription = request()->discription;
        $new_pages->image =$path;
        $new_pages->store_id = request()->store;
        $new_pages->user_id = request()->user;
        $new_pages->save();

        return redirect('/pages/All-pages/'.auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(Pages $pages , Store $store)
    {

        //return view('front customer.customer store.about',compact('pages','store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit(pages $pages , Store $store)
    {

        return view('backend.customer.edite pages',compact('pages','store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepagesRequest  $request
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update( pages $pages)
    {
        $datavalidate=request()->validate([
            'title'=>'required|min:3',
            'discription'=>'required|min:10',
            'image'=>'mimes:jpeg,png,jpg|max:10000'
        ]);

        if(request()->hasFile('image'))
        $path= '/storage/'.request()->file('image')->store('image_store',['disk'=>'public']);

        $pages->title = request()->title;
        $pages->slug = request()->slug;
        $pages->discription = request()->discription;
        $pages->image =$path;
        $pages->store_id = request()->store;
        $pages->user_id = request()->user;
        $pages->save();

        return redirect('/pages/All-pages/'.auth()->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(pages $pages)
    {
        $pages->delete();

        return redirect('/pages/All-pages');
    }
}
