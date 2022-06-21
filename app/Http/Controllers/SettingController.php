<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Setting $setting)
    {
        $Datavalidate = request()->validate([
            'logo'=>'mimes:jpeg,png,jpg|max:10000',
            'slide1'=>'mimes:jpeg,png,jpg|max:10000',
            'slide2'=>'mimes:jpeg,png,jpg|max:10000',
            'slide3'=>'mimes:jpeg,png,jpg|max:10000',
            'imageacc1'=>'mimes:jpeg,png,jpg|max:10000',
            'imageacc2'=>'mimes:jpeg,png,jpg|max:10000',
            'imageacc3'=>'mimes:jpeg,png,jpg|max:10000',
            'imageacc4'=>'mimes:jpeg,png,jpg|max:10000',
            'baner'=>'mimes:jpeg,png,jpg|max:10000',
        ]);

    $path = '/storage/'.request()->file('logo')->store('image_setting',['disk'=>'public']);
    $path2 = '/storage/'.request()->file('slide1')->store('image_setting',['disk'=>'public']);
    $path3 = '/storage/'.request()->file('slide2')->store('image_setting',['disk'=>'public']);
    $path4 = '/storage/'.request()->file('slide3')->store('image_setting',['disk'=>'public']);
    $slider = [$path2,$path3,$path4];

    $path5= '/storage/'.request()->file('imageacc1')->store('image_setting',['disk'=>'public']);
    $path6= '/storage/'.request()->file('imageacc2')->store('image_setting',['disk'=>'public']);
    $path7= '/storage/'.request()->file('imageacc3')->store('image_setting',['disk'=>'public']);
    $path8= '/storage/'.request()->file('imageacc4')->store('image_setting',['disk'=>'public']);
    $image_accordion = [$path5,$path6,$path7,$path8];

    $path9= '/storage/'.request()->file('baner')->store('image_setting',['disk'=>'public']);

    $title_accordion1 = request()->feaut1;
    $title_accordion2 = request()->feaut2;
    $title_accordion3 = request()->feaut3;
    $title_accr = [$title_accordion1,$title_accordion2,$title_accordion3];

    $disc_accordion1 = request()->feau1;
    $disc_accordion2 = request()->feau2;
    $disc_accordion3 = request()->feau3;
    $discription_accordion = [$disc_accordion1,$disc_accordion2,$disc_accordion3];

    $face = request()->face;
    $twit = request()->twitter;
    $insta = request()->instagram;
    $yout = request()->Youtube;
    $socialmedia =[ $face,$twit,$insta,$yout];

        $setting = new Setting();
        $setting->logo = $path;
        $setting->slider = $slider;
        $setting->social = $socialmedia;
        $setting->discfooter = request()->discription;
        $setting->phone = request()->phone;
        $setting->email = request()->email;
        $setting->title_accordion = $title_accr ;
        $setting->disc_accordion = $discription_accordion;
        $setting->image_accordion = $image_accordion;
        $setting->baner = $path9;

        $setting->save();
        return redirect('/user/control');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        return view('admin.backend.settings',compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $setting = Setting::where('id','=','1')->first();
        return view('admin.backend.edit_settings',compact('setting'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingRequest  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Setting $setting)
    {
        $Datavalidate = request()->validate([
            'logo'=>'mimes:jpeg,png,jpg|max:10000',
            'slide1'=>'mimes:jpeg,png,jpg|max:10000',
            'slide2'=>'mimes:jpeg,png,jpg|max:10000',
            'slide3'=>'mimes:jpeg,png,jpg|max:10000',
            'imageacc1'=>'mimes:jpeg,png,jpg|max:10000',
            'imageacc2'=>'mimes:jpeg,png,jpg|max:10000',
            'imageacc3'=>'mimes:jpeg,png,jpg|max:10000',
            'imageacc4'=>'mimes:jpeg,png,jpg|max:10000',
            'baner'=>'mimes:jpeg,png,jpg|max:10000',
        ]);

    if(request()->hasfile('logo')){
        $path = '/storage/'.request()->file('logo')->store('image_setting',['disk'=>'public']);
    }else{
        $path = $setting->logo;
    }
    if(request()->hasfile('slide1')){
        $path2 = '/storage/'.request()->file('slide1')->store('image_setting',['disk'=>'public']);
    }else{
        $path2 = $setting->slider[0];
    }
    if(request()->hasfile('slide2')){
        $path3 = '/storage/'.request()->file('slide2')->store('image_setting',['disk'=>'public']);
    }else{
        $path3 = $setting->slider[1];
    }
    if(request()->hasfile('slide3')){
        $path4 = '/storage/'.request()->file('slide3')->store('image_setting',['disk'=>'public']);
    }else{
        $path4 = $setting->slider[2];
    }
        $slider = [$path2,$path3,$path4];

    if(request()->hasfile('imageacc1')){
        $path5= '/storage/'.request()->file('imageacc1')->store('image_setting',['disk'=>'public']);
    }else{
        $path5 = $setting->image_accordion[0];
    }
    if(request()->hasfile('imageacc2')){
        $path6 = '/storage/'.request()->file('imageacc2')->store('image_setting',['disk'=>'public']);
    }else{
        $path6 = $setting->image_accordion[1];
    }

    if(request()->hasfile('imageacc3')){
        $path7= '/storage/'.request()->file('imageacc3')->store('image_setting',['disk'=>'public']);
    }else{
        $path7 = $setting->image_accordion[2];
    }

        if(request()->hasfile('imageacc4')){
            $path8 = '/storage/'.request()->file('imageacc4')->store('image_setting',['disk'=>'public']);
        }else{
            $path8 =$setting->image_accordion[3];
        }

        $image_accordion = [$path5,$path6,$path7,$path8];

        if(request()->hasfile('baner')){
        $path9 = '/storage/'.request()->file('baner')->store('image_setting',['disk'=>'public']);
    }else{
        $path9 = $setting->baner;
    }
        $title_accordion1 = request()->feaut1;
        $title_accordion2 = request()->feaut2;
        $title_accordion3 = request()->feaut3;
        $title_accr = [$title_accordion1,$title_accordion2,$title_accordion3];

        $disc_accordion1 = request()->feau1;
        $disc_accordion2 = request()->feau2;
        $disc_accordion3 = request()->feau3;
        $discription_accordion = [$disc_accordion1,$disc_accordion2,$disc_accordion3];

        $face = request()->face;
        $twit = request()->twitter;
        $insta = request()->instagram;
        $yout = request()->Youtube;
        $socialmedia =[ $face,$twit,$insta,$yout];

            $setting->logo = $path;
            $setting->slider = $slider;
            $setting->social = $socialmedia;
            $setting->discfooter = request()->discription;
            $setting->phone = request()->phone;
            $setting->email = request()->email;
            $setting->title_accordion = $title_accr ;
            $setting->disc_accordion = $discription_accordion;
            $setting->image_accordion = $image_accordion;
            $setting->baner = $path9;

            if($setting->save()){
                flash('Settings have been updated successfully')->success();
            }else{
                flash('Something is wrong try again')->error();
            }

            return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting = Setting::pluk('logo')->delete();

        return back();
    }
}
