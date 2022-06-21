<div class="mb-3">
    <label for="slide1" class="form-label">Select Slide(1) Dimensions are height 400px </label>
    <input accept="image/*" name="slide1" id="slide1" class="form-control" type="file"  onchange="loadFile(event)">
  </div>
  <a href=""><i class="fas fa-trash" style="padding-left: 36%; color:red;"></i></a>
  <img id="output" src="{{ asset('img/defult.jpg') }}" alt="" width="300px" height="300px" />


  <div class="mb-3">
    <label for="slide2" class="form-label">Select Slide(2) Dimensions are height 400px</label>
    <input accept="image/*" name="slide2" id="slide2" class="form-control" type="file"  onchange="loadFile(event)" >
  </div>
  <a href=""><i class="fas fa-trash" style="padding-left: 36%; color:red;"></i></a>
  <img id="output" src="{{ asset('img/defult.jpg') }}" alt="your image" width="300px" height="300px" />



  <div class="mb-3">
    <label for="slide3" class="form-label">Select Slide(3) Dimensions are height 400px</label>
    <input accept="image/*" name="slide3" id="slide3" class="form-control" type="file"  onchange="loadFile(event)" >
  </div>
  <a href=""><i class="fas fa-trash" style="padding-left: 36%; color:red;"></i></a>
  <img id="output" src="{{ asset('img/defult.jpg') }}" alt="your image" width="300px" height="300px" />


