@extends('backend.customer.appback')

@section('title','Message Details')


@section('style')
    <style>
        .btn-dark{
            margin-right: 140px;
        }
        p{
          display: inline;
          font-size: 15px;
        }

    </style>
@endsection

@section('content2')
<div class="container">
    <div class="row">
    <div class="col-12">
<div class="card text-white bg-dark mb-3" style="max-width: 100%;">
    <div class="card-header"><span style="color: rgb(56, 196, 238)">Client Name :</span> {{$contact->name_client}}</div>
    <div class="card-body">
      <h5 class="card-title"><span style="color: rgb(56, 196, 238)">Email :</span> {{$contact->email}}</h5>
      <h5 class="card-title"><span style="color: rgb(56, 196, 238)">Phone :</span> {{$contact->phone}}</h5>
      <h5 class="card-title"><span style="color: rgb(56, 196, 238)">Country :</span> {{$contact->country}}</h5>
      <h5 class="card-title"><span style="color: rgb(56, 196, 238)">Subject :</span> {{$contact->subject}}</h5>
      <p class="card-text"><span style="color: rgb(56, 196, 238)">Messages :</span> {{$contact->message}}</p>
    </div>
  </div>
</div>
</div>
</div>
@endsection
