@extends('frontend.layouts.master')

@section('title', 'Cart Page')

@section('main-content')

    <!-- Breadcrumbs -->



    <section>
        <div class="cart_section">
            <div class="container">
                @if (count(Helper::getAllProductFromCart()) != 0)
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
                                                    <th scope="col" class="product_name">Product</th>
                                                    <th scope="col" class="product-price">Price</th>
                                                    <th scope="col" class="product_quantity">Quantity</th>
                                                    <th scope="col" class="product_total">Total</th>
                                                    <th scope="col" class="">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cart_item_list">

                                                <form action="{{ route('cart.update') }}" method="POST">

                                                    @csrf

                                                    @php
                                                        $carts = Helper::getAllProductFromCart();
                                                    @endphp

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
                                                                    <span>${{ number_format($cart->price, 2) }}</span>
                                                                </td>

                                                                <td class="qty" data-title="Qty">


                                                                        <input type="number"
                                                                            name="quant[{{ $key }}]"
                                                                            class="form-control" data-min="1"
                                                                            data-max="100"
                                                                            value="{{ $cart->quantity }}">

                                                                        <input type="hidden" name="qty_id[]"
                                                                            value="{{ $cart->id }}">


                                                                    <!--/ End Input Order -->

                                                                </td>

                                                                <td class="total-amount cart_single_price"
                                                                    data-title="Total"><span
                                                                        class="money">${{ number_format($cart->price, 2) }}</span>
                                                                </td>



                                                                <td class="action" data-title="Remove">
                                                                    <a class="btn btn-danger" href="{{ route('cart-delete', $cart->id) }}">
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
                                                <form action="{{ route('coupon-store') }}" method="POST">
                                                    @csrf
                                                    <div class="col">
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


                                    $total_amount = Helper::totalCartPrice();

                                    if (session()->has('coupon')) {
                                        $total_amount = $total_amount + $carts->total_shipping - Session::get('coupon')['value'];
                                    }

                                @endphp
                                {{-- Cart Totals --}}
                                <div class="col-lg-6 col-md-6">
                                    {{-- right --}}
                                    <div class="coupon_code right">

                                        <h3>Cart Totals</h3>

                                        <ul style="line-height:2">

                                            <li class="order_shipping" data-price="{{$total_amount }}">
                                                Cart Shipping  <span>${{ number_format($carts->total_shipping, 2) }}</span>
                                             </li>

                                            <li class="order_subtotal" data-price="{{$total_amount }}">
                                                Cart Subtotal <span>${{ number_format($total_amount, 2) }}</span>
                                            </li>


                                            @if (session()->has('coupon'))
                                                <li class="coupon_price"
                                                    data-price="{{ Session::get('coupon')['value'] }}">You
                                                    Save <span>${{ number_format(Session::get('coupon')['value'], 2) }}</span>
                                                </li>
                                            @endif



                                            @if (session()->has('coupon'))
                                                <li class="last" id="order_total_price">You
                                                    Pay <span>${{ number_format($total_amount + $carts->total_shipping, 2) }}</span></li>
                                            @else
                                                <li class="last" id="order_total_price">You
                                                    Pay <span>${{ number_format($total_amount + $carts->total_shipping, 2) }}</span></li>
                                            @endif

                                        </ul>

                                        <div class="button5 mt-2 p-5 text-center">

                                            <div class="row">


                                            <div class="col-md-2"> </div>

                                            <div class="col-md-8">

                                                {{-- <script>
                                                  function initPayPalButton() {
                                                    paypal.Buttons({
                                                      style: {
                                                        shape: 'rect',
                                                        color: 'gold',
                                                        layout: 'vertical',
                                                        // label: 'checkout',
                                                      },

                                                      createOrder: function(data, actions) {
                                                        return actions.order.create({
                                                          purchase_units: [{"amount":{"currency_code":"USD","value":{{ number_format($total_amount, 2) }},"breakdown":{"item_total":{"currency_code":"USD","value":{{ number_format($total_amount, 2) }}},"shipping":{"currency_code":"USD","value":{{$carts->total_shipping}}},"tax_total":{"currency_code":"USD","value":0}}}}]
                                                        });
                                                      },

                                                      onApprove: function(data, actions) {
                                                        return actions.order.capture().then(function(orderData) {

                                                          // Full available details
                                                          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                                                          // Show a success message within this page, e.g.
                                                          const element = document.getElementById('paypal-button-container');
                                                          element.innerHTML = '';
                                                          element.innerHTML = '<h3>Thank you for your payment!</h3>';

                                                          // Or go to another URL:  actions.redirect('thank_you.html');

                                                        });
                                                      },

                                                      onError: function(err) {
                                                        console.log(err);
                                                      }
                                                    }).render('#paypal-button-container');
                                                  }
                                                  initPayPalButton();
                                                </script> --}}

                                                <a href="{{ route('checkout') }}" class="btn btn-dark w-100 py-2 my-2">Checkout</a>

                                                <a href="{{ route('product-lists') }}" class="btn btn-warning w-100 py-2">Continue shopping</a>
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
                    <img src="{{asset('images/Capture.jpg')}}" class="w-25">
                    <h3>Your Cart is Empty!</h3>
                </div>
                @endif
            </div>

        </div>

    </section>

    <!--section strat -->







    <!--section end -->







    <!-- Shopping Cart -->



    <!--/ End Shopping Cart -->









@endsection



@push('scripts')
    <script src="{{ asset('frontend/js/nice-select/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("select.select2").select2();
        });

        $('select.nice-select').niceSelect();
    </script>

    <script>
        $(document).ready(function() {

            $('.shipping select[name=shipping]').change(function() {

                let cost = parseFloat($(this).find('option:selected').data('price')) || 0;

                let subtotal = parseFloat($('.order_subtotal').data('price'));

                let coupon = parseFloat($('.coupon_price').data('price')) || 0;

                // alert(coupon);

                $('#order_total_price span').text('$' + (subtotal + cost - coupon).toFixed(2));

            });



        });
    </script>
@endpush
