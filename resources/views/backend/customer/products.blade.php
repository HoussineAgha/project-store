@extends('backend.customer.appback')

@section('title','All product')

@section('style')
    <style>
        #creat{
            float: right;
            margin-bottom: 25px;
        }
    </style>
@endsection

@section('content2')


@include('flash::message')
<a href="/product/create/{{$store->id }}" class="btn btn-primary" id="creat" >creat product</a>

<h4> The Products spicial in this store:<strong> {{$store->name_store}} </strong></h4>

<table class="table">
    <thead>

      <tr>

        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">price</th>
        <th scope="col">category</th>
        <th scope="col">option</th>
      </tr>
    </thead>

    <tbody>

        @foreach ($store->product as $item)
      <tr>

        <td><img src="{{ asset($item->image) }}"  width="50px" height="50px" ></td>
        <td>{{$item->name}}</td>
        <td>{{$item->price}} USD</td>
        @isset($store->product)
        <td>{{$item->cat_id}}</td>
        @endisset

        @empty($store->product)
        <td>none</td>
        @endempty


        <td class="text-right footable-last-visible" style="display: table-cell;">
            <a class="btn btn-soft-success btn-icon btn-circle btn-sm" href="#" target="_blank" title="view">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M1.679 7.932c.412-.621 1.242-1.75 2.366-2.717C5.175 4.242 6.527 3.5 8 3.5c1.473 0 2.824.742 3.955 1.715 1.124.967 1.954 2.096 2.366 2.717a.119.119 0 010 .136c-.412.621-1.242 1.75-2.366 2.717C10.825 11.758 9.473 12.5 8 12.5c-1.473 0-2.824-.742-3.955-1.715C2.92 9.818 2.09 8.69 1.679 8.068a.119.119 0 010-.136zM8 2c-1.981 0-3.67.992-4.933 2.078C1.797 5.169.88 6.423.43 7.1a1.619 1.619 0 000 1.798c.45.678 1.367 1.932 2.637 3.024C4.329 13.008 6.019 14 8 14c1.981 0 3.67-.992 4.933-2.078 1.27-1.091 2.187-2.345 2.637-3.023a1.619 1.619 0 000-1.798c-.45-.678-1.367-1.932-2.637-3.023C11.671 2.992 9.981 2 8 2zm0 8a2 2 0 100-4 2 2 0 000 4z"></path></svg>
            </a>
            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('edit.product', $item->id)}}" title="edite">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path></svg>
            </a>
            <a href="{{route('delete.product', $item->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="#" title="delete">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" width="20" height="20"><path fill-rule="evenodd" d="M1.757 10.243a6 6 0 118.486-8.486 6 6 0 01-8.486 8.486zM6 4.763l-2-2L2.763 4l2 2-2 2L4 9.237l2-2 2 2L9.237 8l-2-2 2-2L8 2.763l-2 2z"></path></svg>
            </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
