@extends('layout.app')

@section('title','Home')

@section('style')
<style>
    .store{
        background-color: #ffc107;
        text-align: center;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 50px;
    }
    .card-body{
      text-align: center;
    }
    .why{
        text-align: center;
        color: white;
    }
    .counts{
        background-color: #009970;
        margin-top: 50px;
        padding: 30px;
        color: white;
    }
</style>
@endsection

@section('content')
@php
$setting = App\Models\Setting::all();
@endphp
@foreach ($setting as $item)


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        @isset($item->slider[0])
        <img src="{{asset($item->slider[0])}}" class="d-block w-100" height="500px" alt="...">
        @endisset
        @empty($item->slider[0])
        <img src="{{asset('img/store.jpg')}}" class="d-block w-100" height="500px" alt="...">
        @endempty
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p></p>
        </div>
      </div>
      <div class="carousel-item">
        @isset($item->slider[1])
        <img src="{{asset($item->slider[1])}}" class="d-block w-100" height="500px" alt="...">
        @endisset
        @empty($item->slider[1])
        <img src="{{asset('img/store.jpg')}}" class="d-block w-100" height="500px" alt="...">
        @endempty
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p></p>
        </div>
      </div>
      <div class="carousel-item">
        @isset($item->slider[2])
        <img src="{{asset($item->slider[2])}}" class="d-block w-100" height="500px" alt="...">
        @endisset
        @empty($item->slider[2])
        <img src="{{asset('img/store.jpg')}}" class="d-block w-100" height="500px" alt="...">
        @endempty
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p></p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  @endforeach
<!------ store------->
<div class="container" style="padding-top: 50px;">
    <div class="row">
        <div class="store">
            <h4>Some stores</h4>
            <hr style="border: 1px solid #0d6efd; width:15%; margin:auto">
        </div>
        @php
           $store = App\Models\Store::OrderBy('created_at','Asc')->limit('10')->get();
        @endphp
        @foreach ($store as $item)
        @if ($item->bloack == 1 || $item->review == 0)

        @else
        <div class="col-4" style="width: 20%; padding-bottom:20px;">
          <div class="card">
              <img src="{{asset($item->Baner)}}" class="card-img-top" height="150px" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$item->name_store}}</h5>
                <a href="{{$item->id}}" class="btn btn-primary" target="_blank">Go Visit Store</a>
              </div>
            </div>
          </div>
        @endif

        @endforeach
    </div>
</div>

 <!-- ======= Why Us Section ======= -->


 <div class="why-us" style="margin-top: 50px; background-color:black;padding:50px;">
    <div class="row">
        <div class="why">
            <h4>Features of our stores</h4>
            <hr style="border: 1px solid #ffffff; width:15%; margin:auto; margin-bottom:30px;">
        </div>
        @foreach ($setting as $item)
        <div class="col-7">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                      {{$item->title_accordion[0]}}
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                      <strong>{!! $item->disc_accordion[0] !!}</strong>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        {{$item->title_accordion[1]}}
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                      <strong>{!!$item->disc_accordion[1]!!}</strong>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        {{$item->title_accordion[2]}}
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                      <strong>{!!$item->disc_accordion[2]!!}</strong>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-5">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    @isset($item->image_accordion[0])
                    <img src="{{asset($item->image_accordion[0])}}" class="d-block w-100" height="350px" alt="..." style="border-radius: 5px;">
                    @endisset
                    @empty($item->image_accordion[0])
                    <img src="{{asset('img/store.jpg')}}" class="d-block w-100" height="400px" alt="..."  style="border-radius: 5px;">
                    @endempty
                  </div>
                  <div class="carousel-item">
                    @isset($item->image_accordion[1])
                    <img src="{{asset($item->image_accordion[1])}}" class="d-block w-100" height="350px" alt="..."  style="border-radius: 5px;">
                    @endisset
                    @empty($item->image_accordion[1])
                    <img src="{{asset('img/store.jpg')}}" class="d-block w-100" height="400px" alt="..."  style="border-radius: 5px;">
                    @endempty
                  </div>
                  <div class="carousel-item">
                    @isset($item->image_accordion[2])
                    <img src="{{asset($item->image_accordion[2])}}" class="d-block w-100" height="350px" alt="..."  style="border-radius: 5px;">
                    @endisset
                    @empty($item->image_accordion[2])
                    <img src="{{asset('img/store.jpg')}}" class="d-block w-100" height="400px" alt="..."  style="border-radius: 5px;">
                    @endempty
                  </div>

                  <div class="carousel-item">
                    @isset($item->image_accordion[3])
                    <img src="{{asset($item->image_accordion[3])}}" class="d-block w-100" height="350px" alt="..."  style="border-radius: 5px;">
                    @endisset
                    @empty($item->image_accordion[3])
                    <img src="{{asset('img/store.jpg')}}" class="d-block w-100" height="400px" alt="..."  style="border-radius: 5px;">
                    @endempty
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
    </div>
 </div>
 @endforeach

<!-- End Why Us Section -->

      <!--===Baner===--->
      <div class="baneer" style="padding-top: 50px; padding-bottom:50px;">
        <div class="container">
            <div class="row">
                @foreach ($setting as $item)
            <div class="col-12">
                @isset($item->baner)
                <img src="{{asset($item->baner)}}" width="100%" height="200px" style=" border-style:double;" >
                @endisset
                @empty($item->baner)

                @endempty

            </div>
            @endforeach
        </div>
        </div>
    </div>
    <!---====end Baner===-->

    <!-- ======= Counts Section =======
    <section id="counts" class="counts">
        <div class="container">
          <div class="row counters">
            <div class="col-lg-3 col-6 text-center">
              <span data-toggle="counter-up" style="font-size: 30px;">232</span>
              <h5>Clients</h5>
            </div>
            <div class="col-lg-3 col-6 text-center">
              <span data-toggle="counter-up" style="font-size: 30px;">300</span>
              <h5>Stores</h5>
            </div>
            <div class="col-lg-3 col-6 text-center">
              <span data-toggle="counter-up" style="font-size: 30px;">1,463</span>
              <h5>Hours Of Support</h5>
            </div>
            <div class="col-lg-3 col-6 text-center">
              <span data-toggle="counter-up" style="font-size: 30px;">15</span>
              <h5>Hard Workers</h5>
            </div>
          </div>
        </div>
      </section>
       End Counts Section -->

      <!-- staic media start -->
<section class="static-media-section bg-dark py-45">
    <div class="container">
        <div class="static-media-wrap p-0">
            <div class="row">
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class="static-media2 flex-column flex-sm-row" style="text-align: center">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="{{asset('img/2.png')}}"
                            alt="icon">
                        <div class="media-body">
                            <h4 class="title text-capitalize text-white">Free Shipping</h4>
                            <p class="text text-white">On all orders over $75.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class=" static-media2 flex-column flex-sm-row" style="text-align: center">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="{{asset('img/3.png')}}"
                            alt="icon">
                        <div class="media-body">
                            <h4 class="title text-capitalize text-white">Free Returns</h4>
                            <p class="text text-white">Returns are free within 9 days</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class=" static-media2 flex-column flex-sm-row" style="text-align: center">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="{{asset('img/4.png')}}"
                            alt="icon">
                        <div class="media-body">
                            <h4 class="title text-capitalize text-white">Support 24/7</h4>
                            <p class="text text-white">Contact us 24 hours a day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class=" static-media2 flex-column flex-sm-row" style="text-align: center">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="{{asset('img/5.png')}}"
                            alt="icon">
                        <div class="media-body">
                            <h4 class="title text-capitalize text-white">100% Payment Secure</h4>
                            <p class="text text-white">Your payment are safe with us.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


      @section('script')


      @endsection
@endsection
