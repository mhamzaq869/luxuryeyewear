@extends('frontend.layouts.master')
@section('title', ' Sunglass')

@section('description', 'Sunglass Description ')
@section('keywords', ' Sunglass Keywords')
@section('robots', 'index, follow')
@section('revisit-after', 'content="3 days')

@section('main-content')
    <section>
        @include('frontend.layouts.breadcrumb')
    </section>
    <section>
        <div class="product_detail section_space pb-0">
            <div class="container">
                <div class="product_deatail_list">
                    <div class="product_deatail_list_text">
                        <div class="lineTitleCol">
                            <h6 class="lineTitle">Explore Our Products</h6>
                        </div>
                        <h2 class="product_detail_head lgTitle darkColor">Most Loved Frames</h2>
                    </div>
                    <p style="text-align: center;">We found {{ $products_count }} products available for you all page</p>
                    <div class="filterColMain pt-3">
                        <div class="filterCol">
                            <div class="row g-2 g-md-3">
                                <div class="col"><a class="btn btnDark w-100 filterBtn" data-bs-toggle="offcanvas"
                                        href="#filterCanvas" role="button" aria-controls="filterCanvas"><span
                                            class="filterIcon">
                                            <img src="{{ asset('assets/images/filter-icon.svg') }}" alt="..."></span>
                                        <span>Filter</span></a></div>
                                <div class="col">
                                    <select class="form-select selectStyle" aria-label="Default select example">
                                        <option selected>Sort by</option>
                                        <option value="1">Sort by Name</option>
                                        <option value="2">Sort by Name</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="productColMain">
                        <div class="row g-4 productsList" id="productsList">


                            @foreach ($products as $product)
                                <div class="col-md-6 col-xl-4">


                                    <div class="cardStyle1">

                                        {{-- <span class="discountCol" id="female_eyeglass_pro_discount_{{ $product->id }}">{{$product->discount}}% off</span> --}}

                                        <div class="productImg">
                                            <a href="{{ route('product-detail', $product->slug) }}">
                                                <div class="imgCol">
                                                    @if (!isValidUrl($product->photo))
                                                    <img src="{{ asset(insertAtPosition($product->photo,'med')) }}"
                                                        id="sunglass_pro_img_{{ $product->id }}" alt="Product ">
                                                    @else
                                                    <img src="{{ $product->photo }}"
                                                        id="sunglass_pro_img_{{ $product->id }}" alt="Product ">
                                                    @endif
                                                </div>
                                            </a>

                                            <div class="color_builts">
                                                <ul>
                                                    @if ($active = $product)
                                                        <li>
                                                            <a href="javascript:void(0)"
                                                                onclick="changeProDetail({{ $active->id }},'sunglass_',{{ $product->id }})">
                                                                @if (!isValidUrl($active->photo))
                                                                <img src="{{ asset(insertAtPosition($active->photo)) }}" alt=""
                                                                    class="p-2 hover-product active-product last-product last-product-{{ $product->id }}"
                                                                    id="href_sunglass_{{ $product->id }}_{{ $active->id }}"
                                                                    onmouseover="changeProDetail({{ $product->id }},'sunglass_',{{ $product->id }})">
                                                                @else
                                                                <img src="{{ $active->photo }}" alt=""
                                                                    class="p-2 hover-product active-product last-product last-product-{{ $product->id }}"
                                                                    id="href_sunglass_{{ $product->id }}_{{ $active->id }}"
                                                                    onmouseover="changeProDetail({{ $product->id }},'sunglass_',{{ $product->id }})">
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @endif
                                                    {{-- {{dd($product_variant->where('id','!=',$product->id)->whereIn('product_for',[27,30]))}} --}}
                                                    @foreach ($product_variant->where('id', '!=', $product->id)->where('cat_id',$product->cat_id)->where('product_for', $product->product_for)->flatten() as $i => $variant)
                                                        @if ($i <= 2)
                                                            <li>
                                                                <a href="javascript:void(0)"
                                                                    onclick="changeProDetail({{ $variant->id }},'sunglass_',{{ $product->id }})"
                                                                    onmouseover="changeProDetail({{ $variant->id }},'sunglass_',{{ $product->id }})">
                                                                    @if (!isValidUrl($variant->photo))
                                                                    <img src="{{ asset(insertAtPosition($variant->photo)) }}"
                                                                        class="p-2 hover-product last-product-{{ $product->id }}"
                                                                        id="href_sunglass_{{ $product->id }}_{{ $variant->id }}">
                                                                    @else
                                                                    <img src="{{ $variant->photo }}"
                                                                        class="p-2 hover-product last-product-{{ $product->id }}"
                                                                        id="href_sunglass_{{ $product->id }}_{{ $variant->id }}">
                                                                    @endif
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach

                                                    @if (isset($i) && $i >= 2)
                                                        <li>
                                                            <a href="{{ route('product-detail', [$product->slug]) }}"
                                                                class="text-danger m-2">
                                                                @if (count($product_variant->where('cat_id',$product->cat_id)->where('product_for', $product->product_for)) - 4 > 0)
                                                                +{{ count($product_variant->where('cat_id',$product->cat_id)->where('product_for', $product->product_for)) - 4 }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @endif

                                                </ul>

                                            </div>

                                        </div>

                                        <div class="contentCol">

                                            <h4 class="brandCol" id="sunglass_brand_name_{{ $product->id }}">
                                                {{ $product->brand->title }} </h4>
                                            <a href="{{ route('product-detail', $product->slug) }}" target="_blank"
                                                class="text-dark">
                                                <p id="sunglass_pro_model_{{ $product->id }}"
                                                    class="text-dark link-primary">{{ $product->title }}</p>
                                            </a>
                                            <span class="priceCol" id="sunglass_pro_price_{{ $product->id }}"">
                                                ${{ $product->price }}</span>


                                            <div class="row gx-2">

                                                <div class="col-auto">

                                                    <a href="{{ route('single-add-to-cart', $product->slug) }}"
                                                        class="btn btnDark w-100 addCartBtn">ADD TO CART</a>

                                                </div>

                                                <div class="col">

                                                    <a href="{{ route('add-to-wishlist', $product->slug) }}"
                                                        class="btn btnDark_outline w-100">ADD TO WISHLIST</a>

                                                </div>

                                            </div>

                                        </div>

                                    </div>


                                </div>
                            @endforeach


                        </div>
                        {{-- <div class="btnCol text-center">
                            <a href="javascript:void(0)" class="btn btnPrimary minWdBtn btnNew">Load More</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <div class="ajax-load text-center my-3" style="display:none">
        <img src="{{ asset('assets/images/iphone-spinner.gif') }}">
     </div>
     <div class="ajax-load-show-message text-center my-3" style="display:none"></div>


    @include('frontend.layouts.product_filter')

@endsection


@push('scripts')
    <script>
        var root = "{{ asset('') }}";
        var current_product = "{{$products->count()}}"
        var product = @json($product_variant)

        function changeProDetail(id, type, parent_id) {
            var data = product.find(item => item.id == id)
            if (data.length != 0) {
                $('.last-product-' + parent_id).removeClass('active-product last-product')
                $("#href_" + type + parent_id + "_" + id).addClass('active-product last-product')
                if (data.id != id) {
                    $("#href_" + type + parent_id + "_" + current_prod_id).removeClass('active-product')
                }
                if(!isValidURL(data.photo)){
                    $("#" + type + "pro_img_" + parent_id).attr('src', root + insertAtPosition(data.photo,'med'))
                }else{
                    $("#" + type + "pro_img_" + parent_id).attr('src', data.photo)
                }                $("#" + type + "brand_name_" + parent_id).html(data.brand_name)
                $("#" + type + "pro_model_" + parent_id).html(
                    "<a class='text-dark link-primary' href='{{ url('product-detail') }}/" + data.slug + "'>" + data
                    .title + "</a>")
                $("#" + type + "pro_price_" + parent_id).html("$" + Math.ceil(data.price))
                $("#" + type + "pro_discount_" + parent_id).html("%" + data.discount)
            }

        }

        //Load more on scroll page down
        var page = 1;
        var processing;
        $(document).ready(function(){
            $(window).scroll(function(){
                if (processing) return false;
                var position = $(window).scrollTop();
                var bottom = $(document).height() - $(window).height();
                var bottom1 = bottom-4900;

                if(position > bottom1){
                    processing = true;
                    if(current_product > 0){
                        $(".ajax-load").css('display','block');
                        loadMoreData(++page);
                    }
                }
            });
        });


        function loadMoreData(page){
            $.ajax({
                url: "{{ url('load_more_brands') }}/"+"{{$brand_id}}/brand"+'?page=' + page,
                method: "get",
                dataType: "json",
                success: function(res){
                    if(res.status == 1){
                        processing = false;
                        if(res.more_data > 0){
                            $("#productsList").append(res.html);
                            $(".ajax-load").css('display','none');
                        }else{
                            $(".ajax-load-show-message").html('No More Products Found!');
                            $(".ajax-load-show-message").css('display','block');
                            $(".ajax-load").css('display','none');
                            processing = true;
                        }
                    }else{
                        console.error('server err');
                    }
                }
            })
        }

    </script>
@endpush
