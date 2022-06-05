@extends('client.app')

@section('title','Add shipping')


@section('style')
    <style>
        #navbarResponsive{
            top:175px;
        }

        .navbar{
            height: 170px;
        }
        .table{
            margin-top: 65px;
        }
        .breadcrumb{
            margin-top: 75px;
            margin-bottom: 0px
        }
        .total{
            text-align: center;
            background-color:burlywood;
            padding: 10px;
            border-radius: 10px;
            margin: auto;
        }
        .rem{
            text-align: center;
            margin-bottom: 25px;
            margin-top: 25px;
        }

        .fas, .fa-solid{
            font-size:36px;
            color: black;
            margin-top: 100px;

        }
        #btntop{
            width: max-content;
            margin-top: 40px;
            margin-left: 10px;
        }
        #sec2{
            margin-top: 20px;
        }

</style>

@endsection

@section('content4')
<div class="col-12 col-md-9 col-lg-8 offset-lg-1">

      <!-- add shipping -->
<section class="whish-list-section theme1 pt-80 pb-80">

        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">shipping</li>
                </ol>
            </nav>
            <br>
            <div style="padding-top:20px; ">
                <h4> This information is important for the delivery of your order in shipping </h4>
            </div>
            <hr style="width: 50%; margin-top:10px;">
            <div class="container">
                <div class="row">
                    <div class="col-6" style="margin-top: -25px;">
            <form method="POST" action="{{route('insert.shipping',\Auth::guard('client')->user()->id)}}">
                @csrf

                <div class="col-12">
                    <label for="client_id" class="form-label" ></label>
                    <input type="text" name="client_id" class="form-control" id="client_id"  hidden value="{{\Auth::guard('client')->user()->id}}">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="store_id" class="form-label"></label>
                    <input type="text" name="store_id" class="form-control" id="store_id"  hidden value="{{$store->id}}">
                    <div class="invalid-feedback">
                    </div>
                  </div>


                <div class="col-12">
                    <label for="firstname" class="form-label">First name</label>
                    <input type="text" class="form-control" name="firstname" id="firstname"  required>
                    <div class="invalid-feedback">
                      Valid first name is required.
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="lastname" class="form-label">Last name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname"  required>
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>

                  <div class="col-12">
                      <label for="phone" class="form-label">Phone</label>
                      <input type="number" class="form-control" name="phone" id="phone" placeholder="965587..." required>
                      <div class="invalid-feedback">
                        Please enter a valid phone address for shipping updates.
                      </div>
                    </div>
                </div>
                <div class="col-6" id="sec2">
                  <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                      Please enter your shipping address.
                    </div>
                  </div>

                  <div class="col-12">
                  <label for="country" class="form-label">Country</label>
                  <input type="text" class="form-control" name="country" id="country" required>
                    <div class="invalid-feedback">
                      Please select a valid country .
                    </div>
                  </div>

                  <div class="col-12">
                      <label for="state" class="form-label">state</label>
                      <input type="text" class="form-control" name="state" id="state" required>
                        <div class="invalid-feedback">
                          Please select a valid state .
                        </div>
                      </div>
                </div>

                <div class="form-check" style="padding-top:20px">
                    <label class="form-check-label" for="sameaddress">Shipping address is the same as my billing address</label>
                    <input name="sameaddress" type="checkbox"  class="form-check-input"  id="sameaddress" value="1" checked>
                  </div>
                <hr class="my-4">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-lg btn-block"  type="submit">Add Shipping</button>
                </div>
            </form>
            </div>
            </div>
        </div>

    </div>


@endsection
