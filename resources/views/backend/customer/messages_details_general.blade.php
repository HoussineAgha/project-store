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
    <div class="card-header"><span style="color: rgb(56, 196, 238)">From  :</span> {{env('APP_NAME')}} </div>
    <div class="card-body">
      <h5 class="card-title" style="color: white;"><span style="color: rgb(56, 196, 238)">Title :</span> {{$messages->title}}</h5>
      <p class="card-text" style="color: white;"><span style="color: rgb(56, 196, 238)">Messages :</span> {!! $messages->discription !!}</p>
    </div>
  </div>
</div>
</div>
</div>
@endsection
