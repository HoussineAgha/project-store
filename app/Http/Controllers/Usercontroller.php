<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\models\User;
use App\Models\Client;
use App\Models\Store;
use session;


class Usercontroller extends Controller
{

    public function index(){
        $role = Auth::User()->role;

        if($role == 'admin'){
            return view('admin.backend.index');
        }

        if($role == 'seller'){
            if(auth()->user()->bloack == 1){
                abort(403);
            }else{
                return view('backend.customer.index');
            }

        }

    }

    public function creat(){

        if(auth()->check()){
            return redirect('/');
        }else{
        return view('form.registar');
        }
    }

    public function store(){
        // دالة نموذج التسجيل

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
        $newUser->role=request()->role;
        $newUser->save();
            return view('form.login');
    }
    public function login(){
        // دالة التحقق اذا المستخدم مسجل دخول ولا لأ
        if(auth()->check()){
            return redirect('/');
        }else{
            return view('form.login');
        }
    }

    public function selectlogin(){
        //دالة تسجيل الدخول والتحقق انو المستخدم مسجل بقاعدة البيانات
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
        //دالة تسجيل الخروج
        auth()->logout();
        session()->flush();
        return redirect('/');
    }

    public function account(){
        //دالة التوجيه الى لوحة تحكم الزائر
        return redirect(route('redirect'));
        //return view('backend.customer.index');
    }

    public function stores(){
        //دالة مشان تعرض للمستخدم المتاجر اللي عندو

        auth()->user()->stores;
        return view('backend.customer.stores');
    }

    public function edit(){
        //دالة تعديل البروفايل للمستخدم
        $profile= User::find(auth()->user()->id);
        return view('backend.customer.profile', compact('profile'));
    }

    public function update(Request $request){

        //دالة تحديث بروفايل المستخدم
        $validateData= request()->validate([
            'first_name'=>'required|min:3',
            'last_name'=>'required|min:3',
            'email'=>'required|unique:users',
            'password'=>'required|min:5',
            'image'=>'mimes:png,jpg,jpeg|max:5000'
        ]);

        $path= '/storage/'.request()->file('image')->store('image_profile',['disk'=>'public']);

        $user = auth()->user();
        $user->first_name=request()->first_name;
        $user->last_name=request()->last_name;
        $user->email=request()->email;
        $user->Phone=request()->Phone;
        $user->country=request()->country;
        $user->password=bcrypt(request()->password);
        $user->image=$path;
        if($user->save()){
            flash('Welcome Aboard!')->success();
        }else{
            flash('Welcome Aboard!')->error();
        }

        return redirect('/user/account');
    }

    public function all_client(User $user,Store $store,Client $client){
        return view('backend.customer.Allclient',compact('store','client'));
    }

    public function client_details(Client $client,Store $store){
        if($store->user_id != auth()->user()->id)
        return back();
        return view('backend.customer.clientstore',compact('store','client'));
    }

    public function delete_client(Client $client){
       $client->delete();
        return back();
    }

    public function edit_client(Client $client,Store $store){
        if($client->id != $client->id)
        return back();
        return view('backend.customer.edit_client',compact('client','store'));
    }

    public function update_client(Client $client,Store $store){

        $valdateData = request()->validate([
            'image'=>'required|mimes:jpeg,png,jpg,webp|max:10000',
        ]);

        if(request()->hasFile('image'))
        $path = '/storage/'.request()->file('image')->store('image_client',['disk' => 'public']);
        $client->fullname = request()->fullname;
        $client->email = request()->email;
        $client->phone = request()->phone;
        $client->password = bcrypt(request()->password);
        $client->image= $path;

         if($client->save()){
            flash('Your information has been successfully updated')->success();
        }else{
            flash('noooo!')->error();
        }

        return back();
    }

}

