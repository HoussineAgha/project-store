@extends('client.app')

@section('title','Add shipping')

@section('style')

    <style>
        .card-action-right{
            right: 1.25rem;
        }

        #btn{
            color: black;

        }
        .btn-outline-border{
            color:#111;
            border :1px solid;
            padding-left: 100px;
            padding-right: 100px;
        }
        #add-adress{
            padding-top: 50px;
            text-align: center;
            max-width: 100%;
            border-color:#e5e5e5;

        }
        #navbarResponsive{
            top:175px;
        }

        .navbar{
            height: 170px;
        }
        .g-5, .gy-5{
            margin-top: 50px;
        }
        .btn-dark{
            width: max-content;
            margin-top: 10px;
            margin-left: 10px;
        }
    </style>

@endsection

@section('content4')
<div class="col-12 col-md-9 col-lg-8 offset-lg-1">
    @include('flash::message')
    <div class="row">
        @foreach ($client->shipping as $item)
        <div class="col-12 col-lg-6">

          <!-- Card -->



          <div class="card card-lg bg-light mb-8" style="margin-bottom: 10px;">
            <div class="card-body">

              <!-- Heading -->
              <h6 class="mb-6">
                Shipping Address
              </h6>

              <!-- Text -->
              <p class="text-muted mb-0">
                Email : {{$item->email}} <br>
                Phone : {{$item->phone}} <br>
                Country : {{$item->country}} <br>
                Address : {{$item->address}} <br>
                State : {{$item->state}} <br>
              </p>

              <!-- Action -->
              <div class="card-action card-action-right" style="position: absolute; top:0.25rem; z-index:1;">

                <!-- Button -->
                <a class="btn btn-xs btn-circle btn-white-primary" href="/client/{{$store->id}}/edit_shipping/{{$item->id}}">
                    <i class="far fa-edit"></i>
                </a>

                <!-- Button -->
                <a class="btn btn-xs btn-circle btn-white-primary" href="/client/{{$store->id}}/delete_shipping/{{$item->id}}">
                    <i class="fas fa-trash-alt"></i>
                </a>

              </div>

            </div>
          </div>
        </div>


        @endforeach
        <div class="col-12" id="add-adress">

          <!-- Button -->
          <a class="btn-block btn-lg btn-outline-border" id="btn" href="/client/{{$store->id}}/Add_shipping/{{$client->id}}">
            Add Address <i class="fas fa-plus"></i>
          </a>

        </div>
      </div>
</div>

@endsection
