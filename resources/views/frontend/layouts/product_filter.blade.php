
<div class="offcanvas offcanvas-start offCanvasStyle" tabindex="-1" id="filterCanvas" aria-labelledby="filterCanvasLabel">
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
                @if(isset($search_product) && !empty($search_product))
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
        @if(isset($gender_array) && !empty($gender_array))
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
                        @if(isset($gender_array))
                            @if(in_array('Gentle Man',$check_gender)) checked @endif
                        @elseif(isset($gender))
                            @if($gender == 'Gentle Man') checked @endif
                        @endif>
                        <label class="btn btn-outline-secondary" for="genderCheck_01">Man</label>
                    </span>
                </li>
                <li>
                    <span class="filterChek">
                        <input type="checkbox" name="genders[]" class="btn-check" value="Women" id="genderCheck_02" onclick="filter_product_for('gender_filter')" @if(isset($gender_array))
                        @if(in_array('Women',$check_gender)) checked @endif
                        @elseif(isset($gender))
                            @if($gender == 'Women') checked @endif
                        @endif>
                        <label class="btn btn-outline-secondary" for="genderCheck_02">Women</label>
                    </span>
                </li>
            </ul>
        </div>
        <div class="left-cate" id="example2">
            <h5 class="smTitle">Our Brands</h5>
            @if(isset($brand_array) && !empty($brand_array))
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
                    @foreach($brands as $key=>$brand)

                        <li>
                          <span class="filterChek">
                                <input type="checkbox" class="btn-check" name="brands[]" id="brands_{{$key}}" value="{{$brand->id}}" onclick="filter_product_for('brand_filter')" @if(isset($brand_array)) @if(in_array($brand->id,$check_brand)) checked @endif @endisset>
                                <label class="btn btn-outline-secondary" for="brands_{{$key}}">{{$brand->title}}</label>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


        <h5 class="smTitle">SHAPES</h5>
        @if(isset($shape_array) && !empty($shape_array))
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
                @foreach($shapes as $k=>$shape)
                    <li>
                        <span class="filterChek">
                            <input class="btn-check" type="checkbox" name="shapes[]" id="shapes_{{$k}}" value="{{$shape->name}}" onclick="filter_product_for('shape_filter')"
                            @if(isset($shape_array)) @if(in_array($shape->name,$check_shape))
                            checked @endif @endisset>
                            <label class="btn btn-outline-secondary" for="shapes_{{$k}}">{{$shape->name}}</label>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>

        <h5 class="smTitle">material</h5>
        @if(isset($material_array) && !empty($material_array))
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
                @foreach($materials as $k=>$material)
                    <li>
                        <span class="filterChek">
                            <input class="btn-check" type="checkbox" name="materials[]" id="materials_{{$k}}" value="{{$material->name}}" onclick="filter_product_for('material_filter')"
                            @if(isset($material_array)) @if(in_array($material->name,$check_material)) checked @endif @endisset>
                            <label class="btn btn-outline-secondary" for="materials_{{$k}}">{{$material->name}}</label>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>

        <!--================================ Frame type ============================-->
        <h5 class="smTitle">frame type</h5>
        @if(isset($frame_array) && !empty($frame_array))
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
                @foreach($types as $k=>$type)
                    <li>
                        <span class="filterChek">
                            <input class="btn-check" type="checkbox" name="frames[]" id="frames_{{$k}}" value="{{$type->name}}" onclick="filter_product_for('frame_filter')" @if(isset($frame_array)) @if(in_array($type->type,$check_frame)) checked @endif @endisset>
                            <label class="btn btn-outline-secondary" for="frames_{{$k}}">{{$type->name}}</label>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
