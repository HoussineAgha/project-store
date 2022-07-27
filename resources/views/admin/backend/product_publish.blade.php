@extends('admin.backend.layout.app')

@section('title','Product Publish')

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
        <a href="#" class="btn btn-dark" id="creat-store" target="_blank"> Creat New </a>
    </div>
    <div class="row" style="margin-top: 75px;">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">All Products Publish</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Product</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name Product</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name Store</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                  <tr>
                    <td>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">#{{$item->id}}</h6>
                          </div>
                    </td>

                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="{{asset($item->image)}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$item->name}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$item->store->name_store}}</h6>
                          </div>
                    </td>

                        <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-success">Publish</span>
                          </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$item->created_at}}</span>
                    </td>
                    <td class="align-middle" style="text-align: center;">
                      <i class="fas fa-edit"></i><a href="{{route('admin.productedit',$item->id)}}" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Store">Edit | </a>
                      <i class="material-icons text-sm me-2">delete</i><a href="{{route('admin.productdelete',$item->id)}}" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Store">Delete | </a>
                      <i class="fas fa-eye"></i><a href="/product/{{$item->store->id}}/{{$item->id}}" target="_blank" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="View Store">View</a>
                    </td>
                  </tr>
                  @endforeach
                  <tr>
                </tbody>
                {{ $products->links() }}
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
