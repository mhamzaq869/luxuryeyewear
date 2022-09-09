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
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!--new css-->

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.min.css'>

  <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6307344bf4696f0019bda34f&product=inline-share-buttons" async="async"></script>
  <!--new css end -->
