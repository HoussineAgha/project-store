<?php

namespace App\Http\Controllers;
use App\Mail\orderReceved;
use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Store;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;

class Homecontroller extends Controller
{
    public function stores(Store $store){
        Mail::to(auth()->user())->send(new orderReceved);
        $stores = Store:: all()->OrderBy('created_at','asc')->limit('8')->get();
        return view('home',compact('stores'));
    }

    public function all_client(){
        $client = Client::OrderBy('created_at','desc')->paginate('10');
        return view('admin.backend.clients',compact('client'));
    }

    public function delete_client(Client $client){
        if($client->delete()){
            flash('Client deleted successfully');
            }else{
                flash('Client deleted error');
            }
            return back();
        }

        public function edit_client(Client $client){
            return view('admin.backend.edit_clients',compact('client'));
        }

        public function update_client(Client $client){
            $validateData= request()->validate([
            'full_name'=>'required|min:3',
            //'email'=>'required|unique:users',
            'password'=>'required|min:5',
            'image'=>'mimes:png,jpg,jpeg|max:5000'
        ]);

    if(request()->hasfile('image')){
        $path= '/storage/'.request()->file('image')->store('image_profile',['disk'=>'public']);
    }else{
        $path = $client->image;
    }
        $client->fullname=request()->full_name;
        $client->email=request()->email;
        $client->phone=request()->phone;
        $client->image=$path;
        if(empty(request()->newpassword)){
            $client->password = request()->password;
        }else{
            $client->password=bcrypt(request()->newpassword);
        }

        if(empty(request()->block)){
            $client->bloack = 0;
        }else{
            $client->bloack = 1;
        }
        if($client->save()){
            flash('Done Update this Client')->success();
        }else{
            flash('Sory Something is Wrong')->error();
        }

        return redirect()->route('admin.sellers');
        }

        public function payment(){
            return view('admin.backend.payment');
        }


}
