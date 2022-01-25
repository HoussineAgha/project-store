<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;

class Usercontroller extends Controller
{


    public function creat(){

        if(auth()->check()){
            return redirect('/');
        }else{
        return view('form.registar');
        }
    }

    public function store(){

        $valdateData = request()->validate([
            'Phone'=>"required|min:6|unique:users",
            'email'=>"required|unique:users",
            'first_name'=>"required",
            'password'=>'required|min:5'
        ]);

        $newUser=new User();
        $newUser->first_name=request()->first_name;
        $newUser->last_name=request()->last_name;
        $newUser->email=request()->email;
        $newUser->email_verified_at=now();
        $newUser->password=bcrypt(request()->password);
        $newUser->country=request()->country;
        $newUser->Phone=request()->Phone;
        $newUser->save();
        return 'test';
    }
    public function login(){

        if(auth()->check()){
            return redirect('/');
        }else{
            return view('form.login');
        }
    }

    public function selectlogin(){
        $valdateData= request()->validate([
            'email'=>'required',
            'password'=>'required|min:5'
        ]);

        if( auth()->attempt(['email' => request()->email, 'password' =>request()-> password])){
            return redirect()->intended('/');
        }else{
            return back()->withErrors(['Wrong registration information']);
        }
    }

    public function logout(){
        auth()->logout();
        session()->flush();
        return redirect('/');
    }

    public function account(){
        return view('backend.customer.index');
    }

    public function stores(){
        return view('backend.customer.stores');
    }
}


