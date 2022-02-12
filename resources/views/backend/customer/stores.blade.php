@extends('backend.customer.appback')

@section('title','stores')

@section('content2')


<a href="/stores/creat" class="btn btn-dark" id="creat-store"> Creat New </a>

<div class="row row-cols-1 row-cols-md-3  g-4" id="card">
    @forelse (auth()->user()->stores as $item)
    <div class="col">
        <div class="card text-white bg-dark" id="card1">
            @isset($item->Baner)
            <img src="{{ asset($item->Baner) }}" class="card-img-top" alt="..." height="250px">
            @endisset
            @empty($item->Baner)
            <img src="{{ asset('img/store.jpg') }}" class="card-img-top" alt="..." height="250px">
            @endempty
          <div class="card-body">
            <h5 class="card-title">{{$item->name_store}}</h5>
            <p class="card-text">{!! Str::limit($item->discription,150) !!}</p>
            <p class="card-text"><small class="text-muted"> Store Number : {{ $item->id }} </small></p>
            <p class="card-text"><small class="text-muted"> last update :.{{$item->updated_at}}</small></p>
            <div>
                <a href="{{route('store.show',$item->id)}}" class="btn btn-info"> View </a>
                <a href="{{ route('edite',$item->id) }}" class="btn btn-info" target="_blank"> Edite </a>
                <a href="{{ route('store.delete',$item->id) }}" class="btn btn-info" id="delete-button"> Delete </a>
                <hr>
                <a href="{{ route('allproduct',$item->id) }}" class="btn btn-info  margin-top" id="delete-button"> View Products </a>
                <a href="{{ route('view.category',$item->id) }}" class="btn btn-info  margin-top" id="delete-button"> View category </a>
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
