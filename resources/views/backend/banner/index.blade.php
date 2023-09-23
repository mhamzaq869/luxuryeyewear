@extends('backend.layouts.master')

@section('title', 'Banner')

@section('main-content')

    <!-- DataTales Example -->

    <div class="p-3 mb-4">

        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>

        <div class="row my-3">
            <div class="col-9">
                <h3 class="m-0 font-weight-bold text-dark">Banners List</h3>
            </div>
            <div class="col-3 text-end">
                <a href="{{ route('banner.create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Add User">
                    <i class="fas fa-plus"></i> Add Banner
                </a>
            </div>
        </div>



        <div class="table-responsive">

            @if (count($banners) > 0)

                <table class="table table-bordered table-striped" id="banner-dataTable" width="100%" cellspacing="0">

                    <thead>

                        <tr>

                            <th>S.N.</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Type</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($banners as $i => $banner)
                            <tr>

                                <td>{{ $i + 1 }}</td>
                                <td>{{ $banner->title }}</td>
                                <td>{{ $banner->slug }}</td>
                                <td>{{ $banner->type }}</td>

                                <td>

                                    @if ($banner->photo)
                                        <img src="{{ asset($banner->photo) }}" class="img-fluid zoom" style="max-width:80px"
                                            alt="{{ $banner->photo }}">
                                    @else
                                        <img src="{{ asset('backend/img/thumbnail-default.jpg') }}" class="img-fluid zoom"
                                            style="max-width:100%" alt="avatar.png">
                                    @endif

                                </td>

                                <td>

                                    @if ($banner->status == 'active')
                                        <span class="text-success badge badge-success"><b>{{ ucfirst($banner->status) }}</b></span>
                                    @else
                                        <span class="text-warning"><b>{{ ucfirst($banner->status) }}</b></span>
                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-primary btn-sm " style="height:30px; width:30px;border-radius:50%; float:left">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form method="POST" action="{{ route('banner.destroy', [$banner->id]) }}">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger btn-sm" data-id={{ $banner->id }}
                                            style="height:30px; width:30px; border-radius:50%; float:left; margin-left:5px" data-toggle="tooltip"
                                            data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i>
                                        </button>

                                    </form>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

                <span style="float:right">{{ $banners->links() }}</span>
            @else
                <h6 class="text-center">No banners found!!! Please create banner</h6>

            @endif

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
    <!-- Page level plugins -->

    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>



    <!-- Page level custom scripts -->

    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>

    <script>
        $('#banner-dataTable').DataTable({

            "columnDefs": [
                {
                    "orderable": false,
                    "targets": [3, 4, 5, 6]
                }
            ]

        });

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
