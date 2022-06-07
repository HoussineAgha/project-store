<?php

namespace App\Http\Controllers\admin;

use App\Models\Paneladmin;
use App\Http\Requests\StorePaneladminRequest;
use App\Http\Requests\UpdatePaneladminRequest;

class PaneladminController extends Controller
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
