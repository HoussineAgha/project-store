@extends('admin.backend.layout.app')

@section('title','All-Store')

@section('style')
    <style>
        .alert-success{
            color: white;
            width: 50%;
        }
    </style>

@endsection

@section('content')

@include('flash::message')

<div class="container-fluid py-4">
    <div>
        <a href="{{route('admin.creatnewstores')}}" class="btn btn-dark" id="creat-store" target="_blank"> Creat New </a>
    </div>
    <div class="col-xl-8">
        <div class="filter" style="display: inline-flex;" >
          <div class="text-filter" style="padding-top: 6px;padding-right:25px">
              <h5>Filter</h5>
          </div>
          <select id="filters"  class="form-select" aria-label="Default select example" >
              <option value="all">All Store</option>
              <option value="online">Online Store</option>
              <option value="bloacked">Bloack Store</option>
              <option value="inreview">In Review Store</option>
            </select>
        </div>
      </div>

    <div class="row" id="row" style="margin-top: 75px;">
        @include('admin.backend.modules.stores_ajax')
    </div>
    @section('script')
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        </script>
        <script>
            $('#filters').change(function(){
                var sort = $("#filters").val();
                $.ajax({
                url: "",
                method:'get',
                data:{sort:sort},
                success: function(data){
                    //console.log(data);
                    document.getElementById("row").innerHTML = data;
                }
                });

            });
        </script>
    @endsection
@endsection



