@extends('client.app')

@section('title','Dashboard')


@section('content4')
<div class="col-12 col-md-9 col-lg-8 offset-lg-1">
    <div class="row">
        <div class="col-sm-6">
            <div class="card widget-flat" style="background-image:linear-gradient(315deg, #b5a118cb 0%, #970035 74%); text-align:center;">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-account-multiple widget-icon bg-success-lighten text-success"></i>
                    </div>
                    <h5 class=" fw-normal mt-0"  title="Number of Customers" style="color: white;">Wishlist</h5>
                    <h3 class="mt-3 mb-3" style="color: white;">3</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> </span>
                        <span class="text-nowrap" style="color: white;">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-sm-6">
            <div class="card widget-flat" style="background-image:linear-gradient(315deg, #2123e1cb 0%, #0e0744 74%); text-align:center;">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-cart-plus widget-icon bg-danger-lighten text-danger"></i>
                    </div>
                    <h5 class=" fw-normal mt-0" title="Number of Orders" style="color: white;">Orders</h5>
                    <h3 class="mt-3 mb-3" style="color: white;">{{Auth::guard('client')->user()->order->count()}}</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                        <span class="text-nowrap" style="color: white;">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>

</div>
@endsection
