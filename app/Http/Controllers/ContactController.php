<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Store;
Use App\Models\Client;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Store $store,Contact $contact)
    {
        $contacts = Contact::where('store_id',$store->id)->paginate(10);
        if($store->user_id != auth()->user()->id)
        return back();
        return view('backend.customer.contactstore',compact('store','contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Store $store,Contact $contact)
    {
        return view('backend.customer.contactus',compact('store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Store $store,Contact $contact)
    {
        /*
        $validate = $request->validate([
            'fullname'=>'required|min:3',
            'email'=>'required|min:3',
            'phone'=>'required|min:3',
            'country'=>'required|min:3',
            'subject'=>'required|min:5',
            'message'=>'required|min:10',
        ]);
*/
        $contact = new contact();
        $contact->name_client = $request->fullname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->country = $request->country;
        $contact->subject = $request->subject;
        $contact->message = $request->messages;
        $contact->store_id = $request->store_id;

        if($contact->save()){
        flash('Your information has been successfully send')->success();
    }else{
        flash('Something happened, no data sent, try again later')->error();
    }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact , Store $store)
    {
        return view('front customer.customer store.contact_us',compact('store','contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'This message has been successfully deleted');
    }

    public function view(Contact $contact,Store $store){

        return view('backend.customer.contactdetails',compact('contact'));
    }
}
