@extends('backend.customer.appback')

@section('title','create product')

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


<h5 class="text-center">Create Product New for <strong>{{$store->name_store}}</strong></h5>

    @include('shared.error')

    <div class="container">
        <div class="row">
          <div class="col-8 card">
            <form class="row g-3" method="POST" action="/product/{{$store->id}}" enctype="multipart/form-data">
                @csrf
                <h4> information Product </h4>
                <hr>
                    <div class="form-group col-md-10">
                        <label for="name">Name Product</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Example shose orginal">
                    </div>

                    <div class="mb-3">
                        <label for="discription" class="form-label">Discription short</label>
                        <textarea name="discription" class="form-control" id="discription" rows="10"></textarea>
                    </div>

                    <div class="form-group col-md-10">
                        <label for="cat_id">select category</label>
                        <select name="cat_id" id="cat_id" class="form-control aiz-selectpicker">
                        <option></option>
                        @foreach ($store->categury as $item)
                        <option>{{$item->id}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-10">
                        <label for="unity">unity</label>
                        <input name="unity" type="text" class="form-control" id="unity" placeholder="Example kg , Pc">
                    </div>

                        <div class="col-md-5">
                            <label for="price">Price</label>
                            <input name="price" type="text"  id="price" class="form-control" placeholder="0.00 $">
                        </div>
                        <div class="col-md-5">
                            <label for=""> Discount</label>
                            <input name="discount" type="text" id="discount" class="form-control" placeholder="0.00 $">
                        </div>

                        <div class="mb-3">
                            <label for="discription_long" class="form-label">Discriptio </label>
                            <textarea name="discription_long" class="form-control" id="discription_long" rows="10"></textarea>
                        </div>

                        </div>

                        <div class="col-4 card">
                            <h4>complet informaition</h4>
                            <hr>
                            <div class="form-group ">
                                <label for="Inventory">Inventory</label>
                                <input name="Inventory" type="number" class="form-control" id="Inventory" value="1" min="1">
                            </div>

                            <div class="form-group">
                                <label for="ship">Shipping days</label>
                                <input name="ship" type="text"  id="ship" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="qyt">Minimum purchase quantity</label>
                                <input name="qyt" type="number" class="form-control" id="qyt" value="1" min="1">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">upload image product</label>
                                <input accept="image/*" name="image" class="form-control" type="file" id="image" onchange="loadFile(event)">
                            </div>
                            <img id="blah" src="{{ asset('img/defult.jpg') }}" alt="your image" width="150px" height="150px" />
                            <hr>
                            <div class="mb-3">
                                <label for="gallery" class="form-label">upload Gallery product</label>
                                <input accept="image/*" name="gallery[]" class="form-control" type="file" id="gallery" onchange="loadFile(event)" multiple>
                            </div>
                            <img id="output" src="{{ asset('img/defult.jpg') }}" alt="your image" width="150px" height="150px" />
                                <hr>

                            <div class="form-check form-switch">
                                <label class="form-check-label" for="feature">feature product</label>
                                <input name="feature" class="form-check-input" type="checkbox" role="switch" id="feature" value="1">
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
