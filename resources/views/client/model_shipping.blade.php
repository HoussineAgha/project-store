<style>

  .col-12{
    text-align: left;
  }

</style>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add New
  </button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add New Shipping</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('model.shipping',\Auth::guard('client')->user()->id)}}">
            @csrf

            <div class="col-12">
                <label for="client_id" class="form-label" ></label>
                <input type="text" name="client_id" class="form-control" id="client_id"  hidden value="{{\Auth::guard('client')->user()->id}}">
                <div class="invalid-feedback">
                </div>
              </div>

              <div class="col-12">
                <label for="store_id" class="form-label"></label>
                <input type="text" name="store_id" class="form-control" id="store_id"  hidden value="{{$store->id}}">
                <div class="invalid-feedback">
                </div>
              </div>


            <div class="col-12">
                <label for="firstname" class="form-label">First name</label>
                <input type="text" class="form-control" name="firstname" id="firstname"  required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

              <div class="col-12">
                <label for="lastname" class="form-label">Last name</label>
                <input type="text" class="form-control" name="lastname" id="lastname"  required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>

              <div class="col-12">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="number" class="form-control" name="phone" id="phone" placeholder="965587..." required>
                  <div class="invalid-feedback">
                    Please enter a valid phone address for shipping updates.
                  </div>
                </div>


              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="col-12">
              <label for="country" class="form-label">Country</label>
              <input type="text" class="form-control" name="country" id="country" required>
                <div class="invalid-feedback">
                  Please select a valid country .
                </div>
              </div>

              <div class="col-12">
                  <label for="state" class="form-label">state</label>
                  <input type="text" class="form-control" name="state" id="state" required>
                    <div class="invalid-feedback">
                      Please select a valid state .
                    </div>
                  </div>


            <div class="form-check" style="padding-top:20px">
                <label class="form-check-label" for="sameaddress">Shipping address is the same as my billing address</label>
                <input name="sameaddress" type="checkbox"  class="form-check-input"  id="sameaddress" value="1" checked>
              </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>

        </form>


      </div>
    </div>
  </div>
