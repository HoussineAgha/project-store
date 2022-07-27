@extends('admin.backend.layout.app')

@section('title','All-Order')

@section('style')
    <style>
        .alert-success{
            color: white;
            width: 50%;
        }
        td{
            font-size: 14px;
        }
    </style>

@endsection

@section('content')



@include('flash::message')

<div class="container-fluid py-4">
    <div>
        <div class="col-xl-8">
          <div class="filter" style="display: inline-flex;" >
            <div class="text-filter" style="padding-top: 6px;padding-right:25px">
                <h5>Filter</h5>
            </div>
            <select id="SortBy"  class="form-select" aria-label="Default select example" >
                <option value="all">All Order</option>
                <option value="Success">Success payment</option>
                <option value="Deliverd">Deliverd Shipping</option>
                <option value="Way">On The Way Shipping</option>
              </select>

<!--
            <div class="form-check">
              <input id="all" class="form-check-input"  value="all" type="checkbox"  >
              <label class="form-check-label" for="allorder">
                All Order
              </label>
            </div>
            <div class="form-check">
              <input id="Success" class="form-check-input"  type="checkbox" value="Success"  >
              <label class="form-check-label" for="successpayment">
                Success payment
              </label>
            </div>
            <div class="form-check">
              <input id="Deliverd" class="form-check-input"  type="checkbox" value="Deliverd"  >
              <label class="form-check-label" for="deliverdshipping">
                Deliverd Shipping
              </label>
            </div>
            <div class="form-check">
                <input id="Way" class="form-check-input"  type="checkbox" value="Way"  >
                <label class="form-check-label" for="deliverdshipping">
                    On The Way Shipping
                </label>
              </div>
            -->
          </div>
        </div>
        <a href="{{route('admin.createsellers')}}" class="btn btn-dark" id="creat-store" target="_blank"> Creat New </a>
    </div>
    <div class="row" style="margin-top: 75px;" id="hjg">
        @include('admin.backend.modules.order_ajax')
    </div>
    @section('script')
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);


        $('#SortBy').change(function() {
            var sort = $('#SortBy').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('admin.allorder')}}",
                method: 'get',
                data: {sort:sort},
                //cache: false,
                //contentType: false,
                //processData: false,
                success: function (data) {

                    document.getElementById("hjg").innerHTML = data;
                }
            });
        });


/*
      $('#SortBy').change(function(){
        var sort = $('#SortBy').val();

        window.location = "{{url('http://127.0.0.1:8000/admin/all-order')}}?sort="+sort;
      });
*/
        </script>
    @endsection
@endsection


