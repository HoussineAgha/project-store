@extends('backend.customer.appback')

@section('title','create Categories')
@section('style')
    <style>
        #cat{
            margin: auto;
        }

    </style>

@endsection

@section('content2')

<form method="POST" action="/categories/store" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6" id="cat">
                <div class="form-group">
                <label for="name">Name Categories</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Name Categories">
                </div>

                <div class="form-group">
                    <label for="slug">slug</label>
                    <input name="slug" type="text" class="form-control" id="slug" placeholder="slug">
                </div>

                <div class="form-group">
                    <label for="discription">Discription</label>
                    <textarea name="discription" type="text" class="form-control" id="discription"></textarea>
                </div>

                <div class="form-group">
                    <label for="store">this category for store Number</label>
                    <select name="store" class="form-control" id="store">
                        @foreach (auth()->user()->stores as $item)
                        <option>{{$item->id}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload image</label>
                    <input accept="image/*" name="image" class="form-control" type="file" id="image" >
                    <br>
                    <img id="blah" src="{{ asset('img/defult.jpg') }}" alt="your image" width="150px" height="150px" />
                </div>

                <br>
                <button type="submit" class="btn btn-primary" id="publish">publish</button>
        </div>

    </div>
</form>

@section('script')
<script>
image.onchange = evt => {
    const [file] = image.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }
  </script>
@endsection


@endsection
