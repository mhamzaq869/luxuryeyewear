@extends('user.layouts.master')

@section('main-content')
    <div class="container-fluid">
        {{-- @include('user.layouts.notification') --}}
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Orders</h1>
        </div>



        <!-- Content Row -->

        <div class="row">
            @php
                $orders = DB::table('orders')
                    ->where('user_id', auth()->user()->id)
                    ->paginate(10);
            @endphp
            <!-- Order -->
            <div class="col-xl-12 col-lg-12 px-0">
                <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Order No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            {{-- <th>Quantity</th> --}}
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (count($orders) > 0)
                            @foreach ($orders as $i => $order)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                    <td>{{ $order->email }}</td>
                                    {{-- <td>{{ $order->quantity }}</td> --}}
                                    <td><span id="user_order_price_{{ $order->id }}"></span></td>
                                    <td>
                                        @if ($order->status == 'new')
                                            <span class="badge badge-primary">{{ $order->status }}</span>
                                        @elseif($order->status == 'process')
                                            <span class="badge badge-warning">{{ $order->status }}</span>
                                        @elseif($order->status == 'delivered')
                                            <span class="badge badge-success">{{ $order->status }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ $order->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('user.order.show', $order->id) }}"
                                            class=" btn-info btn-sm float-left mr-1" style="height:30px; border-radius:50%"
                                            data-toggle="tooltip" title="view" data-placement="bottom"><i
                                                class="fas fa-eye mb-4"></i></a>
                                        <form method="POST" action="{{ route('user.order.delete', [$order->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn-danger btn-sm dltBtn" data-id={{ $order->id }}
                                                style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                                data-placement="bottom" title="Delete"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="8" class="text-center">
                                <h4 class="my-4">You have no order yet!! Please order some products</h4>
                            </td>
                        @endif
                    </tbody>
                </table>

                {{ $orders->links() }}
            </div>
        </div>

    </div>


@endsection


@push('scripts')
    <!-- Page level plugins -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        allproducts = @json($orders).data;

        $.each(allproducts, function(index, value) {
            $("#user_order_price_" + value.id).html(new Intl.NumberFormat('en-us', {
                style: 'currency',
                currency: symbol
            }).format(value.total_amount * value.conversion_rate))
            $("#user_order_shipping_price_" + value.id).html(new Intl.NumberFormat('en-us', {
                style: 'currency',
                currency: symbol
            }).format(value.shipping != null ? value.shipping : 0 * value.conversion_rate))
            $("#user_order_total_price_" + value.id).html(new Intl.NumberFormat('en-us', {
                style: 'currency',
                currency: symbol
            }).format(value.total_amount * value.conversion_rate))
            $.each(value.cart_info, function(i, val) {
                $("#user_order_cart_price_" + val.id).html(new Intl.NumberFormat('en-us', {
                    style: 'currency',
                    currency: symbol
                }).format(val.price * value.conversion_rate))
            });
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.dltBtn').click(function(e) {
                var form = $(this).closest('form');
                var dataID = $(this).data('id');
                // alert(dataID);
                e.preventDefault();
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal("Your data is safe!");
                        }
                    });
            })
        })
    </script>
@endpush
