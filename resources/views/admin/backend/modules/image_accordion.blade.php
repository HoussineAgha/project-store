<div class="row">
    <div class="col-6">
        <label for="imageacc1" class="form-label">Select image Accordion(1) Dimensions are 600px * 400px</label>
        <input accept="image/*" name="imageacc1" id="imageacc1" class="form-control" type="file" value="{{$setting->image_accordion[0]}}" onchange="loadFile(event)" >
        @isset($setting->image_accordion[0])
        <img id="output" src="{{ asset($setting->image_accordion[0]) }}" alt="" width="150px" height="150px" />
        <a href=""><i class="fas fa-trash" style="padding-left: 35%; color:red;"></i></a>
        @endisset
        @empty($setting->image_accordion[0])
        <img id="output" src="{{ asset('img/defult.jpg') }}" alt="" width="150px" height="150px" />
        @endempty

      </div>

    <div class="col-6">
        <label for="imageacc2" class="form-label">Select image Accordion(2) Dimensions are 600px * 400px</label>
        <input accept="image/*" name="imageacc2" id="imageacc2" class="form-control" type="file" value="{{$setting->image_accordion[1]}}" onchange="loadFile(event)">
        @isset($setting->image_accordion[1])
        <img id="output" src="{{ asset($setting->image_accordion[1]) }}" alt="" width="150px" height="150px" />
        <a href=""><i class="fas fa-trash" style="padding-left: 35%; color:red;"></i></a>
        @endisset
        @empty($setting->image_accordion[1])
        <img id="output" src="{{ asset('img/defult.jpg') }}" alt="" width="150px" height="150px" />
        @endempty
      </div>

    </div>



  <div class="row">
    <div class="col">
        <label for="imageacc3" class="form-label">Select image Accordion(3) Dimensions are 600px * 400px</label>
        <input accept="image/*" name="imageacc3" id="imageacc3" class="form-control" type="file" value="{{$setting->image_accordion[2]}}"  onchange="loadFile(event)">
        @isset($setting->image_accordion[2])
        <img id="output" src="{{ asset($setting->image_accordion[2]) }}" alt="" width="150px" height="150px"/>
        <a href=""><i class="fas fa-trash" style="padding-left: 35%; color:red;"></i></a>
        @endisset
        @empty($setting->image_accordion[2])
        <img id="output" src="{{ asset('img/defult.jpg') }}" alt="" width="150px" height="150px" />
        @endempty
      </div>


    <div class="col">
        <label for="imageacc4" class="form-label">Select image Accordion(4) Dimensions are 600px * 400px</label>
        <input accept="image/*" name="imageacc4" id="imageacc4" class="form-control" type="file" value="{{$setting->image_accordion[3]}}"  onchange="loadFile(event)">

        @isset($setting->image_accordion[3])
        <img id="output" src="{{ asset($setting->image_accordion[3]) }}" alt="" width="150px" height="150px" />
        <a href=""><i class="fas fa-trash" style="padding-left: 35%; color:red;"></i></a>
        @endisset
        @empty($setting->image_accordion[3])
        <img id="output" src="{{ asset('img/defult.jpg') }}" alt="" width="150px" height="150px" />
        @endempty
      </div>

    </div>

