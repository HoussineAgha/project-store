@extends('backend.customer.appback')

@section('title','General Messages')

@section('style')
    <style>
        .messages{
            padding-bottom: 50px;

        }
    </style>
@endsection

@section('content2')

<div class="messages" style="padding-bottom:50px;">
    <h4>Note : These are <span style="color: red">general </span> messages to all customers sent from admin</h4>
</div>
<table class="table">
    <thead>

      <tr>

        <th scope="col">ID</th>
        <th scope="col">From</th>
        <th scope="col">Title</th>
        <th scope="col">Created at</th>
        <th scope="col">option</th>
      </tr>
    </thead>

    <tbody>

      <tr>
        @foreach ($message as $item)

        <td>#{{$item->id}}</td>
        <td>Admin</td>
        <td>{{ $item->title }}</td>
        <td>{{ $item->created_at }}</td>
        <td class="text-right footable-last-visible" style="display: table-cell;">
            <a class="btn btn-soft-success btn-icon btn-circle btn-sm" href="{{route('user.detailsgeneralmessages',$item->id)}}" target="_blank" title="view">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M1.679 7.932c.412-.621 1.242-1.75 2.366-2.717C5.175 4.242 6.527 3.5 8 3.5c1.473 0 2.824.742 3.955 1.715 1.124.967 1.954 2.096 2.366 2.717a.119.119 0 010 .136c-.412.621-1.242 1.75-2.366 2.717C10.825 11.758 9.473 12.5 8 12.5c-1.473 0-2.824-.742-3.955-1.715C2.92 9.818 2.09 8.69 1.679 8.068a.119.119 0 010-.136zM8 2c-1.981 0-3.67.992-4.933 2.078C1.797 5.169.88 6.423.43 7.1a1.619 1.619 0 000 1.798c.45.678 1.367 1.932 2.637 3.024C4.329 13.008 6.019 14 8 14c1.981 0 3.67-.992 4.933-2.078 1.27-1.091 2.187-2.345 2.637-3.023a1.619 1.619 0 000-1.798c-.45-.678-1.367-1.932-2.637-3.023C11.671 2.992 9.981 2 8 2zm0 8a2 2 0 100-4 2 2 0 000 4z"></path></svg>
            </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$message->links()}}

@endsection
