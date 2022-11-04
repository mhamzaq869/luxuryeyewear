<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- Required meta tags -->
        @include('frontend.layouts.head')
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
                top:15%;
                left:20%;
            }

            .zoom_out {
                transform: scale(3);
                transition: transform 0.25s ease;
                left: 30%;
                top: 30%;
                cursor: zoom-out;
            }

            .w-25{
                width: 25% !important;
            }

            .form-control:focus{
                color: #212529;
                background-color: #fff;
                border-color: #000000;
                outline: 0;
                box-shadow:none;
            }

            .has-search .form-control-feedback{
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

            .badge-primary{
                background: #4285F4;
            }

            .badge-warning{
                background: #e5c580;
            }

            .badge-info{
                background: #26c2dd;
            }

            .badge-danger{
                background: #dc3545;
            }
            /** Loader */
        .loader_bg{
            position: fixed;
            z-index: 999999;
            background: #fff;
            width: 100%;
            height: 100%;
        }
        .loader{
            border: 0 soild transparent;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            position: absolute;
            top: calc(50vh - 75px);
            left: calc(50vw - 75px);
        }
        .loader:before, .loader:after{
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
        .loader:before{
            animation-delay: .5s;
        }
        @keyframes loader{
            0%{
                transform: scale(0);
                opacity: 0;
            }
            50%{
                opacity: 1;
            }
            100%{
                transform: scale(1);
                opacity: 0;
            }
        }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    </head>

<body>
    <div class="loader_bg ">
        <div class="loader"></div>
    </div>
    {{-- header  start --}}
    @include('frontend.layouts.header')
    {{-- header  end --}}


    <section class="user-dashboard">
        <div class="container">
          <div class="side-wrap">
              <div class="left-side">
                <ul>
                    {{-- <li><a class="ls-link" href="#"><i class="fa fa-server"></i> <span> Dashboard </span></a></li> --}}
                    <li><a class="ls-link {{request()->path() == 'user/profile' ? 'active' : ''}}" href="{{route('user-profile')}}"> <i class="fa fas fa-user"></i> <span> My Profile </span></a></li>
                    <li><a class="ls-link {{request()->path() == 'user/address' ? 'active' : ''}}" href="{{route('user.address')}}"> <i class="fa fas fa-shipping-fast"> </i><span> Shipping Address</span></a></li>
                    <li><a class="ls-link {{request()->path() == 'user/order' ? 'active' : ''}}" href="{{route('user.order.index')}}"> <i class="fa fas fa-shopping-cart"> </i><span> My Orders </span></a></li>
                    <li><a class="ls-link {{request()->path() == 'user/changePassword' ? 'active' : ''}}" href="{{route('user.change.password.form')}}"> <i class="fa fas fa-lock"></i> <span> Change Password </span></a></li>
                    <li><a class="ls-link" href="{{route('user.logout',['user'])}}"><i class="fa fa-sign-out-alt"></i> <span>Logout </span></a>
                    </li>
                </ul>
                </div>
                <div class="right-side">
                    @yield('main-content')
                </div>
            </div>
        </div>
    </section>
    {{-- Footer --}}
    @include('user.layouts.footer')
    {{-- footer --}}


    <div class="backDrop"></div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--new js end -->
    <script>
        window.onload = function() {
            if (window.jQuery) {
                $(".brands_navbar").removeClass('d-none')
            }
        }

    </script>

    @include('scripts.frontend.currencyConvertorJs')

    @stack('scripts')

</body>

</html>
