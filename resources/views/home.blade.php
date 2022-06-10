@extends('layout.app')

@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('img/store.jpg')}}" class="d-block w-100" height="400px" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/store.jpg')}}" class="d-block w-100" height="400px" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/store.jpg')}}" class="d-block w-100" height="400px" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
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

  <div class="row mt-4">
    <div class="col-lg-4 col-md-6 mt-4 mb-4">
      <div class="card z-index-2 ">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
          <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
            <div class="chart">
              <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="mb-0 ">Website Views</h6>
          <p class="text-sm ">Last Campaign Performance</p>
          <hr class="dark horizontal">
          <div class="d-flex ">
            <i class="material-icons text-sm my-auto me-1">schedule</i>
            <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mt-4 mb-4">
      <div class="card z-index-2  ">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
          <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
            <div class="chart">
              <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="mb-0 "> Daily Sales </h6>
          <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today sales. </p>
          <hr class="dark horizontal">
          <div class="d-flex ">
            <i class="material-icons text-sm my-auto me-1">schedule</i>
            <p class="mb-0 text-sm"> updated 4 min ago </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mt-4 mb-3">
      <div class="card z-index-2 ">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
          <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
            <div class="chart">
              <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="mb-0 ">Completed Tasks</h6>
          <p class="text-sm ">Last Campaign Performance</p>
          <hr class="dark horizontal">
          <div class="d-flex ">
            <i class="material-icons text-sm my-auto me-1">schedule</i>
            <p class="mb-0 text-sm">just updated</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
