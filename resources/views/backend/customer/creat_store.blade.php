@extends('backend.customer.appback')

@section('title','creat store')


@section('content2')

<h5 class="text-center">Store creation form</h5>

    @include('shared.error')

<form class="row g-3" method="POST" action="/stores/store" enctype="multipart/form-data">
    @csrf

    <div class="col-md-12">
            <div class="mb-3">
                <label for="name_store" class="form-label"></label>
                <input name="name_store" type="text" class="form-control" id="name_store" placeholder="Enable store Name Example : The Best">
            </div>

            <div class="mb-3">
                <label for="discription" class="form-label">Enable Discription For Store</label>
                <textarea name="discription" class="ckeditor form-control" id="discription" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Please Upload image For Store</label>
                <input  name="image" class="form-control" type="file" id="image">

            </div>
            <button type="submit" class="btn btn-primary" id="publish">publish</button>
    </div>
</form>


@endsection
