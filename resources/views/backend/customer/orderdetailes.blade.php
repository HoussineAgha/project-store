@extends('backend.customer.appback')

@section('title','order')


@section('style')
    <style>
        .btn-dark{
            margin-right: 140px;
        }
        p{
          display: inline;
        }
        .badge{
            color: black;
            background-color: #ccf6e4;
            border-radius: 50%;
            font-size: 14px;
        }

    </style>
@endsection

@section('content2')

<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../../assets/img/icons/spot-illustrations/corner-4.png);opacity: 0.7;"></div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
      <h5>Order Details: #{{$order->id}}</h5>
      <p class="fs--1">{{$order->creat_at}}</p>
      <div><strong class="me-2">Payment Status: </strong>
        <div class="badge rounded-pill badge-soft-success fs--2">{{$order->status}}</div>
      </div>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <h5 class="mb-3 fs-0">information client</h5>
          <!--<h6 class="mb-2">Antony Hopkins</h6>-->
          <p class="mb-1 fs--1"><strong>Name Client: </strong> {{$order->client->fullname}} </p><br>
          <p class="mb-0 fs--1"> <strong>Email: </strong><a href="mailto:{{$order->client->email}}">{{$order->client->email}}</a></p><br>
          <p class="mb-0 fs--1"> <strong>Phone: </strong><a href="tel:{{$order->client->phone}}">{{$order->client->phone}}</a></p>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <h5 class="mb-3 fs-0">Shipping Address</h5>
          <h6 class="mb-2">Antony Hopkins</h6>
          <p class="mb-0 fs--1">2393 Main Avenue<br>Penasauka, New Jersey 87896</p>
          <div class="text-500 fs--1"><!--(Free Shipping)--></div>
        </div>
        <div class="col-md-6 col-lg-4">
          <h5 class="mb-3 fs-0">Payment Method</h5>
          <div class="d-flex">
            <div class="flex-1">
              <h4 class="mb-0">{{$order->patment_type}}</h4>
              <p class="mb-0 fs--1">**** **** **** {{$order->cartnumber}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-body">
      <div class="table-responsive fs--1">
        <table class="table table-striped border-bottom">
          <thead class="bg-200 text-900">
            <tr>
              <th class="border-0">Products</th>
              <th class="border-0 text-center">Quantity</th>
              <th class="border-0 text-end">Rate</th>
              <th class="border-0 text-end">shipping</th>
              <th class="border-0 text-end">Amount</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($order->product as $item)
            <tr class="border-200">
              <td class="align-middle">
                <h6 class="mb-0 text-nowrap">{{$item['name']}}</h6>
              </td>
              <td class="align-middle text-center">{{$item['quantity']}}</td>
              <td class="align-middle text-end">${{$item['price']}}</td>
              <td class="align-middle text-end">${{$item['shipping']}}</td>
              @php
                  $subtotal = ($item['price']*$item['quantity'])+$item['shipping'];

              @endphp
              <td class="align-middle text-end">${{$subtotal}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="row g-0 justify-content-end">
        <div class="col-auto">
          <table class="table table-sm table-borderless fs--1 text-end">
            <tbody><tr>

            </tr>
            <tr>


            </tr>
            <tr class="border-top">
              <th class="text-900">Total:</th>

              <td class="fw-semi-bold">${{$totals}}</td>
            </tr>
          </tbody></table>
        </div>
      </div>
    </div>
  </div>

@endsection
