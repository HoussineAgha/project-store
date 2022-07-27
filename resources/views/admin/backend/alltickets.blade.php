@extends('admin.backend.layout.app')

@section('title','All Tickets')

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
    <div class="col-xl-8">
        <div class="filter" style="display: inline-flex;" >
          <div class="text-filter" style="padding-top: 6px;padding-right:25px">
              <h5>Filter</h5>
          </div>
          <select id="filters"  class="form-select" aria-label="Default select example" >
              <option value="all">All Tickets</option>
              <option value="solved">Solved Tickets</option>
              <option value="inreview">Inreview Tickets</option>
            </select>
        </div>
      </div>
    <div class="row" id="row" style="margin-top: 75px;">
        @include('admin.backend.modules.ticket_ajax')
    </div>
    @section('script')
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        </script>
        <script>
            $('#filters').change(function(){
                var filter = $('#filters').val();
                $.ajax({
                    url:'',
                    type:'get',
                    data:{filter:filter},
                    success: function(data){
                        //console.log(data);
                        document.getElementById("row").innerHTML = data;
                    }
                });
            });
        </script>
    @endsection
@endsection
