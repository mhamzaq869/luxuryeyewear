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
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
</head>

<body>
    {{-- header  start --}}
    @include('frontend.layouts.header')
    {{-- header  end --}}
    @yield('main-content')



    {{-- Footer --}}
    @include('frontend.layouts.footer')
    {{-- footer --}}


    <div class="backDrop"></div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    {{-- <script src="{{ asset('assets/js/td-message.js') }}"></script> --}}
    <!--new js-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/proSlider.js') }}"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
    <script type="text/javascript" src="https://www.jqueryscript.net/demo/toast-notification-td-message/td-message.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    @stack('scripts')
    <!--new js end -->

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
    </script>
</body>

</html>
