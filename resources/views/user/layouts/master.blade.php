<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    @include('user.layouts.head')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>

<body>
    {{-- header  start --}}
    @include('frontend.layouts.header')
    {{-- header  end --}}


    <section class="user-dashboard">
        <div class="container">
          <div class="side-wrap">
              <div class="left-side">
                <ul>
                    <li><a class="ls-link" href="#"><i class="fa fa-server"></i> <span> Dashboard </span></a></li>
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
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>

    <!--new js-->


    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/proSlider.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>

    @stack('scripts')
    <!--new js end -->

</body>

</html>
