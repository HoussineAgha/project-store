<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use App\Models\Profit;
use App\Models\User;
use Auth;
use App\Http\Requests\StoreWithdrawalRequest;
use App\Http\Requests\UpdateWithdrawalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\withdrawalcustomer;
use App\Mail\withdrawalcancel;
use App\Mail\withdrawaladmin;


class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Withdrawal $withdrawal,Profit $profit)
    {
        $withdrawals = Withdrawal::orderBy('created_at','desc')->paginate(50);
        return view('backend.customer.withdrawal',compact('withdrawal','withdrawals'));
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
     * @param  \App\Http\Requests\StoreWithdrawalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Profit $profit)
    {
        //هي مشان بس ينبعت الاسمسل للادمن انو في طلب سحب جديد استعلمت بجدول اليوزر عن الادمن حتى ابعتوا بالايميل
        $admin = User::where('role','admin')->get();

        $Datavalidate = request()->validate([
            'amount'=>'required|min:0',
            'description'=>'required',
            'Withdrawal_Method'=>'required'
        ]);

        if( $request->input('amount') > auth()->user()->balance )
            return back()->withErrors(['The amount to withdraw is greater than the amount of your Profit']);

        $newwithdrawal = new withdrawal();
        $newwithdrawal->Withdrawal_Method = request()->Withdrawal_Method;
        $newwithdrawal->description = request()->description;
        $newwithdrawal->amount = request()->amount;
        $newwithdrawal->user_id = auth()->user()->id;
        if($newwithdrawal->save()){
            flash('The request has been sent successfully')->success();
        }
        Mail::to($admin)->send(new withdrawaladmin);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */

    public function admin_Withdrawal(Withdrawal $withdrawal){
        $withdrawalss = Withdrawal::orderBy('created_at', 'desc')->paginate(50);
        return view('admin.backend.Request_withdrawal',compact('withdrawalss'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWithdrawalRequest  $request
     * @param  \App\Models\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */

    public function done_Withdrawal($id){

    // مشان اعرف اي دي الطلب نفسه واغير حالته من0 الى1
        $withdrawals = Withdrawal::find($id);
    //مشان اعرف اي دي اليوزر صاحب الطلب
        $user = $withdrawals->user_id;
        $user_id = User::find($user);

        $withdrawals->status = 1 ;
        if($withdrawals->save()){
            flash('Status updated successfully')->success();
            $user_id->balance -= $withdrawals->amount ;
            $user_id->save();
            $total_balance = $user_id->balance ;
        }else{
            flash('There is something wrong')->error();
        }
        Mail::to($user_id)->send(new withdrawalcustomer($total_balance));
        return redirect()->route('admin.allWithdrawal');
    }

    public function rejected_Withdrawal($id){

        $withdrawals = Withdrawal::find($id);
            //مشان اعرف اي دي اليوزر صاحب الطلب
            $user = $withdrawals->user_id;
            $user_id = User::find($user);

        $withdrawals->status = 2 ;
        if($withdrawals->save()){
            flash('Status updated successfully')->success();
        }else{
            flash('There is something wrong')->error();
        }
        Mail::to($user_id)->send(new withdrawalcancel());
        return redirect()->route('admin.allWithdrawal');
    }


    public function show($id,$user)
    {
        $withdrawal = Withdrawal::find($id);
        $user = User::find($user);
        if($withdrawal->user_id != $user->id)
        return back();
        return view('admin.backend.show_withdrawal',compact('withdrawal','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWithdrawalRequest  $request
     * @param  \App\Models\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWithdrawalRequest $request, Withdrawal $withdrawal)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdrawal $withdrawal)
    {
        //
    }
}
