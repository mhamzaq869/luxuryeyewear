{{-- <div class="offcanvas offcanvas-start offCanvasStyle" tabindex="-1" id="filterCanvas" aria-labelledby="filterCanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="filterCanvasLabel"></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="backDrop"></div>
    <div class="offcanvas-body">
        <div class="filterChekCol"></div>
        <div class="widget-wrap">
            <div class="col mb-3">
                <a onclick="reset_filter_product_for()" class="btn btnDark w-100" role="button"
                   href="javascript::void(0)">
                    <span class="filterIcon">
                        <img src="{{asset('uploaded_files/assets/images/filter-icon.svg')}}" alt="...">
                    </span>
                    <span>Reset Filter</span>
                </a>
            </div>
        </div>
        <div class="widget-wrap">
            <div class="widget-search">
                <input type="text" placeholder="Search" class="form-control" name="search_product" id="search_product" @isset($search_product) value="{{$search_product}}" @endisset>
                <a onclick="filter_product_for('search_filter')" style="font-weight: 900 !important;position: relative !important;top: -1.6rem !important;left: 19.5rem !important; background-color: white important;"><i class="fa fa-search"></i></a>
                @if (isset($search_product) && !empty($search_product))
                    @php
                        $search_product_key = 'search_product';
                        $url = Request::fullURL();
                        // Remove specific parameter from query string
                        $filteredURL = preg_replace('~(\?|&)'.$search_product_key.'=[^&]*~', '$1', $url);
                    @endphp
                    <span style="float:right">
                        <a href="{{url($filteredURL)}}" title="Remove Filter">
                            <i class="fa fa-times-circle"></i>
                        </a>
                    </span>
                @endif
            </div>
        </div>
        <!--================================ our brands ============================-->
        <h5 class="smTitle">Gender</h5>
        @if (isset($gender_array) && !empty($gender_array))
            @php
                $gender_key = 'gender_array';
                $url = Request::fullURL();
                // Remove specific parameter from query string
                $filteredURL = preg_replace('~(\?|&)'.$gender_key.'=[^&]*~', '$1', $url);

            @endphp
            <span style="float:right">
                <a href="{{url($filteredURL)}}" title="Remove Filter">
                    <i class="fa fa-times-circle"></i>
                </a>
            </span>
        @endif
        <div class="filterChekCol">
            <ul>
                @php
                    if(isset($gender_array)){
                        $check_gender = explode(',',$gender_array);
                    }
                @endphp
                <li>
                    <span class="filterChek">
                        <input type="checkbox" name="genders[]" class="btn-check" value="Gentle Man" id="genderCheck_01" onclick="filter_product_for('gender_filter')"
                        @if (isset($gender_array))
                            @if (in_array('Gentle Man', $check_gender)) checked @endif
                        @elseif(isset($gender))
                            @if ($gender == 'Gentle Man') checked @endif
                        @endif>
                        <label class="btn btn-outline-secondary" for="genderCheck_01">Man</label>
                    </span>
                </li>
                <li>
                    <span class="filterChek">
                        <input type="checkbox" name="genders[]" class="btn-check" value="Women" id="genderCheck_02" onclick="filter_product_for('gender_filter')" @if (isset($gender_array))
                        @if (in_array('Women', $check_gender)) checked @endif
                        @elseif(isset($gender))
                            @if ($gender == 'Women') checked @endif
                        @endif>
                        <label class="btn btn-outline-secondary" for="genderCheck_02">Women</label>
                    </span>
                </li>
            </ul>
        </div>
        <div class="left-cate" id="example2">
            <h5 class="smTitle">Our Brands</h5>
            @if (isset($brand_array) && !empty($brand_array))
                @php
                    $brand_key = 'brand_array';
                    $url = Request::fullURL();
                    // Remove specific parameter from query string
                    $filteredURL = preg_replace('~(\?|&)'.$brand_key.'=[^&]*~', '$1', $url);
                @endphp
                <span style="float:right">
                    <a href="{{url($filteredURL)}}" title="Remove Filter">
                        <i class="fa fa-times-circle"></i>
                    </a>
                </span>
            @endif
            <div class="filterChekCol">
                <ul>
                    @php
                        if(isset($brand_array)){
                            $check_brand = explode(',',$brand_array);
                        }
                    @endphp
                    @foreach ($brands as $key => $brand)

                        <li>
                          <span class="filterChek">
                                <input type="checkbox" class="btn-check" name="brands[]" id="brands_{{$key}}" value="{{$brand->id}}" onclick="filter_product_for('brand_filter')" @if (isset($brand_array)) @if (in_array($brand->id, $check_brand)) checked @endif @endisset>
                                <label class="btn btn-outline-secondary" for="brands_{{$key}}">{{$brand->title}}</label>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


        <h5 class="smTitle">SHAPES</h5>
        @if (isset($shape_array) && !empty($shape_array))
            @php
                $shape_key = 'shape_array';
                $url = Request::fullURL();
                $filteredURL = preg_replace('~(\?|&)'.$shape_key.'=[^&]*~', '$1', $url);
            @endphp
            <span style="float:right">
                <a href="{{url($filteredURL)}}" title="Remove Filter">
                    <i class="fa fa-times-circle"></i>
                </a>
            </span>
        @endif
        <div class="filterChekCol">
            <ul>
                @php
                    if(isset($shape_array)){
                        $check_shape = explode(',',$shape_array);
                    }
                @endphp
                @foreach ($shapes as $k => $shape)
                    <li>
                        <span class="filterChek">
                            <input class="btn-check" type="checkbox" name="shapes[]" id="shapes_{{$k}}" value="{{$shape->name}}" onclick="filter_product_for('shape_filter')"
                            @if (isset($shape_array)) @if (in_array($shape->name, $check_shape))
                            checked @endif @endisset>
                            <label class="btn btn-outline-secondary" for="shapes_{{$k}}">{{$shape->name}}</label>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>

        <h5 class="smTitle">material</h5>
        @if (isset($material_array) && !empty($material_array))
            @php
                $material_key = 'material_array';
                $url = Request::fullURL();
                // Remove specific parameter from query string
                $filteredURL = preg_replace('~(\?|&)'.$material_key.'=[^&]*~', '$1', $url);
            @endphp
            <span style="float:right">
                <a href="{{url($filteredURL)}}" title="Remove Filter">
                    <i class="fa fa-times-circle"></i>
                </a>
            </span>
        @endif
        <div class="filterChekCol">
            <ul>
                @php
                    if(isset($material_array)){
                        $check_material = explode(',',$material_array);
                    }
                @endphp
                <!--material-->
                @foreach ($materials as $k => $material)
                    <li>
                        <span class="filterChek">
                            <input class="btn-check" type="checkbox" name="materials[]" id="materials_{{$k}}" value="{{$material->name}}" onclick="filter_product_for('material_filter')"
                            @if (isset($material_array)) @if (in_array($material->name, $check_material)) checked @endif @endisset>
                            <label class="btn btn-outline-secondary" for="materials_{{$k}}">{{$material->name}}</label>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>

        <!--================================ Frame type ============================-->
        <h5 class="smTitle">frame type</h5>
        @if (isset($frame_array) && !empty($frame_array))
            @php
                $frame_key = 'frame_array';
                $url = Request::fullURL();
                // Remove specific parameter from query string
                $filteredURL = preg_replace('~(\?|&)'.$frame_key.'=[^&]*~', '$1', $url);
            @endphp
            <span style="float:right">
                <a href="{{url($filteredURL)}}" title="Remove Filter">
                    <i class="fa fa-times-circle"></i>
                </a>
            </span>
        @endif
        <div class="filterChekCol">
            <ul>
                @php
                    if(isset($frame_array)){
                        $check_frame = explode(',',$frame_array);
                    }
                @endphp
                @foreach ($types as $k => $type)
                    <li>
                        <span class="filterChek">
                            <input class="btn-check" type="checkbox" name="frames[]" id="frames_{{$k}}" value="{{$type->name}}" onclick="filter_product_for('frame_filter')" @if (isset($frame_array)) @if (in_array($type->type, $check_frame)) checked @endif @endisset>
                            <label class="btn btn-outline-secondary" for="frames_{{$k}}">{{$type->name}}</label>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div> --}}

<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
    .form-check-input {
        height: 20px;
        width: 20px;
        padding: 10px;
        margin: 5px 10px;
        border-radius: 0px;
    }

    .has-search .form-control {
        padding-left: 2.375rem;
    }

    .has-search .form-control-feedback {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }

    .left-side .ls-link {
        padding: 6px 2px;
    }

    .accordion-button::after {
        flex-shrink: 0;
        width: 1rem;
        height: 1rem;
        margin-left: auto;
        content: "";
        background-image: url(data:image/svg+xml;charset=utf-8;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyB3aWR0aD0nMTEnIGhlaWdodD0nMTEnPjxpbWFnZSB3aWR0aD0nMTEnIGhlaWdodD0nMTEnIHhsaW5rOmhyZWY9J2RhdGE6aW1hZ2UvcG5nO2Jhc2U2NCxpVkJPUncwS0dnb0FBQUFOU1VoRVVnQUFBQXNBQUFBTENBWUFBQUNwckhjbUFBQUFJVWxFUVZRWWxXUDRUd0pnd0NySWdGVjRVQ2xtWUdBZ2lBZWJteWxTakFzQUFQM0pyMSAwVHg2dkFBQUFBRWxGVGtTdVFtQ0MnLz48L3N2Zz4=);
        background-repeat: no-repeat;
        background-size: 1rem;
        transition: transform .2s ease-in-out;
    }

    .cardStyle1 {
        margin-bottom: 20px;
    }
</style>
<div class="left-side">
    <div class="main">
        <!-- Actual search box -->
        <div class="form-group has-search">
            <span class="fa fa-search form-control-feedback"></span>
            <input type="text" class="form-control" id="search" @isset($search) value="{{$search}}" @endisset name="search" placeholder="Search">
        </div>
    </div>
    <h2 class="accordion-header">
        <button class="accordion-button collapsed">
            Gender
        </button>
    </h2>
    <ul>
        @php
            if (isset($gender_array)) {
                $check_gender = explode(',', $gender_array);
            }
        @endphp
        @foreach ($genders as $key => $brand)
            <li>
                <a class="ls-link" href="#">
                    <input type="checkbox" name="genders[]" onclick="filter_product_for('gender_filter')"
                        value="{{ $brand->id }}"
                    @if (isset($gender_array)) @if (in_array($brand->id, $check_gender)) checked @endif @endisset
                    class="form-check-input" />
                <span> {{ $brand->name }} </span>
            </a>
        </li>
        @endforeach
    </ul>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    Brand
                </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body p-0 py-2">
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control" id="brand_search" @isset($search) value="{{$search}}" @endisset name="search" placeholder="Search">
                        </div>
                        <ul class="brand_list">
                            @php
                                if (isset($brand_array)) {
                                    $check_brand = explode(',', $brand_array);
                                }
                            @endphp
                            @foreach ($brands as $key => $brand)
                                @if ($key <= 6)
                                <li><a class="ls-link" href="#"><input type="checkbox"
                                    onclick="filter_product_for('brand_filter')" name="brands[]" value="{{ $brand->id }}"
                                    @if (isset($brand_array)) @if (in_array($brand->id, $check_brand)) checked @endif
                                    @endisset class="form-check-input" /><span> {{ $brand->title }} </span></a>
                                </li>
                                @endif
                            @endforeach

                            <span id="all_brands" style="display:none">
                                @foreach ($brands as $key => $brand)
                                    @if ($key > 6)
                                    <li><a class="ls-link" href="#"><input type="checkbox"
                                        onclick="filter_product_for('brand_filter')" name="brands[]" value="{{ $brand->id }}"
                                        @if (isset($brand_array)) @if (in_array($brand->id, $check_brand)) checked @endif
                                        @endisset class="form-check-input" /><span> {{ $brand->title }} </span></a>
                                    </li>
                                    @endif
                                @endforeach
                            </span>
                            <li><a id="show_more_brands" style="margin-left: 15px;font-size: 14px;font-weight: 600;text-decoration: underline;" class="text-dark mt-1 ml-1" href="javascript:void(0)">See More</a></li>
                        </ul>
                    </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Price
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body p-0 py-2">
                    @php
                    if (isset($brand_array)) {
                        $check_brand = explode(',', $brand_array);
                    }
                    @endphp
                    <ul>
                        <li><input type="radio" class="form-check-input" onclick="filter_product_for('price_filter','0-24')" value="0-24"  @isset($min_price) {{$min_price == 24 ? 'checked' : ''}} @endisset name="optradio">$0 - $24</li>
                        <li><input type="radio" class="form-check-input" onclick="filter_product_for('price_filter','25-100')" value="25-100" @isset($min_price) {{$min_price == 25 ? 'checked' : ''}} @endisset name="optradio">$25 - $100</li>
                        <li><input type="radio" class="form-check-input" onclick="filter_product_for('price_filter','26-100')" value="26-100" @isset($min_price) {{$min_price == 26 ? 'checked' : ''}} @endisset name="optradio">$26 - $100</li>
                        <li><input type="radio" class="form-check-input" onclick="filter_product_for('price_filter','27-100')" value="27-100" @isset($min_price) {{$min_price == 27 ? 'checked' : ''}} @endisset name="optradio">$27 - $100</li>
                        <li><input type="radio" class="form-check-input" onclick="filter_product_for('price_filter','28-100')" value="28-100" @isset($min_price) {{$min_price == 28 ? 'checked' : ''}} @endisset name="optradio">$28 - $100</li>
                        <li><input type="radio" class="form-check-input" onclick="filter_product_for('price_filter','29-100')" value="29-100" @isset($min_price) {{$min_price == 29 ? 'checked' : ''}} @endisset name="optradio">$29 - $100</li>
                        <li><input type="radio" class="form-check-input" onclick="filter_product_for('price_filter','30-100')" value="30-100" @isset($min_price) {{$min_price == 30 ? 'checked' : ''}} @endisset name="optradio">$30 - $100</li>
                        <input type="text" id="min_price" class="form-control mt-2" placeholder="min" @isset($min_price)  value="{{$min_price}}" @endisset style="float:left; width:50%">
                        <input type="text" id="max_price" class="form-control mt-2" placeholder="max" @isset($max_price)  value="{{$max_price}}" @endisset style="float:right; width:50%">


                    </ul>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Shapes
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body p-0 py-2">
                    <ul>
                        @php
                            if (isset($shape_array)) {
                                $check_shape = explode(',', $shape_array);
                            }
                        @endphp
                        @foreach ($shapes as $k => $shape)
                            <li><a class="ls-link" href="#"><input type="checkbox" name="shapes[]" class="form-check-input"
                                        value="{{ $shape->id }}" onclick="filter_product_for('shape_filter')"
                                        @if (isset($shape_array)) @if (in_array($shape->id, $check_shape))
                        checked @endif
                                    @endisset /><span> {{ $shape->name }} </span></a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Material
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body p-0 py-2">
                    <ul>
                        @php
                            if (isset($material_array)) {
                                $check_material = explode(',', $material_array);
                            }
                        @endphp
                        @foreach ($materials as $k => $material)
                            <li><a class="ls-link" href="#"><input type="checkbox"
                                        onclick="filter_product_for('material_filter')" name="materials[]" value="{{ $material->id }}"
                                        @if (isset($material_array)) @if (in_array($material->id, $check_material)) checked @endif
                                    @endisset class="form-check-input" /><span> {{ $material->name }} </span></a>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
