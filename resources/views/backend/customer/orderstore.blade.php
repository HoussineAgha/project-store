@extends('backend.customer.appback')

@section('title','order')


@section('style')
    <style>
        .badge{
            color: black;
        }
    </style>
@endsection

@section('content2')
@include('flash::message')
<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-xl-8">
                        <form class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                            <div class="col-auto">
                                <label for="inputPassword2" class="visually-hidden">Search</label>
                                <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                            </div>
                            <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <label for="status-select" class="me-2">Status</label>
                                    <select class="form-select" id="status-select">
                                        <option value="all" >All Order</option>
                                        <option value="paid">Paid</option>
                                        <option value="mada">Payment Mada</option>
                                        <option value="stripe">Payment Stripe</option>
                                        <option value="paypal">Payment Paypal</option>
                                        <option value="delivered">Delivered</option>
                                        <option value="way">On The Way</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-4">
                        <div class="text-xl-end mt-xl-0 mt-2">
                            <button type="button" class="btn btn-danger mb-2 me-2"><i class="mdi mdi-basket me-1"></i> Add New Order</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive" id="filt">
                    @include('backend.customer.modules.orderstore_ajax')
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<!-- pandgation Page start Here -->
<div class="pagination-product" style="padding: 20px 0">
    {{ $orders->links() }}
</div>

@section('script')
    <script>
        $('#status-select').change(function(){
            var filter = $('#status-select').val();
            $.ajax({
                url:'',
                type:'get',
                data:{filter:filter},
                success: function(data){
                    document.getElementById("filt").innerHTML = data;
                }
            });
        });
    </script>
@endsection

@endsection

