@extends('backend.customer.appback')

@section('title','Edite Store')

@section('content2')

<h5 class="text-center">Please Edit This Store Information </h5>

    @include('shared.error')


<form class="row g-3" method="POST" action="/stores/{{ $store->id }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="col-md-12">
            <div class="mb-3">
                <label for="name_store" class="form-label"></label>
                <input value="{{ $store->name_store }}" name="name_store" type="text" class="form-control" id="name_store" placeholder="Enable store New Name Example : The Best">
            </div>

            <div class="mb-3">
                <label for="discription" class="form-label">Enable New Discription For Store</label>
                <input value= '{{ $store->discription }}' name="discription" type="text" class="ckeditor form-control" id="discription" rows="3">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Please Upload New image For Store</label>
                <input name="image" class="form-control" type="file" id="image">
                <img src="{{ asset ($store->image) }}" width="100px" height="100px"/>
            </div>
            <button type="submit" class="btn btn-primary" id="publish">Save</button>
    </div>
</form>

@endsection
