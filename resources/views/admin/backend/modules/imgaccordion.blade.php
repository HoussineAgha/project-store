<div class="row">
    <div class="col-6">
        <label for="imageacc1" class="form-label">Select image Accordion(1) Dimensions are 600px * 400px</label>
        <input accept="image/*" name="imageacc1" id="imageacc1" class="form-control" type="file"  onchange="loadFile(event)" >
        <a href=""><i class="fas fa-trash" style="padding-left: 35%; color:red;"></i></a>
        <img id="output" src="{{ asset('img/defult.jpg') }}" alt="" width="150px" height="150px" />
      </div>

    <div class="col-6">
        <label for="imageacc2" class="form-label">Select image Accordion(2) Dimensions are 600px * 400px</label>
        <input accept="image/*" name="imageacc2" id="imageacc2" class="form-control" type="file"  onchange="loadFile(event)">
        <a href=""><i class="fas fa-trash" style="padding-left: 35%; color:red;"></i></a>
        <img id="output" src="{{ asset('img/defult.jpg') }}" alt="" width="150px" height="150px" />

      </div>

    </div>



  <div class="row">
    <div class="col">
        <label for="imageacc3" class="form-label">Select image Accordion(3) Dimensions are 600px * 400px</label>
        <input accept="image/*" name="imageacc3" id="imageacc3" class="form-control" type="file"   onchange="loadFile(event)">
        <a href=""><i class="fas fa-trash" style="padding-left: 35%; color:red;"></i></a>
        <img id="output" src="{{ asset('img/defult.jpg') }}" alt="" width="150px" height="150px" />
      </div>


    <div class="col">
        <label for="imageacc4" class="form-label">Select image Accordion(4) Dimensions are 600px * 400px</label>
        <input accept="image/*" name="imageacc4" id="imageacc4" class="form-control" type="file"  onchange="loadFile(event)">
        <a href=""><i class="fas fa-trash" style="padding-left: 35%; color:red;"></i></a>
        <img id="output" src="{{ asset('img/defult.jpg') }}" alt="" width="150px" height="150px" />
      </div>
    </div>

