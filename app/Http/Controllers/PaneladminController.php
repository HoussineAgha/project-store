<?php

namespace App\Http\Controllers;

use App\Models\Paneladmin;
use App\Http\Requests\StorePaneladminRequest;
use App\Http\Requests\UpdatePaneladminRequest;
use App\models\User;

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
