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
                        <th>Quantity</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($orders) > 0)
                        @foreach ($orders as $i => $order)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>${{ number_format($order->total_amount, 2) }}</td>
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
                                        class=" btn-info btn-sm float-left mr-1"
                                        style="height:30px; border-radius:50%" data-toggle="tooltip"
                                        title="view" data-placement="bottom"><i class="fas fa-eye mb-4"></i></a>
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

@push('styles')
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
    <script>
        $('#order-dataTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [8]
            }]
        });

        // Sweet alert

        function deleteData(id) {

        }
    </script>
    <script>
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
