@extends('admin.backend.layout.app')

@section('title','All Message')

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
    <div class="row">
    <div class="col-12">
<div class="card text-white bg-dark mb-3" style="max-width: 100%;">
    @if ($messages->user_id == null && $messages->all_user =1 )
    <div class="card-header" style="color: black;"><span style="color: rgb(56, 196, 238)">Customer Name :</span> All User</div>
    @endif
    @if ($messages->user_id != null)
    @php
    $user = App\Models\User::find($messages->user_id);
@endphp
<div class="card-header" style="color: black;"><span style="color: rgb(56, 196, 238)">Customer Name :</span> {{$user->first_name}} {{$user->last_name}}</div>
    @endif
    <div class="card-body">
      <h5 class="card-title" style="color: white"><span style="color: rgb(56, 196, 238)">Title : </span> {{$messages->title}}</h5>
      <h5 class="card-title" style="color: white"><span style="color: rgb(56, 196, 238)">Message : </span>{!! $messages->discription !!}</h5>
    </div>
  </div>
</div>
</div>
</div>

@endsection
