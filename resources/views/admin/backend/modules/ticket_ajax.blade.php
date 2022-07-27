      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">All Tickets</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2" id="tickets">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                  <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Ticket</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">From</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subject</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option</th>
                  </tr>
                  </thead>
                  <tbody>

                      @foreach ($tickets as $item)
                      <td>
                          <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">#{{$item->code}} </h6>
                          </div>
                      </td>
                      @php
                          $user = App\Models\User::find($item->user_id);
                      @endphp
                      <td>
                          <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{$user->first_name}} {{$user->last_name}} </h6>
                          </div>
                      </td>


                      <td class="align-middle text-center text-sm">
                          <p>{{Str::limit($item->subject,15)}}</p>
                      </td>

                      <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">{{$item->created_at}}</span>
                      </td>

                      <td>
                          @switch($item->status)
                              @case($item->status = 1)
                              <span class="badge bg-success" style="margin: 0px;" >Solved</span>
                                  @break
                              @default
                              <span class="badge bg-info" >In Review</span>
                          @endswitch
                      </td>

                      <td class="text-right footable-last-visible" style="display: table-cell;">
                          <a class="btn btn-soft-success btn-icon btn-circle btn-sm" href="{{route('admin.detailstickets',$item->id)}}" target="_blank" title="view" style="top: 10px;">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M1.679 7.932c.412-.621 1.242-1.75 2.366-2.717C5.175 4.242 6.527 3.5 8 3.5c1.473 0 2.824.742 3.955 1.715 1.124.967 1.954 2.096 2.366 2.717a.119.119 0 010 .136c-.412.621-1.242 1.75-2.366 2.717C10.825 11.758 9.473 12.5 8 12.5c-1.473 0-2.824-.742-3.955-1.715C2.92 9.818 2.09 8.69 1.679 8.068a.119.119 0 010-.136zM8 2c-1.981 0-3.67.992-4.933 2.078C1.797 5.169.88 6.423.43 7.1a1.619 1.619 0 000 1.798c.45.678 1.367 1.932 2.637 3.024C4.329 13.008 6.019 14 8 14c1.981 0 3.67-.992 4.933-2.078 1.27-1.091 2.187-2.345 2.637-3.023a1.619 1.619 0 000-1.798c-.45-.678-1.367-1.932-2.637-3.023C11.671 2.992 9.981 2 8 2zm0 8a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                          </a>
                      </td>
                    </tr>
                      @endforeach
                  </tbody>
                  {{ $tickets->links() }}
                </table>
              </div>

          </div>
        </div>
      </div>
