@extends('backend.customer.appback')


@section('title','creat page')


@section('style')
    <style>
        .note-editable{
            height: 250px;
        }
    </style>
@endsection

@section('content2')

    @include('shared.error')

<form method="POST" action="/pages/edite/{{ $pages->id }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <div class="col-md-12">
                <div class="form-group">
                <label for="title">Name pages</label>
                <input value="{{$pages->title}}" name="title" type="text" class="form-control" id="title" placeholder="Name page">
                </div>

                <div class="form-group">
                    <label for="slug">slug</label>
                    <input value="{{$pages->slug}}" name="slug" type="text" class="form-control" id="slug" placeholder="slug">
                </div>

                <div class="form-group">
                    <label for="discription">Discription</label>
                    <textarea name="discription" type="text" class="form-control" id="discription">{{$pages->discription}}</textarea>
                </div>

                <div class="form-group">
                    <label for="store">this pages for store Number</label>
                    <select name="store" class="form-control" id="store">
                        @foreach (auth()->user()->stores as $item)
                        <option>{{$item->id}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="user"></label>
                    <input value="{{auth()->user()->id}}" name="user" type="text" class="form-control " id="user" hidden >
                    </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload image for page</label>
                    <input accept="image/*" name="image" class="form-control" type="file" id="image" >
                    <br>
                    <img id="blah" src="{{ asset($pages->image) }}" alt="your image" width="100%px" height="300px" />
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
