@extends('frontend.layouts.master')

@section('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
    <meta name="description" content="{{ $product_detail->summary ?? '' }}">
    <meta property="og:url" content="{{ route('product-detail', $product_detail->slug ?? '') }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $product_detail->title ?? '' }}">
    <meta property="og:image" content="{{ $product_detail->photo ?? '' }}">

    <meta property="og:description" content="{{ $product_detail->description ?? '' }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lg-zoom.css">
@endsection
@section('title', ' PRODUCT DETAIL')
@section('main-content')
    <!--new data section  start -->
    <section>
        <div class="productDetailPage">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="row g-0">
                            <div class="col-md-2 col-3 navi">
                               <div class="carousel carousel-nav"
                                    data-flickity='{
                                      "asNavFor": ".carousel-main",
                                      "draggable": false,
                                      "percentPosition": false,
                                      "groupCells": "100%",
                                      "pageDots": false,
                                      "wrapAround": true
                                    }'>

                                    @if (!empty($product_detail->p_f))
                                        <div class="carousel-cell carousel-cell-thumb">
                                            @if (!isValidUrl($product_detail->p_f))
                                                <img src="{{ asset(insertAtPosition($product_detail->p_f)) }}" alt="{{ asset($product_detail->p_f) }}"  />
                                            @else
                                                <img src="{{ $product_detail->p_f }}" alt="{{ $product_detail->p_f }}" />
                                            @endif
                                        </div>
                                    @endif

                                    @if (!empty($product_detail->p_b))
                                        <div class="carousel-cell carousel-cell-thumb">
                                            @if (!isValidUrl($product_detail->p_b))
                                                <img src="{{ asset(insertAtPosition($product_detail->p_b)) }}"
                                                    alt="{{ asset($product_detail->p_b) }}"  />
                                            @else
                                                <img src="{{ $product_detail->p_b }}" alt="{{ $product_detail->p_b }}"
                                                     />
                                            @endif
                                        </div>
                                    @endif

                                    @if (!empty($product_detail->g_image_1))
                                        <div class="carousel-cell carousel-cell-thumb">
                                            @if (!isValidUrl($product_detail->g_image_1))
                                                <img src="{{ asset(insertAtPosition($product_detail->g_image_1)) }}"
                                                    alt="{{ asset($product_detail->g_image_1) }}"  />
                                            @else
                                                <img src="{{ $product_detail->g_image_1 }}" alt="{{ $product_detail->g_image_1 }}"
                                                     />
                                            @endif
                                        </div>
                                    @endif

                                    @if (!empty($product_detail->g_image_2))
                                        <div class="carousel-cell carousel-cell-thumb">
                                            @if (!isValidUrl($product_detail->g_image_2))
                                                <img src="{{ asset(insertAtPosition($product_detail->g_image_2)) }}"
                                                    alt="{{ asset($product_detail->g_image_2) }}"  />
                                            @else
                                                <img src="{{ $product_detail->g_image_2 }}" alt="{{ $product_detail->g_image_2 }}"
                                                     />
                                            @endif
                                        </div>
                                    @endif

                                    @if (!empty($product_detail->g_image_3))
                                        <div class="carousel-cell carousel-cell-thumb">
                                            @if (!isValidUrl($product_detail->g_image_3))
                                                <img src="{{ asset(insertAtPosition($product_detail->g_image_3)) }}"
                                                    alt="{{ asset($product_detail->g_image_3) }}"  />
                                            @else
                                                <img src="{{ $product_detail->g_image_3 }}" alt="{{ $product_detail->g_image_3 }}"
                                                     />
                                            @endif
                                        </div>
                                    @endif
                              </div>
                            </div>
                            <div class="col-md-10 col-9 main">
                              <div class="carousel carousel-main"
                                   data-flickity='{
                                     "contain": true,
                                     "pageDots": true,
                                     "wrapAround": true
                                   }' id="carouselMain">

                                    @if (!empty($product_detail->p_f))
                                        <div class="carousel-cell" id="1">
                                            @if (!isValidUrl($product_detail->p_f))
                                            <a class="carousel-href" data-lg-size="400-400" data-src="{{ asset($product_detail->p_f) }}">
                                                <img src="{{ asset(insertAtPosition($product_detail->p_f, 'med')) ?? '' }}" class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                            </a>
                                            @else
                                            <a class="carousel-href" data-src="{{ $product_detail->p_f }}">
                                                <img src="{{ $product_detail->p_f }}" class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                            </a>
                                            @endif
                                        </div>
                                    @endif

                                    @if (!empty($product_detail->p_b))
                                        <div class="carousel-cell" id="2">
                                            @if (!isValidUrl($product_detail->p_b))
                                            <a class="carousel-href" data-src="{{ asset($product_detail->p_b) }}" data-lg-size="400-400">
                                                <img src="{{ asset(insertAtPosition($product_detail->p_b, 'med')) ?? '' }}" class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                            </a>
                                            @else
                                            <a class="carousel-href" data-src="{{ $product_detail->p_b }}" data-lg-size="400-400">
                                                <img src="{{ $product_detail->p_b }}" class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                            </a>
                                            @endif
                                        </div>
                                    @endif

                                    @if (!empty($product_detail->g_image_1))
                                        <div class="carousel-cell" id="3">
                                            @if (!isValidUrl($product_detail->g_image_1))
                                            <a class="carousel-href" data-src="{{ asset($product_detail->g_image_1) }}" data-lg-size="400-400">
                                                <img src="{{ asset(insertAtPosition($product_detail->g_image_1, 'med')) ?? '' }}" class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                            </a>
                                            @else
                                            <a class="carousel-href" data-src="{{ $product_detail->g_image_1 }}">
                                                <img src="{{ $product_detail->g_image_1 }}" class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                            </a>
                                            @endif
                                        </div>
                                    @endif

                                    @if (!empty($product_detail->g_image_2))
                                        <div class="carousel-cell" id="4">
                                            @if (!isValidUrl($product_detail->g_image_2))
                                            <a class="carousel-href" data-src="{{ asset($product_detail->g_image_2) }}" data-lg-size="400-400">
                                                <img src="{{ asset(insertAtPosition($product_detail->g_image_2, 'med')) ?? '' }}" class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                            </a>
                                            @else
                                            <a class="carousel-href" data-src="{{ $product_detail->g_image_2 }}">
                                                <img src="{{ $product_detail->g_image_2 }}" class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                            </a>
                                            @endif
                                        </div>
                                    @endif

                                    @if (!empty($product_detail->g_image_3))
                                        <div class="carousel-cell" id="5">
                                            @if (!isValidUrl($product_detail->g_image_3))
                                            <a class="carousel-href" data-src="{{ asset($product_detail->g_image_3) }}" data-lg-size="400-400">
                                                <img src="{{ asset(insertAtPosition($product_detail->g_image_3, 'med')) ?? '' }}" class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                            </a>
                                            @else
                                            <a class="carousel-href" data-src="{{ $product_detail->g_image_3 }}">
                                                <img src="{{ $product_detail->g_image_3 }}" class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                            </a>
                                            @endif
                                        </div>
                                    @endif
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="proDetailRightCol">
                            <div class="zoom">
                            </div>
                            <div class="topBrandCol">
                                <span class="text-secondary">Brand:</span>
                                <a href="{{ route('product-brand', [$product_detail['brand']['title']]) }}"
                                    class="text-dark">
                                    <small class="brand"
                                        style="color:#F07500; font-weight:600">{{ $product_detail['brand']['title'] ?? '' }}</small>
                                </a>
                            </div>
                            <h2 class="proTitle pt-2 pb-1 text-dark">{{ $product_detail->title }}</h2>
                            <p class="uan_no" style="font-weight: bold">{{ $product_detail->size ?? '' }}
                                {{ $product_detail->color_description ?? '' }}
                            </p>
                            <p class="ean_no" style="font-weight: ">Item Code:
                                {{ $product_detail->product_uan_code ?? '' }}</p>

                            <div class="row gy-2">
                                <div class="col-12">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="productPrice"></span> <br>
                                            @if ($product_detail->shipping_cost > 0)
                                                Shipping Cost: <span id="productDetailShippingCost"></span> <br>
                                            @endif

                                            @if ($product_detail->transit)
                                                <span>Delivery {{ $product_detail->transit }}</span>
                                            @endif
                                        </div>
                                        <div
                                            class="col-auto mt-2 qntyInput text-end @if ($product_detail->stock == 0) d-none @endif">
                                            <div class="product_quantity">
                                                <div class="qtySelector row g-0">
                                                    <div class="col-auto">
                                                        <span class="qtyTrigger" onclick="decreaseValue()">-</span>
                                                    </div>
                                                    <div class="col">
                                                        <input type="number" min="0"
                                                            max="{{ $product_detail->stock }}"
                                                            onchange="changePriceQty(this.value)" id="quantity"
                                                            class="form-control qtyValue"
                                                            value="{{ old('quantity') ?? 1 }}" />
                                                    </div>
                                                    <div class="col-auto">
                                                        <span class="qtyTrigger" onclick="increaseValue()">+</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row align-items-center mt-2">
                                        <div
                                            class="col-auto
                                        @if ($product_detail->product_lens_width == null ||
                                            $product_detail->product_bridge == null ||
                                            $product_detail->product_arm_length == null ||
                                            $product_detail->product_bridge == null ||
                                            $product_detail->product_lens_height == null) d-none @endif
                                        ">
                                            <span class="detailLblCol">Size</span>
                                        </div>
                                        <div class="col-auto">
                                            <span class="dtlTextCol size">
                                                {{ $product_detail->product_lens_width != null ? $product_detail->product_lens_width . '-' : '' }}{{ $product_detail->product_bridge != null ? $product_detail->product_bridge . '-' : '' }}{{ $product_detail->product_arm_length != null ? $product_detail->product_arm_length . '-' : '' }}{{ $product_detail->product_lens_height != null ? $product_detail->product_lens_height . '-' : '' }}{{ $product_detail->product_total_width != null ? $product_detail->product_total_width : '' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    @if ($product_variant->count() != 0)
                                        <div class="row  g-1 mt-2">
                                            <div class="col-md-2 col-4">
                                                <span class="detailLblCol">Color</span>
                                            </div>
                                            <div class="col-md-10 col-8" style="margin-left:-25px">
                                                <div class="row g-1">
                                                    <div class="col-md-3 col-6">
                                                        <a href="javascript:void(0)" id="href_{{ $product_detail->id }}"
                                                            onclick="changePic({{ $product_detail->id }})"
                                                            class="p-2 px-1 text-center hover-product active-product ">
                                                            @if (!isValidUrl($product_detail->photo))
                                                                <img src="{{ asset(insertAtPosition($product_detail->photo)) }}"
                                                                    style="width:50px;"
                                                                    id="pro_pic_{{ $product_detail->id }}">
                                                            @else
                                                                <img src="{{ $product_detail->photo }}"
                                                                    style="width:50px;"
                                                                    id="pro_pic_{{ $product_detail->id }}">
                                                            @endif
                                                            <small class="text-dark productPrice" id="productPrice2"></small>
                                                        </a>
                                                    </div>

                                                    @foreach ($product_variant->where('id', '!=', $product_detail->id)->where('cat_id', $product_detail->cat_id)->flatten() as $i => $data)
                                                        {{-- @if ($i <= 4) --}}
                                                        <div class="col-md-3 col-6">
                                                            <a href="javascript:void(0)" id="href_{{ $data->id }}"
                                                                @if ($product_detail->id != $data->id) onclick="changePic({{ $data->id }})" @endif
                                                                class="p-2 px-1 text-center hover-product @if ($product_detail->id == $data->id) active-product @endif">
                                                                @if (!isValidUrl($data->photo))
                                                                    <img src="{{ asset(insertAtPosition($data->photo)) }}"
                                                                        style="width:50px;"
                                                                        id="pro_pic_{{ $data->id }}">
                                                                @else
                                                                    <img src="{{ $data->photo }}" style="width:50px;"
                                                                        id="pro_pic_{{ $data->id }}">
                                                                @endif
                                                                <small  class="text-dark productPrice productVariantPrice{{ $data->id }}"></small>
                                                            </a>
                                                        </div>
                                                        {{-- @endif --}}
                                                    @endforeach

                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <div
                                        class="row g-3 align-items-center addToCart @if ($product_detail->stock == 0) d-none @endif">
                                        <div class="col-sm-auto col-12">
                                            <div class="class_Btn">
                                                <a href="">
                                                    <form action="{{ route('add-to-cart') }}" id="addToCart"
                                                        method="POST" onsubmit="">
                                                        @csrf
                                                        <input type="hidden" id="current_product_price"
                                                            value="{{ $product_detail->price }}">
                                                        <input type="hidden" id="product_id" name="product_id"
                                                            value="{{ $product_detail->id }}">
                                                        <input type="hidden" id="product_price" name="price"
                                                            value="{{ $product_detail->price }}">
                                                        <input type="hidden" id="product_qty" name="quantity"
                                                            value="1">

                                                        <button type="submit"
                                                            class="btn1-- btn minWdBtn btnDark text-uppercase">add to
                                                            cart</button>
                                                    </form>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="class_Btn_new ">
                                                <a href="{{ route('add-to-wishlist', $product_detail->slug) }}"
                                                    class="btn add_to_wishlist btnDark_outline w-100">Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="shareCol">
                                                <div class="shareTrigger">
                                                    <div class="shareTrigger">
                                                        <a href="javascript:void(0)" class="">
                                                            <img src="{{ asset('assets/images/share-icon.svg') }}"
                                                                alt="Share icon" class="st-custom-button"
                                                                data-network="sharethis">
                                                        </a>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="row g-3 align-items mt-3 notifyProduct @if ($product_detail->stock != 0) d-none @endif">
                                        <div class="col-12">
                                            <form action="{{ url('notify-email') }}" method="POST">
                                                @csrf
                                                <input type="hidden" id="notify_product_id" name="product_id"
                                                    value="{{ $product_detail->id }}">
                                                <div class="class_Btn">
                                                    <input type="email" name="email" id="email"
                                                        class="form-control notfiyMail" placeholder="Email ">
                                                    <button type="submit"
                                                        class="btn1-- btn btn-block btnDark mt-2 w-100 text-uppercase mt-1">
                                                        Notify Me
                                                    </button>

                                                    <div class="text-center mt-2">
                                                        <p><b>OUT OF STOCK</b></p>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="proBtmDetailCol">
                    <div class="proCard frame_fragment_div @if (!empty($product_detail->cat_info) && $product_detail->cat_info->size == null) d-none @endif">
                        <div class="row align-items-center">
                            <div class="col-lg">
                                <h4 class="detailTitle">Frame Measurement</h4>
                                <div class="lense_imgs">
                                    <div class="row">

                                        <div
                                            class="col-6 col-sm-2 lens_width_div @if (empty($product_detail->product_lens_width)) d-none @endif">
                                            <img src="{{ asset('assets/images/lens/1lens_width.png') }}" alt="">
                                            <h6 class="page_speed_1600560138">LENS WIDTH<br>
                                                <span class="lens_width ">
                                                    {{ $product_detail->product_lens_width }}
                                                </span>
                                            </h6>
                                        </div>




                                        <div
                                            class="col-6 col-sm-2 product_bridge_div @if (empty($product_detail->product_bridge)) d-none @endif">
                                            <img src="{{ asset('assets/images/lens/2width.png') }}" alt="">
                                            <h6 class="page_speed_1600560138">BRIDGE WIDTH<br>
                                                <span class="product_bridge ">
                                                    {{ $product_detail->product_bridge }}
                                                </span>
                                            </h6>
                                        </div>




                                        <div
                                            class="col-6 col-sm-2 product_arm_length_div @if (empty($product_detail->product_arm_length)) d-none @endif">
                                            <img src="{{ asset('assets/images/lens/3temple_length.png') }}"
                                                alt="">
                                            <h6 class="page_speed_1600560138">TEMPLE LENGTH<br>
                                                <span
                                                    class="product_arm_length ">{{ $product_detail->product_arm_length }}</span>
                                            </h6>
                                        </div>



                                        <div
                                            class="col-6 col-sm-2 product_lens_height_div @if (empty($product_detail->product_lens_height)) d-none @endif">
                                            <img src="{{ asset('assets/images/lens/4lens_height.png') }}" alt="">
                                            <h6 class="page_speed_542998610">LENS HEIGHT<br>
                                                <span
                                                    class="product_lens_height">{{ $product_detail->product_lens_height }}</span>
                                            </h6>
                                        </div>



                                        <div
                                            class="col-6 col-sm-2 product_total_width_div @if (empty($product_detail->product_total_width)) d-none @endif">
                                            <img src="{{ asset('assets/images/lens/total_wdth.png') }}" alt="">
                                            <h6 class="page_speed_542998610 ">TOTAL WIDTH<br>
                                                <span
                                                    class="product_total_width">{{ $product_detail->product_total_width }}</span>
                                            </h6>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="fg-border @if (!empty($product_detail->cat_info) && $product_detail->cat_info->size != null) proCard @endif">
                        <h4 class="detailTitle">Product Detail</h4>
                        <div class="row product_row ">
                            <div class="col-md-3 py-2 @if (empty($product_detail['frametype']['name'])) d-none @endif"
                                id="frame_type_div">
                                <div class="row">
                                    <div class="col-md-5 col-sm-6">
                                        <span class="detailListLbl">Frame Type :</span>
                                    </div>
                                    <div class="col-md-6 col-sm-6" id="frame_type">
                                        <span class="text-left">{{ $product_detail['frametype']['name'] ?? '' }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 py-2 @if (empty($product_detail['type_name']['name'])) d-none @endif" id="type_div">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6">
                                        <span class="detailListLbl">Type :</span>
                                    </div>
                                    <div class="col-md-6 col-sm-6" id="type">
                                        <span class="text-left">{{ $product_detail['type_name']['name'] ?? '' }}</span>
                                    </div>
                                    <div class="col-md-3"> </div>
                                </div>
                            </div>

                            <div class="col-md-3 py-2 @if (empty($product_detail['get_shape']['name'])) d-none @endif" id="shape_div">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="detailListLbl">Shape :</span>
                                    </div>
                                    <div class="col-md-4" id="shape">
                                        <span class="text-left">{{ $product_detail['get_shape']['name'] ?? '' }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 py-2 @if (empty($product_detail['get_lens']['name'])) d-none @endif" id="lens_div">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="detailListLbl">Lens Type :</span>
                                    </div>
                                    @if (!empty($product_detail['get_lens']['name']))
                                        <div class="@if (strlen($product_detail['get_lens']['name']) > 7) col-md-8 @else col-md-4 @endif"
                                            id="lens">
                                            <span class="text-left">{{ $product_detail['get_lens']['name'] ?? '' }}</span>
                                        </div>
                                    @else
                                        <div class="col-md-4" id="lens">
                                            <span class="text-left">{{ $product_detail['get_lens']['name'] ?? '' }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3 py-2 @if (empty($product_detail['get_gender']['name'])) d-none @endif" id="gender_div">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <span class="detailListLbl">Gender :</span>
                                    </div>
                                    <div class="col-md-6 col-sm-6" id="gender">
                                        <span class="text-left">{{ $product_detail['get_gender']['name'] ?? '' }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 py-2 @if (empty($product_detail->product_ean_code)) d-none @endif" id="ean_div">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="detailListLbl">EAN Code :</span>
                                    </div>
                                    <div class="col-md-4" id="ean">
                                        <span class="text-left">{{ $product_detail->product_ean_code }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 py-2 @if (empty($product_detail->extra)) d-none @endif" id="extra_div">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="detailListLbl">Extra :</span>
                                    </div>
                                    <div class="col-md-4" id="extra">
                                        <span class="text-left"> {{ $product_detail->extra }} </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 py-2 @if (empty($product_detail['get_product_material']['name'])) d-none @endif"
                                id="material_div">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="detailListLbl">Material :</span>
                                    </div>
                                    <div class="col-md-4 text-left" id="material">
                                        {{ $product_detail['get_product_material']['name'] ?? '' }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 py-2 @if (empty($product_detail->dispatch_from)) d-none @endif"
                                id="dispatch_div">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="detailListLbl">Dispatch From :</span>
                                    </div>
                                    <div class="col-md-4 " id="dispatch">
                                        {{ $product_detail->dispatch_from }}
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="proCard @if (empty($product_detail->description)) d-none @endif" id="description_div">
                        <h4 class="detailTitle">Description</h4>
                        <div id="product_description">
                            {!! $product_detail->description !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>


    @if ($product_detail->rel_prods->count() > 1)
        <div class="product_detail pb-0">
            <div class="container-fluid">
                <div class="product_deatail_list">

                    <div class="product_deatail_list_text">
                        <div class="lineTitleCol">
                            <h6 class="lineTitle">Explore Our Products</h6>
                        </div>
                        <h2 class="product_detail_head lgTitle darkColor">YOU MIGHT ALSO LIKE</h2>
                    </div>
                    <div class="productColMain">
                        <div class="row g-4">
                            {{-- start card --}}
                            @foreach ($product_detail->rel_prods as $data)
                                @if ($data->id !== $product_detail->id)
                                    <div class="col-md-6 py-1 col-xl-3">
                                        <div class="cardStyle1">

                                            <div class="productImg">
                                                <a href="{{ route('product-detail', $data->slug) }}">
                                                    <div class="imgCol">
                                                        @if (!isValidUrl($data->photo))
                                                            <img src="{{ asset(insertAtPosition($data->photo, 'med')) }}"
                                                                id="men_sunglass_pro_img_{{ $data->id }}"
                                                                class=""
                                                                alt="{{ asset(insertAtPosition($data->photo)) }}">
                                                        @else
                                                            <img src="{{ $data->photo }}"
                                                                id="men_sunglass_pro_img_{{ $data->id }}"
                                                                class="" alt="{{ $data->photo }}">
                                                        @endif
                                                    </div>
                                                </a>

                                                <div class="color_builts">

                                                    <ul>
                                                        @php
                                                            $like = \DB::table('products')
                                                                ->where('cat_id', $data->cat_id)
                                                                ->get();
                                                        @endphp

                                                        @if ($active = $like->where('id', $data->id)->first())
                                                            <li>
                                                                <a href="javascript:void(0)"
                                                                    onclick="changeProDetail({{ $active->id }},'men_sunglass_',{{ $data->id }})"
                                                                    onmouseover="changeProDetail({{ $active->id }},'men_sunglass_',{{ $data->id }})">
                                                                    @if (!isValidUrl($active->photo))
                                                                        <img src="{{ asset(insertAtPosition($active->photo)) }}"
                                                                            alt=""
                                                                            class="p-2 hover-product active-product last-product last-product-{{ $data->id }}"
                                                                            id="href_men_sunglass_{{ $data->id }}_{{ $active->id }}">
                                                                    @else
                                                                        <img src="{{ $active->photo }}" alt=""
                                                                            class="p-2 hover-product active-product last-product last-product-{{ $data->id }}"
                                                                            id="href_men_sunglass_{{ $data->id }}_{{ $active->id }}">
                                                                    @endif
                                                                </a>
                                                            </li>
                                                        @endif

                                                        @foreach ($like->where('id', '!=', $data->id)->flatten() as $i => $variant)
                                                            @if ($i <= 2)
                                                                <li>
                                                                    <a href="javascript:void(0)"
                                                                        onclick="changeProDetail({{ $variant->id }},'men_sunglass_',{{ $data->id }})"
                                                                        onmouseover="changeProDetail({{ $variant->id }},'men_sunglass_',{{ $data->id }})">
                                                                        @if (!isValidUrl($variant->photo))
                                                                            <img src="{{ asset(insertAtPosition($variant->photo)) }}"
                                                                                class="p-2 hover-product last-product-{{ $data->id }}"
                                                                                id="href_men_sunglass_{{ $data->id }}_{{ $variant->id }}">
                                                                        @else
                                                                            <img src="{{ $variant->photo }}"
                                                                                class="p-2 hover-product last-product-{{ $data->id }}"
                                                                                id="href_men_sunglass_{{ $data->id }}_{{ $variant->id }}">
                                                                        @endif
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        @endforeach

                                                        @if ($i > 2)
                                                            @if (count($like) - 4 != 0)
                                                                <li>
                                                                    <a href="{{ route('product-detail', [$data->slug]) }}"
                                                                        class="text-danger m-2">
                                                                        +{{ count($like) - 4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        @endif
                                                    </ul>

                                                </div>
                                            </div>
                                            <div class="contentCol pt-5">
                                                <h4 class="brandCol" id="men_sunglass_brand_name_{{ $data->id }}">
                                                    {{ $data->brand->title }} </h4>
                                                <a href="{{ route('product-detail', $data->slug) }}" target="_blank"
                                                    class="text-dark">

                                                    <p id="men_sunglass_pro_model_{{ $data->id }}">
                                                        {{ $data->title }} </p>
                                                </a>
                                                <span class="priceCol" id="men_sunglass_pro_price_{{ $data->id }}">
                                                </span>
                                                {{-- <div class="row">
                                                    <div class="col-6">
                                                        <a href="{{ route('add-to-cart', $data->slug) }}"
                                                            class="btn btn-dark w-100 btnDark addCartBtn btn_explore">ADD TO
                                                            CART</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="{{ route('add-to-wishlist', $data->slug) }}"
                                                            class="btn btnDark_outline w-100 px-1 btn_explore" style="margin-left: 15px">ADD TO
                                                            WISHLIST</a>
                                                    </div>
                                                </div> --}}

                                                <div class="row gx-1">

                                                    <div class="col-auto">

                                                        <a href="{{ route('single-add-to-cart', $data->slug) }}"
                                                            class="btn btnDark w-100 addCartBtn">ADD TO CART</a>

                                                    </div>

                                                    <div class="col">

                                                        <a href="{{ route('add-to-wishlist', $data->slug) }}"
                                                            class="btn btnDark_outline w-100 px-1">ADD TO WISHLIST</a>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            {{-- end card --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@push('scripts')
    <style>
        .carousel-cell {
            /* background: rgb(255, 255, 255); */
            counter-increment: carousel-cell;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            /* cell number */
        }
        .carousel-cell:before {
            content: counter(carousel-cell);
        }
        .carousel-main .carousel-cell {
            width: 100%;
            height: 360px;
            font-size: 5rem;
        }
        .carousel-nav {
            width: 300px;
            transform: rotate(90deg) translate(30px, -100%);
            transform-origin: left top;
        }

        .carousel-nav .carousel-cell {
            transform: rotate(-90deg);
            width: 80px;
            height: 80px;
            cursor: pointer;
            margin-right: 1rem;
            font-size: 1.4rem;
            /* selected cell */
        }
        .carousel-cell-thumb img{
            transform: rotate(270deg) translate(0px, -10%);
        }
        .carousel-nav .carousel-cell:before {
            transform: rotate(-90deg);
        }
        .carousel-nav .carousel-cell{
            border: 1px solid rgb(189, 189, 189);
        }
        .carousel-nav .carousel-cell.is-nav-selected {
            border: 1px solid rgb(250, 120, 45);
        }
        .carousel-nav .flickity-prev-next-button {
            width: 40px;
            height: 40px;
            background: transparent;
        }
        .carousel-nav .flickity-prev-next-button.previous {
            left: -40px;
        }
        .carousel-nav .flickity-prev-next-button.next {
            right: -40px;
        }
        .proSlideImg{
            transform: translate(30px)
        }
        .lg-img-wrap .lg-object{
            width: 800px !important;
        }

        .lg-backdrop{
            background-color:#ffffff;
        }
        .lg-toolbar{
            background: transparent;
        }
        .lg-toolbar .lg-icon:hover{
            color: black
        }
        .lg-actions .lg-next:hover, .lg-actions .lg-prev:hover{
            color: black
        }


        @media screen and (max-width: 1200px) {
            .carousel-nav {
                transform: rotate(90deg) translate(30px, -50%);
            }
        }

        @media screen and (max-width: 320px) {
            .nav-responsive {
                padding: 0px;
            }
        }

        @media screen and (max-width: 480px) {
            .carousel-nav {
                transform: rotate(90deg) translate(30px, -89%);
            }

            .proSlideImg{
                transform:translate(-25px);
                max-width:100%
            }
            .flickity-prev-next-button.previous{
                left: 0;
            }
            .carousel-nav .flickity-prev-next-button{
                width:24px;
                height:24px;
            }

            .flickity-prev-next-button{
                width:24px;
                height:24px;
            }

            .flickity-page-dots{
                bottom: 0px
            }

            .productPrice{
                font-size: 10px
            }
        }

        @media screen and (max-width: 768px) {
            .carousel-nav {
                transform: rotate(90deg) translate(30px, -96%);
            }

        }

    </style>

    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script type="text/javascript" src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>

    <script>
        var product = @json($product_variant)

        var stock = {{ $product_detail->stock }}
        var current_prod_id = "{{ $product_detail->id }}";

        allproducts = [@json($product_detail)]

        allproductVariants = @json($product_variant)

        productDetailShippCost = {{ $product_detail->shipping_cost }}


        lightGallery(document.getElementById("carouselMain"),{
             download: false,
             actualSize:false,
             selector: '.carousel-href'
        })

        function changePic(id) {

            var data = product.find(item => item.id == id)

            $('.last-product').each(function(i) {
                $(this).removeClass('active-product last-product')
            });

            $("#href_" + id).addClass('active-product last-product')
            if (current_prod_id != id) {
                $("#href_" + current_prod_id).removeClass('active-product')
            }

            var root = window.location.origin;
            if (data != null) {

                stock = data.stock
                if (data.stock != 0) {
                    var exist_qty = $("#quantity").val();
                    if (exist_qty == 1) {
                        $(".productPrice").html('<b>' + price(data) + '</b>')
                    }
                    $("#current_product_price").val(Number(price(data).replace(/[^0-9.-]+/g, "")))
                    changePriceQty(exist_qty)
                }


                $("#product_id").val(data.id)
                $("#notify_product_id").val(data.id)

                //Product Top
                $(".brand").text(data.brand_name)
                $(".proTitle").text(data.title)
                $(".uan_no").text(data.size + ' ' + data.color_description)
                $(".ean_no").text(data.product_uan_code != null ? 'Item Code: ' + data.product_uan_code : '')

                if (data.stock == 0) {
                    $('.qntyInput').addClass('d-none')
                    $('.addToCart').addClass('d-none')
                    $('.notifyProduct').removeClass('d-none')
                } else {
                    $('.qntyInput').removeClass('d-none')
                    $('.addToCart').removeClass('d-none')
                    $('.notifyProduct').addClass('d-none')
                }
                var size = (data.product_lens_width != null ? data.product_lens_width + '-' : '') +
                    +(data.product_bridge != null ? data.product_bridge + '-' : '') +
                    +(data.product_arm_length != null ? data.product_arm_length + '-' : '') +
                    +(data.product_lens_height != null ? data.product_lens_height + '-' : '') +
                    +(data.product_total_width != null ? data.product_total_width + '-' : '') +

                    $(".dtlTextCol").text(size)

                // frame_fragment_div
                //Frame Fragment


                if (data.frame_fragment != null) {
                    $(".frame_fragment_div").removeClass('d-none');
                    $(".fg-border").addClass('proCard');

                    if (data.frame_fragment.width != null) {
                        $(".product_lens_width_div").removeClass('d-none')
                        $(".product_lens_width").text(data.frame_fragment.width)
                    } else {
                        $(".product_lens_width_div").addClass('d-none')
                    }

                    if (data.frame_fragment.bridge != null) {
                        $(".product_bridge_div").removeClass('d-none')
                        $(".product_bridge").text(data.frame_fragment.bridge)
                    } else {
                        $(".product_bridge_div").addClass('d-none')
                    }

                    if (data.frame_fragment.arm_length != null) {
                        $(".product_arm_length_div").removeClass('d-none')
                        $(".product_arm_length").text(data.frame_fragment.arm_length)
                    } else {
                        $(".product_arm_length_div").addClass('d-none')
                    }

                    if (data.frame_fragment.lens_height != null) {
                        $(".product_lens_height_div").removeClass('d-none')
                        $(".product_lens_height").text(data.frame_fragment.lens_height)
                    } else {
                        $(".product_lens_height_div").addClass('d-none')
                    }

                    if (data.frame_fragment.total_width != null) {
                        $(".product_total_width_div").removeClass('d-none')
                        $(".product_total_width").text(data.frame_fragment.total_width)
                    } else {
                        $(".product_total_width_div").addClass('d-none')
                    }

                } else {
                    $(".frame_fragment_div").addClass('d-none');
                    $(".fg-border").removeClass('proCard');
                }


                //Product Detail
                if (data.description != null && data.description != '') {
                    $("#description_div").removeClass('d-none')
                    $("#product_description").html(data.description)
                } else {
                    $("#description_div").addClass('d-none')
                    $("#product_description").html(data.description)
                }

                if (data.frame_type_name != null && data.frame_type_name != '') {
                    $("#frame_type_div").removeClass('d-none')
                    $("#frame_type").html(data.frame_type_name)
                } else {
                    $("#frame_type_div").addClass('d-none')
                    $("#frame_type").html(data.frame_type_name)
                }

                if (data.typename != null && data.typename != '') {
                    $("#type_div").removeClass('d-none')
                    $("#type").html(data.typename)
                } else {
                    $("#type_div").addClass('d-none')
                    $("#type").html(data.typename)
                }

                if (data.lens_name != null && data.lens_name != '') {
                    $("#lens_div").removeClass('d-none')
                    $("#lens").html(data.lens_name)
                } else {
                    $("#lens_div").addClass('d-none')
                    $("#lens").html(data.lens_name)
                }


                if (data.gender_name != null && data.gender_name != '') {
                    $("#gender_div").removeClass('d-none')
                    $("#gender").html(data.gender_name)
                } else {
                    $("#gender_div").addClass('d-none')
                    $("#gender").html(data.gender_name)
                }

                if (data.product_ean_code != null && data.product_ean_code != '') {
                    $("#ean_div").removeClass('d-none')
                    $("#ean").html(data.product_ean_code)
                } else {
                    $("#ean_div").addClass('d-none')
                    $("#ean").html(data.product_ean_code)
                }

                if (data.shape_name != null && data.shape_name != '') {
                    $("#shape_div").removeClass('d-none')
                    $("#shape").html(data.shape_name)
                } else {
                    $("#shape_div").addClass('d-none')
                    $("#shape").html(data.shape_name)
                }

                if (data.material_name != null && data.material_name != '') {
                    $("#material_div").removeClass('d-none')
                    $("#material").html(data.material_name)
                } else {
                    $("#material_div").addClass('d-none')
                    $("#material").html(data.material_name)
                }

                if (data.extra != null && data.extra != '') {
                    $("#extra_div").removeClass('d-none')
                    $("#extra").html(data.extra)
                } else {
                    $("#extra_div").addClass('d-none')
                    $("#extra").html(data.extra)
                }

                if (data.dispatch_from != null && data.dispatch_from != '') {
                    $("#dispatch_div").removeClass('d-none')
                    $("#dispatch").html(data.dispatch_from)
                } else {
                    $("#dispatch_div").addClass('d-none')
                    $("#dispatch").html(data.dispatch_from)
                }


                // $(".my-gallery").html('')
                $(".swiper-wrapper").html('')
                var imgs = data.all_imgs;
                var gallery_thumb = ``;
                var gallery_top = ``;
                var imgLength = 0;

                for (var i = 0; i < imgs.length; i++) {
                    if (imgs[i] != null) {
                        imgLength++
                        if (!isValidURL(imgs[i])) {

                            gallery_thumb += `<div class="carousel-cell carousel-cell-thumb">
                                                <img src="${insertAtPosition(imgs[i])}" alt="${insertAtPosition(imgs[i])}" >
                                            </div>`

                            gallery_top += `<div class="carousel-cell" id="dynamic_${i+1}">
                                                <a class="carousel-href" data-src="${root+imgs[i]}">
                                                    <img src="${root+insertAtPosition(imgs[i],'med')}" alt="${insertAtPosition(imgs[i])}" class="proSlideImg">
                                                </a>
                                            </div>`

                        } else {

                            gallery_thumb += `<div class="carousel-cell carousel-cell-thumb">
                                                <img src="${imgs[i]}" alt="${imgs[i]}">
                                            </div>`
                            gallery_top += `<div class="carousel-cell" id="${i+1}">
                                                <a class="carousel-href" data-src="${imgs[i]}">
                                                    <img src="${imgs[i]}" alt="${imgs[i]}">
                                                </a>
                                            </div>`
                        }
                    }


                }



                $html = `<div class='carousel carousel-nav'>
                            ${gallery_thumb}
                        </div>`
                $('.carousel-nav').flickity();
                $('.carousel-nav').flickity('destroy');
                $(".navi").html($html);
                $('.carousel-nav').flickity({
                    asNavFor: ".carousel-main",
                    draggable: false,
                    percentPosition: false,
                    groupCells: "100%",
                    pageDots: false,
                    wrapAround: true,
                    imagesLoaded: true,
                    verticalCells: true
                });

                $html = `<div class='carousel carousel-main' id="carouselMain">
                            ${gallery_top}
                        </div>`
                $('.carousel-main').flickity();
                $('.carousel-main').flickity('destroy');
                $(".main").html($html);
                $('.carousel-main').flickity({
                    contain: true,
                    pageDots: true,
                    wrapAround: true
                });

                if(imgLength == 1){
                    $('.flickity-slider').css('transform','translateX(0px) !important');
                }

                lightGallery(document.getElementById("carouselMain"),{
                    download: false,
                    actualSize:false,
                    selector: '.carousel-href'
                })


            }

        }

        var root = "{{ asset('') }}";

        function changeProDetail(id, type, parent_id) {
            var data = product.find(item => item.id == id)
            if (data.length != 0) {
                $('.last-product-' + parent_id).removeClass('active-product last-product')
                $("#href_" + type + parent_id + "_" + id).addClass('active-product last-product')
                if (data.id != id) {
                    $("#href_" + type + parent_id + "_" + current_prod_id).removeClass('active-product')
                }
                if (!isValidURL(data.photo)) {
                    $("#" + type + "pro_img_" + parent_id).attr('src', root + insertAtPosition(data.photo, 'med'))
                } else {
                    $("#" + type + "pro_img_" + parent_id).attr('src', data.photo)
                }
                $("#" + type + "brand_name_" + parent_id).html(data.brand_name)
                $("#" + type + "pro_model_" + parent_id).html(
                    "<a class='text-dark link-primary' href='{{ url('product-detail') }}/" + data.slug + "'>" + data
                    .title + "</a>")
                $("#" + type + "pro_price_" + parent_id).html(price(data))
                $("#" + type + "pro_discount_" + parent_id).html("%" + data.discount)
            }

        }

        function hoverImage(id) {
            $(".swiper-slide").removeClass('swiper-slide-active')
            $("#" + id).addClass('swiper-slide-active')
        }

        function changeActive(data, id, type, parent_id) {
            $('.last-product-' + parent_id).removeClass('active-product last-product')
            $("#href_" + type + parent_id + "_" + id).addClass('active-product last-product')
            if (data.id != id) {
                $("#href_" + type + parent_id + "_" + current_prod_id).removeClass('active-product')
            }

        }
        var noError = true;
        //update price on update qty
        function changePriceQty(qty) {
            var product_price = $("#current_product_price").val()
            var total_price = product_price * qty;
            if (qty > stock) {
                swal({
                    title: "Oops!",
                    text: "Product Stock not available",
                    icon: "error",
                    buttons: true,
                })
                $("#addToCart").attr('onsubmit', 'return false')
            } else {
                $("#addToCart").attr('onsubmit', '')
            }

            $(".productPrice").html('<b>' + symbol + ' ' + total_price.toFixed(2) + '</b>')
            $("#product_price").val(total_price.toFixed(2))
            $("#product_qty").val(qty)
        }

        function increaseValue() {
            var value = parseInt(document.getElementById('quantity').value, 10);
            value = isNaN(value) ? 0 : value;
            if (value >= stock) {
                $("#quantity").val(stock)
                swal({
                    title: "Oops!",
                    text: "Product Stock not available",
                    icon: "error",
                    buttons: true,
                })
                $("#addToCart").attr('onsubmit', 'return false')
                value = value - 1
                return false
            } else {
                $("#addToCart").attr('onsubmit', '')
                value++;
            }
            changePriceQty(value)
            document.getElementById('quantity').value = value;
        }

        function decreaseValue() {
            var value = parseInt(document.getElementById('quantity').value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            if (value == 0) {
                swal({
                    title: "Oops!",
                    text: "Product Quantity can not be 0",
                    icon: "error",
                    buttons: true,
                })
                return false;
                $("#addToCart").attr('onsubmit', 'return false')
            } else {
                $("#addToCart").attr('onsubmit', '')
            }

            changePriceQty(value)
            document.getElementById('quantity').value = value;
        }

        $("#quantity").on('keyup', function() {
            if ($(this).val() > stock) {
                swal({
                    title: "Oops!",
                    text: "Product Stock not available",
                    icon: "error",
                    buttons: true,
                })
                $("#quantity").val(stock)
                return false
            }
        })



    </script>
@endpush
