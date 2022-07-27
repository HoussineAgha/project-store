<?php

namespace App\Http\Controllers;

use App\Models\Paneladmin;
use App\Http\Requests\StorePaneladminRequest;
use App\Http\Requests\UpdatePaneladminRequest;
use App\models\User;
Use App\Models\Store;
use App\Models\Product;
use App\repostory\PaneladminRepostory;

class PaneladminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.frontend.form.login');
    }

    public function login_admin(){

        $validate = request()->validate([
            'email'=>'required',
            'password'=>'required|min:5'
        ]);

        if(auth()->attempt(['email'=>request()->email ,'password'=>request()->password])){
            if(auth()->user()->role != 'admin'){
                return back()->withErrors(['This is not considered the login data for the admin']);
            }else{
                return redirect()->intended('/');
            }
        }else{
            return back()->withErrors(['Wrong registration information']);
        }
    }

    public function logout(){
        auth()->logout();
        session()->flush();
        return redirect('/');
    }

    public function profile(){

        return view('admin.backend.profile');
    }

    public function edit_profile(){

        return view('admin.backend.edit_profile');
    }

    public function update_profile(){
        $user= auth()->user();
        $Datavalidate = request()->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'required',
            //'email'=>'required|unique:users',
            'image'=>'mimes:jpeg,png,jpg,webp|max:10000'
        ]);
        if(request()->hasfile('image')){
            $path = '/storage/'.request()->file('image')->store('image_profile',['disk'=>'public']);
        }else{
            $path = $user->image;
        }

            $user->first_name = request()->firstname;
            $user->last_name = request()->lastname;
            $user->email = request()->email;
            $user->Phone = request()->phone;
            $user->password = bcrypt(request()->newpassword);
            $user->image = $path;

            if(empty(request()->newpassword)){
                $user->password = request()->password;
            }else{
                $user->password = bcrypt(request()->newpassword);
            }

            if($user->save()){
                flash('Done Update Profile')->success();
            }else{
                flash('warning Update Profile')->warning();
            }

            return redirect()->route('admin.profile');
    }

    public function all_store(){

        if(request()->ajax()){
            $sort = "";
            if(request()->sort != null){
                $sort = request()->sort ;
            }
            if($sort == 'all'){
                $stores = store:: orderBy('created_at', 'desc')->paginate(10);
            }elseif ($sort == 'online') {
                $stores = store:: where([
                    ['review',1],
                    ['bloack',0]
                    ])->orderBy('created_at', 'desc')->paginate(20);
            }elseif($sort == 'bloacked') {
                $stores = store:: where('bloack',1)->orderBy('created_at', 'desc')->paginate(20);

            }elseif($sort == 'inreview') {
                $stores = store:: where('review',0)->orderBy('created_at', 'desc')->paginate(20);
            }

            return view('admin.backend.modules.stores_ajax',compact('stores'));
        }

        $stores = Store:: orderBy('created_at', 'desc')->paginate(10);
        return view('admin.backend.stores',compact('stores'));
    }

    public function delete_store(Store $store){
        if($store->delete()){
            flash('Done Delete store')->success();
        }else{
            flash('warning Delete store')->warning();
        }
        return back();
    }

    public function index_store(Store $store){
        $user = User::where('role','=','seller')->get();
        return view('admin.backend.creat_store',compact('user'));
    }

    public function creat_store(Store $store){
        $validateData=request()->validate([
            'name_store'=>'required|min:5|unique:stores',
            'user_id'=> 'required',
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
        $newstore->user_id = request()->user_id;

        if($newstore->save()){
            flash('Store created successfully')->success();
        }else{
            flash('Something is wrong, try again later')->warning();

        }

        return redirect()->route('admin.stores');
    }

    public function edit_store(Store $store){
        return view('admin.backend.edit_store',compact('store'));
    }

    public function update_store(Store $store){
        $validateData= request()->validate([
            'name_store'=>'required|min:5',
            'discription'=>'required|min:5',
            'Baner'=>'mimes:jpeg,png,jpg|max:10000',
            'logo'=>'mimes:jpeg,png,jpg|max:10000',
            'text_top'=>'max:400'
        ]);

    if(request()->hasFile('Baner')){
        $path= '/storage/'.request()->file('Baner',)->store('image_store',['disk'=>'public']);
    }else{
        $path = $store->Baner;
    }
    if(request()->hasFile('logo')){
        $path2= '/storage/'.request()->file('logo',)->store('logo_store',['disk'=>'public']);
    }else{
        $path2 = $store->logo;
    }
    if(request()->hasFile('adsimage')){
        $path3= '/storage/'.request()->file('adsimage',)->store('image_store',['disk'=>'public']);
    }else{
        $path3 = $store->adsimage;
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

        if(empty(request()->block)){
            $store->bloack = 0;
        }else{
            $store->bloack = 1;
        }
        if(isset(request()->review)){
            $store->review = 0;
        }else{
            $store->review = 1;
        }
        $store->save();

        return redirect()->route('admin.stores');

    }

    public function all_seller(){
        $user = User:: where('role','seller')->orderby('created_at', 'desc')->paginate(10);

        return view('admin.backend.sellers',compact('user'));
    }

    public function details_seller(User $user){
        return view('admin.backend.details_seller',compact('user'));
    }



    public function index_seller(User $user){
        return view('admin.backend.creat_seller',compact('user'));
    }

    public function create_seller(User $user){
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
        if($newUser->save()){
            flash('Seller created successfully')->success();
        }else{
            flash('Something is wrong, try again later')->warning();
        }

        return redirect()->route('admin.sellers');
    }

    public function edit_seller(User $user){
        return view('admin.backend.edit_seller',compact('user'));
    }

    public function update_seller(User $user){

        $validateData= request()->validate([
            //'first_name'=>'required|min:3',
            //'last_name'=>'required|min:3',
            //'email'=>'required|unique:users',
            'password'=>'required|min:5',
            'image'=>'mimes:png,jpg,jpeg|max:5000'
        ]);

    if(request()->hasfile('image')){
        $path= '/storage/'.request()->file('image')->store('image_profile',['disk'=>'public']);
    }else{
        $path = $user->image;
    }
        $user->first_name=request()->firstname;
        $user->last_name=request()->lastname;
        $user->email=request()->email;
        $user->Phone=request()->phone;
        $user->image=$path;
        if(empty(request()->newpassword)){
            $user->password = request()->password;
        }else{
            $user->password=bcrypt(request()->newpassword);
        }

        if(empty(request()->block)){
            $user->bloack = 0;
        }else{
            $user->bloack = 1;
        }
        if($user->save()){
            flash('Done Update this Seller')->success();
        }else{
            flash('Sory Something is Wrong')->error();
        }

        return redirect()->route('admin.sellers');
    }

    public function delete_seller(User $user){
        if($user->delete()){
            flash('Done delete this seller')->success();
        }else{
            flash('warning Delete seller')->warning();
        }
        return back();
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
     * @param  \App\Http\Requests\StorePaneladminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaneladminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paneladmin  $paneladmin
     * @return \Illuminate\Http\Response
     */
    public function show(Paneladmin $paneladmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paneladmin  $paneladmin
     * @return \Illuminate\Http\Response
     */
    public function edit(Paneladmin $paneladmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaneladminRequest  $request
     * @param  \App\Models\Paneladmin  $paneladmin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaneladminRequest $request, Paneladmin $paneladmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paneladmin  $paneladmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paneladmin $paneladmin)
    {
        //
    }
}
