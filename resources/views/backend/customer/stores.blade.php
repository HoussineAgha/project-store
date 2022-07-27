@extends('backend.customer.appback')

@section('title','stores')

@section('content2')

@include('flash::message')
    @if (count(auth()->user()->stores) <= 2)
    <a href="/stores/creat" class="btn btn-dark" id="creat-store"> Creat New </a>
    @else
    <a href="#" class="btn btn-dark" id="creat-store"> Upgrade Now </a>
    @endif


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
            @switch($item)
                @case($item->bloack == 1)
                <div>
                    <span class="badge bg-danger" style="margin-bottom: 20px; font-size:16px;">Blocked</span><br>
                    <a href="{{route('store.show',$item->id)}}" class="btn btn-info"> View </a>
                    <a href="{{ route('edite',$item->id) }}" class="btn btn-info " target="_blank"> Edite </a>
                    <a href="{{ route('store.delete',$item->id) }}" class="btn btn-info disabled" id="delete-button"> Delete </a>
                    <hr>
                    <a href="{{ route('all.product',$item->id) }}" class="btn btn-info  margin-top disabled" id="delete-button"> View Products </a>
                    <a href="{{ route('view.category',$item->id) }}" class="btn btn-info  margin-top disabled" id="delete-button"> View category </a>
                </div>
                    @break
                @case($item->review == 0)
                <span class="badge bg-primary" style="margin-bottom: 20px; font-size:16px;">wait review</span><br>
                <div>
                    <a href="{{route('store.show',$item->id)}}" class="btn btn-info"> View </a>
                    <a href="{{ route('edite',$item->id) }}" class="btn btn-info disabled" target="_blank"> Edite </a>
                    <a href="{{ route('store.delete',$item->id) }}" class="btn btn-info disabled" id="delete-button"> Delete </a>
                    <hr>
                    <a href="{{route('all.product',$item->id)}}" class="btn btn-info disabled  margin-top " id="delete-button"> View Products </a>
                    <a href="{{ route('view.category',$item->id) }}" class="btn btn-info  margin-top " id="delete-button"> View category </a>
                </div>
                    @break
                @default
                <div>
                    <a href="{{route('store.show',$item->id)}}" class="btn btn-info"> View </a>
                    <a href="{{ route('edite',$item->id) }}" class="btn btn-info" target="_blank"> Edite </a>
                    <a href="{{ route('store.delete',$item->id) }}" class="btn btn-info" id="delete-button"> Delete </a>
                    <hr>
                    <a href="{{ route('all.product',$item->id) }}" class="btn btn-info  margin-top" id=""> View Products </a>
                    <a href="{{ route('view.category',$item->id) }}" class="btn btn-info  margin-top" id="delete-button"> View category </a>
                </div>
            @endswitch
          </div>
        </div>
        </div>

    @empty
    <div class="empety">
        <h5 class="text-center">There are no stores available for you 🙂 😔</h5>
    </div>

    @endforelse

@endsection
