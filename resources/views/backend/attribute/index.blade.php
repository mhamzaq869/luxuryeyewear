@extends('backend.layouts.master')
@section('main-content')
    <!-- DataTales Example -->
    <div class="p-3 my-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>

        <div class="row">
            <div class="col-9">
                <h3 class="m-0 font-weight-bold text-dark">Attribute Lists</h3>
            </div>
            <div class="col-3 text-end">
                <a href="{{ route('attribute.create') }}" class="btn btn-primary btn-sm mb-3 float-right" data-toggle="tooltip"
                    data-placement="bottom" title="Add Attribute"><i class="fas fa-plus"></i>
                    Add Attribute
                </a>
            </div>
        </div>


        <div class="table-responsive">
            @if (count($attributes) > 0)
                <table class="table table-bordered table-striped" id="productattribute" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Attribute Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attributes as $key => $attribute)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $attribute->name }}</td>
                                <td>{{ $attribute->attribute_type }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('attribute.edit', $attribute->id) }}"
                                        class="btn btn-primary btn-sm float-left mr-1"
                                        style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                        title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="{{ route('attribute.destroy', [$attribute->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm dltBtn" data-id={{ $attribute->id }}
                                            style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                            data-placement="bottom" title="Delete"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else
                <h6 class="text-center">No Attribute found!!! Please create Attribute</h6>
            @endif
        </div>
    </div>
@endsection

@push('styles')

    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <style>


        .zoom {
            transition: transform .2s;
            /* Animation */
        }

        .zoom:hover {
            transform: scale(5);
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>

    <script>
        $('#productattribute').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            lengthMenu: [
                [25, 50, 100, 150, 250, -1],
                [25, 50, 100, 150, 250, 'All'],
            ],
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
