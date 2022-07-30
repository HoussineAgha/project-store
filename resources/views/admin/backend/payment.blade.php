@extends('admin.backend.layout.app')

@section('title','Payment')

@section('style')
    <style>
        .alert-success{
            color: white;
            width: 50%;
        }
        .form-control{
            border: 0.1px solid;
        }
        .input-group .input-group-text{
            left: 0;
        }
        .form-label{
            font-weight: 700;
            color: black;
        }
        .strip{
            padding: 25px;
            background-color: white;
            border-radius: 10px;
            margin-bottom:25px;
        }
        .col-form-label{
            width: 100%;
            color: black;
            font-weight: 700;
        }
    </style>

@endsection

@section('content')
@include('flash::message')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="strip">
              <div class="fontaws" style="display: inline-flex;">
                <h5>Stripe Payment</h5>
                <i class="fab fa-cc-stripe" style="margin-left: 250px; font-size:30px;"></i>
              </div>
                <div class="row mb-3">
                    <label for="STRIPE_KEY" class="col-sm-2 col-form-label">STRIPE_KEY</label>
                    <div class="col-sm-10">
                      <input name="STRIPE_KEY" type="text" class="form-control" id="STRIPE_KEY" value="{{ env('STRIPE_KEY') }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="STRIPE_SECRET" class="col-sm-2 col-form-label">STRIPE_SECRET</label>
                    <div class="col-sm-10">
                      <input name="STRIPE_SECRET" type="text" class="form-control" id="STRIPE_SECRET" value="{{ env('STRIPE_SECRET') }}">
                    </div>
                  </div>
            </div>
        </div>

        <div class="col-6">
            <div class="strip">
              <div class="fontaws" style="display: inline-flex;">
                <h5>Tap Payment</h5>
                <img src="{{asset('img/tap.png')}}" height="50px" width="40px" style="margin-left: 250px;">
              </div>
                <div class="row mb-3">
                    <label for="Secret API Key" class="col-sm-2 col-form-label">Secret Key</label>
                    <div class="col-sm-10">
                      <input name="Secret API Key" type="text" class="form-control" id="Secret API Key" value="{{ env('Mada_Secret_API_Key') }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Publishable API Key" class="col-sm-2 col-form-label">Publishable Key</label>
                    <div class="col-sm-10">
                      <input name="Publishable API Key" type="text" class="form-control" id="Publishable API Key" value="{{ env('Mada_Publishable_API_Key') }}">
                    </div>
                  </div>
            </div>
        </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="strip">
                  <div class="fontaws" style="display: inline-flex;">
                    <h5>PayPal Payment</h5>
                    <i class="fab fa-cc-paypal" style="margin-left: 250px; font-size:30px;"></i>
                  </div>
                    <div class="row mb-3">
                        <label for="Client_ID" class="col-sm-2 col-form-label">Client_ID</label>
                        <div class="col-sm-10">
                          <input name="Client_ID" type="text" class="form-control" id="Client_ID" value="{{ env('Paypal_Client_ID') }}">
                        </div>
                      </div>
                </div>
            </div>
        </div>


</div>


@endsection
