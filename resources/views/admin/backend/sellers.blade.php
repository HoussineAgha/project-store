@extends('admin.backend.layout.app')

@section('title','All-Sellers')

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
    <div>
        <a href="{{route('admin.createsellers')}}" class="btn btn-dark" id="creat-store" target="_blank"> Creat New </a>
    </div>
    <div class="row" style="margin-top: 75px;">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">All Sellers</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name seller</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                            @isset($item->image)
                            <img src="{{asset($item->image)}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                            @endisset
                          @empty($item->image)
                          <img src="{{asset('img/zz.png')}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          @endempty
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$item->first_name}} {{$item->last_name}}</h6>
                          <p class="mb-0 text-sm">{{$item->email}}</p>
                        </div>
                      </div>
                    </td>
                    @if ($item->bloack == 0)
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                      </td>
                    @else
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-warning">Blocked</span>
                      </td>
                    @endif

                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$item->created_at}}</span>
                    </td>
                    <td class="align-middle" style="text-align: center;">
                        <i class="fas fa-edit"></i><a href="{{route('admin.editseller',$item->id)}}" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Seller">Edit | </a>
                      <i class="material-icons text-sm me-2">delete</i><a href="{{route('admin.deleteseller',$item->id)}}" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Seller">Delete </a>
                    </td>
                  </tr>
                  @endforeach
                  <tr>
                </tbody>
                {{ $user->links() }}
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


