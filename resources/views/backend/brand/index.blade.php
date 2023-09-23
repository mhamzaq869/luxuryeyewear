@extends('backend.layouts.master')

@section('title', 'Brand Page')

@section('main-content')


    <div class="p-3">

        <div class="row">
            <div class="col-9">
                <h3 class="m-0 font-weight-bold text-dark float-left">Brand Lists</h3>
            </div>
            <div class="col-3 text-end">
                <a href="{{ route('brand.create') }}" class="btn btn-primary btn-sm float-right mb-4" data-toggle="tooltip"
                    data-placement="bottom" title="Add User"><i class="fas fa-plus"></i>
                    Add Brand
                </a>
            </div>
        </div>



        <div class="table-responsive">
            @if (count($brands) > 0)

                <table class="table table-bordered table-striped" id="brand-table" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th width="10%">S.N.</th>
                            <th>Title</th>
                            <th>Brand Image</th>
                            <th>Status</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($brands as $key => $brand)
                            <tr>
                                <td> {{ $brand->id }} </td>
                                <td> {{ $brand->title }} </td>
                                <td class="text-center">
                                    @if ($brand->brand_image)
                                        <img src="{{ asset($brand->brand_image) }}" width="100">
                                    @else
                                        <span class=" font-weight-bold  badge badge-danger">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($brand->status == 'active')
                                        <span class="badge badge-success">{{ ucwords($brand->status) }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ ucwords($brand->status) }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($brand->status == 'active')
                                        <a href="{{ route('inactive.brands', $brand->id) }}" class="btn btn-info btn-sm" style="height:35px; width:35px; border-radius:50%; float:left;">
                                            <i class=" fa fa-eye mt-1"> </i>
                                        </a>
                                    @endif

                                    @if ($brand->status == 'inactive')
                                        <a href="{{ route('active.brands', $brand->id) }}" class="btn btn-info btn-sm text-center" style="height:35px; width:35px; border-radius:50%; float:left;" >
                                            <i class="fa fa-eye-slash mt-1"> </i>
                                        </a>
                                    @endif

                                    <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-primary btn-sm mx-2" style="height:35px; width:35px; border-radius:50%; float:left;">
                                        <i class="fas fa-edit mt-1"></i>
                                    </a>

                                    <form method="POST" action="{{ route('brand.destroy', [$brand->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm dltBtn" data-id={{ $brand->id }}
                                            style="height:35px; width:35px; border-radius:50%; float:left;" data-toggle="tooltip"
                                            data-placement="bottom" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                    </form>

                                </td>


                            </tr>
                        @endforeach

                    </tbody>
                </table>

            @endif
        </div>
    </div>





@endsection



@push('styles')
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

    <style>
        /* div.dataTables_wrapper div.dataTables_paginate {
                display: none;
            } */

        .zoom {
            transition: transform .2s;
            /* Animation */
        }

        .zoom:hover {
            transform: scale(3.2);
        }
    </style>
@endpush



@push('scripts')
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Page level custom scripts -->
    <script>
        $('#brand-table').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            lengthMenu: [
                [25, 50, 100, 150, 250, -1],
                [25, 50, 100, 150, 250, 'All'],
            ],
        });


        $(document).ready(function() {

            var eventFired = function(type) {
                var n = document.querySelector('#demo_info');
                n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
                n.scrollTop = n.scrollHeight;
            }

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
