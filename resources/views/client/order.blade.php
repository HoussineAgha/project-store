@extends('client.app')

@section('title','Orders')

@section('content4')

<div class="col-12 col-md-9 col-lg-8 offset-lg-1">
    <!-- Order -->
    @forelse (Auth::guard('client')->user()->order as $item)
    <div class="card card-lg mb-5 border">
      <div class="card-body pb-0" style="background-color: #2988e3f7;">

        <!-- Info -->
        <div class="card card-sm">
          <div class="card-body bg-light">
            <div class="row">
              <div class="col-6 col-lg-3">

                <!-- Heading -->
                <h6 class="heading-xxxs text-muted">Order No:</h6>

                <!-- Text -->
                <p class="mb-lg-0 font-size-sm font-weight-bold">
                  {{$item->id}}
                </p>

              </div>
              <div class="col-6 col-lg-3">

                <!-- Heading -->
                <h6 class="heading-xxxs text-muted">Store</h6>

                <!-- Text -->
                <p class="mb-lg-0 font-size-sm font-weight-bold">
                  <time datetime="2019-10-01">
                    {{$item->store_id}}
                  </time>
                </p>

              </div>
              <div class="col-6 col-lg-3">

                <!-- Heading -->
                <h6 class="heading-xxxs text-muted">Status:</h6>

                <!-- Text -->
                <p class="mb-0 font-size-sm font-weight-bold">
                  {{$item->status}}
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
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="row align-items-center">
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
                <a class="btn btn-sm btn-block btn-outline-dark" href="account-order.html">
                  Order Details
                </a>
              </div>

              </div>
            </div>
          </div>
        </div>

      </div>
      @empty
      nono
                @endforelse
    </div>


    <!-- Pagination -->
    <nav class="d-flex justify-content-center justify-content-md-end mt-10">
      <ul class="pagination pagination-sm text-gray-400">
        <li class="page-item">
          <a class="page-link page-link-arrow" href="#">
            <i class="fa fa-caret-left"></i>
          </a>
        </li>
        <li class="page-item active">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">4</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">5</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">6</a>
        </li>
        <li class="page-item">
          <a class="page-link page-link-arrow" href="#">
            <i class="fa fa-caret-right"></i>
          </a>
        </li>
      </ul>
    </nav>

  </div>
</div>
</div>
</section>

@endsection
