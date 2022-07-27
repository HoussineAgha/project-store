@extends('admin.backend.layout.app')

@section('title','Details Seller')

@section('content')

<div class="row">
    <div class="row gx-4 mb-2">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            @isset($user->image)
            <img src="{{$user->image}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            @endisset
            @empty($user->image)
            <img src="{{asset('img\zz.png')}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            @endempty
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              {{$user->first_name}} {{$user->last_name}}
            </h5>
            <p class="mb-0 font-weight-normal text-sm">
              Role : {{$user->role}}
            </p>
          </div>
        </div>

      </div>
    <div class="col-12 col-xl-6">
      <div class="card card-plain h-100">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-md-8 text-end" style="width:-webkit-fill-available;">
                <a href="#">
                  <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                </a>
              </div>

            <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-0">Information the Seller</h6>
          </div>
        </div>
        <div class="card-body p-3">
          <ul class="list-group">
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">First Name:</strong> &nbsp; {{$user->first_name}}</li>
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Last Name:</strong> &nbsp; {{$user->last_name}}</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{$user->Phone}}</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{$user->email}}</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Country:</strong> &nbsp; {{$user->country}}</li>

            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">All Stores:</strong> &nbsp; ({{count($user->stores)}}) , names: @foreach ($user->stores as $item)
                 {{$item->name_store}},
            @endforeach</li>

            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">All Product:</strong> &nbsp; ({{count($user->product)}}) , names: @foreach ($user->product as $item)
                {{$item->name}},
           @endforeach</li>

           <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">All Order:</strong> &nbsp; ({{count($user->order)}}) , ID: @foreach ($user->order as $item)
            {{$item->id}},
            @endforeach</li>

            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">All Ticket:</strong> &nbsp; ({{count($user->ticket)}}) , ID: @foreach ($user->ticket as $item)
                ({{$item->code}})
            @endforeach</li>

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
