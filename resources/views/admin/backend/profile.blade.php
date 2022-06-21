@extends('admin.backend.layout.app')

@section('title','Profile')

@section('content')

<div class="row">
    <div class="row gx-4 mb-2">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            @isset(auth()->user()->image)
            <img src="{{auth()->user()->image}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            @endisset
            @empty(auth()->user()->image)
            <img src="{{asset('img\zz.png')}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            @endempty
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              {{auth()->user()->first_name}} {{auth()->user()->last_name}}
            </h5>
            <p class="mb-0 font-weight-normal text-sm">
              Role : {{auth()->user()->role}}
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
          <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                  <i class="material-icons text-lg position-relative">home</i>
                  <span class="ms-1">App</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                  <i class="material-icons text-lg position-relative">email</i>
                  <span class="ms-1">Messages</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="#" role="tab" aria-selected="false">
                  <i class="material-icons text-lg position-relative">settings</i>
                  <span class="ms-1">Settings</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    <div class="col-12 col-xl-6">
      <div class="card card-plain h-100">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-md-8 text-end" style="width:-webkit-fill-available;">
                <a href="{{route('admin.editprofile')}}">
                  <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                </a>
              </div>

            <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-0">Profile Information</h6>
          </div>
        </div>
        <div class="card-body p-3">
          <ul class="list-group">
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">First Name:</strong> &nbsp; {{auth()->user()->first_name}}</li>
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Last Name:</strong> &nbsp; {{auth()->user()->last_name}}</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{auth()->user()->Phone}}</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{auth()->user()->email}}</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; {{auth()->user()->country}}</li>
            <li class="list-group-item border-0 ps-0 pb-0">
              <strong class="text-dark text-sm">Social:</strong> &nbsp;
              <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="#">
                <i class="fab fa-facebook fa-lg"></i>
              </a>
              <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="#">
                <i class="fab fa-twitter fa-lg"></i>
              </a>
              <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="#">
                <i class="fab fa-instagram fa-lg"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
</div>
@endsection
