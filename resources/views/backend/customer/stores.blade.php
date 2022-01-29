@extends('backend.customer.appback')

@section('title','stores')

@section('content2')


<a href="/stores/creat" class="btn btn-dark" id="creat-store"> Creat New </a>

<div class="row row-cols-1 row-cols-md-3  g-4" id="card">
    @forelse (auth()->user()->stores as $item)
    <div class="col">
        <div class="card text-white bg-dark" id="card1">
            @isset($item->image)
            <img src="{{ asset($item->image) }}" class="card-img-top" alt="..." height="250px">
            @endisset
            @empty($item->image)
            <img src="{{ asset('img/store.jpg') }}" class="card-img-top" alt="..." height="250px">
            @endempty
          <div class="card-body">
            <h5 class="card-title">{{$item->name_store}}</h5>
            <p class="card-text">{{ $item->discription }}</p>
            <p class="card-text"><small class="text-muted"> last update :.{{$item->updated_at}}</small></p>
            <div>
                <a href="#" class="btn btn-info"> View </a>
                <a href="{{ route('edite',$item->id) }}" class="btn btn-info" target="_blank"> Edite </a>
                <a href="#" class="btn btn-info"> Delete </a>
            </div>
          </div>
        </div>
        </div>

    @empty
    <div class="empety">
        <h5 class="text-center">There are no stores available for you 🙂 😔</h5>
    </div>

    @endforelse

@endsection
