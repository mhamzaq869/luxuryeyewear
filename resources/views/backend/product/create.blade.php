@extends('backend.layouts.master')
@section('title', 'Add Product')
@section('main-content')
    <div class="p-3">

        <h3 class="m-0 font-weight-bold text-dark ">Add Product</h3><br>

        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')

            <input type="hidden" name="front_image">
            <input type="hidden" name="back_image">
            <input type="hidden" name="g_image_1">
            <input type="hidden" name="g_image_2">
            <input type="hidden" name="g_image_3">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">Product Front Image <span
                                class="text-danger"></span></label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="before_crop_image[front_image]" id="front_image" accept="image/*" />
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">Product Back Image
                            <span class="text-danger"></span></label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="before_crop_image[back_image]" id="back_image" accept="image/*" />
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">Product Other Images <span
                                class="text-danger"></span></label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="before_crop_image[g_image_1]" id="g_image_1" accept="image/*" />
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">Product Other Images <span
                                class="text-danger"></span></label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="before_crop_image[g_image_2]" id="g_image_2" accept="image/*" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">Product Other Images <span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="before_crop_image[g_image_3]" id="g_image_3" accept="image/*" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputProductName" class="col-form-label">Product Name <span
                                class="text-danger">*</span></label>
                        <input id="inputProductName" type="text" name="title" placeholder="Enter Name"
                            value="{{ old('title') }}" class="form-control">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputProductName" class="col-form-label">Product ASIN</label>
                        <input  type="text" name="asin" value="{{ old('asin') }}" class="form-control">
                        @error('asin')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="brand_id">Brand</label>
                        <select name="brand_id" id="brand_id" class="form-control select2">
                            <option value="">--Select Brand--</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="cat_id"> Model <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-6 text-end">
                                <a  href="{{ route('category.create') }}">Add New Model</a>
                            </div>
                        </div>
                        <select name="cat_id" id="cat_id" class="form-control select2">
                            <option value="">--Select Any Model--</option>
                            @foreach ($categories as $key => $cat_data)
                                <option value='{{ $cat_data->id }}' data-brand="{{ $cat_data->brand_id }}"
                                    data-size="{{ $cat_data->size }}"
                                    {{ old('cat_id') == $cat_data->id ? 'selected' : '' }}>{{ $cat_data->title }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputProductColor">Color Code<span class="text-danger">*</span></label>
                        <input id="inputProductColor" type="text" name="color" placeholder="Enter Color Code"
                            value="{{ old('size') }}" class="form-control">
                        @error('size')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status" class="col-form-label">Size: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="size" placeholder="Size">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="d-flex">
                            <label for="color_description d-flex" class="col-form-label d-flex">Color
                                Description
                            </label>
                        </div>

                        <input type="text" class="form-control" name="color_description" value="{{ old('color_description') }}">
                        @error('color_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="d-flex">
                            <label for="product_uan_code d-flex" class="col-form-label d-flex">
                                ITEM Code
                            </label>
                        </div>

                        <input type="text" class="form-control" name="product_uan_code" value="{{ old('product_uan_code') }}">
                        @error('product_uan_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status">EAN Code </label>
                        <input type="text" class="form-control" value="{{ old('product_ean_code') }}"
                            name="product_ean_code">
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="shape">Product Shape <span class="text-danger">*</span></label>
                        <select name="shape" id="shape" class="form-control">
                            <option value="">--Select any Shape--</option>
                            @foreach ($shapes as $key => $shape)
                                <option value='{{ $shape->id }}'
                                    selected="@if (old('shape') == $shape->id) selected @endif">{{ $shape->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="product_material">Product Material <span class="text-danger">*</span></label>
                        <select name="product_material" id="product_material" class="form-control">
                            <option value="">--Select any Material--</option>
                            @foreach ($materials as $key => $material)
                                <option value='{{ $material->id }}'
                                    selected="@if (old('product_material') == $material->id) selected @endif">{{ $material->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="type" class="">Product Type <span class="text-danger">*</span></label>
                        <select name="type" id="type" class="form-control">
                            <option value="">--Select Product Type --</option>
                            @foreach ($types as $key => $type)
                                <option value='{{ $type->id }}'
                                    selected="@if (old('type') == $type->id) selected @endif">{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category_for">Gender</label>
                        <select name="product_for" id="category_for" class="form-control ">
                            @foreach ($product_for as $key => $pro_for)
                                <option value='{{ $pro_for->id }}'
                                    selected="@if (old('product_for') == $pro_for->id) selected @endif">{{ $pro_for->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lense_type">Lense Type<span class="text-danger">*</span></label>
                        <select name="lense_type" id="lense_type" class="form-control">
                            <option value="">--Select any lense type--</option>
                            @foreach ($lensTypes as $key => $lensType)
                                <option value='{{ $lensType->id }}'
                                    selected="@if (old('lense_type') == $lensType->id) selected @endif">{{ $lensType->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="unit_price">Unit Price</label>
                        <input id="unit_price" type="number" name="unit_price" min="0"
                            placeholder="Enter Unit Price" value="{{ old('unit_price') }}" class="form-control">
                        @error('unit_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price">Price <span class="text-danger">*</span></label>
                        <input id="price" type="price" name="price" placeholder="Enter price"
                            value="{{ old('price') }}" class="form-control">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="b2b_price">B2B Price <span class="text-danger">*</span></label>
                        <input id="b2b_price" type="price" name="b2b_price" value="{{ old('b2b_price') }}" class="form-control">
                        @error('b2b_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price">Extra <span class="text-danger">*</span></label>
                        <input id="price" type="number" name="extra" placeholder="Enter Extra Price"
                            value="{{ old('extra') }}" class="form-control">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="stock">Quantity <span class="text-danger">*</span></label>
                        <input id="quantity" type="number" name="stock" min="0" placeholder="Enter quantity"
                            value="{{ old('stock') }}" class="form-control">
                        @error('stock')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="condition">Condition</label>
                        <select name="condition" class="form-control">
                            <option value="">--Select Condition--</option>
                            <option value="default">Default</option>
                            <option value="new">New</option>
                            <option value="hot">Hot</option>
                        </select>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="outofstock">Out of stock</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="brand_id">Dispatch From <span class="text-danger">*</span></label>
                        <select name="dispatch_from[]" id="dispatch" class="form-control select2">
                            @foreach ($countries as $country)
                                <option value="{{ $country->shortname }}">
                                    {{ $country->name ?? '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="stock">Country Of Region <span class="text-danger">*</span></label>
                        <input id="country_of_region" type="text" name="country_of_origin"
                            placeholder="Enter Country Of Region" class="form-control">
                        @error('country_of_origin')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4 mt-4">
                    <div class="form-group">
                        <label for="is_featured">Is Featured</label><br>
                        <input type="checkbox" name='is_featured' id='is_featured' value='1' checked> Yes
                    </div>
                </div>



            </div>



            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>


            <div class="jumbotron" id="seo_jumbotron">
                <h4>SEO related information</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_meta_title">Product Meta Title</label>
                            <input type="text" id="product_meta_title" class="form-control"
                                name="product_meta_title">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_meta_keyword">Product Meta Keywords</label>
                            <input type="text" id="product_meta_keyword" class="form-control"
                                name="product_meta_keyword">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="product_meta_description">Product Meta Description</label><br>
                            <textarea name="product_meta_description" rows="4" cols="100"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <button type="reset" class="btn btn-warning">Reset</button>
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>

        <div id="imageModel" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Crop & Resize Upload Image</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                                <div class="col-md-12 px-2">
                                    <div class="input-group py-2 input-group-sm">
                                        <span class="input-group-prepend">
                                            <label class="input-group-text" for="dataWidth">Width</label>
                                        </span>
                                        <input type="text" class="form-control" id="dataWidth" placeholder="width">
                                        <span class="input-group-append">
                                            <span class="input-group-text">px</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12 px-2">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-prepend">
                                            <label class="input-group-text" for="dataWidth">Height</label>
                                        </span>
                                        <input type="text" class="form-control" id="dataHeight" placeholder="Height">
                                        <span class="input-group-append">
                                            <span class="input-group-text">px</span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="crop">Crop</button>
                                {{-- <button type="button" class="btn btn-primary" id="skip">Skip</button> --}}
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }

        .bootstrap-tagsinput {
            width: 100%;
        }

        .label-info {
            background-color: #17a2b8;

        }

        .label {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out,
                border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            padding-left: 20px !important;
            color: white
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            background-color: #0750bd00;
            border: none;
            border-right: 1px solid #aaa0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
            color: rgb(255, 255, 255);
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            padding: 0 4px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #4e73df;
            border: 1px solid #aaa;
            border-radius: 4px;
            display: inline-block;
            margin-left: 5px;
            margin-top: 5px;
            padding: 0;
        }

        .select2-container .select2-selection--single{
            height: 40px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 40px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow{
            top: 8px;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
    </style>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.js" ></script>

    <script>
        CKEDITOR.replace('description', {
            resize_dir: 'both',
            removeButtons: 'PasteFromWord',
        });

        $("#dispatch").select2({
            multiple: true
        });

        $('#dispatch').val(@json(['IN'])).trigger('change');

        $("#cke_description").attr('width', ' ')

        jQuery('#brand_id').change(function() {
            var selectedVal = jQuery(this).val();
            var option = jQuery('#cat_id').find('option');
            option.each(function(index, val) {
                if (selectedVal != val.getAttribute('data-brand')) {
                    val.style.display = "none";
                } else {
                    val.style.display = "block";
                }
            })
        })

        $('#brand_id').change(function() {
            var brand_id = $(this).val();

            if (brand_id != null) {

                // ajax call
                $.ajax({
                    url: "{{ url('/admin/category') }}/" + brand_id + "/brand",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {

                        var html_option = "<option value=''>--Select any one--</option>";
                        if (response.status) {
                            var data = response.data;
                            if (response.data) {
                                $.each(data, function(i) {

                                    html_option += "<option value='" + data[i].id + "'>" + data[
                                        i].title + "</option>";
                                });
                            } else {
                                console.log('no response data');
                            }
                        }
                        $('#cat_id').empty();
                        $('#cat_id').html(html_option);
                    }
                });
            }

        });

        // $('#cat_id').change(function() {
        //     var cat_id = $(this).val();

        //     var _size = $('#cat_id option[value=' + jQuery(this).val() + ']').attr('data-size');
        //     if (_size) {
        //         _size = JSON.parse(_size);
        //         jQuery('#product_lens_width').val(_size.width)
        //         jQuery('#product_bridge').val(_size.bridge)
        //         jQuery('#product_arm_length').val(_size.arm_length)
        //         jQuery('#product_lens_height').val(_size.lens_height)
        //         jQuery('#product_total_width').val(_size.total_width)

        //     } else {
        //         jQuery('#product_lens_width').val('')
        //         jQuery('#product_bridge').val('')
        //         jQuery('#product_arm_length').val('')
        //         jQuery('#product_lens_height').val('')
        //         jQuery('#product_total_width').val('')

        //     }

        //     if (cat_id != null) {
        //         // Ajax call
        //         $.ajax({
        //             url: "{{ url('/admin/category/') }}/" + cat_id + "/child",
        //             data: {
        //                 _token: "{{ csrf_token() }}",
        //                 id: cat_id
        //             },
        //             type: "POST",
        //             success: function(response) {
        //                 if (typeof(response) != 'object') {
        //                     response = $.parseJSON(response)
        //                 }

        //                 var html_option = "<option value=''>----Select sub category----</option>"
        //                 if (response.status) {
        //                     var data = response.data;

        //                     if (response.data) {
        //                         $('#child_cat_div').removeClass('d-none');
        //                         $.each(data, function(id, title) {
        //                             html_option += "<option value='" + id + "'>" + title +
        //                                 "</option>"
        //                         });
        //                     } else {}
        //                 } else {
        //                     $('#child_cat_div').addClass('d-none');
        //                 }
        //                 $('#child_cat_id').html(html_option);
        //             }
        //         });
        //     } else {}
        // })


        var brand = '',
            category = '',
            color = '',
            product_name = '';

        $("#brand_id").change(function() {
            brand = $(this).children("option:selected").text();
            if ($("#cat_id").children("option:selected").val() != '' && category != '') {
                category = $("#cat_id").children("option:selected").text()
            }
            if (color == '') {
                color = $("#inputProductColor").val();
            }
            product_name = brand + " " + category + " " + color
            $("#inputProductName").val(removeExtraSpaces(product_name))
        });

        $("#cat_id").change(function() {
            if (brand == '') {
                brand = $("#cat_id").children("option:selected").text();
            }
            if ($("#cat_id").children("option:selected").val() != '') {
                category = $("#cat_id").children("option:selected").text()
            }
            if (color == '') {
                color = $("#inputProductColor").val();
            }

            product_name = brand + " " + category + " " + color
            $("#inputProductName").val(removeExtraSpaces(product_name))
        });

        $("#inputProductColor").keyup(function() {
            if (brand == '') {
                brand = $("#cat_id").children("option:selected").text();
            }
            if ($("#cat_id").children("option:selected").val() != '' && category != '') {
                category = $("#cat_id").children("option:selected").text()
            }
            color = $("#inputProductColor").val();
            product_name = brand + " " + category + " " + color
            $("#inputProductName").val(removeExtraSpaces(product_name))
        });

        const removeExtraSpaces = (string) => {
            const newText = string
                .replace(/\s+/g, " ")
                .replace(/^\s+|\s+$/g, "")
                .replace(/ +(\W)/g, "$1");
            return newText
        };
    </script>
@endpush
