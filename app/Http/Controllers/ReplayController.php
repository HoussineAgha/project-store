<?php

namespace App\Http\Controllers;

use App\Models\Replay;
use App\Models\Ticket;
use App\Http\Requests\StoreReplayRequest;
use App\Http\Requests\UpdateReplayRequest;

class ReplayController extends Controller
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
     * @param  \App\Http\Requests\StoreReplayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Ticket $ticket)
    {
        $newreplay = New Replay();
        $newreplay->message = request()->discription;
        $newreplay->ticket_id = $ticket->id ;
        if($newreplay->save()){
            flash('Reply sent successfully')->success();
        }else{
            flash('هناك شيئ خاطئ حاول مجددا')->error();
        }
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Replay  $replay
     * @return \Illuminate\Http\Response
     */
    public function show(Replay $replay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Replay  $replay
     * @return \Illuminate\Http\Response
     */
    public function edit(Replay $replay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReplayRequest  $request
     * @param  \App\Models\Replay  $replay
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReplayRequest $request, Replay $replay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Replay  $replay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Replay $replay)
    {
        //
    }
}
