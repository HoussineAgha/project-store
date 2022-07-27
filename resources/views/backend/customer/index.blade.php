@extends('backend.customer.appback')

@section('title','Dashboard')



@section('content2')

<div class="row">
        <div class="col-4" style="margin: auto; margin-bottom:25px;">
            <div class="card widget-flat" style="background-image:linear-gradient(315deg, #2123e1cb 0%, #0e0744 74%); text-align:center;">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-cart-plus widget-icon bg-danger-lighten text-danger"></i>
                    </div>
                    <h5 class=" fw-normal mt-0" title="Number of Orders" style="color: white;">All Store</h5>
                    <h3 class="mt-3 mb-3" style="color: white;">{{count(auth()->user()->stores )}} </h3>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>

        <div class="col-4" style="margin: auto; margin-bottom:25px;">
            <div class="card widget-flat" style="background-image:linear-gradient(315deg, #dfd1aa 0%, #b98c03 74%); text-align:center;">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-cart-plus widget-icon bg-danger-lighten text-danger"></i>
                    </div>
                    <h5 class=" fw-normal mt-0" title="Number of Orders" style="color: white;">All Product</h5>
                    <h3 class="mt-3 mb-3" style="color: white;">{{count(auth()->user()->product)}}</h3>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="col-4" style="margin: auto; margin-bottom:25px;">
            <div class="card widget-flat" style="background-image:linear-gradient(315deg, #e67373cb 0%, #880101 74%); text-align:center;">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-cart-plus widget-icon bg-danger-lighten text-danger"></i>
                    </div>
                    <h5 class=" fw-normal mt-0" title="Number of Orders" style="color: white;">All Orders</h5>
                    <h3 class="mt-3 mb-3" style="color: white;"> {{count(auth()->user()->order)}}</h3>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
</div>

<div class="row">
    <div class="col-4" style="margin: auto; margin-bottom:25px;">
        <div class="card widget-flat" style="background-image:linear-gradient(315deg, #73e6c4cb 0%, #018844 74%); text-align:center;">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-cart-plus widget-icon bg-danger-lighten text-danger"></i>
                </div>
                <h5 class=" fw-normal mt-0" title="Number of Orders" style="color: white;">All Client</h5>
                <h3 class="mt-3 mb-3" style="color: white;"> {{count(auth()->user()->client)}}</h3>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>

    <div class="col-4" style="margin: auto; margin-bottom:25px;">
        <div class="card widget-flat" style="background-image:linear-gradient(315deg, #96e8f3cb 0%, #018881 74%); text-align:center;">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-cart-plus widget-icon bg-danger-lighten text-danger"></i>
                </div>
                <h5 class=" fw-normal mt-0" title="Number of Orders" style="color: white;">All Contact Message</h5>
                <h3 class="mt-3 mb-3" style="color: white;"> {{count(auth()->user()->contact)}}</h3>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>

    <div class="col-4" style="margin: auto; margin-bottom:25px;">
        <div class="card widget-flat" style="background-image:linear-gradient(315deg, #d9dcddcb 0%, #000102 74%); text-align:center;">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-cart-plus widget-icon bg-danger-lighten text-danger"></i>
                </div>
                <h5 class=" fw-normal mt-0" title="Number of Orders" style="color: white;">All Ticket</h5>
                <h3 class="mt-3 mb-3" style="color: white;"> {{count(auth()->user()->ticket)}}</h3>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>
<canvas class="my-4 chartjs-render-monitor" id="myChart" width="1076" height="454" style="display: block; width: 1076px; height: 454px;"></canvas>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          },
          legend: {
            display: true,
          }
        }
      });
    </script>


</body>
@endsection
