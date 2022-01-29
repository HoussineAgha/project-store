@extends('backend.customer.appback')

@section('title','My profile')

@section('style')
<style>
    .col-6{
        margin: auto;
        padding-top: 10px
    }
    .prof{
        padding-bottom: 25px;
        text-align: center;
    }
    .mb-31{
        padding-bottom: 50px;
    }
</style>
@endsection

@section('content2')

<div class='col-6'>
    @include('shared.error')
        <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

        <div class="prof">
            @isset($profile->image)
            <img src="{{asset($profile->image)}}" width="150" height="150">
            @endisset
            @empty($profile->image)
            <img src="{{asset('img/zz.png')}}" width="150" height="150">
            @endempty

        </div>

            <div class="row">
                <div class="col">
                <label for="First_name"></label>
                  <input value="{{ $profile->first_name }}" name="first_name" type="text" id="First_name" class="form-control" placeholder="First_name">
                </div>
                <div class="col">
                <label for="last_name"></label>
                  <input value="{{ 	$profile->last_name }}" name="last_name" type="text" id="last_name" class="form-control" placeholder="Last name">
                </div>
              </div>

            <div class="mb-3">
                <label for="password" class="form-label"> NewPassword</label>
                <input  name="password" type="password" id="password" class="form-control" id="password">
              </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input value="{{ $profile->email }}" name="email" type="email" id="email" class="form-control" placeholder="name@example.com">
              </div>

              <div class="form-group">
                <label for="country">country</label>
                <input value="{{ $profile->country }}" name="country" type="text" class="form-control" id="country" >
              </div>

              <div class="form-group1">
                <label for="phone">Phone</label>
                <input value="{{ $profile->Phone }}" name="Phone" type="text" class="form-control" id="phone" >
              </div>
              <div class="mb-31">
                <label for="image" class="form-label">image new profile</label>
                <input name="image" class="form-control" type="file" id="image">
              </div>
              <button type="submit" class="btn btn-primary" id="publish">Save</button>
        </form>
</div>

@endsection
