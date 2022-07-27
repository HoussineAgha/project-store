<?php

namespace App\Http\Controllers;

use App\Models\messages;
use App\Models\User;
use App\Http\Requests\StoremessagesRequest;
use App\Http\Requests\UpdatemessagesRequest;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(messages $messages , User $user)
    {
        $messag = messages::orderBy('created_at','asc')->paginate(25);
        $messages = messages::all();

        return view('admin.backend.all_messages',compact('messages','messag'));
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
     * @param  \App\Http\Requests\StoremessagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $request_from_blade = request()->specialuser;
        $userss = User:: find($request_from_blade);

        //$users = User::where('role','seller')->get('id');

        $newmessage = new messages();
        $newmessage->title = request()->title;
        $newmessage->discription = request()->discription;
        if(request()->input(['Choose_Type']) == 'alluser'){
            $newmessage->all_user = 1 ;
        }else{
            $newmessage->user_id = $userss['id'];
        }
        if($newmessage->save()){
            flash('Message sent successfully')->success();
        }
        return redirect()->route('admin.allmessage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(messages $messages)
    {
        $users = User::where('role','seller')->get();
        $userss = User::find($users);
        return view('admin.backend.createmessages',compact('users'));
    }

    public function details_message(messages $messages , User $user){

        return view('admin.backend.detailsmessage',compact('messages'));
    }

    public function user_all_messages(messages $messages){

        $messagess = messages::where('user_id',auth()->user()->id)->orderBy('created_at', 'desc')->paginate(25);

        return view('backend.customer.allmessages',compact('messagess'));
    }

    public function user_all_messages_general(){
        $message =  messages::where('all_user', 1)->orderBy('created_at', 'desc')->paginate(25);
        return view('backend.customer.generalmessages',compact('message'));
    }

    public function user_details_message(messages $messages){
        if($messages->user_id != auth()->user()->id)
        return back();

        return view('backend.customer.messagedetails',compact('messages'));
    }

    public function user_details_general_message(messages $messages){
        if($messages->user_id != null)
        return back();
        return view('backend.customer.messages_details_general',compact('messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemessagesRequest  $request
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemessagesRequest $request, messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy(messages $messages)
    {
        if($messages->delete()){
            flash('The message has been deleted successfully')->success();
        }
        return redirect()->route('admin.allmessage');
    }
}
