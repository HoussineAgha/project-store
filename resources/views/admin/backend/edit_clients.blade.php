@extends('admin.backend.layout.app')

@section('title','Edit-Client')

@section('style')
    <style>
        .form-control{
            border: 0.1px solid;
        }
        .input-group .input-group-text{
            left: 0;
        }
        #bloack{
            background-color: white;
            padding: 25px;
            width: 35%;
            border-radius: 5px;
            box-shadow: 0 0.3125rem 0.625rem 0 rgb(0 0 0 / 60%) !important;
            color: black;
        }
        .form-switch .form-check-input{
            top: 5px;
        }
        .form-check-label{
            font-weight: 700;
            color: black;
        }
        .alert-success{
            color: white;
            width: 50%;
        }
    </style>

@endsection

@section('content')
            <h5 class="text-center">Please Edit This Seller Information </h5>

            @include('shared.error')
            @include('flash::message')
            <div class="container">
            <form class="row g-3" method="POST" action="{{route('admin.updateclient',$client->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div id="bloack">
            <div class="form-check form-switch">
                <input name="block" class="form-check-input" type="checkbox" role="switch" id="block" value="1" @if ($client->bloack == 1) checked @endif>
                <label class="form-check-label" for="block" >Block this Client from working</label>
            </div>
            </div>

            <div class="text-center" style="padding-bottom: 30px;">
                @isset($client->image)
                <img src="{{asset($client->image)}}" class="img-thumbnail" width="200px" height="200px">
                @endisset

                @empty($client->image)
                <img src="{{asset('img\zz.png')}}" class="img-thumbnail" width="120px" height="120px">
                @endempty

              </div>
              <div class="row">
            <div class="col-6">
                <label for="full_name" class="form-label">Full Name</label>
                <input name="full_name" type="text" class="form-control" id="full_name" value="{{$client->fullname}}" required>
              </div>

              </div>
                <div class="col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input name="email" type="email" class="form-control" id="email" value="{{$client->email}}" required>
                </div>
                <div class="col-md-6">
                  <label for="phone" class="form-label">Phone</label>
                  <input name="phone" type="phone" class="form-control" id="phone" value="{{$client->phone}}" required>
                </div>

                <div class="col-12">
                    <input name="password" type="password" class="form-control" id="password" value = "{{$client->password}}" hidden>
                  </div>

                <div class="col-12">
                  <label for="newpassword" class="form-label">New Password</label>
                  <input name="newpassword" type="password" class="form-control" id="newpassword" placeholder="******">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">New image</label>
                    <input value="{{asset($client->image)}}" name="image" class="form-control form-control-sm" id="image" type="file">
                  </div>


                  <button type="submit" class="btn" id="publish" style="background-color: #ffc107; color:black">save</button>
          </form>
    </div>

@endsection
