@extends('admin.backend.layout.app')

@section('title','Profile')

@section('style')
    <style>
        .form-control{
            border: 0.1px solid;
        }
        .alert-success{
            color: white;
            width: 50%;
        }
    </style>

@endsection

@section('content')

<div class="col-12 col-md-9 col-lg-8 offset-lg-1" style="margin: auto;">
    <form class="row g-3" method="POST" action="{{route('admin.update')}}"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

              @include('flash::message')
              @include('shared.error')

        <div class="text-center" style="padding-bottom: 30px;">
            @isset(auth()->user()->image)
            <img src="{{asset(auth()->user()->image)}}" class="img-thumbnail" width="200px" height="200px">
            @endisset

            @empty(auth()->user()->image)
            <img src="{{asset('img\zz.png')}}" class="img-thumbnail" width="120px" height="120px">
            @endempty

          </div>
          <div class="row">
        <div class="col-6">
            <label for="firstname" class="form-label">First Name</label>
            <input name="firstname" type="text" class="form-control" id="firstname" value="{{auth()->user()->first_name}}">
          </div>

          <div class="col-6">
            <label for="lastname" class="form-label">Last Name</label>
            <input name="lastname" type="text" class="form-control" id="lastname" value="{{auth()->user()->last_name}}">
          </div>
          </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input name="email" type="email" class="form-control" id="email" value="{{auth()->user()->email}}">
            </div>
            <div class="col-md-6">
              <label for="phone" class="form-label">Phone</label>
              <input name="phone" type="phone" class="form-control" id="phone" value="{{auth()->user()->Phone}}">
            </div>

            <div class="col-12">
                <input name="password" type="password" class="form-control" id="password" value = "{{auth()->user()->password}}" hidden>
              </div>

            <div class="col-12">
              <label for="newpassword" class="form-label">New Password</label>
              <input name="newpassword" type="password" class="form-control" id="newpassword" placeholder="******">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">New image</label>
                <input value="{{auth()->user()->image}}" name="image" class="form-control form-control-sm" id="image" type="file">
              </div>


              <button type="submit" class="btn" id="publish" style="background-color: #ffc107; color:black">save</button>
      </form>
</div>
@endsection
