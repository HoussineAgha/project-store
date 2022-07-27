@forelse ($product as $item)
<div class="col-3">
    <div class="card text-white bg-black" style="width: 16rem;">
        <a href="/product/{{$store->id}}/{{$item->id}}"><img src="{{$item->image}}" class="card-img-top" alt="..." width="100%" height="250px"></a>
        @if($item->best_sellary == 1)
        <div class="spans">
            Hot
        </div>
        @endif

        <div class="card-body">
        <a href="/product/{{$store->id}}/{{$item->id}}"><h5 class="card-title">{{$item->name}}</a></h5>
        <br>
        <div class="d-flex">
            @if($item->discount)
            <h5 class="card-text"><small class="text-muted text-decoration-line-through">$ {{$item->price}}</small></h5>
            <h5 class="card-text">$ {{$item->discount}}</h5>
            @else
            <h5 class="card-text">$ {{$item->price}}</h5>
            @endif
        </div>
        <br>
        <div>

        <br>
        <form action="/cart/{{$store->id}}" method="POST">
            @csrf
              <input type="hidden" name="id" id="id" value="{{ $item->id }}" >
              <input type="hidden" name="name" id="name" value="{{ $item->name }}">
              <input type="hidden" name="image" id="image" value="{{ $item->image }}">
              <input type="hidden" name="shipping_cost" id="shipping_cost" value="{{ $item->shipping_cost }}" >
              <input type="hidden" name="shipping_type" id="shipping_type" value="{{ $item->shipping_type }}" >
              @if ($item->discount)
              <input type="hidden" name="discount" id="discount" value="{{ $item->discount }}">
              @else
              <input type="hidden" name="price" id="price" value="{{ $item->price }}" >
              @endif
              <input type="hidden" value="1" name="quantity">
          <input type="submit" class="btn btn-primary" value="Add To Cart">
        </form>
        </div>
</div>
</div>
</div>
@empty
<div class="empety">
<h5 class="text-center">There are no product available 🙂 😔</h5>
</div>
@endforelse
