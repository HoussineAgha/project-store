@extends('backend.customer.appback')

@section('title','order')


@section('style')
    <style>
        .btn-dark{
            margin-right: 140px;
        }
        p{
          display: inline;
        }

    </style>
@endsection

@section('content2')

<div class="">
    <h5>Note :You will find the number of orders received for each store</h5>
</div>
<br>
<div class="row row-cols-1 row-cols-md-3 g-4">
    @forelse (auth()->user()->stores as $item)
    <div class="col">
      <div class="card h-100">
        <img src="{{asset($item->Baner)}}" class="card-img-top" alt="..." width="100px" height="150px">
        <div class="card-body">
          <h5 class="card-title"> name :{{ $item->name_store }}</h5>
          <a href="{{ route('order.perstore',$item->id) }}" class="btn btn-dark" > View Order </a>
            <p> ({{ $item->order()->count() }})Order </p>
        </div>
      </div>
    </div>
@empty
<div class="empety">
    <h5 class="text-center">There are no Order available for you 🙂 😔</h5>
</div>
@endforelse






@endsection

