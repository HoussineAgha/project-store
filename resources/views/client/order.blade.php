@extends('client.app')

@section('title','Orders')


@section('content4')

<div class="col-12 col-md-9 col-lg-8 offset-lg-1">
    <!-- Order -->
    @forelse ($orders as $item)
    <div class="card card-lg mb-5 border">
      <div class="card-body pb-0" style="background-color: #2988e3f7;">

        <!-- Info -->
        <div class="card card-sm">
          <div class="card-body bg-light">
            <div class="row">
              <div class="col-6 col-lg-2">

                <!-- Heading -->
                <h6 class="heading-xxxs text-muted">Order No:</h6>

                <!-- Text -->
                <p class="mb-lg-0 font-size-sm font-weight-bold">
                  {{$item->id}}
                </p>

              </div>
              <div class="col-6 col-lg-3">

                <!-- Heading -->
                <h6 class="heading-xxxs text-muted">Store name:</h6>

                <!-- Text -->
                <p class="mb-lg-0 font-size-sm font-weight-bold">
                    {{$item->store->name_store}}
                </p>
              </div>
              <div class="col-6 col-lg-2">

                <!-- Heading -->
                <h6 class="heading-xxxs text-muted">Payment:</h6>

                <!-- Text -->
                <p class="mb-0 font-size-sm font-weight-bold">
                    <span class="badge bg-success" style="margin-top: 0px;">{{$item->status}}</span>
                </p>

              </div>
              <div class="col-6 col-lg-3">

                <!-- Heading -->
                <h6 class="heading-xxxs text-muted">Order Amount:</h6>

                <!-- Text -->
                <p class="mb-0 font-size-sm font-weight-bold">
                  ${{$item->total}}
                </p>
              </div>

              <div class="col-6 col-lg-2">

                <!-- Heading -->
                <h6 class="heading-xxxs text-muted">Shipping:</h6>

                <!-- Text -->
                <p class="mb-0  font-weight-bold" style="font-size: 20px;">
                    @if ($item->shipping == 'On the way')
                    @component('shared.badge',['color'=>'primary','type'=>$item->shipping])@endcomponent

                @endif

                @if ($item->shipping == 'Waiting')
                @component('shared.badge',['color'=>'warning text-dark','type'=>$item->shipping])@endcomponent

                @endif

                @if ($item->shipping == 'delivered')
                @component('shared.badge',['color'=>'success','type'=>$item->shipping])@endcomponent

                @endif
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="row align-items-center" style="margin-right: 20%;">
          <div class="col-12 col-lg-6">
            <div class="form-row mb-4 mb-lg-0">
              <div class="col-3">

              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="form-row">
              <div class="col-6">

                <!-- Button -->
                <a id="OrderDetails" class="btn btn-outline-info" href="/client/order-details/{{$item->id}}/{{$store->id}}" style="border-color:#308ce4; color:black">
                  Order Details
                </a>
              </div>

              </div>
            </div>
          </div>
        </div>

      </div>
      @empty
      <div class="empety" style="padding: 20px; background-color:#f1ce5d; border-radius:5px;">
        <h5 class="text-center">There are no Orders at the moment 🙂 😔</h5>
    </div>



    @endforelse
    </div>


    <!-- Pagination -->
    <div class="pagination-product" style="padding: 20px 0">
        {!! $orders->links() !!}
    </div>

  </div>
</div>
</div>
</section>

@endsection
