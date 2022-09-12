@extends('backend.layouts.master')
@section('title', 'Product List')
@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Product Lists</h6>

            <div class="row">
                <div class="col-md-12">
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

                    <div class="d-flex w-75 float-right">
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
        {{-- <form method="POST" id="category-form" action="{{ route('product.update.on.check') }}">
            @csrf
            @method('post') --}}
            <div class="card-body">
                <div class="table-responsive">
                    @if (count($products) > 0)
                        <table class="table table-bordered" id="product" width="100%" cellspacing="0">
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
                            <tbody>
                                {{-- @foreach ($products as $key => $product)
                                    @php
                                        $sub_cat_info = DB::table('categories')
                                            ->select('title')
                                            ->where('id', $product->child_cat_id)
                                            ->get();
                                        $brands = DB::table('brands')
                                            ->select('title')
                                            ->where('id', $product->brand_id)
                                            ->get();
                                    @endphp
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input cust-checkbox"
                                                    id="check{{ $product->id }}" value="{{ $product->id }}"
                                                    name="checked[]">
                                                <label class="custom-control-label" for="check{{ $product->id }}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($product->status == 'active')
                                                <span class="badge badge-success">{{ $product->status }}</span>
                                            @else
                                                <span class="badge badge-warning">{{ $product->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->photo)
                                                @php
                                                    $photo = explode(',', $product->photo);
                                                @endphp
                                                <img src="{{ asset($photo[0]) }}" class="img-fluid " style="max-width:80px"
                                                    alt="{{ $product->photo }}">
                                            @else
                                                <img src="{{ asset('backend/img/thumbnail-default.jpg') }}"
                                                    class="img-fluid" style="max-width:80px" alt="avatar.png">
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($product->frametype))
                                                {{ $product->frametype->name }}
                                            @else
                                                NA
                                            @endif
                                        </td>
                                        <td style="width: 25% !important"> <a href="{{url('product-detail',[$product->slug])}}" target="_blank"> {{ $product->title }} </a></td>
                                        <td>
                                           {{ $product->brand->title ?? '' }}
                                        </td>
                                        <td>
                                            @if ($product->cat_info)
                                                {{ ucfirst($product->cat_info->title) }}
                                            @else
                                                NA
                                            @endif
                                        </td>



                                        <td> {{ $product->color }}</td>
                                        <td>{{ $product->product_ean_code }}</td>
                                        <td>%{{ $product->discount }}</td>



                                        <td>
                                            @if ($product->stock > 0)
                                                <span class="badge badge-primary">{{ $product->stock }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ $product->stock }}</span>
                                            @endif
                                        </td>
                                        <td>Rs. {{ $product->price }} /-</td>


                                        <td>
                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="btn btn-primary btn-sm float-left mr-1"
                                                style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                                title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                            <form method="POST" action="{{ route('product.destroy', [$product->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm dltBtn" data-id={{ $product->id }}
                                                    style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                                    data-placement="bottom" title="Delete"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    @else
                        <h6 class="text-center">No Products found!!! Please create Product</h6>
                    @endif
                </div>
            </div>
    </div>
@endsection
@push('styles')
    <style>
        /* div.dataTables_wrapper div.dataTables_paginate {
            display: none;
        } */

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


        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#product').DataTable({

                'processing': true,
                'serverSide': true,
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
