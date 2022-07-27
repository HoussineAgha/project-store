@extends('backend.customer.appback')

@section('title','Tickets')


@section('style')
    <style>
        .btn-dark{
            margin-right: 140px;
        }
        p{
          display: inline;
          font-size: 15px;
        }
        .bg-success{
            margin-top: 0px;
        }

    </style>
@endsection

@section('content2')

<div class="">
    <h5 style="color: rgb(216, 108, 108)">Note 1: You can create a Tickets New </h5>
    <h5 style="color: rgb(230, 81, 81)">Note 2: Your Tickets will Replay within two to four days.</h5>
</div>
    @include('shared.error')
    @include('flash::message')
<br>

<div class="container">
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8">
        <form method="POST" action="{{route('user.storeticket')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required>
              </div>
            <br>
          <div class="mb-3">
            <label for="description" class="form-label">Please Enter Description your issue</label>
            <textarea name="description" class="form-control" id="description" rows="3" required ></textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">upload Screenshot if available</label>
            <input accept="image/*" name="image" class="form-control" type="file" id="image" onchange="loadFile(event)">
        </div>
        <img id="blah" src="{{ asset('img/defult.jpg') }}" alt="your image" width="150px" height="150px" />
        <hr>

          <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>

    <div class="col-2">

    </div>
</div>
<br>
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Ticket ID</th>
                <th scope="col">Subject</th>
                <th scope="col">Created at</th>
                <th scope="col">Replies</th>
                <th scope="col">Status</th>
                <th scope="col">Option</th>
              </tr>
            </thead>
            <tbody>

            @forelse (auth()->user()->ticket as $item)
              <tr>
                <td>#{{$item->code}}</td>
                <td>{{$item->subject}}</td>
                <td>{{$item->created_at}}</td>

                <td>{{count($item->replay)}}</td>


                <td>
                    @switch($item->status)
                        @case($item->status = 1)
                        <span class="badge bg-success" style="font-size: inherit">Solved</span>
                            @break
                        @default
                        <span class="badge bg-primary" style="font-size: inherit">In Review</span>
                    @endswitch
                </td>
                    <td class="text-right footable-last-visible" style="display: table-cell; width:150px;">
                        <a class="btn btn-soft-success btn-icon btn-circle btn-sm" href="{{route('user.detailsticket',$item->id)}}" target="_blank" title="view">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M1.679 7.932c.412-.621 1.242-1.75 2.366-2.717C5.175 4.242 6.527 3.5 8 3.5c1.473 0 2.824.742 3.955 1.715 1.124.967 1.954 2.096 2.366 2.717a.119.119 0 010 .136c-.412.621-1.242 1.75-2.366 2.717C10.825 11.758 9.473 12.5 8 12.5c-1.473 0-2.824-.742-3.955-1.715C2.92 9.818 2.09 8.69 1.679 8.068a.119.119 0 010-.136zM8 2c-1.981 0-3.67.992-4.933 2.078C1.797 5.169.88 6.423.43 7.1a1.619 1.619 0 000 1.798c.45.678 1.367 1.932 2.637 3.024C4.329 13.008 6.019 14 8 14c1.981 0 3.67-.992 4.933-2.078 1.27-1.091 2.187-2.345 2.637-3.023a1.619 1.619 0 000-1.798c-.45-.678-1.367-1.932-2.637-3.023C11.671 2.992 9.981 2 8 2zm0 8a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                        </a>
                    </td>
              </tr>

              @empty

              <div class="alert alert-warning" role="alert" style="margin-top: 25px; text-align:center;">
                <h5>There are currently no Tickets in this Account</h5>
              </div>
              @endforelse
            </tbody>
          </table>
          <div class="pagination-product" style="padding: 20px 0">
            {!! $tickets->links() !!}
    </div>
    </div>
</div>

@section('script')
<script>
image.onchange = evt => {
    const [file] =image.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }
  </script>
  @endsection
@endsection
