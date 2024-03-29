@extends('backend.layouts.master')
@section('title', 'Product List')
@section('main-content')

    <div class="p-3 mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>

        <h3 class="m-0 font-weight-bold text-dark">Product Lists</h3>

        <div class="py-3">
            <div class="row">
                <div class="col-md-12 text-end">
                    <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
                        data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Product</a>
                    <a href="{{ route('product.import.get') }}" class="btn btn-primary mx-1 btn-sm float-right"
                        data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-file-import"></i>
                        Import Product</a>
                    <a href="{{ route('product.export.get') }}" class="btn btn-info btn-sm float-right"
                        data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-file-import"></i>
                        Export Product</a>
                    <a href="{{ route('product.export.get',['sample']) }}" class="btn btn-secondary mx-1 btn-sm float-right"
                        data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-file-import"></i>
                        Sample Product</a>
                </div>
                <div class="col-md-12 custom-section mt-3" style="display:none">

                    <div class="d-flex w-75" style="float:right">
                        <select name="is_featured" class="form-control mx-1 is_featured">
                            <option selected disabled>--Product top status--</option>
                            <option value="1">Show On Home</option>
                            <option value="0">Hide On Home</option>
                        </select>

                        <select name="status" class="form-control mx-1 select-status">
                            <option selected disabled>--change item status--</option>
                            <option value="inactive">Inactive</option>
                            <option value="active">Active</option>
                        </select>
                        <a href="javascript:void(0)" class="btn mx-1 btn-danger d-flex btn-sm multi-delete">
                            <i class="mr-1 mt-2 fas fa-trash-alt"></i> <span class="mt-1">Delete</span></a>
                        <a href="javascript:void(0)" class="btn mx-1 btn-info d-flex btn-sm multi-dublicate">
                            <i class="mr-1 mt-2 fas fa-trash-alt"></i> <span class="mt-1">Dublicate</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            @if (count($products) > 0)
                <table class="table table-bordered table-striped" id="product" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th class="sortings">

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="mainCheck"
                                        name="check">
                                    <label class="custom-control-label" for="mainCheck"></label>
                                </div>
                            </th>
                            <th>Status</th>
                            <th>Photo</th>
                            <th>Frame Type</th>
                            <th style="width: 100%">Title</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Color Code</th>
                            <th>Ean Code</th>
                            <th>Discount</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> </tbody>
                </table>
            @else
                <h6 class="text-center">No Products found!!! Please create Product</h6>
            @endif
        </div>
    </div>
@endsection
@push('styles')
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>

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
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

    <script>


        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#product').on('preXhr.dt', function ( e, settings, data ) {
                    $(".loader_bg").removeClass('d-none');
                }).DataTable({
                deferRender: true,
                'processing': false,
                'serverSide': true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                'serverMethod': 'post',
                lengthMenu: [
                    [25, 50, 100, 150, 250, {{count($products)}}],
                    [25, 50, 100, 150, 250, 'All'],
                ],
                "columnDefs": [
                    { "orderable": false, "targets": [1] },
                ],
                'ajax': {
                    'url':'{{route("product.show.ajax.data")}}'
                },
                "drawCallback": function (settings) {
                    $(".loader_bg").addClass('d-none');
                },
                'columns': [
                    { data: 'id' },
                    { data: 'checkbox' },
                    { data: 'status' },
                    { data: 'photo' },
                    { data: 'frame_type' },
                    { data: 'title' },
                    { data: 'brand' },
                    { data: 'category' },
                    { data: 'color_code' },
                    { data: 'item_code' },
                    { data: 'discount' },
                    { data: 'stock' },
                    { data: 'price' },
                    { data: 'action' },
                ]
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

        $('#mainCheck').click(function() {
            // make all check box checked/unchecked.
            var all = jQuery('.cust-checkbox');
            if (jQuery(this).is(':checked')) {
                all.each(function(i) {
                    this.checked = true;
                });
            } else {
                all.each(function(i) {
                    this.checked = false;
                });
            }
            if (jQuery('.cust-checkbox:checked').length > 0) {
                jQuery('.custom-section').show()
            } else {
                jQuery('.custom-section').hide()
            }
        });


        function singleCheck(id){

            if ($('#check'+id+':checked').length > 0) {
                $('.custom-section').show()
            } else {
                $('.custom-section').hide()
            }
        }


        $('.multi-delete').click(function(e) {

            var data=$('.cust-checkbox:checked').map(function(err, el) {
                return $(el).val();
            }).get();

            e.preventDefault();
            swal({
                    title: "Are you sure You want to delete multiple record?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((result) => {
                    if (result) {
                        sumbitForm(data,'delete')
                    } else {
                        swal("Your data is safe!");
                    }
                });
        })

        $('.multi-dublicate').click(function(e) {

            var data=$('.cust-checkbox:checked').map(function(err, el) {
                return $(el).val();
            }).get();

            e.preventDefault();
            swal({
                title: "Are you sure You want to dublicate multiple record?",
                text: "All Selected Product will dublicate",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    sumbitForm(data,'dublicate')
                } else {
                    swal("Your data is safe!");
                }
            });
        })

        $(".select-status").change(function(){
            var data=$('.cust-checkbox:checked').map(function(err, el) {
                return $(el).val();
            }).get();

            sumbitForm(data,'update-status', 'status',$(this).val())
        });

        $(".is_featured").change(function(){
            var data=$('.cust-checkbox:checked').map(function(err, el) {
                return $(el).val();
            }).get();

            sumbitForm(data,'update-status', 'is_featured',$(this).val())
        });

        function sumbitForm(data,type, status=null, value=null){
            $.ajax({
                type: "POST",
                url: "{{route('product.update.on.check')}}",
                data: {data:data,type:type, key:status,value:value},
                success: function (response) {
                    if(response.status == 200){
                        swal({
                                title: "Good job!",
                                text: response.message,
                                icon: "success",
                                buttons: true,
                            })
                        location.reload(true);
                    }
                }
            });
        }
    </script>
@endpush
