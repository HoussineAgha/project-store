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
        .alert-success{
            color: white;
            width: 50%;
        }
    </style>
@endsection

@section('content')
    <div class="text-top">
        <h6>You can modify some of the main interface settings from here</h6>
    </div>

    <div class="container">
        @include('flash::message')
        @include('shared.error')
        <div class="row">
            <div class="col-12">
                <form action="{{route('admin.updatesettings',$setting->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                            <label for="phone">Phone Number</label>
                          <input value="{{$setting->phone}}" name="phone" type="text" id="phone" class="form-control" placeholder="96398521452" aria-label="" >
                        </div>
                        <div class="col">
                            <label for="email">Email</label>
                          <input name="email" type="email" id="email" class="form-control" placeholder="example@gmail.com" aria-label="example@gmail.com" value="{{$setting->email}}" >
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="logo" class="form-label">Logo Dimensions are 150px * 150px</label>
                        <input accept="image/*" name="logo" id="logo" class="form-control" type="file" value="{{$setting->logo}}" onchange="loadFile(event)" >
                      </div>
                      @isset($setting->logo)
                      <img id="output" src="{{ asset($setting->logo) }}" alt="your image" width="150px" height="150px" />
                      <a href="{{route('admin.deletesettings',$setting->id)}}"><i class="fas fa-trash" style="padding-left: 50%; color:red;"></i></a>
                      @endisset
                      @empty($setting->logo)
                      <img id="output" src="{{ asset('img/defult.jpg') }}" alt="your image" width="150px" height="150px" />
                      @endempty

                      @include('admin.backend.modules.slider_settings')

                      <div class="row">
                        <div class="col">
                            <label for="face">FaceBook</label>
                          <input name="face" type="url" id="face" class="form-control" placeholder="https://www.facebook.com/face" aria-label="" value="{{$setting->social[0]}}" >
                        </div>
                        <div class="col">
                            <label for="twitter">Twitter</label>
                          <input name="twitter" type="url" id="twitter" class="form-control" placeholder="https://www.Twitter.com/test" aria-label="" value="{{$setting->social[1]}}" >
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                            <label for="instagram">instagram</label>
                          <input name="instagram" type="url" id="instagram" class="form-control" placeholder="https://www.instagram.com/face" aria-label="" value="{{$setting->social[2]}}" >
                        </div>
                        <div class="col">
                            <label for="Youtube">Youtube</label>
                          <input name="Youtube" type="url" id="Youtube" class="form-control" placeholder="https://www.Youtube.com/" aria-label="" value="{{$setting->social[3]}}" >
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="baner" class="form-label">Baner Dimensions are hieght  200px Max </label>
                        <input accept="image/*" name="baner" id="baner" class="form-control" type="file" value="{{$setting->baner}}" onchange="loadFile(events)" >
                      </div>
                      @isset($setting->baner)
                      <img id="baner" src="{{ asset($setting->baner) }}" alt="" width="70%" height="150px" />
                      <a href="#"><i class="fas fa-trash" style="padding-left: 10%; color:red;"></i></a>
                      @endisset
                      @empty($setting->baner)
                      <img id="baner" src="{{ asset('img/defult.jpg') }}" alt="your image" width="150px" height="150px" />
                      @endempty

                      @include('admin.backend.modules.feauter_settings')
                      @include('admin.backend.modules.image_accordion')

                      <div class="mb-3">
                        <label for="discription" class="form-label">Discription in Footer</label>
                        <textarea name="discription" class="form-control" id="discription" rows="3">{{$setting->discfooter}}</textarea>
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
