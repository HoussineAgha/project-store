@extends('backend.customer.appback')

@section('title','creat store')


@section('content2')

<h5 class="text-center">Store creation form</h5>

    @include('shared.error')

<form class="row g-3" method="POST" action="/stores/store" enctype="multipart/form-data">
    @csrf

    <div class="col-md-12">
            <div class="mb-3">
                <label for="name_store" class="form-label"></label>
                <input name="name_store" type="text" class="form-control" id="name_store" placeholder="Enable store Name Example : The Best" value="{{old('name_store')}}">
            </div>

            <div class="mb-3">
                <label for="text_top" class="form-label"> inter your ads</label>
                <input name="text_top" type="text" class="form-control" id="text_top" value="{{old('text_top')}}" >
            </div>

            <div class="mb-3">
                <label for="discription" class="form-label">Enable (Discription short) For Store</label>
                <textarea name="discription" class="ckeditor form-control" id="discription" rows="3" value="{{old('discription')}}" ></textarea>
            </div>

            <div class="mb-3">
                <label for="Baner" class="form-label">Please Upload Banner For Store height 600px </label>
                <input accept="image/*" name="Baner" class="form-control" type="file" id="Baner" width="50%" height="200px" value="{{old('Baner')}}">
                <br>
                <img id="blah" src="#" alt="your image" width="100%" height="300px" />
            </div>

            <div class="mb-3">
                <label for="adsimage" class="form-label">Please Upload Ads image For Store height 150px , width 720px </label>
                <input name="adsimage" class="form-control" type="file" id="adsimage" width="720px" height="150px" value="{{old('adsimage')}}">
                <br>
                <img src="#" alt="your image" width="720px" height="150px" />
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="urlads" class="form-label">Enter url-Ads for Redirect URL</label>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon3">https://amazon.com/example/</span>
                      <input name="urlads" type="text" class="form-control" id="urlads" aria-describedby="basic-addon3" value="{{old('urlads')}}">
                    </div>
                </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Please Upload logo For Store width 200px height 150px</label>
                <input name="logo" class="form-control" type="file" id="logo"  onchange="loadFile(event)">
            </div>
            <img id="output" src="{{ asset('img/defult.jpg') }}" alt="your image" width="150px" height="150px" />

        <div class="row g-3">
            <div class="col-md-6">
                <label for="face" class="form-label">Your vanity FaceBook URL</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon3">https://facebook.com/example/</span>
                  <input name="face" type="text" class="form-control" id="face" aria-describedby="basic-addon3">
                </div>
            </div>

            <div class="col-md-6">
                <label for="twite" class="form-label">Your vanity Twitter URL</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon3">https://Twitter.com/example/</span>
                  <input name="twite" type="text" class="form-control" id="twite" aria-describedby="basic-addon3">
                </div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label for="linkdine" class="form-label">Your vanity Linkdine URL</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon3">https://Linkdine.com/example/</span>
                  <input name="linkdine" type="text" class="form-control" id="linkdine" aria-describedby="basic-addon3">
                </div>
            </div>

            <div class="col-md-6">
                <label for="youtube" class="form-label">Your vanity instagram URL</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon3">https://instagram.com/example/</span>
                  <input name="youtube" type="text" class="form-control" id="youtube" aria-describedby="basic-addon3">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="text_footer" class="form-label"> inter discription Footer (name store)</label>
            <input name="text_footer" type="text" class="form-control" id="text_footer" >
        </div>

        <div class="input-group">
            <span class="input-group-text">Set store opening & closing times</span>
            <label for="opening_times"></label>
            <input name="opening_times" type="text" id="opening_times" aria-label="First name" class="form-control" placeholder="9:00 AM">
            <label for="close_times"></label>
            <input name="close_times" type="text" aria-label="Last name" id="close_times" class="form-control" placeholder="5:00 PM">
          </div>

          <div class="row">
            <div class="col">
                <label for="email">The email will appear on the interface</label>
                <input name="email" type="email" id="email" class="form-control" placeholder="email@example.com">
            </div>
            <div class="col">
                <label for="phone">The Phone will appear on the interface</label>
                <input name="phone" type="text" id="phone" class="form-control" placeholder="phone">
            </div>
          </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary" id="publish">publish</button>
</form>

@section('script')
<script>
Baner.onchange = evt => {
    const [file] = Baner.files
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

@endsection
@endsection
