<table class="table table-centered table-nowrap mb-0">
    <thead class="table-light">
        <tr>
            <th style="width: 20px;">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="customCheck1">
                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                </div>
            </th>
            <th>Order ID</th>
            <th>Date</th>
            <th>Payment Status</th>
            <th>Total</th>
            <th>Payment Method</th>
            <th>shipping Status</th>
            <th>Client</th>
            <th style="width: 125px;">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            @forelse ($orders as $item)
            <td>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="customCheck2">
                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                </div>
            </td>

            <td><a href="#" class="text-body fw-bold">{{$item->id}}</a> </td>
            <td><small class="text-muted">{{$item->created_at}}</small></td>


            <td>
                <h5><span class="badge badge-success-lighten"><i class="mdi mdi-bitcoin"></i>{{$item->status}}</span></h5>
            </td>
            <td>
                {{$item->total}}$

            </td>
            <td>
                {{$item->patment_type}}
            </td>
            <td>
                <h5><span class="badge badge-info-lighten">{{$item->shipping}}</span></h5>
            </td>
            <td>
                <p><span class="badge badge-info-lighten"></span>{{$item->client->fullname}}</p>
            </td>
            <td class="text-right footable-last-visible" style="display: table-cell; width:150px;">
                <a class="btn btn-soft-success btn-icon btn-circle btn-sm" href="{{route('order.details',$item->id)}}" target="_blank" title="view">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M1.679 7.932c.412-.621 1.242-1.75 2.366-2.717C5.175 4.242 6.527 3.5 8 3.5c1.473 0 2.824.742 3.955 1.715 1.124.967 1.954 2.096 2.366 2.717a.119.119 0 010 .136c-.412.621-1.242 1.75-2.366 2.717C10.825 11.758 9.473 12.5 8 12.5c-1.473 0-2.824-.742-3.955-1.715C2.92 9.818 2.09 8.69 1.679 8.068a.119.119 0 010-.136zM8 2c-1.981 0-3.67.992-4.933 2.078C1.797 5.169.88 6.423.43 7.1a1.619 1.619 0 000 1.798c.45.678 1.367 1.932 2.637 3.024C4.329 13.008 6.019 14 8 14c1.981 0 3.67-.992 4.933-2.078 1.27-1.091 2.187-2.345 2.637-3.023a1.619 1.619 0 000-1.798c-.45-.678-1.367-1.932-2.637-3.023C11.671 2.992 9.981 2 8 2zm0 8a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                </a>

                <a href="{{route('order.delet',$item->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="#" title="delete">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" width="20" height="20"><path fill-rule="evenodd" d="M1.757 10.243a6 6 0 118.486-8.486 6 6 0 01-8.486 8.486zM6 4.763l-2-2L2.763 4l2 2-2 2L4 9.237l2-2 2 2L9.237 8l-2-2 2-2L8 2.763l-2 2z"></path></svg>
                </a>
                @if ($item->shipping == 'On the way' || $item->shipping == 'Waiting')
                <a href="{{route('order.delivered',$item->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="#" title="delivered">
                    <i class="fa-solid fa-truck-fast" style="font-size: 20px;"></i>
                </a>
                @endif

                @if ($item->status == 'Waiting')
                <a href="{{route('order.cash',$item->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="#" title="Done Payment">
                    <i class="fa-solid fa-file-invoice-dollar" style="font-size: 20px;"></i>
                </a>
                @endif

            </td>

            <!--
            <td>
                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
            </td>
        -->
        </tr>
        @empty
        <div class="empety">
            <h5 class="text-center">There are no Order available for you 🙂 😔</h5>
        </div>

        @endforelse
    </tbody>

</table>
