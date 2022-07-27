<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Replay;
use Auth ;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $filter = "";
            if(request()->filter != null){
                $filter = request()->filter;
            }
            if($filter == 'all'){
                $tickets = Ticket::orderBy('created_at','desc')->paginate(25);
            }elseif ($filter == 'solved') {
                $tickets = Ticket::where('status',1)->orderBy('created_at','desc')->paginate(25);
            }elseif ($filter == 'inreview') {
                $tickets = Ticket::where('status',0)->orderBy('created_at','desc')->paginate(25);
            }
            return view('admin.backend.modules.ticket_ajax',compact('tickets'));
        }
        $tickets = Ticket::orderBy('created_at','desc')->paginate(25);

        return view('admin.backend.alltickets',compact('tickets'));
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
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if(request()->hasFile('image')){
            $path = '/storage/'.request()->file('image')->store('ticket_image',['disk'=>'public']);
        }else{
            $path = null;
        }

        $Datavalidate = request()->validate([
            'subject'=>'required|min:4',
            'description'=>'required|min:10',
            'image'=>'mimes:jpeg,png,webp,jpg,svg',
        ]);

        $cod = rand(1000,3000);

        $newticket = new Ticket();
        $newticket->code = $cod;
        $newticket->subject = request()->subject;
        $newticket->description = request()->description;
        $newticket->file = $path;
        $newticket->user_id = auth()->user()->id;

        if($newticket->save()){
            flash('Ticket sent successfully')->success();
        }else{
            flash('هناك شيئ خاطئ حاول مجددا')->error();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $tickets = Ticket::orderBy('created_at','desc')->paginate(25);
        return view('backend.customer.tickets',compact('tickets'));
    }

    public function details_ticket_admin(Ticket $ticket){
        $user = User::find($ticket->user_id);

        return view('admin.backend.details_ticketadmin',compact('ticket','user'));
    }

    public function details_ticket_user(Ticket $ticket){

        $user = User::find($ticket->user_id);
        if($ticket->user_id != auth()->user()->id)
        return back();
        return view('backend.customer.details_ticket',compact('ticket','user'));
    }

    public function solved_ticket(Ticket $ticket){

        //$tickets = Ticket::find($id);
        $ticket->status = 1;
        if($ticket->save()){
            flash('This ticket has been successfully resolved')->success();
        }
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
