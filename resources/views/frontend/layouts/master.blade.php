<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <!-- Meta Tag -->
    @yield('meta')

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">

    <title>@yield('title') - Luxury Eye Wear</title>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">

    <!--new css-->

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.css'>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.min.css'>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'>
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap'>

    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=6307344bf4696f0019bda34f&product=inline-share-buttons"
        async="async"></script>
    <!--new css end -->
    {{-- <link href="{{asset('assets/css/td-messages.css')}}" rel="stylesheet"> --}}
    <link rel='stylesheet' href='https://www.jqueryscript.net/demo/toast-notification-td-message/td-msessage.css'>


    <style>
        /* ===== Scrollbar CSS ===== */
        /* Firefox */
        .brands_list {
            scrollbar-width: auto;
            scrollbar-color: #e5c580 #ffffff;
        }

        /* Chrome, Edge, and Safari */
        .brands_list::-webkit-scrollbar {
            width: 15px;
            height: 10px
        }

        .brands_list::-webkit-scrollbar-track {
            background: #ffffff;
        }

        .brands_list::-webkit-scrollbar-thumb {
            background-color: #e5c580;
            border-radius: 10px;
            border: 3px solid #ffffff;
        }

        .hover-product:hover {
            border: 1px solid rgba(255, 166, 0, 0.521);
        }

        .active-product {
            border: 1px solid orange;
        }

        .color_builts ul li a img {
            max-width: 60px !important;
        }

        .active-product-link img {
            border: 1px solid orange;
        }

        .notfiyMail {
            height: 45px;
            border: 1px solid black;
        }

        .notfiyMail:focus {
            border-color: #9a9a9b;
            box-shadow: 0 0 0 0.25rem rgb(16 16 16 / 25%)
        }

        .link-primary:hover {
            color: #4285F4 !important
        }

        .text-end {
            text-align: end !important
        }


        .thumbnail_images ul {
            list-style: none;
            justify-content: center;
            display: flex;
            align-items: center;
            margin-top: 10px
        }

        .thumbnail_images ul li {
            margin: 5px;
            padding: 10px;
            border: 2px solid #eee;
            cursor: pointer;
            transition: all 0.5s
        }

        .thumbnail_images ul li:hover {
            border: 2px solid #000
        }

        .zoom_in {
            margin: 100px;
            transition: transform 0.25s ease;
            cursor: zoom-in;
            top: 15%;
            left: 20%;
        }

        .zoom_out {
            transform: scale(3);
            transition: transform 0.25s ease;
            left: 30%;
            top: 30%;
            cursor: zoom-out;
        }

        .w-25 {
            width: 25% !important;
        }

        .form-control:focus {
            color: #212529;
            background-color: #fff;
            border-color: #000000;
            outline: 0;
            box-shadow: none;
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
            color: #080808 !important;
        }

        .select2-container--default .select2-selection--single {
            background-color: #F6F7FB !important;
            border: 0px !important;
        }

        .select2-selection__rendered {
            line-height: 46px !important;
        }

        .select2-container .select2-selection--single {
            height: 46px !important;
        }

        .select2-selection__arrow {
            height: 46px !important;
        }

        /** Loader */
        .loader_bg {
            position: fixed;
            z-index: 999999;
            background: #fff;
            width: 100%;
            height: 100%;
        }

        .loader {
            border: 0 soild transparent;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            position: absolute;
            top: calc(50vh - 75px);
            left: calc(50vw - 75px);
        }

        .loader:before,
        .loader:after {
            content: '';
            border: 1em solid #ff5733;
            border-radius: 50%;
            width: inherit;
            height: inherit;
            position: absolute;
            top: 0;
            left: 0;
            animation: loader 2s linear infinite;
            opacity: 0;
        }

        .loader:before {
            animation-delay: .5s;
        }

        @keyframes loader {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                transform: scale(1);
                opacity: 0;
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css"
        integrity="sha512-+1GzNJIJQ0SwHimHEEDQ0jbyQuglxEdmQmKsu8KI7QkMPAnyDrL9TAnVyLPEttcTxlnLVzaQgxv2FpLCLtli0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="loader_bg ">
        <div class="loader"></div>
    </div>

    {{-- header  start --}}
    <header>
        <div class="headerCol">
            <div class="container">
                <div class="header_content">
                    <div class="row align-items-center g-2">
                        <div class="col-auto">
                            <div class="header_logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/images/luxury_logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="header_nav_links">
                                <ul class="header_nav_links_style ">
                                    <li class="mDropdownCol">
                                        <a href="{{ route('front.eyeglass.page') }}">Eyeglasses</a>
                                        <div class="mDDCol">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mDDContent brands_navbar d-none">
                                                        <h4 class="mDDTitle">Brands</h4>
                                                        <ul class="mDDList brands_list"
                                                            style="height: 450px; overflow-y:scroll;">
                                                            @php
                                                                $brands = DB::table('brands')
                                                                    ->whereIn(
                                                                        'id',
                                                                        \App\Models\Product::with('cat_info')
                                                                            ->pluck('brand_id')
                                                                            ->unique()
                                                                            ->flatten(),
                                                                    )
                                                                    ->get();
                                                            @endphp
                                                            <ul class="mDDList brands_list"
                                                                style="overflow:scroll; width:fit-content;  /*white-space: nowrap;*/">
                                                                <li><a href="javascript:void(0)">All Brands</a></li>
                                                                @foreach ($brands as $brand)
                                                                    <li><a
                                                                            href="{{ url('product-brand/' . $brand->slug) }}">{{ $brand->title }}</a>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mDDContent">
                                                        <h4 class="mDDTitle"
                                                            onclick="redirect('{{ route('front.eyeglass.page', ['men']) }}')">
                                                            Male Eyeglasses</h4>
                                                        <ul class="mDDList">
                                                            <li><a href="javascript:void(0)">All Brands</a></li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.eyeglass.page', ['men', 'round']) }}')">Round</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.eyeglass.page') }}')">Unisex</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.eyeglass.page', ['men', 'Square']) }}')">Square</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.eyeglass.page', ['men', 'Aviator']) }}')">Aviator</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.eyeglass.page', ['men', 'Sports']) }}')">Sports</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.eyeglass.page', ['men', 'Cat-Eye']) }}')">Cat-Eye</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mDDContent">
                                                        <h4 class="mDDTitle"
                                                            onclick="redirect('{{ route('front.eyeglass.page', ['women']) }}')">
                                                            Female Eyeglasses </h4>
                                                        <ul class="mDDList">
                                                            <li><a href="javascript:void(0)">All Brands</a></li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.eyeglass.page', ['women', 'Round']) }}')">Round</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.eyeglass.page') }}')">Unisex</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.eyeglass.page', ['women', 'Square']) }}')">Square</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.eyeglass.page', ['women', 'Aviator']) }}')">Aviator</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.eyeglass.page', ['women', 'Sports']) }}')">Sports</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.eyeglass.page', ['women', 'Cat-Eye']) }}')">Cat-Eye</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mDDContent">
                                                        <h4 class="mDDTitle">Child Eyeglasses</h4>
                                                        <ul class="mDDList">
                                                            <li><a href="javascript:void(0)">All Brands</a></li>
                                                            <li><a href="javascript:void(0)">Round</a></li>
                                                            <li><a href="javascript:void(0)">Unisex</a></li>
                                                            <li><a href="javascript:void(0)">Square</a></li>
                                                            <li><a href="javascript:void(0)">Aviator</a></li>
                                                            <li><a href="javascript:void(0)">Sports</a></li>
                                                            <li><a href="javascript:void(0)">Cat-Eye</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mDropdownCol">
                                        <a href="{{ route('front.sunglass.page') }}">Sunglasses</a>
                                        <div class="mDDCol">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mDDContent brands_navbar d-none ">
                                                        <h4 class="mDDTitle">Brands</h4>
                                                        <ul class="mDDList brands_list"
                                                            style="height: 450px; overflow-y:scroll;">

                                                            <ul class="mDDList brands_list"
                                                                style="overflow-y:scroll;width:fit-content;  /*white-space: nowrap;*/">
                                                                <li><a href="javascript:void(0)">All Brands</a></li>
                                                                @foreach ($brands as $brand)
                                                                    <li><a
                                                                            href="{{ url('product-brand/' . $brand->slug) }}">{{ $brand->title }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                    </div>



                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mDDContent">
                                                        <h4 class="mDDTitle"
                                                            onclick="redirect('{{ route('front.sunglass.page', ['men']) }}')">
                                                            Male Sunglasses</h4>
                                                        <ul class="mDDList">
                                                            <li><a href="javascript:void(0)">All Brands</a></li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.sunglass.page', ['men', 'Round']) }}')">Round</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.sunglass.page') }}')">Unisex</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.sunglass.page', ['men', 'Square']) }}')">Square</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.sunglass.page', ['men', 'Aviator']) }}')">Aviator</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.sunglass.page', ['men', 'Sports']) }}')">Sports</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.sunglass.page', ['men', 'Cat-Eye']) }}')">Cat-Eye</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mDDContent">
                                                        <h4 class="mDDTitle"
                                                            onclick="redirect('{{ route('front.sunglass.page', ['women']) }}')">
                                                            Female Sunglasses</h4>
                                                        <ul class="mDDList">
                                                            <li><a href="javascript:void(0)">All Brands</a></li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.sunglass.page', ['women', 'Round']) }}')">Round</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.sunglass.page') }}')">Unisex</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.sunglass.page', ['women', 'Square']) }}')">Square</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.sunglass.page', ['women', 'Aviator']) }}')">Aviator</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.sunglass.page', ['women', 'Sports']) }}')">Sports</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('{{ route('front.sunglass.page', ['women', 'Cat-Eye']) }}')">Cat-Eye</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mDDContent">
                                                        <h4 class="mDDTitle">Child Eyeglasses</h4>
                                                        <ul class="mDDList">
                                                            <li><a href="javascript:void(0)">All Brands</a></li>
                                                            <li><a href="javascript:void(0)">Round</a></li>
                                                            <li><a href="javascript:void(0)">Unisex</a></li>
                                                            <li><a href="javascript:void(0)">Square</a></li>
                                                            <li><a href="javascript:void(0)">Aviator</a></li>
                                                            <li><a href="javascript:void(0)">Sports</a></li>
                                                            <li><a href="javascript:void(0)">Cat-Eye</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.brands.page') }}">Brands</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-auto nav-responsive">
                            <div class="header_right_link_icon">
                                <ul class="header_right_link_icon_style">
                                    <li>
                                        <div class="headerSearchCol">
                                            <a href="javascript:void(0)" class="searchTrigger">
                                                <img src="{{ asset('assets/./images/search-icon.svg') }}"
                                                    alt="Image Not Found"></a>
                                            <div class="headerFldCol">
                                                <div class="headerSearchFld">
                                                    <div class="container-fluid">
                                                        <div class="row g-2 align-items-center">
                                                            <div class="col">
                                                                <form action="{{ route('product.search') }}"
                                                                    method="get"
                                                                    class="topmenusearch page_speed_1450106835">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Search Products..."
                                                                        name="search" id="search_keyword"
                                                                        required="">
                                                                </form>
                                                            </div>
                                                            <div class="col-auto">
                                                                <span class="searchCloseTrigger">
                                                                    <img src="{{ asset('assets/images/close-icon.svg') }}"
                                                                        alt="...">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropchoose">

                                        @auth
                                            <a href="{{ route('user') }}"><img
                                                    src="{{ asset('assets/./images/login.png') }}"
                                                    alt="Image Not Found"></a>
                                        @else
                                            <a href="{{ route('login.form') }}"><img
                                                    src="{{ asset('assets/./images/login.png') }}"
                                                    alt="Image Not Found"></a>
                                        @endauth

                                    </li>
                                    <li>
                                        <a href="{{ route('wishlist') }}"><img
                                                src="{{ asset('assets/./images/like-icon.svg') }}"
                                                alt="Image Not Found"></a>


                                        {{ DB::table('wishlists')->where('user_id', request()->ip())->count() }}

                                    </li>
                                    <li>
                                        <a href="{{ route('cart') }}"><img
                                                src="{{ asset('assets/./images/cart-icon.svg') }}"
                                                alt="Image Not Found"></a>
                                        {{-- @auth --}}
                                        {{ DB::table('carts')->where('user_id', request()->ip())->where('order_id', null)->count() }}
                                        {{-- @else
                           0
                           @endauth --}}

                                    </li>
                                    <li class="d-lg-none">
                                        <a href="javascript:void(0)" class="navTrigger"><img
                                                src="{{ asset('assets/images/nav-toggle.svg') }}"
                                                alt="Image Not Found"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <style type="text/css">
        .header_nav_links_style ul.mDDList li a {
            text-align: left;
        }
    </style>


    @yield('main-content')

    @include('modals.newsletter')

    <footer>
        <div class="footer_section" style="padding-left: 0% !important">
            <div class="footer_fade"></div>
            <div class="container">
                <div class="newsletter_content newsletter_space_section">
                    <h2 class="whiteColor">NEWSLETTER</h2>
                    <p class="whiteColor">Once you subscribe to our newsletter, we will send our promo offers and news
                        to
                        your email.</p>
                    <div class="subscribe_col">
                        <form action="{{ route('subscribe') }}" method="post" class="newsletter-inner">
                            @csrf

                            <input name="email" placeholder="Your email address" required="" type="email"
                                class="sub_input_style">
                            <button class="sub_btn_style" type="submit">SUBSCRIBE US</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bottom_footer darkBGColor">
                <div class="container">
                    <div class="row gy-5">
                        <div class="col-xl-auto col-lg-12 col-sm-12 ">
                            <div class="foot_logo_content">
                                <div class="footer_logo">
                                    <a href="index.html"><img src="{{ asset('assets/images/luxuryeyewear.png') }}"
                                            alt="..."></a>
                                </div>
                                <p class="whiteColor">{!! $site_setting->short_des !!}</p>
                                <ul class="foot_social_icon">
                                    <li><a href="javascript:void(0)"><img
                                                src="{{ asset('assets/./images/foot_facebook_icon.svg') }}"
                                                alt="..."></a></li>
                                    <li><a href="javascript:void(0)"><img
                                                src="{{ asset('assets/./images/foot_twitter_icon.svg') }}"
                                                alt="..."></a></li>
                                    <li><a href="javascript:void(0)"><img
                                                src="{{ asset('assets/./images/foot_instagram_icon.svg') }}"
                                                alt="..."></a></li>
                                    <li><a href="javascript:void(0)"><img
                                                src="{{ asset('assets/./images/foot_linkedin_icon.svg') }}"
                                                alt="..."></a></li>
                                    <li><a href="javascript:void(0)"><img
                                                src="{{ asset('assets/./images/foot_youtube_icon.svg') }}"
                                                alt="..."></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="footer_imp_links">
                                <div class="row gy-5">
                                    <div class="col-sm col-lg">
                                        <div class="imp_links_col">
                                            <div class="imp_link_head">
                                                <h3 class="foot_link_head_style">Quick Links</h3>
                                            </div>
                                            <ul class="foot_link_list">

                                                <li><a href="{{ route('order.track') }}">Track Order</a></li>
                                                <li><a href="{{ route('return.and.exchange') }}">Return & Exchange</a>
                                                </li>
                                                <li><a href="{{ route('shipping.policy') }}">Shipping Policy</a></li>
                                                <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm col-lg">
                                        <div class="imp_links_col">
                                            <div class="imp_link_head">
                                                <h3 class="foot_link_head_style">usefull links</h3>
                                            </div>
                                            <ul class="foot_link_list">
                                                <li><a href="{{ route('home') }}">home</a></li>
                                                <li><a href="{{ route('about-us') }}">about us</a></li>
                                                <li><a href="{{ route('contact') }}">contact us</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-auto">
                                        <div class="imp_links_col add_cont">
                                            <div class="imp_link_head">
                                                <h3 class="foot_link_head_style">Get In Touch</h3>
                                            </div>
                                            <ul class="foot_link_list contact">
                                                @foreach (explode('|', $site_setting->address) as $address)
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            {{ $address }}
                                                        </a>
                                                    </li>
                                                @endforeach

                                                @foreach (explode('|', $site_setting->phone) as $phone)
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ asset('assets/./images/phone-icon.svg') }}"
                                                                alt="{{ $phone }}">{{ $phone }}</a>
                                                    </li>
                                                @endforeach

                                                @foreach (explode('|', $site_setting->email) as $email)
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ asset('assets/./images/email_icon.svg') }}"
                                                                alt="{{ $email }}">{{ $email }}
                                                        </a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="copyright_col">
                        <div class="row align-items-center gy-4">
                            <div class="col-xl col-lg-12 ">
                                <div class="courier_logo justify-content-center">
                                    <ul>
                                        <li><a href="javascript:void(0)"><img
                                                    src="{{ asset('assets/./images/dhl_icon.png') }}"
                                                    alt="..."></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><img
                                                    src="{{ asset('assets/./images/fedex_icon.png') }}"
                                                    alt="..."></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><img
                                                    src="{{ asset('assets/./images/ups_icon.png') }}"
                                                    alt="..."></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><img
                                                    src="{{ asset('assets/./images/aramex_icon.png') }}"
                                                    alt="..."></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-auto col-lg-12">
                                <div class="payment_method_logo">
                                    <ul>
                                        <li><a href="javascript:void(0)"><img
                                                    src="{{ asset('assets/./images/visa.png') }}" alt="..."></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><img
                                                    src="{{ asset('assets/./images/mastercard.png') }}"
                                                    alt="..."></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><img
                                                    src="{{ asset('assets/./images/american-express.png') }}"
                                                    alt="..."></a></li>
                                        <li><a href="javascript:void(0)"><img
                                                    src="{{ asset('assets/./images/paypal.png') }}"
                                                    alt="..."></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-auto col-md-12 order-xl-first">
                                <p class="mb-xl-0">Copyright © {{ date('Y') }} by luxuryeyewear. All Rights
                                    reserved
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>


    <div class="backDrop"></div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    {{-- <script src="{{ asset('assets/js/td-message.js') }}"></script> --}}
    <!--new js-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/proSlider.js') }}"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://www.jqueryscript.net/demo/toast-notification-td-message/td-message.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="//geoip-js.com/js/apis/geoip2/v2.1/geoip2.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js" ></script>
    <!--new js end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        var swiper = new Swiper(".logoSwiper", {
            autoplay: {
                delay: 2400,
                disableOnInteraction: false,
            },
            slidesPerView: 1,
            spaceBetween: 5,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                375: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                480: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                1200: {
                    slidesPerView: 5,
                    spaceBetween: 10,
                },
            },
        });

        $(document).ready(function() {


            if ($('.bbb_viewed_slider').length) {
                var viewedSlider = $('.bbb_viewed_slider');

                viewedSlider.owlCarousel({
                    loop: true,
                    margin: 30,
                    autoplay: true,
                    autoplayTimeout: 6000,
                    nav: false,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        575: {
                            items: 2
                        },
                        768: {
                            items: 3
                        },
                        991: {
                            items: 4
                        },
                        1199: {
                            items: 6
                        }
                    }
                });

                if ($('.bbb_viewed_prev').length) {
                    var prev = $('.bbb_viewed_prev');
                    prev.on('click', function() {
                        viewedSlider.trigger('prev.owl.carousel');
                    });
                }

                if ($('.bbb_viewed_next').length) {
                    var next = $('.bbb_viewed_next');
                    next.on('click', function() {
                        viewedSlider.trigger('next.owl.carousel');
                    });
                }
            }


        });

        function redirect(url) {
            window.location.href = url
        }

        $("#newsletterModal").modal('show');
        function insertAtPosition($string, $med = null) {
            $stringArr = $string.split('/');
            $stringArr[5] = $stringArr[4];
            if ($med == null) {
                $stringArr[4] = 'compress';
            } else {
                $stringArr[4] = $med + '-compress';
            }
            return $stringArr.join('/');
        }


        // remove d-none class from brands navbar
        window.onload = function() {
            if (window.jQuery) {
                $(".brands_navbar").removeClass('d-none')
            }
        }

        function isValidURL(string) {
            try {
                const url = new URL(string);
                return url.protocol === 'http:' || url.protocol === 'https:';
            } catch (err) {
                return false;
            }
        };

        var swiper2 = new Swiper(".testimonialSlider", {
            spaceBetween: 30,
            effect: "fade",
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        var swiper3 = new Swiper(".bannerSlider", {
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });


        $(document).ready(function() {
            $("#brand_search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".brand_list li").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $(".newsletter-inner").on('submit', (function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data.status == true) {
                            $.message({
                                type: 'success',
                                text: data.message,
                                duration: 5000
                            });
                        } else {
                            $.message({
                                type: 'error',
                                text: data.message,
                                duration: 5000
                            });
                        }
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            }));
        });


        $("#share").jsSocials({
            shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon",
                "whatsapp"
            ]
        })

    </script>


    @include('scripts.frontend.filterJs')
    @include('scripts.frontend.currencyConvertorJs')

    @stack('scripts')
</body>

</html>
