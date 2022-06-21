@extends('admin.backend.layout.app')

@section('title','Edit-Store')

@section('style')
    <style>
        .form-control{
            border: 0.1px solid;
        }
        .input-group .input-group-text{
            left: 0;
        }
        #bloack{
            background-color: white;
            padding: 25px;
            width: 35%;
            border-radius: 5px;
            box-shadow: 0 0.3125rem 0.625rem 0 rgb(0 0 0 / 60%) !important;
            color: black;
        }
        .form-switch .form-check-input{
            top: 5px;
        }
        .form-check-label{
            font-weight: 700;
            color: black;
        }
        #bloack{
            margin-right:25px;
        }
    </style>

@endsection

@section('content')
<h5 class="text-center">Please Edit This Store Information </h5>

@include('shared.error')

<div class="container">
<form class="row g-3" method="POST" action="{{route('admin.updatestore',$store->id)}}" enctype="multipart/form-data">
@csrf
@method('PUT')
<div id="bloack">
<div class="form-check form-switch">
    <input name="block" class="form-check-input" type="checkbox" role="switch" id="block" value="1" @if ($store->bloack == 1) checked @endif>
    <label class="form-check-label" for="block" >Block this store from working</label>
  </div>
</div>
<div id="bloack">
    <div class="form-check form-switch">
        <input name="review" class="form-check-input" type="checkbox" role="switch" id="review" value="1" @if ($store->review == 0) checked @endif>
        <label class="form-check-label" for="review" >Deactivate this button to activate this Store</label>
      </div>
    </div>
<div class="col-md-12">
    <div class="mb-3">
        <label for="name_store" class="form-label">Name Store</label>
        <input name="name_store" value="{{ $store->name_store }}" type="text" class="form-control" id="name_store" placeholder="Enable store Name Example : The Best">
    </div>

    <div class="mb-3">
        <label for="text_top" class="form-label"> inter your ads</label>
        <input value="{{$store->text_top}}" name="text_top" type="text" class="form-control" id="text_top" >
    </div>

    <div class="mb-3">
        <label for="discription" class="form-label">Enable (New Discription short) For Store</label>
        <textarea type="text" name="discription"  id="discription" rows="6">{{ $store->discription }}</textarea>
    </div>

    <div class="mb-3">
        <label for="Baner" class="form-label">Please Upload Banner For Store height 600px </label>
        <input value="{{$store->Baner}}" name="Baner" class="form-control" type="file" id="Baner">
        <img src="{{asset($store->Baner)}}" width="100%" height="300px">
    </div>

    <div class="mb-3">
        <label for="adsimage" class="form-label">Please Upload ads image For Store height 150px , width 720px </label>
        <input accept="image/*" name="adsimage" class="form-control" type="file" id="adsimage" width="720px" height="150px">
        <br>
        <img id="blah" src="{{asset($store->adsimage)}}" alt="your image" width="720px" height="150px" />
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <label for="urlads" class="form-label">Enter url-Ads for Redirect URL</label>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon3"></span>
              <input value="{{$store->urlads}}" name="urlads" type="text" class="form-control" id="urlads" aria-describedby="basic-addon3" placeholder="https://amazon.com/example/">
            </div>
        </div>

    <div class="mb-3">
        <label for="logo" class="form-label">Please Upload logo For Store width 200px height 150px</label>
        <input value="{{$store->logo}}" name="logo" class="form-control" type="file" id="logo">
        <img src="{{asset($store->logo)}}" width="150" height="150px">
    </div>
<div class="row g-3">
    <div class="col-md-6">
        <label for="face" class="form-label">Your vanity FaceBook URL</label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon3"></span>
          <input value="{{$store->face}}" name="face" type="text" class="form-control" id="face" aria-describedby="basic-addon3" placeholder="https://facebook.com/example/">
        </div>
    </div>

    <div class="col-md-6">
        <label for="twite" class="form-label">Your vanity Twitter URL</label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon3"></span>
          <input value="{{$store->twite}}" name="twite" type="text" class="form-control" id="twite" aria-describedby="basic-addon3" placeholder="https://Twitter.com/example/">
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <label for="linkdine" class="form-label">Your vanity Linkdine URL</label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon3"></span>
          <input value="{{$store->linkdine}}" name="linkdine" type="text" class="form-control" id="linkdine" aria-describedby="basic-addon3" placeholder="https://Linkdine.com/example/">
        </div>
    </div>

    <div class="col-md-6">
        <label for="youtube" class="form-label">Your vanity instagram URL</label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon3"></span>
          <input value="{{$store->youtube}}" name="youtube" type="text" class="form-control" id="youtube" aria-describedby="basic-addon3" placeholder="https://instagram.com/example/">
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="text_footer" class="form-label"> inter discription Footer</label>
    <input value="{{$store->text_footer}}" name="text_footer" type="text" class="form-control" id="text_footer" >
</div>

<div class="input-group">
    <label for="opening_times" class="form-label" style="margin-top: -30px;">Set store opening & closing times</label>
    <input value="{{$store->opening_times}}" name="opening_times" type="text" id="opening_times" aria-label="First name" class="form-control" placeholder="9:00 AM">
    <label for="close_times"></label>
    <input value="{{$store->close_times}}" name="close_times" type="text" aria-label="Last name" id="close_times" class="form-control" placeholder="5:00 PM">
  </div>

  <div class="row">
    <div class="col">
        <label for="email">The email will appear on the interface</label>
        <input value="{{ $store->email }}" name="email" type="email" id="email" class="form-control" placeholder="email@example.com">
    </div>
    <div class="col">
        <label for="phone">The Phone will appear on the interface</label>
        <input value="{{ $store->phone }}" name="phone" type="text" id="phone" class="form-control" placeholder="phone">
    </div>
  </div>
<br>
    <button type="submit" class="btn btn-primary" id="publish">save</button>
</div>
</form>
</div>
@endsection
