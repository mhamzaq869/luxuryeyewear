@extends('backend.layouts.master')
@section('title', 'Edit Product')
@section('main-content')
    @php $g_image = isset($product->g_image) ? json_decode($product->g_image) : []; @endphp

    @php
        $sub_cat_info = DB::table('categories')
            ->select('title')
            ->where('id', $product->child_cat_id)
            ->get();
    @endphp

    <div class="p-3">
        <h5 class="m-0 font-weight-bold text-dark mb-4">Edit Product</h5>

        <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

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

                        @if (isset($product->p_f) && $product->p_f != '')
                            <div class="image-area" id="preview_p_f">
                                @if (!isValidUrl($product->p_f))
                                    <img src="{{ asset($product->p_f) }}" class="img-responsive" />
                                @else
                                    <img src="{{ $product->p_f }}" class="img-responsive" />
                                @endif
                                <a class="remove-image" href="javascript:deleteImage('p_f')"
                                    style="display: inline;">&#215;</a>
                            </div>
                        @endif

                        <input class="form-control" type="file" name="before_crop_image[front_image]" id="front_image">

                        @error('p_f')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">Product Back Image <span
                                class="text-danger"></span></label>
                        @if (isset($product->p_b) && $product->p_b != '')
                            <div class="image-area" id="preview_p_b">
                                @if (!isValidUrl($product->p_b))
                                    <img src="{{ asset($product->p_b) }}" class="img-responsive" />
                                @else
                                    <img src="{{ $product->p_b }}" class="img-responsive" />
                                @endif
                                <a class="remove-image" href="javascript:deleteImage('p_b')"
                                    style="display: inline;">&#215;</a>
                            </div>
                        @endif
                        <input class="form-control" type="file" name="before_crop_image[back_image]" id="back_image">
                        @error('p_b')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">Product Other Images <span
                                class="text-danger"></span></label>
                        @if (isset($product->g_image_1) && $product->g_image_1 != '')
                            <div class="image-area" id="preview_g_image_1">
                                @if (!isValidUrl($product->g_image_1))
                                    <img src="{{ asset($product->g_image_1) }}" class="img-responsive" id="preview_p_f" />
                                @else
                                    <img src="{{ $product->g_image_1 }}" class="img-responsive" id="preview_p_f" />
                                @endif
                                <a class="remove-image" href="javascript:deleteImage('g_image_1')"
                                    style="display: inline;">&#215;</a>
                            </div>
                        @endif
                        <input class="form-control" type="file" name="before_crop_image[g_image_1]" id="g_image_1">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">Product Other Images <span
                                class="text-danger"></span></label>
                        @if (isset($product->g_image_2) && $product->g_image_2 != '')
                            <div class="image-area" id="preview_g_image_2">
                                @if (!isValidUrl($product->g_image_2))
                                    <img src="{{ asset($product->g_image_2) }}" class="img-responsive" />
                                @else
                                    <img src="{{ $product->g_image_2 }}" class="img-responsive" />
                                @endif
                                <a class="remove-image" href="javascript:deleteImage('g_image_2')"
                                    style="display: inline;">&#215;</a>
                            </div>
                        @endif

                        <input class="form-control" type="file" name="before_crop_image[g_image_2]" id="g_image_2">

                        @error('p_o2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">Product Other Images <span
                                class="text-danger">*</span></label>
                        @if (isset($product->g_image_3) && $product->g_image_3 != '')
                            <div class="image-area" id="preview_g_image_3">
                                @if (!isValidUrl($product->g_image_3))
                                    <img src="{{ asset($product->g_image_3) }}" id="preview_g_image_3"
                                        class="img-responsive" />
                                @else
                                    <img src="{{ $product->g_image_3 }}" id="preview_g_image_3"
                                        class="img-responsive" />
                                @endif
                                <a class="remove-image" href="javascript:deleteImage('g_image_3')"
                                    style="display: inline;">&#215;</a>
                            </div>
                        @endif
                        <input class="form-control " type="file" name="before_crop_image[g_image_3]" id="g_image_3">

                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Product Name <span
                                class="text-danger">*</span></label>
                        <input type="text" name="title" placeholder="Enter title" id="inputProductName"
                            value="{{ $product->title }}" class="form-control">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-form-label">Product ASIN</label>
                        <input type="text" name="asin" value="{{ $product->asin }}" class="form-control">
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
                                <option value="{{ $brand->id }}" @if ($brand->id == $product->brand_id) selected @endif>
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
                                <a href="{{ route('category.create') }}">Add New Model</a>
                            </div>
                        </div>

                            <select name="cat_id" id="cat_id" class="form-control select2">
                                <option value="">--Select Any Model--</option>
                                @foreach ($categories as $key => $cat_data)
                                    <option value='{{ $cat_data->id }}' data-brand="{{ $cat_data->brand_id }}" data-size="{{ $cat_data->size }}"
                                        {{ $product->cat_id == $cat_data->id ? 'selected' : '' }}>{{ $cat_data->title }}
                                    </option>
                                @endforeach
                            </select>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status">Color Code </label>
                        <input type="text" id="inputProductColor" class="form-control" name="color"
                            value="{{ $product->color }}">
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status" class="col-form-label">Size: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $product->size }}" name="size"
                            placeholder="Size">

                    </div>
                </div>

                {{-- Color Description --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="color_description" class="col-form-label d-flex">Color Description

                        </label>
                        <input type="text" class="form-control" name="color_description"
                            value="{{ $product->color_description }}">
                        @error('color_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- ITEM Code --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status" class="col-form-label">ITEM Code </label>
                        <input type="text" class="form-control" name="product_uan_code"
                            value="{{ $product->product_uan_code }}">
                    </div>
                </div>

                {{-- ITEM Code --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status" class="col-form-label">EAN Code </label>
                        <input type="text" class="form-control" name="product_ean_code"
                            value="{{ $product->product_ean_code }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="shape">Product Shape <span class="text-danger">*</span></label>
                        <select name="shape" id="shape" class="form-control">
                            <option value="">--Select any Shape--</option>
                            @foreach ($shapes as $key => $shape)
                                <option value='{{ $shape->id }}' @if ($shape->id == $product->shape) selected @endif>
                                    {{ $shape->name }}</option>
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
                                <option value='{{ $material->id }}' @if ($material->id == $product->product_material) selected @endif>
                                    {{ $material->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="type" class="col-form-label">Product Type <span
                                class="text-danger">*</span></label>
                        <select name="type" id="type" class="form-control">
                            <option value="">--Select Product Type --</option>
                            @foreach ($types as $key => $type)
                                <option value='{{ $type->id }}' @if ($product->type == $type->id) selected @endif>
                                    {{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category_for">Gender</label>

                        <select name="product_for" id="category_for" class="form-control ">
                            @foreach ($product_for as $key => $pro_for)
                                <option value='{{ $pro_for->id }}' @if ($product->product_for == $pro_for->id) selected @endif>
                                    {{ $pro_for->name }}</option>
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
                                <option value='{{ $lensType->id }}' @if ($lensType->id == $product->lense_type) selected @endif>
                                    {{ $lensType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="unit_price" class="col-form-label d-flex">Unit Price</label>
                        <input type="text" class="form-control" name="unit_price"
                            value="{{ $product->unit_price }}">
                        @error('unit_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price" class="col-form-label">Price<span class="text-danger">*</span></label>
                        <input id="price" type="price" name="price" placeholder="Enter price"
                            value="{{ $product->admin_product_price }}" class="form-control">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="b2b_price" class="col-form-label">B2B Price<span class="text-danger">*</span></label>
                        <input id="b2b_price" type="price" name="b2b_price" value="{{ $product->b2b_price }}"
                            class="form-control">
                        @error('b2b_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="shipping_cost">Extra <span class="text-danger">*</span></label>
                        <input id="shipping_cost" type="number" name="extra" placeholder="Enter Extra Price"
                            value="{{ $product->extra ?? 0 }}" class="form-control">
                        @error('shipping_cost')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="stock">Quantity <span class="text-danger">*</span></label>
                        <input id="quantity" type="number" name="stock" min="0" placeholder="Enter quantity"
                            value="{{ $product->stock }}" class="form-control">
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
                            <option value="default" @if ($product->condition == 'default') selected @endif>Default
                            </option>
                            <option value="new" @if ($product->condition == 'new') selected @endif>New</option>
                            <option value="hot" @if ($product->condition == 'hot') selected @endif>Hot</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control">
                            <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active
                            </option>
                            <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive
                            </option>
                            <option value="Outofstock" {{ $product->status == 'outofstock' ? 'selected' : '' }}>Out of
                                stock</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="stock">Country Of Region <span class="text-danger">*</span></label>
                        <input id="country_of_region" type="text" value="{{ $product->country_of_origin }}"
                            name="country_of_origin" placeholder="Enter Country Of Region" class="form-control">
                        @error('country_of_origin')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4 mt-4">
                    <div class="form-group">
                        <label for="is_featured">Is Featured</label><br>
                        <input type="checkbox" name='is_featured' id='is_featured' value="1"
                            {{ $product->is_featured ? 'checked' : '' }}> Yes

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="brand_id">Dispatch From <span class="text-danger">*</span></label>
                        <select name="dispatch_from[]" id="dispatch" class="form-control select2">
                            <option value="">--Select Country--</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->shortname }}">
                                    {{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <div class="form-group {{ $product->child_cat_id ? '' : 'd-none' }}" id="child_cat_div">
                <label for="child_cat_id">Sub Category</label>
                <select name="child_cat_id" id="child_cat_id" class="form-control">
                    <option value="">--Select any sub category--</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description" class="col-form-label">Description</label>
                <textarea class="form-control" hidden id="description" name="description">{{ $product->description }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="jumbotron mt-2 p-4" id="seo_jumbotron">
                <h4>SEO related information</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_meta_title">Product Meta Title</label>
                            <input type="text" id="product_meta_title" value="{{ $product->product_meta_title }}"
                                class="form-control" name="product_meta_title">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_meta_keyword">Product Meta Keywords</label>
                            <input type="text" id="product_meta_keyword" value="{{ $product->product_meta_keyword }}"
                                class="form-control" name="product_meta_keyword">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="product_meta_description">Product Meta Description</label><br>
                            <textarea name="product_meta_description" value="{{ $product->product_meta_description }}" rows="4"
                                cols="100"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group my-3">
                <button class="btn btn-success" type="submit">Update</button>
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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
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

        .img-responsive {
            width: auto;
            height: 100px;
        }

        .image-area {
            position: relative;
            width: 50%;
            background: #333;
        }

        .image-area img {
            max-width: 100%;
            height: auto;
        }

        .remove-image {
            display: none;
            position: absolute;
            top: -10px;
            right: -10px;
            border-radius: 10em;
            padding: 2px 6px 3px;
            text-decoration: none;
            font: 700 21px/20px sans-serif;
            background: #555;
            border: 3px solid #fff;
            color: #FFF;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5), inset 0 2px 4px rgba(0, 0, 0, 0.3);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
            -webkit-transition: background 0.5s;
            transition: background 0.5s;
        }

        .remove-image:hover {
            background: #E54E4E;
            padding: 3px 7px 5px;
            top: -11px;
            right: -11px;
        }

        .remove-image:active {
            background: #E54E4E;
            top: -10px;
            right: -11px;
        }

        .cke_inner {
            width: 100%;
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

        .select2-container .select2-selection--single {
            height: 40px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 40px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
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
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.js"></script>

    <script>
        CKEDITOR.replace('description', {
            resize_dir: 'both',
            removeButtons: 'PasteFromWord'
        });

        $("#dispatch").select2({
            tags: true,
            multiple: true
        });

        $('#dispatch').val(@json($product->dispatch_from)).trigger('change');

        $("#cke_description").attr('width', ' ')


        var brand = '',
            model = '',
            color = '',
            product_name = '';

        $("#brand_id").change(function() {
            brand = $(this).children("option:selected").text();
            if ($("#model").val() != '' && model != '') {
                model = $("#model").val()
            }
            if (color == '') {
                color = $("#inputProductColor").val();
            }
            product_name = brand + " " + model + " " + color
            $("#inputProductName").val(removeExtraSpaces(product_name))
        });

        $("#model").keyup(function() {
            if (brand == '') {
                brand = $("#brand_id").children("option:selected").text();
            }
            if ($("#model").val() != '') {
                model = $("#model").val()
            }
            if (color == '') {
                color = $("#inputProductColor").val();
            }

            product_name = brand + " " + model + " " + color
            $("#inputProductName").val(removeExtraSpaces(product_name))
        });

        $("#inputProductColor").keyup(function() {

            if (brand == '') {
                brand = $("#brand_id").children("option:selected").text();
            }
            if (model == '') {
                model = $("#model").text()
            }
            color = $("#inputProductColor").val();
            product_name = brand + " " + model + " " + color
            $("#inputProductName").val(removeExtraSpaces(product_name))
        });

        const removeExtraSpaces = (string) => {
            const newText = string
                .replace(/\s+/g, " ")
                .replace(/^\s+|\s+$/g, "")
                .replace(/ +(\W)/g, "$1");
            return newText
        };

        function deleteImage(col) {
            $.ajax({
                url: "{{ url('/deleteImage') }}",
                type: "POSt",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: "{{ $product->id }}",
                    col: col,
                    data: null,
                },
                success: function(data) {
                    if (data.status == 200) {
                        swal({
                            title: "Good job!",
                            text: data.message,
                            icon: "success",
                            buttons: true,
                        })

                        $("#" + "preview_" + col).remove();
                    }
                }
            });
        }
    </script>
@endpush
