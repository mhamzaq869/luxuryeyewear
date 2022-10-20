<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <!-- Required meta tags -->
    <!-- Meta Tag -->
<?php echo $__env->yieldContent('meta'); ?>

<!-- Favicon -->
<link rel="icon" type="image/png" href="images/favicon.png">

    <title><?php echo $__env->yieldContent('title'); ?> - Luxury Eye Wear</title>
    <meta charset="utf-8">
        <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="<?php echo e(asset('backend/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/themify-icons.css')); ?>">

    <!--new css-->

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.min.css'>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap'>

    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6307344bf4696f0019bda34f&product=inline-share-buttons" async="async"></script>
    <!--new css end -->
    
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
        .select2-container--default .select2-selection--single{
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
</head>

<body>
    <div class="loader_bg ">
        <div class="loader"></div>
    </div>

    
    <header>
        <div class="headerCol">
            <div class="container">
                <div class="header_content">
                    <div class="row align-items-center g-2">
                        <div class="col-auto">
                            <div class="header_logo">
                                <a href="<?php echo e(route('home')); ?>">
                                    <img src="<?php echo e(asset('assets/images/luxury_logo.png')); ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="header_nav_links">
                                <ul class="header_nav_links_style ">
                                    <li class="mDropdownCol">
                                        <a href="<?php echo e(route('front.eyeglass.page')); ?>">Eyeglasses</a>
                                        <div class="mDDCol">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mDDContent brands_navbar d-none">
                                                        <h4 class="mDDTitle">Brands</h4>
                                                        <ul class="mDDList brands_list"
                                                            style="height: 450px; overflow-y:scroll;">
                                                            <?php
                                                                $brands = DB::table('brands')
                                                                    ->select('*')
                                                                    ->get();
                                                            ?>
                                                            <ul class="mDDList brands_list"
                                                                style="overflow:scroll; width:fit-content;  /*white-space: nowrap;*/">
                                                                <li><a href="javascript:void(0)">All Brands</a></li>
                                                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li><a
                                                                            href="<?php echo e(url('product-brand/' . $brand->slug)); ?>"><?php echo e($brand->title); ?></a>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </ul>
                                                    </div>
                                                                                    
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mDDContent">
                                                        <h4 class="mDDTitle"
                                                            onclick="redirect('<?php echo e(route('front.eyeglass.page', ['men'])); ?>')">
                                                            Male Eyeglasses</h4>
                                                        <ul class="mDDList">
                                                            <li><a href="javascript:void(0)">All Brands</a></li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.eyeglass.page', ['men', 'round'])); ?>')">Round</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.eyeglass.page')); ?>')">Unisex</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.eyeglass.page', ['men', 'Square'])); ?>')">Square</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.eyeglass.page', ['men', 'Aviator'])); ?>')">Aviator</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.eyeglass.page', ['men', 'Sports'])); ?>')">Sports</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.eyeglass.page', ['men', 'Cat-Eye'])); ?>')">Cat-Eye</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mDDContent">
                                                        <h4 class="mDDTitle"
                                                            onclick="redirect('<?php echo e(route('front.eyeglass.page', ['women'])); ?>')">
                                                            Female Eyeglasses </h4>
                                                        <ul class="mDDList">
                                                            <li><a href="javascript:void(0)">All Brands</a></li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.eyeglass.page', ['women', 'Round'])); ?>')">Round</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.eyeglass.page')); ?>')">Unisex</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.eyeglass.page', ['women', 'Square'])); ?>')">Square</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.eyeglass.page', ['women', 'Aviator'])); ?>')">Aviator</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.eyeglass.page', ['women', 'Sports'])); ?>')">Sports</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.eyeglass.page', ['women', 'Cat-Eye'])); ?>')">Cat-Eye</a>
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
                                        <a href="<?php echo e(route('front.sunglass.page')); ?>">Sunglasses</a>
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
                                                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li><a
                                                                            href="<?php echo e(url('product-brand/' . $brand->slug)); ?>"><?php echo e($brand->title); ?></a>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                    </div>



                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mDDContent">
                                                        <h4 class="mDDTitle"
                                                            onclick="redirect('<?php echo e(route('front.sunglass.page', ['men'])); ?>')">
                                                            Male Sunglasses</h4>
                                                        <ul class="mDDList">
                                                            <li><a href="javascript:void(0)">All Brands</a></li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.sunglass.page', ['men', 'Round'])); ?>')">Round</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.sunglass.page')); ?>')">Unisex</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.sunglass.page', ['men', 'Square'])); ?>')">Square</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.sunglass.page', ['men', 'Aviator'])); ?>')">Aviator</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.sunglass.page', ['men', 'Sports'])); ?>')">Sports</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.sunglass.page', ['men', 'Cat-Eye'])); ?>')">Cat-Eye</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mDDContent">
                                                        <h4 class="mDDTitle"
                                                            onclick="redirect('<?php echo e(route('front.sunglass.page', ['women'])); ?>')">
                                                            Female Sunglasses</h4>
                                                        <ul class="mDDList">
                                                            <li><a href="javascript:void(0)">All Brands</a></li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.sunglass.page', ['women', 'Round'])); ?>')">Round</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.sunglass.page')); ?>')">Unisex</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.sunglass.page', ['women', 'Square'])); ?>')">Square</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.sunglass.page', ['women', 'Aviator'])); ?>')">Aviator</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.sunglass.page', ['women', 'Sports'])); ?>')">Sports</a>
                                                            </li>
                                                            <li><a
                                                                    href="javascript:redirect('<?php echo e(route('front.sunglass.page', ['women', 'Cat-Eye'])); ?>')">Cat-Eye</a>
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
                                        <a href="<?php echo e(route('front.brands.page')); ?>">Brands</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="header_right_link_icon">
                                <ul class="header_right_link_icon_style">
                                    <li>
                                        <div class="headerSearchCol">
                                            <a href="javascript:void(0)" class="searchTrigger">
                                                <img src="<?php echo e(asset('assets/./images/search-icon.svg')); ?>"
                                                    alt="Image Not Found"></a>
                                            <div class="headerFldCol">
                                                <div class="headerSearchFld">
                                                    <div class="container-fluid">
                                                        <div class="row g-2 align-items-center">
                                                            <div class="col">
                                                                <form action="<?php echo e(route('product.search')); ?>"
                                                                    method="get"
                                                                    class="topmenusearch page_speed_1450106835">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Search Products..." name="search"
                                                                        id="search_keyword" required="">
                                                                </form>
                                                            </div>
                                                            <div class="col-auto">
                                                                <span class="searchCloseTrigger">
                                                                    <img src="<?php echo e(asset('assets/images/close-icon.svg')); ?>"
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

                                        <?php if(auth()->guard()->check()): ?>
                                            <a href="<?php echo e(route('user')); ?>"><img
                                                    src="<?php echo e(asset('assets/./images/login.png')); ?>" alt="Image Not Found"></a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('login.form')); ?>"><img
                                                    src="<?php echo e(asset('assets/./images/login.png')); ?>" alt="Image Not Found"></a>
                                        <?php endif; ?>

                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('wishlist')); ?>"><img
                                                src="<?php echo e(asset('assets/./images/like-icon.svg')); ?>"
                                                alt="Image Not Found"></a>


                                        <?php echo e(DB::table('wishlists')->where('user_id', request()->ip())->count()); ?>


                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('cart')); ?>"><img
                                                src="<?php echo e(asset('assets/./images/cart-icon.svg')); ?>"
                                                alt="Image Not Found"></a>
                                        
                                        <?php echo e(DB::table('carts')->where('user_id', request()->ip())->where('order_id',null)->count()); ?>

                                        

                                    </li>
                                    <li class="d-lg-none">
                                        <a href="javascript:void(0)" class="navTrigger"><img
                                                src="<?php echo e(asset('assets/images/nav-toggle.svg')); ?>"
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


    
    <?php echo $__env->yieldContent('main-content'); ?>

    
    <footer>
        <div class="footer_section" style="padding-left: 0% !important">
            <div class="footer_fade"></div>
            <div class="container">
                <div class="newsletter_content newsletter_space_section">
                    <h2 class="whiteColor">NEWSLETTER</h2>
                    <p class="whiteColor">Once you subscribe to our newsletter, we will send our promo offers and news to
                        your email.</p>
                    <div class="subscribe_col">
                        <form action="<?php echo e(route('subscribe')); ?>" method="post" class="newsletter-inner">
                            <?php echo csrf_field(); ?>

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
                                    <a href="index.html"><img src="<?php echo e(asset('assets/images/luxuryeyewear.png')); ?>"
                                            alt="..."></a>
                                </div>
                                <p class="whiteColor">Luxuryeyewear ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                    tincidunt ornare viverra.</p>
                                <ul class="foot_social_icon">
                                    <li><a href="javascript:void(0)"><img
                                                src="<?php echo e(asset('assets/./images/foot_facebook_icon.svg')); ?>"
                                                alt="..."></a></li>
                                    <li><a href="javascript:void(0)"><img
                                                src="<?php echo e(asset('assets/./images/foot_twitter_icon.svg')); ?>"
                                                alt="..."></a></li>
                                    <li><a href="javascript:void(0)"><img
                                                src="<?php echo e(asset('assets/./images/foot_instagram_icon.svg')); ?>"
                                                alt="..."></a></li>
                                    <li><a href="javascript:void(0)"><img
                                                src="<?php echo e(asset('assets/./images/foot_linkedin_icon.svg')); ?>"
                                                alt="..."></a></li>
                                    <li><a href="javascript:void(0)"><img
                                                src="<?php echo e(asset('assets/./images/foot_youtube_icon.svg')); ?>"
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

                                                <li><a href="<?php echo e(route('order.track')); ?>">Track Order</a></li>
                                                <li><a href="<?php echo e(route('return.and.exchange')); ?>">Return & Exchange</a></li>
                                                <li><a href="<?php echo e(route('shipping.policy')); ?>">Shipping Policy</a></li>
                                                <li><a href="<?php echo e(route('privacy.policy')); ?>">Privacy Policy</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm col-lg">
                                        <div class="imp_links_col">
                                            <div class="imp_link_head">
                                                <h3 class="foot_link_head_style">usefull links</h3>
                                            </div>
                                            <ul class="foot_link_list">
                                                <li><a href="<?php echo e(route('home')); ?>">home</a></li>
                                                <li><a href="<?php echo e(route('about-us')); ?>">about us</a></li>
                                                <li><a href="<?php echo e(route('contact')); ?>">contact us</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-auto">
                                        <div class="imp_links_col add_cont">
                                            <div class="imp_link_head">
                                                <h3 class="foot_link_head_style">Get In Touch</h3>
                                            </div>
                                            <ul class="foot_link_list contact">
                                                <li><a href="javascript:void(0)">C-12 Paryavaran Complex Ignu Road New
                                                        Delhi, Delhi - 110030, India</a></li>
                                                <li><a href="javascript:void(0)"><img
                                                            src="<?php echo e(asset('assets/./images/phone-icon.svg')); ?>"
                                                            alt="...">9990360806</a></li>
                                                <li><a href="javascript:void(0)"><img
                                                            src="<?php echo e(asset('assets/./images/email_icon.svg')); ?>"
                                                            alt="...">Support@Luxuryeyewear.In</a></li>
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
                                                    src="<?php echo e(asset('assets/./images/dhl_icon.png')); ?>" alt="..."></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><img
                                                    src="<?php echo e(asset('assets/./images/fedex_icon.png')); ?>" alt="..."></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><img
                                                    src="<?php echo e(asset('assets/./images/ups_icon.png')); ?>" alt="..."></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><img
                                                    src="<?php echo e(asset('assets/./images/aramex_icon.png')); ?>"
                                                    alt="..."></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-auto col-lg-12">
                                <div class="payment_method_logo">
                                    <ul>
                                        <li><a href="javascript:void(0)"><img src="<?php echo e(asset('assets/./images/visa.png')); ?>"
                                                    alt="..."></a></li>
                                        <li><a href="javascript:void(0)"><img
                                                    src="<?php echo e(asset('assets/./images/mastercard.png')); ?>" alt="..."></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><img
                                                    src="<?php echo e(asset('assets/./images/american-express.png')); ?>"
                                                    alt="..."></a></li>
                                        <li><a href="javascript:void(0)"><img
                                                    src="<?php echo e(asset('assets/./images/paypal.png')); ?>" alt="..."></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-auto col-md-12 order-xl-first">
                                <p class="mb-xl-0">Copyright © <?php echo e(date('Y')); ?> by luxuryeyewear. All Rights reserved
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
    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    
    <!--new js-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>

    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/proSlider.js')); ?>"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
    <script type="text/javascript" src="https://www.jqueryscript.net/demo/toast-notification-td-message/td-message.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="//geoip-js.com/js/apis/geoip2/v2.1/geoip2.js" type="text/javascript"></script>


    <!--new js end -->

    <script>
        var symbol = "";
        var convertPriceVal = "";
        var countryCode = "";
        var allproducts = "";
        var total_shipping = 0;
        var cart_subtotal = 0;
        var session_coupon = false;
        var session_coupon_value = 0;
        var total_cart = 0;
        var type = "";
        var root = "<?php echo e(asset('')); ?>";
        var current_url = window.location.href;
        var female_eyeglass = [];
        var female_sunglasses = [];
        var male_eyeglasses = [];
        var male_sunglasses = [];

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

        function redirect(url){
            window.location.href = url
        }

        function insertAtPosition($string,$med=null) {
            $stringArr = $string.split('/');
            $stringArr[5] = $stringArr[4];
            if($med == null){
                $stringArr[4] = 'compress';
            }else{
                $stringArr[4] = $med+'-compress';
            }
            return $stringArr.join('/');
        }

        $("#share").jsSocials({
            shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
        });


        $("#min_price,#max_price").keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                filter_product_for('search_filter')
            }
        })

        $("#search").keypress(function(){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                filter_product_for('search_filter')
            }
        })
        /* Function for Product For(Man,Woman,Junior) */
        function filter_product_for(filter_type,price=null) {
            var min_price = $('#min_price').val();
            var max_price = $('#max_price').val();
            var search_product = $('#search').val();

            if(min_price != null || max_price != null){
                if(price != null){
                    var maxmin = price.split('-')
                    min_price = maxmin[0]
                    max_price = maxmin[1]
                }
            }
            // console.log($(this).val())
            $('.min_price').val(min_price);
            $('.max_price').val(max_price);
            $('.search_product').val(search_product);

            var brand = document.getElementsByName('brands[]');
            var brand_array = "";
            for (var i = 0, n = brand.length; i < n; i++) {
                if (brand[i].checked) {
                    brand_array += "," + brand[i].value;
                }
            }
            if (brand_array) brand_array = brand_array.substring(1);
            $('.brands').val(brand_array);

            var gender = document.getElementsByName('genders[]');
            var gender_array = "";
            for (var i = 0, n = gender.length; i < n; i++) {
                if (gender[i].checked) {
                    gender_array += "," + gender[i].value;
                }
            }
            if (gender_array) gender_array = gender_array.substring(1);
            $('.genders').val(gender_array);
            console.log(gender_array)

            var shape = document.getElementsByName('shapes[]');
            var shape_array = "";
            for (var i = 0, n = shape.length; i < n; i++) {
                if (shape[i].checked) {
                    shape_array += "," + shape[i].value;
                }
            }
            if (shape_array) shape_array = shape_array.substring(1);
            $('.shapes').val(shape_array);

            var frame = document.getElementsByName('frames[]');
            var frame_array = "";
            for (var i = 0, n = frame.length; i < n; i++) {
                if (frame[i].checked) {
                    frame_array += "," + frame[i].value;
                }
            }
            if (frame_array) frame_array = frame_array.substring(1);
            $('.frames').val(frame_array);

            var material = document.getElementsByName('materials[]');
            var material_array = "";
            for (var i = 0, n = material.length; i < n; i++) {
                if (material[i].checked) {
                    material_array += "," + material[i].value;
                }
            }
            if (material_array) material_array = material_array.substring(1);
            $('.materials').val(material_array);
             // var color = document.getElementsByName('colors[]');
            // var color_array = "";
            // for (var i=0, n=color.length;i<n;i++)
            // { if (color[i].checked){
            // color_array += ","+color[i].value;}}
            // if (color_array) color_array = color_array.substring(1);
            // $('.colors').val(color_array);

            $('.filter-form-product-for').submit();

        }

        function reset_filter_product_for() {
            $('.min_price').val('');
            $('.max_price').val('');
            $('.search_product').val('');
            $('.brands').val('');
            $('.genders').val('');
            $('.shapes').val('');
            $('.frames').val('');
            $('.materials').val('');
            $('.colors').val('');
            $('.filter-form-product-for').submit();
        }

        function reset_filter() {
            $('.min_price').val('');
            $('.max_price').val('');
            $('.search_product').val('');
            $('.genders').val('');
            $('.shapes').val('');
            $('.frames').val('');
            $('.materials').val('');
            $('.colors').val('');
            $('.filter-form').submit();
        }

        $("#show_more_brands").click(function(){
            $("#all_brands").toggle('slow');

            $(this).text(function(i, text){
                return text === "Show less" ? "Show More" : "Show less";
            })
        })

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


        $(document).ready(function(){
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
                        if(data.status == true){
                            $.message({
                                type:'success',
                                text:data.message,
                                duration: 5000
                            });
                        }else{
                            $.message({
                                type:'error',
                                text:data.message,
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


        convertPrice()

        function convertPrice()
        {
            $.get('https://ipapi.co/currency/', function(data) {
                symbol = data
                var requestURL = `https://api.exchangerate.host/convert?from=USD&to=${data}`;
                var request = new XMLHttpRequest();
                request.open('GET', requestURL);
                request.responseType = 'json';
                request.send();

                request.onload = function() {
                    var response = request.response;
                    convertPriceVal = response.result

                    if (current_url == root) {
                        $.each(female_eyeglass, function(index, value){
                            $(`#female_eyeglass_pro_price_${value.id}`).html(price(value))
                        });
                        $.each(female_sunglasses, function(index, value){
                            $(`#female_sunglass_pro_price_${value.id}`).html(price(value))
                        });
                        $.each(male_eyeglasses, function(index, value){
                            $(`#men_eyeglass_pro_price_${value.id}`).html(price(value))
                        });
                        $.each(male_sunglasses, function(index, value){
                            $(`#men_sunglass_pro_price_${value.id}`).html(price(value))
                        });
                    }else if(current_url.includes('cart')){
                        $.each(allproducts, function(index, value){
                            $("#cart_pro_price_"+value.id).html(price(value,'productPrice'))
                            $("#cart_pro_total_price_"+value.id).html(price(value))
                        });

                        $("#cart_shipping").html(priceOnly(total_shipping))
                        if(session_coupon){
                            $("#order_subtotal").html(priceOnly(cart_subtotal+session_coupon_value))
                            $("#coupon_price").html(priceOnly(session_coupon_value))
                        }else{
                            $("#order_subtotal").html(priceOnly(cart_subtotal))
                        }
                        $("#order_total_price").html(priceOnly(total_cart))

                    }else if(current_url.includes('checkout')){

                        $("#cart_shipping").html(priceOnly(total_shipping))
                        if(session_coupon){
                            $("#order_subtotal").html(priceOnly(cart_subtotal))
                            $("#coupon_price").html(priceOnly(session_coupon_value))
                        }else{
                            $("#order_subtotal").html(priceOnly(cart_subtotal))
                        }
                        $("#order_total_price").html(priceOnly(total_cart))

                    }else{
                        $.each(allproducts, function(index, value){
                            $("#"+type+value.id).html(price(value))
                        });
                    }
                    $(".loader_bg").addClass('d-none');
                }
            })


        }

        function price($details, $col=null)
        {
            return new Intl.NumberFormat('en-us', { style: 'currency', currency: symbol }).format(extraPrice($details,$col) * convertPriceVal);
        }

        function priceOnly($number)
        {
            return new Intl.NumberFormat('en-us', { style: 'currency', currency: symbol }).format($number * convertPriceVal);
        }

        function extraPrice($details,$col=null){
            $extra = <?php echo json_encode(config('currencyPrice.extra'), 15, 512) ?>;
            if($extra != null){
                $extra_amount = $extra.price ?? 0;
            }else{
                $extra_amount = 0;
            }

            if($details.dispatch_from.includes(countryCode)){
                if($col != null){
                    $price = $details[$col] + ($details.extra != null ? parseInt($details.extra) : 0) + parseInt($extra_amount);
                }else{
                    $price = $details.price + ($details.extra != null ? parseInt($details.extra) : 0) + parseInt($extra_amount);
                }
            }else{

                if($col != null){
                    $price = $details[$col] + parseInt($extra_amount);
                }else{
                    $price = $details.price + parseInt($extra_amount);
                }
            }

            return $price;
        }



    </script>


    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\eyewear\resources\views/frontend/layouts/master.blade.php ENDPATH**/ ?>