<?php

namespace App\Http\Controllers;

use App\Models\Categury;
use App\Http\Requests\StoreCateguryRequest;
use App\Http\Requests\UpdateCateguryRequest;

class CateguryController extends Controller
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
     * @param  \App\Http\Requests\StoreCateguryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCateguryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categury  $categury
     * @return \Illuminate\Http\Response
     */
    public function show(Categury $categury)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categury  $categury
     * @return \Illuminate\Http\Response
     */
    public function edit(Categury $categury)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCateguryRequest  $request
     * @param  \App\Models\Categury  $categury
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCateguryRequest $request, Categury $categury)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categury  $categury
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categury $categury)
    {
        //
    }
}
