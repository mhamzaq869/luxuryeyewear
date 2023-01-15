@extends('frontend.layouts.master')
@section('title', 'Wishlist')
@section('main-content')
    <!--wishliat -->
    <section>
        <div class="brand_banner">
            <div class="container">
                <div class="brand_banner_content">
                    <div class="brand_banner_content_text text-center">
                        <h1 class="brand_bannner_head">@yield('title')</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumbStyle justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    @yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--wishlist -->

    <section>
        <div class="product_detail section_space pb-0">
            <div class="container">
                <div class="product_deatail_list">


                    <div class="productColMain">
                        <div class="row g-4">
                            @if (Helper::getAllProductFromWishlist())
                                @foreach (Helper::getAllProductFromWishlist() as $key => $wishlist)
                                    @php
                                        $photo = explode(',', $wishlist->product['photo']);
                                    @endphp
                                    <div class="col-md-6 col-xl-4 position-relative">
                                        <a href="{{ route('product-detail', $wishlist->product['slug']) }}" class="link-overlay"></a>
                                        <div class="cardStyle1">
                                                <div class="productImg pb-5">
                                                    <div class="imgCol">
                                                        <img src="{{ $photo[0] }}" alt="... ">
                                                    </div>

                                                </div>

                                            <div class="contentCol">
                                                <h4 class="brandCol">HUGO BOSS</h4>
                                                <p>
                                                <p class="product-name">
                                                    <a href="{{ route('product-detail', $wishlist->product['slug']) }}"> {{ $wishlist->product['title'] }}</a>
                                                </p>
                                                <span class="priceCol" id="wishlist-{{$wishlist['id']}}">${{ $wishlist['amount'] }} </span>
                                                <div class="row gx-2">
                                                    <div class="col-auto">
                                                        <a href="{{ route('single-add-to-cart', $wishlist->product['slug']) }}"
                                                            class="btn btnDark w-100 addCartBtn">ADD TO CART</a>
                                                    </div>
                                                    <div class="col">
                                                        <a href="{{ route('wishlist-delete', $wishlist->id) }}"
                                                            class="btn btnDark_outline w-100">Remove</a>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="" style="text-align: center; padding:10px  200px  200px ">
                                    <img src="{{ asset('images/Capture.jpg') }}" style="width:200px;">
                                    <h3> There are no any wishlist availabl</h3>
                                    <a href="{{ route('product-grids') }}" class="btn btn-dark">
                                        Continue shopping</a>
                                </div>

                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--end product section-->







    <!-- Start Shop Services Area  -->
    <section class="shop-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Newsletter -->




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                            aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <div class="quickview-slider-active">
                                    <div class="single-slider">
                                        <img src="images/modal1.jpg" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="images/modal2.jpg" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="images/modal3.jpg" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="images/modal4.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content">
                                <h2>Flared Shift Dress</h2>
                                <div class="quickview-ratting-review">
                                    <div class="quickview-ratting-wrap">
                                        <div class="quickview-ratting">
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"> (1 customer review)</a>
                                    </div>
                                    <div class="quickview-stock">
                                        <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                    </div>
                                </div>
                                <h3>$29.00</h3>
                                <div class="quickview-peragraph">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad
                                        impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo
                                        ipsum numquam.</p>
                                </div>
                                <div class="size">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Size</h5>
                                            <select>
                                                <option selected="selected">s</option>
                                                <option>m</option>
                                                <option>l</option>
                                                <option>xl</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Color</h5>
                                            <select>
                                                <option selected="selected">orange</option>
                                                <option>purple</option>
                                                <option>black</option>
                                                <option>pink</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                                data-type="minus" data-field="quant[1]">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="quant[1]" class="input-number" data-min="1"
                                            data-max="1000" value="1">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                data-field="quant[1]">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </div>
                                <div class="add-to-cart">
                                    <a href="#" class="btn">Add to cart</a>
                                    <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                    <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                                </div>
                                <div class="default-social">
                                    <h4 class="share-now">Share:</h4>
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        allproducts = @json(Helper::getAllProductFromWishlist())

    </script>
@endpush
