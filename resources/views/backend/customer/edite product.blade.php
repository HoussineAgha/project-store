@extends('backend.customer.appback')

@section('title','edite product')

@section('style')

    <style>

        .note-editable{
            height: 275px;
        }
        .form-check{
            margin-top: 50px;
        }
        .form-switch .form-check-input{
            width: 60px;
            height: 25px;
        }
        .form-check-label{
            padding: inherit;
            font-size: 20px
        }
        .card{
            display: inline;
        }

    </style>

@endsection

@section('content2')



    @include('shared.error')

    <div class="container">
        <div class="row">
          <div class="col-8 card">
            <form class="row g-3" method="POST" action="/product/{{$product->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h4> information Product </h4>
                <hr>
                    <div class="form-group col-md-10">
                        <label for="name">Name Product</label>
                        <input value="{{$product->name}}" name="name" type="text" class="form-control" id="name" placeholder="Example shose orginal">
                    </div>

                    <div class="mb-3">
                        <label for="discription" class="form-label">Discription short</label>
                        <textarea  name="discription" class="form-control" id="discription" rows="10">{{ $product->discription }}</textarea>
                    </div>

                    <div class="form-group col-md-10">
                        <label for="cat_id">select category</label>
                        <select  name="cat_id" id="cat_id" class="form-control aiz-selectpicker">
                        <option></option>
                        @foreach ($categury as  $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach



                        </select>
                    </div>

                    <div class="form-group col-md-10">
                        <label for="unity">unity</label>
                        <input value="{{$product->unity}}" name="unity" type="text" class="form-control" id="unity" placeholder="Example kg , Pc">
                    </div>

                        <div class="col-md-5">
                            <label for="price">Price</label>
                            <input value="{{$product->price}}" name="price" type="text"  id="price" class="form-control" placeholder="0.00 $">
                        </div>
                        <div class="col-md-5">
                            <label for=""> Discount</label>
                            <input value="{{$product->discount}}" name="discount" type="text" id="discount" class="form-control" placeholder="0.00 $">
                        </div>

                        <div class="mb-3">
                            <label for="discription_long" class="form-label">Discriptio Long </label>
                            <textarea  name="discription_long" class="form-control" id="discription_long" rows="10">{{$product->discription_long}}</textarea>
                        </div>

                        </div>

                        <div class="col-4 card">
                            <h4>complet informaition</h4>
                            <hr>
                            <div class="form-group ">
                                <label for="Inventory">Inventory</label>
                                <input value="{{$product->Inventory}}" name="Inventory" type="number" class="form-control" id="Inventory" value="1" min="1">
                            </div>

                            <div class="form-group">
                                <label for="ship">Shipping days</label>
                                <input value="{{$product->ship}}" name="ship" type="text"  id="ship" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="shipping_type">shipping type</label>
                                <select name="shipping_type"   id="shipping_type" class="form-control aiz-selectpicker" >
                                <option name="free" value="free">{{$product->shipping_type}}</option>
                                <option name="price_shipping" value="price_shipping">Price</option>
                                </select>
                            </div>

                            <div class="form-group" id="shipping_cost">
                                <label for="shipping_cost">Shipping Cost</label>
                                <input name="shipping_cost" value="{{$product->shipping_cost}}" type="number" class="form-control" id="shipping_cost">
                            </div>

                            <div class="form-group">
                                <label for="qyt">Minimum purchase quantity</label>
                                <input value="{{$product->qyt}}" name="qyt" type="number" class="form-control" id="qyt" value="1" min="1">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">upload image product</label>
                                <input value="{{$product->image}}" accept="image/*" name="image" class="form-control" type="file" id="image" onchange="loadFile(event)">
                            </div>
                            <img id="blah" src="{{ asset($product->image) }}" alt="your image" width="150px" height="150px" />
                            <hr>

                            <div class="mb-3">
                                <label for="gallery" class="form-label">upload Gallery product</label>
                                <input  accept="image/*" name="gallery[]" class="form-control" type="file" id="gallery" onchange="loadFile(event)" multiple>
                            </div>
                            @if(is_array($product->gallery))
                            @foreach($product->gallery as $key => $item)
                            <img id="output" src="{{ asset($item) }}" alt="your image" width="150px" height="150px" />
                            @endforeach
                            @endif
                                <hr>

                            <div class="form-check form-switch">
                                <label class="form-check-label" for="feature">feature product</label>
                                <input name="feature" class="form-check-input" type="checkbox" role="switch" id="feature" value="1" @if ($product->feature == 1) checked @endif>
                                <hr>
                            </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="publish">publish</button>
    </form>

@section('script')
<script>
image.onchange = evt => {
    const [file] =image.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }
  </script>

<script>
    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
  </script>

  <script>
      $(document).ready(function() {
    $('#discription_long').summernote();
  });
  </script>
@endsection

@endsection
