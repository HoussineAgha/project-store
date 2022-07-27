<?php

namespace App\Http\Controllers;

use App\Models\Profit;
use App\Models\Store;
use App\Models\Order;
use session;
use Auth;
use App\Http\Requests\StoreProfitRequest;
use App\Http\Requests\UpdateProfitRequest;

class ProfitController extends Controller
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
     * @param  \App\Http\Requests\StoreProfitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profit  $profit
     * @return \Illuminate\Http\Response
     */
    public function show(Profit $profit,Store $store)
    {

            $total_profit = 0;
            foreach(auth()->user()->profit as $item){
                $total_profit += $item->amount ;
            }

        return view('backend.customer.profit',compact('profit','store','total_profit'));
    }

    public function profits_store(Store $store , Profit $profit , Order $order ){
        $total_profit = 0;
        foreach($store->profit as $item){
            $total_profit += $item->amount ;
        }
        $profitss = Profit::paginate(25);
        return view('backend.customer.profit_store',compact('store','profit','total_profit','profitss'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profit  $profit
     * @return \Illuminate\Http\Response
     */
    public function edit(Profit $profit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfitRequest  $request
     * @param  \App\Models\Profit  $profit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfitRequest $request, Profit $profit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profit  $profit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profit $profit)
    {
        //
    }


}
