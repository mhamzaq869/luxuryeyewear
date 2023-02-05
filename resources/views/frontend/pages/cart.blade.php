@extends('frontend.layouts.master')

@section('title', 'Cart Page')

@section('main-content')

    <!-- Breadcrumbs -->



    <section>
        <div class="cart_section">
            <div class="container">
                @if (count($carts) != 0)
                    <div class="cart_content">
                        <div class="cart_heading">
                            <h2 class="lgTitle darkColor text-center">cart</h2>
                        </div>
                        <div class="cart_content_item">
                            <div class="table_desc">
                                <div class="cart_page">
                                    <div class="page_speed_2031997945">
                                        <div class="table-responsive">
                                            <table class="table page_speed_978584358">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" class="product_thumb w-25">Image</th>
                                                        <th scope="col" class="product_name" style="width:70%">Product
                                                        </th>
                                                        <th scope="col" class="product-price">Price</th>
                                                        <th scope="col" class="product_quantity">Quantity</th>
                                                        <th scope="col" class="product_total">Total</th>
                                                        <th scope="col" class="">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cart_item_list">

                                                    <form action="{{ route('cart.update') }}" method="POST">

                                                        @csrf


                                                        @if (count($carts) != 0)

                                                            @foreach ($carts as $key => $cart)
                                                                <tr>
                                                                    {{-- {{dd($cart)}} --}}
                                                                    @php $photo = explode(',', $cart->photo); @endphp

                                                                    <td class="image" data-title="No">
                                                                        <img src="{{ asset($photo[0]) }}"
                                                                            alt="{{ asset($photo[0]) }}" class="w-50">
                                                                    </td>

                                                                    <td class="product-des" data-title="Description">

                                                                        <p class="product-name"><a
                                                                                href="{{ route('product-detail', $cart->slug) }}"
                                                                                target="_blank">{{ $cart->title }}</a>
                                                                        </p>

                                                                        <p class="product-des">

                                                                            {{-- {!! $cart->summary !!}</p> --}}

                                                                    </td>

                                                                    <td class="price" data-title="Price">
                                                                        <span
                                                                            id="cart_pro_price_{{ $cart->id }}"></span>
                                                                    </td>

                                                                    <td class="qty" data-title="Qty">


                                                                        <input type="number"
                                                                            name="quant[{{ $key }}]"
                                                                            class="form-control" min="1"
                                                                            max="100" value="{{ $cart->quantity }}">

                                                                        <input type="hidden" name="qty_id[]"
                                                                            value="{{ $cart->id }}">


                                                                        <!--/ End Input Order -->

                                                                    </td>

                                                                    <td class="total-amount cart_single_price"
                                                                        data-title="Total">
                                                                        <span class="money"
                                                                            id="cart_pro_total_price_{{ $cart->id }}"></span>
                                                                    </td>



                                                                    <td class="action" data-title="Remove">
                                                                        <a class="btn btn-danger"
                                                                            href="{{ route('cart-delete', $cart->id) }}">
                                                                            Remove
                                                                        </a>
                                                                    </td>

                                                                </tr>
                                                            @endforeach

                                                            <track>

                                                            <td></td>

                                                            <td></td>

                                                            <td></td>

                                                            <td></td>

                                                            <td></td>

                                                            <td class="float-right">
                                                                <button class="btn btn-dark" type="submit">Update</button>
                                                            </td>

                                                            </track>
                                                        @else
                                                            <tr>

                                                                <td class="text-center">

                                                                    There are no any carts available. <a
                                                                        href="{{ route('product-grids') }}"
                                                                        style="color:blue;">Continue shopping</a>


                                                                </td>

                                                            </tr>

                                                        @endif



                                                    </form>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="coupon_area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="coupon_code left">
                                            <h3>Coupon</h3>
                                            <div class="coupon_inner">
                                                <p>Enter your coupon code if you have one.</p>
                                                <div class="row">
                                                    <form action="{{ route('coupon.discount') }}" method="POST"
                                                        id="couponForm">
                                                        @csrf

                                                        <div class="col">
                                                            @if (session()->has('error'))
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ session()->get('error') }}</strong>
                                                                </span>
                                                            @endif
                                                            <input class="form-control" name="code"
                                                                placeholder="Enter Your Coupon" type="text">

                                                        </div>
                                                        <div class="col-auto mt-2">
                                                            <button type="submit" class="btn btn-dark h-100">Apply
                                                                coupon</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ============ --}}


                                    @php

                                        $total_amount = Helper::totalCartPrice() + $total_shipping;
                                        if (session()->has('coupon')) {
                                            $total_amount = $total_amount - Session::get('coupon')['value'];
                                        }

                                    @endphp
                                    {{-- Cart Totals --}}
                                    <div class="col-lg-6 col-md-6">
                                        {{-- right --}}
                                        <div class="coupon_code right">

                                            <h3>Cart Totals</h3>

                                            <ul style="line-height:2">

                                                <li class="order_shipping">
                                                    Shipping <span id="cart_shipping"></span>
                                                </li>


                                                @if (session()->has('coupon'))
                                                    <li class="order_subtotal">
                                                        Subtotal <span id="order_subtotal"></span>
                                                    </li>
                                                    <li class="coupon_price">You
                                                        Save <span id="coupon_price"></span>
                                                    </li>
                                                @else
                                                    <li class="order_subtotal">
                                                        Subtotal <span id="order_subtotal"></span>
                                                    </li>
                                                @endif



                                                @if (session()->has('coupon'))
                                                    <li class="last">You Pay <span id="order_total_price"></span></li>
                                                @else
                                                    <li class="last">You Pay <span id="order_total_price"></span></li>
                                                @endif

                                                @if (session()->has('coupon'))
                                                    <li class="coupon_price">Coupon
                                                        <span class="badge badge-warning">
                                                            {{ Session::get('coupon')['code'] }}
                                                            <a href="{{ route('coupon.remove.discount') }}"
                                                                class="text-dark ml-3"
                                                                style="padding-left: 15px; border-left: 1px"><i
                                                                    class="fa fa-times" aria-hidden="true"></i></a>
                                                        </span>

                                                    </li>
                                                @endif
                                            </ul>

                                            <div class="button5 mt-2 p-5 text-center">

                                                <div class="row">


                                                    <div class="col-md-2"> </div>

                                                    <div class="col-md-8">
                                                        <a href="{{ route('checkout') }}"
                                                            class="btn btn-dark w-100 py-2 my-2">Checkout</a>

                                                        <a href="{{ name('/filter-product-for') }}"
                                                            class="btn btn-warning w-100 py-2">Continue shopping</a>
                                                    </div>


                                                    <div class="col-md-2"> </div>
                                                </div>

                                            </div>

                                        </div>
                                        {{-- =============== --}}

                                        {{-- right --}}

                                    </div>
                                    {{-- Cart Totals --}}

                                </div>

                            </div>

                        </div>

                    </div>
                @else
                    <div class="" style="text-align: center; margin-bottom:150px !important">
                        <img src="{{ asset('images/Capture.jpg') }}" class="w-25">
                        <h3>Your Cart is Empty!</h3>
                    </div>
                @endif
            </div>

        </div>

    </section>

    <!--section strat -->
@endsection



@push('scripts')
    <style>
        .badge {
            background-color: rgb(0, 102, 255);
            color: white;
            padding: 4px 8px;
            text-align: center;
            border-radius: 5px;
        }
    </style>
    <script src="{{ asset('frontend/js/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>

    <script>
        allproducts = @json($carts)

        total_cart = {{ isset($total_amount) ? $total_amount : 0 }}
        total_shipping = {{ isset($total_shipping) ? $total_shipping : 0 }}
        cart_subtotal = {{ isset($total_amount) ? $total_amount : 0 }}
        session_coupon = {{ isset(Session::get('coupon')['value']) ? 1 : 0 }};
        if (session_coupon) {
            session_coupon_value = {{ isset(Session::get('coupon')['value']) ? Session::get('coupon')['value'] : 0 }}
        } else {
            session_coupon_value = 0
        }


        $(document).ready(function() {
            $("select.select2").select2();
        });

        $('select.nice-select').niceSelect();

        $(document).ready(function() {

            $('.shipping select[name=shipping]').change(function() {

                let cost = parseFloat($(this).find('option:selected').data('price')) || 0;

                let subtotal = parseFloat($('.order_subtotal').data('price'));

                let coupon = parseFloat($('.coupon_price').data('price')) || 0;

                // alert(coupon);

                $('#order_total_price span').text('$' + (subtotal + cost - coupon).toFixed(2));

            });



        });

        // $("#couponForm").submit(function(e){
        //     e.preventDefault();
        //     $.ajax({
        //         url: $(this).attr('action'),
        //         type: "POST",
        //         data: new FormData(this),
        //         contentType: false,
        //         cache: false,
        //         processData: false,
        //         success: function(data) {
        //             if(data.status == true){
        //                 $.message({
        //                     type:'success',
        //                     text:data.message,
        //                     duration: 5000
        //                 });
        //             }else{
        //                 $.message({
        //                     type:'error',
        //                     text:data.message,
        //                     duration: 5000
        //                 });
        //             }
        //         },
        //         error: function(e) {
        //             console.log(e);
        //         }
        //     });
        // });
    </script>
@endpush
