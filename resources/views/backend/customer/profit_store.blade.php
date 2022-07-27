@extends('backend.customer.appback')

@section('title','Profit - '.$store->name_store)


@section('style')
    <style>
        .btn-dark{
            margin-right: 140px;
        }
        p{
          display: inline;
          font-size: 15px;

        }

    </style>
@endsection

@section('content2')

<table class="table">
    <thead>

      <tr>
        <th scope="col">Profit ID</th>
        <th scope="col">Amount</th>
        <th scope="col">Payment method</th>
        <th scope="col">Created at</th>
        <th scope="col">View Details</th>
      </tr>
    </thead>

    <tbody>



        @forelse ($store->profit as $item)
      <tr>
        <td>#{{$item->id}}</td>
        <td>{{$item->amount}}</td>
        <td>{{$item->payment_method}}</td>
        <td>{{$item->created_at}}</td>
        <td class="text-right footable-last-visible" style="display: table-cell;">
            <a class="btn btn-soft-success btn-icon btn-circle btn-sm" href="{{route('order.details',$item->order_id)}}" target="_blank" title="view">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M1.679 7.932c.412-.621 1.242-1.75 2.366-2.717C5.175 4.242 6.527 3.5 8 3.5c1.473 0 2.824.742 3.955 1.715 1.124.967 1.954 2.096 2.366 2.717a.119.119 0 010 .136c-.412.621-1.242 1.75-2.366 2.717C10.825 11.758 9.473 12.5 8 12.5c-1.473 0-2.824-.742-3.955-1.715C2.92 9.818 2.09 8.69 1.679 8.068a.119.119 0 010-.136zM8 2c-1.981 0-3.67.992-4.933 2.078C1.797 5.169.88 6.423.43 7.1a1.619 1.619 0 000 1.798c.45.678 1.367 1.932 2.637 3.024C4.329 13.008 6.019 14 8 14c1.981 0 3.67-.992 4.933-2.078 1.27-1.091 2.187-2.345 2.637-3.023a1.619 1.619 0 000-1.798c-.45-.678-1.367-1.932-2.637-3.023C11.671 2.992 9.981 2 8 2zm0 8a2 2 0 100-4 2 2 0 000 4z"></path></svg>
            </a>
        </td>
      </tr>

      @empty

      <div class="alert alert-warning" role="alert" style="margin-top: 25px; text-align:center;">
        <h5>There are currently no Profits in this store</h5>
      </div>
      @endforelse
    </tbody>
  </table>
            <div class="pagination-product" style="padding: 20px 0">
                    {!! $profitss->links() !!}
            </div>
@endsection
