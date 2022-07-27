@extends('admin.backend.layout.app')

@section('title','All Message')

@section('style')
    <style>
        .alert-success{
            color: white;
            width: 50%;
        }
    </style>

@endsection

@section('content')
@include('flash::message')
<div class="container-fluid py-4">
    <div class="row" style="margin-top: 75px;">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">All Messages</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Send To</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($messages as $item)
                    <tr>
                        @if ($item->user_id == null && $item->all_user = 1)
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">All User</h6>
                            </div>
                        </td>
                    @endif

                    @if ($item->user_id != null)
                    @php
                        $user = App\Models\User::find($item->user_id);
                    @endphp
                    <td>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$user->first_name}} {{$user->last_name}} </h6>
                        </div>
                    </td>
                    @endif

                    <td class="align-middle text-center text-sm">
                        <p>{{$item->title}}</p>
                    </td>

                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$item->created_at}}</span>
                    </td>
                    <td class="align-middle" style="text-align: center;">
                      <i class="fas fa-eye"></i> <a href="{{route('admin.detailsmessage',$item->id)}}" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="view message">view | </a>
                      <i class="material-icons text-sm me-2">delete</i><a href="{{route('admin.deletemessage',$item->id)}}" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete message">Delete </a>
                    </td>
                  </tr>
                    @endforeach
                </tbody>
                {{ $messag->links() }}
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    @section('script')
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        </script>
    @endsection
@endsection
