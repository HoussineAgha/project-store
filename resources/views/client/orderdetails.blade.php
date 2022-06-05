@extends('client.app')

@section('title','Order details')

@section('content4')

<div class="col-12 col-md-9 col-lg-8 offset-lg-1">
    <!--product details-->
          <!-- List group -->
          @foreach ($order->product as $key => $item)

          <ul class="list-group list-group-lg list-group-flush-y list-group-flush-x">
            <li class="list-group-item">
              <div class="row align-items-center">
                <div class="col-4 col-md-3 col-xl-2">
                  <!-- Image -->
                  <a href="product.html"><img src="{{$item['attributes']['image']}}" alt="..." class="img-fluid"></a>
                </div>
                <div class="col">
                  <!-- Title -->
                  <p class="mb-4 font-size-sm font-weight-bold">
                    <a class="text-body" href="#">{{$item['name']}}  </a> <br>
                    <span class="text-muted">Price : ${{$item['price']}} x ({{$item['quantity']}})</span>
                  </p>
                  <!-- Text -->
                  <div class="font-size-sm text-muted">
                    Shipping Type : {{$item['shipping_type']}} <br>
                    shipping cost: ${{$item['shipping']}} <br>
                    Color: Red
                  </div>
                </div>
              </div>
            </li>
          </ul>
          @endforeach
<br>
<!--total price-->
      <div class="card card-lg mb-5 border">
        <div class="card-body">

          <!-- Heading -->
          <h6 class="mb-7">Order Total</h6>

          <!-- List group -->
          <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
            <li class="list-group-item d-flex">
              <span>Subtotal : </span>
              <span class="ml-auto">${{$subtotal}}</span>
            </li>
            <li class="list-group-item d-flex">
              <span>Tax</span>
              <span class="ml-auto">$0.00</span>
            </li>
            <li class="list-group-item d-flex">
              <span>Shipping : </span>
              <span class="ml-auto">${{$shipping}}</span>
            </li>
            <li class="list-group-item d-flex font-size-lg font-weight-bold">
              <span>Total : </span>
              <span class="ml-auto">${{$order->total}}</span>
            </li>
          </ul>

        </div>
      </div>

<!--shipping info-->
      <div class="card card-lg border">
        <div class="card-body">

          <!-- Heading -->
          <h6 class="mb-7">Billing &amp; Shipping Details</h6>

          <!-- Content -->
          <div class="row">
            <div class="col-12 col-md-4">

              <!-- Heading -->
              <p class="mb-4 font-weight-bold" style="color: rgb(172, 163, 40)">
               <strong> information:</strong>
              </p>
              <p class="mb-7 mb-md-0 text-gray-500">
                <strong>Name :</strong> {{$order->client->fullname}} <br>
                <strong>Email :</strong> {{$order->client->email}} <br>
                <strong>Phone :</strong> {{$order->client->phone}} <br>
              </p>

            </div>
            <div class="col-12 col-md-4">

              <!-- Heading -->
              <p class="mb-4 font-weight-bold" style="color: rgb(172, 163, 40)">
                <strong> Shipping Address:</strong>
               </p>

              <p class="mb-7 mb-md-0 text-gray-500">
                <strong>Country : </strong>{{$order->shipping_info['country']}} <br>
                <strong>State : </strong>{{$order->shipping_info['state']}} <br>
                <strong>Adress : </strong>{{$order->shipping_info['address']}} <br>
              </p>

            </div>
            <div class="col-12 col-md-4">

              <!-- Heading -->
              <p class="mb-4 font-weight-bold" style="color: rgb(172, 163, 40)">
                <strong> Shipping Method:</strong>
               </p>
               @if ($order->status == 'succeeded' || $order->status == 'CAPTURED')
               <p class="mb-7 text-gray-500">
                Standart Shipping <br>
              <strong>(5 - 7 days)</strong>
              </p>
               @else
               <p class="mb-7 text-gray-500">
                Standart Shipping <br>
              <strong>Will not ship until payment is completed</strong>
              </p>
               @endif
              <!-- Heading -->
              <p class="mb-4 font-weight-bold">
                Payment Method:<br>
                <strong>{{$order->patment_type}}</strong>
              </p>
              @if($order->cartnumber !=null)
              <p class="mb-0 text-gray-500">
                Cart Last Number<br>
                <strong>{{$order->cartnumber}}</strong>
              </p>
              @endif
            </div>
          </div>

        </div>
      </div>
</div>
@endsection
