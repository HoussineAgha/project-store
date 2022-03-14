@extends('layout.app')


@section('title','Registration')

@section('style')
    <style>
    .form-check{
       padding-left: 20.5em;
       color: white;
       margin-top: 10px;
    }
    </style>

@endsection

@section('content')
    <body class="body1">
                <form class="row g-3" action="/user/store" method="POST" id="form1">
                    @csrf
                    <div class="creat">
                        <h4>
                            Create New Account
                        </h4>
                        @include('shared.error')
                    </div>
                    <div class="col-md-6">
                        <label for="first_name" class="form-label"></label>
                        <input name="first_name" type="text" class="form-control" id="first_name" placeholder="First name" aria-label="First name" value="{{ old('first_name') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label"></label>
                        <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Last name" aria-label="Last name" value="{{ old('last_name') }}">
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                    <label for="email" class="form-label"></label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="col-md-6">
                    <label for="password" class="form-label"></label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="col-md-6">
                    <label for="Phone" class="form-label"></label>
                    <input name="Phone" type="number" class="form-control" id="Phone" placeholder="+096 Phone" value="{{ old('Phone') }}">
                    </div>
                    <div class="col-md-6">
                    <label for="country" class="form-label"></label>
                    <input name="country" type="text" class="form-control" id="country" placeholder="Country" value="{{ old('country') }}">
                    </div>
                    <div class="role" style="display: flex;">
                        <div class="form-check">
                            <input class="form-check-input" type="text" name="flexRadioDefault" id="seller" value="seller" hidden>
                          </div>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto" id="btn1">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
                </form>
    </body>
@endsection


