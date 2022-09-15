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
    <div class="card">
        <h5 class="card-header">Edit Product</h5>
        <div class="card-body">
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

                            <input class="form-control" type="file" name="before_crop_image[front_image]"
                                id="front_image">

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
                                        <img src="{{ asset($product->g_image_1) }}" class="img-responsive"
                                            id="preview_p_f" />
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
                            <input class="form-control " type="file" name="before_crop_image[g_image_3]"
                                id="g_image_3">

                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputTitle" class="col-form-label">Product Name <span
                                    class="text-danger">*</span></label>
                            <input id="inputProductName" type="text" name="title" placeholder="Enter title"
                                value="{{ $product->title }}" class="form-control">
                            @error('title')
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
                                    <option value="{{ $brand->id }}"
                                        @if ($brand->id == $product->brand_id) selected @endif>
                                        {{ $brand->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cat_id">Category <span class="text-danger">*</span></label>
                            <select name="cat_id" id="cat_id" class="form-control select2">
                                <option value="">--Select any Category--</option>
                                @if ($product->cat_id != null)
                                    @foreach ($categories->where('brand_id', $product->brand_id) as $key => $cat_data)
                                        <option value='{{ $cat_data->id }}' data-size="{{ $cat_data->size }}"
                                            data-brand="{{ $cat_data->brand_id }}"
                                            @if ($product->cat_id == $cat_data->id) selected @endif>{{ $cat_data->title }}
                                        </option>
                                    @endforeach
                                @else
                                    @foreach ($categories as $key => $cat_data)
                                        <option value='{{ $cat_data->id }}' data-size="{{ $cat_data->size }}"
                                            data-brand="{{ $cat_data->brand_id }}"
                                            @if ($product->cat_id == $cat_data->id) selected @endif>{{ $cat_data->title }}
                                        </option>
                                    @endforeach
                                @endif

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
                            {{-- <select name="size" id="size" class="form-control">
                                <option value="">-- Select frame type --</option>
                                @foreach ($frame_types as $key => $frame_type)
                                    <option value='{{ $frame_type->id }}'
                                        selected="@if (old('frame_type') == $frame_type->id) selected @endif">
                                        {{ $frame_type->name }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                    </div>

                    {{-- Color Description --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="color_description" class="col-form-label d-flex">Color Description
                                {{-- <img src="{{ asset('images/new_gif.gif') }}"> --}}
                            </label>
                            <input type="text" class="form-control" name="color_description"
                                value="{{ $product->color_description }}">
                            @error('color_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-md-4">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Frame Type <span
                                    class="text-danger">*</span></label>
                            <select name="frame_type" id="frame_type" class="form-control">
                                <option value="">-- Select frame type --</option>
                                @foreach ($frame_types as $key => $frame_type)
                                    <option value='{{ $frame_type->id }}'
                                        @if ($product->frame_type == $frame_type->id) selected @endif>
                                        {{ $frame_type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                    {{-- Color Description --}}
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
                                    <option value='{{ $shape->id }}'
                                        @if ($shape->id == $product->shape) selected @endif>
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
                                    <option value='{{ $material->id }}'
                                        @if ($material->id == $product->product_material) selected @endif>
                                        {{ $material->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
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

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="category_for">Gender</label>

                            <select name="product_for" id="category_for" class="form-control ">
                                @foreach ($product_for as $key => $pro_for)
                                    <option value='{{ $pro_for->id }}'
                                        @if ($product->product_for == $pro_for->id) selected @endif>
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
                                    <option value='{{ $lensType->id }}'
                                        @if ($lensType->id == $product->lense_type) selected @endif>{{ $lensType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="unit_price" class="col-form-label d-flex">Unit Price
                                {{-- <img src="{{ asset('images/new_gif.gif') }}"> --}}
                            </label>
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
                            <input id="quantity" type="number" name="stock" min="0"
                                placeholder="Enter quantity" value="{{ $product->stock }}" class="form-control">
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

                    {{-- <div class="col-md-4">
                        <div class="form-group">
                            <label for="min_sph">Min Sphere <span class="text-danger">*</span></label>
                            <select name="min_sph" id="min_sph" class="form-control">
                                <option value="">-- Select SPH (MIN) --</option>
                                @foreach ($leftSpheres as $key => $leftSphere)
                                    <option value='{{ $leftSphere->sph_left }}'
                                        @if ($leftSphere->sph_left == $product->min_sph) selected @endif>{{ $leftSphere->sph_left }}
                                    </option>
                                @endforeach
                            </select>
                            @error('min_sph')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="max_sph">Max Sphere<span class="text-danger">*</span></label>
                            <select name="max_sph" id="max_sph" class="form-control">
                                <option value="">-- Select SPH (MAX) --</option>
                                @foreach ($leftSpheres as $key => $leftSphere)
                                    <option value='{{ $leftSphere->sph_left }}'
                                        @if ($leftSphere->sph_left == $product->min_sph) selected @endif>{{ $leftSphere->sph_left }}
                                    </option>
                                @endforeach
                            </select>
                            @error('max_sph')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div> --}}


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status <span
                                    class="text-danger">*</span></label>
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


                </div>







                {{-- {{$product->child_cat_id}} --}}
                <div class="form-group {{ $product->child_cat_id ? '' : 'd-none' }}" id="child_cat_div">
                    <label for="child_cat_id">Sub Category</label>
                    <select name="child_cat_id" id="child_cat_id" class="form-control">
                        <option value="">--Select any sub category--</option>
                    </select>
                </div>

                <div class="row">



                    {{-- <div class="col-md-4">
                        <div class="form-group">
                            <label for="max_cyl">Max Cylinder<span class="text-danger">*</span></label>
                            <select name="max_cyl" id="max_cyl" class="form-control">
                                <option value="">-- Select CYL (MAX) --</option>
                                @foreach ($leftcylinders as $key => $leftcylinder)
                                    <option value='{{ $leftcylinder->cyl_left }}'
                                        @if ($leftcylinder->cyl_left == $product->max_cyl) selected @endif>{{ $leftcylinder->cyl_left }}
                                    </option>
                                @endforeach
                            </select>
                            @error('max_cyl')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="min_cyl">Min Cylinder <span class="text-danger">*</span></label>
                            <select name="min_cyl" id="min_cyl" class="form-control">
                                <option value="">-- Select CYL (MIN) --</option>
                                @foreach ($leftcylinders as $key => $leftcylinder)
                                    <option value='{{ $leftcylinder->sph_left }}'
                                        @if ($leftcylinder->cyl_left == $product->min_cyl) selected @endif> {{ $leftcylinder->cyl_left }}
                                    </option>
                                @endforeach
                            </select>
                            @error('min_cyl')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div> --}}

                    {{-- <div class="col-md-4">
                        <div class="form-group">
                            <label for="stock">Dispatch From <span class="text-danger">*</span></label>
                            <input id="dispatch" type="text" name="dispatch_from" min="0"
                                placeholder="Enter Dispatch From" value="{{ $product->dispatch_from }}" class="form-control">
                            @error('dispatch_from')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div> --}}

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

                </div>


                <div class="form-group">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea class="form-control" hidden id="description" name="description">{{ $product->description }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div class="jumbotron" id="cat_jumbotron">
                    <h4>Frame Dimension Information</h4>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="product_lens_width">Lens Width<span class="text-danger">*</span></label>
                                <input type="text" id="product_lens_width" class="form-control"
                                    name="product_lens_width" value="{{ $product->product_lens_width }}">
                                @error('category_total_width')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="product_bridge">Bridge<span class="text-danger">*</span></label>
                                <input type="text" id="product_bridge" value="{{ $product->product_bridge }}"
                                    class="form-control" name="product_bridge">
                                @error('category_bridge')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="product_arm_length">Arm Length<span class="text-danger">*</span></label>
                                <input type="text" id="product_arm_length" value="{{ $product->product_arm_length }}"
                                    class="form-control" name="product_arm_length">
                                @error('category_arm_length')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="product_lens_height">Lens Height<span class="text-danger">*</span></label>
                                <input type="text" id="product_lens_height"
                                    value="{{ $product->product_lens_height }}" class="form-control"
                                    name="product_lens_height">
                                @error('category_lens_height')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="product_total_width">Total Width<span class="text-danger">*</span></label>
                                <input type="text" id="product_total_width"
                                    value="{{ $product->product_total_width }}" class="form-control"
                                    name="product_total_width">
                                @error('category_lens_width')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="jumbotron" id="seo_jumbotron">
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
                                <input type="text" id="product_meta_keyword"
                                    value="{{ $product->product_meta_keyword }}" class="form-control"
                                    name="product_meta_keyword">
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
                <div class="form-group mb-3">

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
                                            <input type="text" class="form-control" id="dataWidth"
                                                placeholder="width">
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
                                            <input type="text" class="form-control" id="dataHeight"
                                                placeholder="Height">
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

        {{-- {{dd( json_encode( explode(',', $product->dispatch_from)) ) }} --}}
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
        </style>
    @endpush
    @push('scripts')
        {{-- <script src="https://dl.dropboxusercontent.com/s/hb9vf8r4vz7imyy/ckeditor.js"></script> --}}
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.js"
            integrity="sha512-SXJkO2QQrKk2amHckjns/RYjUIBCI34edl9yh0dzgw3scKu0q4Bo/dUr+sGHMUha0j9Q1Y7fJXJMaBi4xtyfDw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
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
                } else {}

            });




            var $modal = $('#imageModel');
            var image = document.getElementById('image');
            var _target = "";

            var cropper;
            $("body").on("change", "#front_image, #back_image, #g_image_1, #g_image_2, #g_image_3", function(e) {
                _target = jQuery(this).attr('id');
                var files = e.target.files;
                var done = function(url) {
                    image.src = url;
                    $modal.modal('show');
                };
                var reader;
                var file;
                var url;
                if (files && files.length > 0) {
                    file = files[0];
                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function(e) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            $("body").on('click', "#front_image, #back_image, #g_image_1, #g_image_2, #g_image_3", function() {
                $(this).val(null);
            });

            $modal.on('shown.bs.modal', function() {
                cropper = new Cropper(image, {
                    preview: '.preview',
                    movable: false,
                    zoomable: false,
                    rotatable: false,
                    scalable: false,
                    crop(event) {
                        $("#dataWidth").val(parseInt(event.detail.width));
                        $("#dataHeight").val(parseInt(event.detail.height));
                    },
                });
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            })


            $("#crop").click(function() {
                var croppedImg = cropper.getData();
                canvas = cropper.getCroppedCanvas({
                    width: parseInt(croppedImg.width),
                    height: parseInt(croppedImg.height),
                });

                canvas.toBlob(function(blob) {
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        var base64data = reader.result;

                        jQuery('input[name="' + _target + '"]').val(base64data)
                        $modal.modal('hide');

                    }
                });
            })

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
                    brand = $("#brand_id").children("option:selected").text();
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
                    brand = $("#brand_id").children("option:selected").text();
                }
                if (category == '') {
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

            if (child_cat_id != null) {
                $('#cat_id').change();
            }
            //Get Lens Detail on Category Change
            var child_cat_id = '{{ $product->cat_id }}';
            $('#cat_id').change(function() {
                var cat_id = $(this).val();


                if (cat_id != null) {
                    var _size = $('#cat_id option[value=' + cat_id + ']').attr('data-size');
                    if (_size) {
                        _size = JSON.parse(_size);
                        jQuery('#product_lens_width').val(_size.width)
                        jQuery('#product_bridge').val(_size.bridge)
                        jQuery('#product_arm_length').val(_size.arm_length)
                        jQuery('#product_lens_height').val(_size.lens_height)
                        jQuery('#product_total_width').val(_size.total_width)

                    } else {
                        jQuery('#product_lens_width').val('')
                        jQuery('#product_bridge').val('')
                        jQuery('#product_arm_length').val('')
                        jQuery('#product_lens_height').val('')
                        jQuery('#product_total_width').val('')

                    }

                    // ajax call
                    $.ajax({
                        url: "{{ url('/admin/category') }}/" + cat_id + "/child",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (typeof(response) != 'object') {
                                response = $.parseJSON(response);
                            }
                            var html_option = "<option value=''>--Select any one--</option>";
                            if (response.status) {
                                var data = response.data;
                                if (response.data) {
                                    $('#child_cat_div').removeClass('d-none');
                                    $.each(data, function(id, title) {
                                        html_option += "<option value='" + id + "' " + (
                                                child_cat_id == id ? 'selected ' : '') + ">" +
                                            title + "</option>";
                                    });
                                } else {
                                    console.log('no response data');
                                }
                            } else {
                                $('#child_cat_div').addClass('d-none');
                            }
                            $('#child_cat_id').html(html_option);
                        }
                    });
                } else {}

            });
        </script>
    @endpush
