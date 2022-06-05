@extends('client.app')

@section('title','Profile')

@section('content4')

@php
    $client = Auth::guard('client')->user();
@endphp

<div class="col-12 col-md-9 col-lg-8 offset-lg-1">
    <form class="row g-3" method="POST" action="{{route('update.profile',$client->id)}}"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

              @include('flash::message')


        <div class="text-center">
            @isset(Auth::guard('client')->user()->image)
            <img src="{{asset(Auth::guard('client')->user()->image)}}" class="img-thumbnail" width="200px" height="200px">
            @endisset

            @empty(Auth::guard('client')->user()->image)
            <img src="{{asset('img\zz.png')}}" class="img-thumbnail" width="120px" height="120px">
            @endempty

          </div>
        <div class="col-12">
            <label for="fullname" class="form-label">Full Name</label>
            <input name="fullname" type="text" class="form-control" id="fullname" value="{{Auth::guard('client')->user()->fullname}}">
          </div>

            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input name="email" type="email" class="form-control" id="email" value="{{Auth::guard('client')->user()->email}}">
            </div>
            <div class="col-md-6">
              <label for="phone" class="form-label">Phone</label>
              <input name="phone" type="phone" class="form-control" id="phone" value="{{Auth::guard('client')->user()->phone}}">
            </div>

            <div class="col-12">
              <label for="password" class="form-label">New Password</label>
              <input name="password" type="password" class="form-control" id="password" placeholder="******">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">New image</label>
                <input value="{{asset(Auth::guard('client')->user()->image)}}" name="image" class="form-control form-control-sm" id="image" type="file">
              </div>


              <button type="submit" class="btn btn-primary" id="publish">save</button>
      </form>
</div>

@endsection
