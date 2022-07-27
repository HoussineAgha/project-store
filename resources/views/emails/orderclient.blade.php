<div class="container">
    <div class="row">



        <h3 class="thank" style="padding-bottom: 40px;"><strong>Thank you Dear :{{Auth::guard('client')->user()->fullname}}</strong></h3>
        <br>
        <h4><strong>Details user : </strong></h4>

<table class="table table-striped table-dark">
    <thead>
      <tr>

        <th scope="col">Full Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{Auth::guard('client')->user()->fullname}}</td>
        <td>{{Auth::guard('client')->user()->email}}</td>
        <td>{{Auth::guard('client')->user()->phone}}</td>
      </tr>
    </tbody>
  </table>
  <div class="ship">
    <h4><strong>Details Shipping :</strong></h4>

    <table class="table table-striped table-dark">
        <thead>
          <tr>

            <th scope="col">Address</th>
            <th scope="col">Country</th>
            <th scope="col">State</th>
            <th scope="col">Shipping same address</th>

          </tr>
        </thead>
        <tbody>
          <tr>

            <td>{{Session::get('select_shipping')['address']}}</td>
            <td>{{Session::get('select_shipping')['country']}}</td>
            <td>{{Session::get('select_shipping')['state']}}</td>
            <td>Yes</td>

          </tr>
        </tbody>
      </table>
  </div>
  <div class="ship">
    <h4><strong>Details product :</strong></h4>

    <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">product name</th>
            <th scope="col">qyt</th>
            <th scope="col">price</th>
          </tr>
        </thead>

        <tbody>

            @foreach ($cartItems as  $item)
          <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->price}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
  <div class="payment_type">
  <h4>Total Order : <strong>{{$totals}} $</strong></h4>

  </div>
</div>
</div>
