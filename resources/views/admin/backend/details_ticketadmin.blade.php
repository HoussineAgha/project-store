@extends('admin.backend.layout.app')

@section('title','Details Ticket')

@section('style')
    <style>
        .alert-success{
            color: white;
            width: 50%;
        }
    </style>

@endsection
@section('content')
<div class="container">
    @include('flash::message')
    <div class="row">
        <div>
            <a href="{{route('admin.solvedstickets',$ticket->id)}}" class="btn btn-dark" id="creat-store" style="margin-bottom: 25px;" > Solved </a>


        </div>
    <div class="col-12">
        <div class="card text-white bg-dark mb-3" style="max-width: 100%;">
        <div class="card-header" style="color: black;"><span style="color: rgb(56, 196, 238)">Customer Name :</span> {{$user->first_name}} {{$user->last_name}}<br><span style="color: rgb(56, 196, 238)">Customer ID :</span> {{$user->id}} <br><span style="color: rgb(56, 196, 238)">Customer Email :</span> {{$user->email}} </div>

        <div class="card-body">
            <h5 class="card-title" style="color: white"><span style="color: rgb(56, 196, 238)">Title : </span> {{$ticket->subject}}</h5>
            <h5 class="card-title" style="color: white"><span style="color: rgb(56, 196, 238)">Message : </span>{{ $ticket->description }}</h5><br><br>
            @if ($ticket->file)
            <img src="{{asset($ticket->file)}}" width="300px" height="300px">
            @endif
        </div>
        </div>
    </div>
    </div>
@foreach ($ticket->replay as $item)
    <div class="col-6">
        <div class="card text-white bg-dark mb-3" style="max-width: 100%;">
            <div class="card-body">
                <h5 class="card-title" style="color: white"><span style="color: rgb(56, 196, 238)">Message : </span>{!! $item->message !!}</h5><br><br>
                <p class="text-muted">{{$item->created_at}}</p>
            </div>
        </div>
    </div>

    @endforeach

    @if ($ticket->status == 0)
    <form method="POST" action="{{route('admin.replaystickets',$ticket->id)}}">
        @csrf
        <div class="row" >
            <div class="col-10" style="margin: auto;">
                <div class="mb-3">
                    <label for="discription" class="form-label" >Replay</label>
                    <textarea name="discription" class="form-control" id="discription" rows="3" required></textarea>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto" id="btn1">
                    <button type="submit" class="btn btn-primary">Send Replay</button>
                </div>
            </div>
        </div>
    </form>
    @else
        <div class="alert alert-danger" role="alert" style="text-align: center;color:white;">
            <h6 style="color: wheat">This ticket has been resolved and cannot be answered</h6>
          </div>
    @endif


@endsection

