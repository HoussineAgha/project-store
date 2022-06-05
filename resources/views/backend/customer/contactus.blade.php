@extends('backend.customer.appback')

@section('title','All messages')


@section('style')
    <style>
        .btn-dark{
            margin-right: 140px;
        }
        p{
          display: inline;
          font-size: 15px;
        }

    </style>
@endsection

@section('content2')

<div class="">
    <h5>Note :You will find the number of messages for each store</h5>
</div>
<br>
<div class="row row-cols-1 row-cols-md-3 g-4">
    @forelse (auth()->user()->stores as $item)
    <div class="col">
      <div class="card h-100">
        <img src="{{asset($item->Baner)}}" class="card-img-top" alt="..." width="100px" height="150px">
        <div class="card-body">
          <h5 class="card-title"> name :{{ $item->name_store }}</h5>
          <a href="{{route('contact.store',$item->id)}}"><button type="button" class="btn btn-secondary">
            View <span class="badge badge-light"><p> ({{ $item->contact()->count() }})messages </p></span>
            <span class="sr-only">unread messages</span>
          </button> </a>

        </div>
      </div>
    </div>
@empty
<div class="empety">
    <h5 class="text-center">There are no Store available for you 🙂 😔</h5>
</div>
@endforelse


@endsection
