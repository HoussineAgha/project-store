@extends('admin.backend.layout.app')

@section('title','Settings')
@section('style')
    <style>
        .text-top{
            text-align: center;
        }
        .form-control{
            border: 0.1px solid;

        }
        label, .form-label{
            color: black;
        }
    </style>
@endsection

@section('content')
    <div class="text-top">
        <h6>You can modify some of the main interface settings from here</h6>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('admin.storesettings')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="phone">Phone Number</label>
                          <input name="phone" type="text" id="phone" class="form-control" placeholder="96398521452" aria-label="" >
                        </div>
                        <div class="col">
                            <label for="email">Email</label>
                          <input name="email" type="email" id="email" class="form-control" placeholder="example@gmail.com" aria-label="example@gmail.com" >
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="logo" class="form-label">Logo Dimensions are 150px * 150px</label>
                        <input accept="image/*" name="logo" id="logo" class="form-control" type="file"  >
                      </div>
                      <img id="blah" src="{{ asset('img/defult.jpg') }}" alt="your image" width="150px" height="150px" />

                      @include('admin.backend.modules.slidersettings')

                      <div class="row">
                        <div class="col">
                            <label for="face">FaceBook</label>
                          <input name="face" type="url" id="face" class="form-control" placeholder="https://www.facebook.com/face" aria-label="" >
                        </div>
                        <div class="col">
                            <label for="twitter">Twitter</label>
                          <input name="twitter" type="url" id="twitter" class="form-control" placeholder="https://www.Twitter.com/test" aria-label="" >
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                            <label for="instagram">instagram</label>
                          <input name="instagram" type="url" id="instagram" class="form-control" placeholder="https://www.instagram.com/face" aria-label="" >
                        </div>
                        <div class="col">
                            <label for="Youtube">Youtube</label>
                          <input name="Youtube" type="url" id="Youtube" class="form-control" placeholder="https://www.Youtube.com/" aria-label="" >
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="baner" class="form-label">Baner Dimensions are hieght  200px Max </label>
                        <input accept="image/*" name="baner" id="baner" class="form-control" type="file"  >
                      </div>
                      <img id="blah" src="{{ asset('img/defult.jpg') }}" alt="your image" width="100%" height="200px" />

                      @include('admin.backend.modules.feutersettings')
                      @include('admin.backend.modules.imgaccordion')

                      <div class="mb-3">
                        <label for="discription" class="form-label">Discription in Footer</label>
                        <textarea name="discription" class="form-control" id="discription" rows="3"></textarea>
                      </div>

                      <br>
                      <button type="submit" class="btn btn-primary" id="publish">save</button>
                </form>
            </div>
        </div>
    </div>
    @section('script')
    <script>
        var loadFile = function(event) {
          var output = document.getElementById('output');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          }
        }


        logo.onchange = evt => {
            const [file] =logo.files
            if (file) {
            blah.src = URL.createObjectURL(file)
            }
        }

        $(document).ready(function() {
        $('#feau1').summernote();
        });

        $(document).ready(function() {
            $('#feau2').summernote();
        });

        $(document).ready(function() {
            $('#feau3').summernote();
        });


      </script>
    @endsection

@endsection
