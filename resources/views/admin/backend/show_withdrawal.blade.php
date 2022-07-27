@extends('admin.backend.layout.app')

@section('title','Withdrawal')

@section('style')
    <style>
        .alert-success{
            color: white;
            width: 50%;
        }
    </style>

@endsection

@section('content')
@include('flash::message')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-6">
            <div>
                <h6>User Details :</h6>
            </div>
            <div class="card-body p-3">
                <ul class="list-group">
                    <li class="list-group-item border-0 ps-3 pt-3 text-sm"><strong class="text-dark">First Name:</strong> &nbsp;{{$user->first_name}}</li>
                    <li class="list-group-item border-0 ps-3 pt-3 text-sm"><strong class="text-dark">Last Name:</strong> &nbsp; {{$user->last_name}}</li>
                    <li class="list-group-item border-0 ps-3 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{$user->Phone}}</li>
                    <li class="list-group-item border-0 ps-3 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{$user->email}}</li>
                    <li class="list-group-item border-0 ps-3 text-sm"><strong class="text-dark">Location:</strong> &nbsp; {{$user->country}}</li>
                </ul>
            </div>
        </div>
        <div class="col-6">
            <div>
                <h6>Withdrawal Details :</h6>
            </div>


            <div class="card-body p-3">
                <ul class="list-group" >
                    <li class="list-group-item border-0 ps-3 pt-3 text-sm" ><strong class="text-dark">Withdrawal ID :</strong> &nbsp;# {{$withdrawal->id}}</li>
                    <li class="list-group-item border-0 ps-3 pt-3 text-sm"><strong class="text-dark">Withdrawal Amount :</strong> &nbsp; {{$withdrawal->amount}}</li>
                    <li class="list-group-item border-0 ps-3 text-sm"><strong class="text-dark">Withdrawal Description :</strong> &nbsp; {{$withdrawal->description}}</li>
                    <li class="list-group-item border-0 ps-3 text-sm"><strong class="text-dark">Withdrawal Method :</strong> &nbsp; {{$withdrawal->Withdrawal_Method}}</li>
                    @switch($withdrawal->status)
                    @case($withdrawal->status = 1)
                    <li class="list-group-item border-0 ps-3 text-sm"><strong class="text-dark">status :</strong> &nbsp; <span class="badge badge-sm bg-gradient-success">Success</span>
                      @break
                    @case($withdrawal->status = 2)
                    <li class="list-group-item border-0 ps-3 text-sm"><strong class="text-dark">status :</strong> &nbsp;<span class="badge badge-sm bg-gradient-warning">Rejected</span>
                      @break
                    @default
                        <li class="list-group-item border-0 ps-3 text-sm"><strong class="text-dark">status :</strong> &nbsp;<span class="badge badge-sm bg-gradient-info ">Pendding</span>
                  @endswitch
                  <br>
                    <div class="stat" style="padding-top: 25px; padding-left:0px;">
                    <a href="{{route('admin.doneWithdrawal',$withdrawal->id)}}" class="btn btn-success">Done</a>
                    <a href="{{route('admin.rejectedWithdrawal',$withdrawal->id)}}" class="btn btn-danger">Rejected</a>
                    </div>
                </ul>

            </div>

        </div>
    </div>
</div>
@endsection
