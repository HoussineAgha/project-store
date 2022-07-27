@extends('backend.customer.appback')

@section('title','Withdrawal')


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
    <h5 style="color: rgb(216, 108, 108)">Note 1: You can create a withdrawal request according to the profits you have in your account.</h5>
    <h5 style="color: rgb(230, 81, 81)">Note 2: Your withdrawals will arrive within two to four days.</h5>
</div>
    @include('shared.error')
    @include('flash::message')
<br>
<div class="col-sm-6" style="margin: auto; margin-bottom:25px;">
    <div class="card widget-flat" style="background-image:linear-gradient(315deg, #2123e1cb 0%, #0e0744 74%); text-align:center;">
        <div class="card-body">
            <div class="float-end">
                <i class="mdi mdi-cart-plus widget-icon bg-danger-lighten text-danger"></i>
            </div>
            <h5 class=" fw-normal mt-0" title="Number of Orders" style="color: white;">All Profits</h5>
            <h3 class="mt-3 mb-3" style="color: white;">{{auth()->user()->balance}} USD</h3>
        </div> <!-- end card-body-->
    </div> <!-- end card-->
</div>

<div class="container">
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8">
        <form method="POST" action="{{route('withdrawal.request')}}">
            @csrf
            <div class="select">
            <label for="Withdrawal_Method" class="form-label">Select Withdrawal Method</label>
            <select name="Withdrawal_Method" id="Withdrawal_Method" class="form-select" aria-label="Default select example">
                <option value="Paypal">Paypal</option>
                <option value="Strip">Strip</option>
                <option value="Mada">Mada</option>
                <option value="Payeer">Payeer</option>
              </select>
            </div>
            <br>
          <div class="mb-3">
            <label for="description" class="form-label">Please enter the selected Withdrawal information</label>
            <textarea name="description" class="form-control" id="description" rows="2" placeholder='paypal : example@example.com
payeer : P10254****'></textarea>
          </div>
          <div class="mb-3">
            <label for="amount" class="form-label">Amount value</label>
            <input name="amount" type="number" class="form-control" id="amount" placeholder="0.00" min="0" step="any">
          </div>

          <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>

    <div class="col-2">

    </div>
</div>
    <div class="row">
        <table class="table">
            <thead>

              <tr>
                <th scope="col">Withdrawal ID</th>
                <th scope="col">Amount</th>
                <th scope="col">Withdrawal method</th>
                <th scope="col">Created at</th>
                <th scope="col">Status</th>
              </tr>
            </thead>

            <tbody>



                @forelse (auth()->user()->withdrawal as $item)
              <tr>
                <td>#{{$item->id}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->Withdrawal_Method}}</td>
                <td>{{$item->created_at}}</td>
                <td>
                    @switch($item->status)
                        @case($item->status = 1)
                        <span class="badge bg-success" style="font-size: inherit">Success</span>
                            @break
                        @case($item->status = 2)
                        <span class="badge bg-danger" style="font-size: inherit">Rejected</span>
                            @break
                        @default
                        <span class="badge bg-primary" style="font-size: inherit">In Review</span>
                    @endswitch
                </td>
              </tr>

              @empty

              <div class="alert alert-warning" role="alert" style="margin-top: 25px; text-align:center;">
                <h5>There are currently no Withdrawal in this Account</h5>
              </div>
              @endforelse
            </tbody>
          </table>
          <div class="pagination-product" style="padding: 20px 0">
            {!! $withdrawals->links() !!}
    </div>
    </div>
</div>
@endsection
