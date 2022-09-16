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

                                                    @if (count(Helper::getAllProductFromCart()) != 0)

                                                        @foreach (Helper::getAllProductFromCart() as $key => $cart)
                                                            <tr>
                                                                {{-- {{dd($cart)}} --}}
                                                                @php $photo = explode(',', $cart->product['photo']); @endphp

                                                                <td class="image" data-title="No">
                                                                    <img src="{{ asset($photo[0]) }}"
                                                                        alt="{{ asset($photo[0]) }}" class="w-50">
                                                                </td>

                                                                <td class="product-des" data-title="Description">

                                                                    <p class="product-name"><a
                                                                            href="{{ route('product-detail', $cart->product['slug']) }}"
                                                                            target="_blank">{{ $cart->product['title'] }}</a>
                                                                    </p>

                                                                    <p class="product-des">

                                                                        {!! $cart['summary'] !!}</p>

                                                                </td>

                                                                <td class="price" data-title="Price">
                                                                    <span>${{ number_format($cart->product->price, 2) }}</span>
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
                                                                        class="money">${{ number_format($cart['price'], 2) }}</span>
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
                                    $carts = Helper::getAllProductFromCart();

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

                                            <li class="order_shipping" data-price="{{ Helper::totalCartPrice() }}">
                                                Cart Shipping  <span>${{ number_format($carts->total_shipping, 2) }}</span>
                                             </li>

                                            <li class="order_subtotal" data-price="{{ Helper::totalCartPrice() }}">
                                                Cart Subtotal <span>${{ number_format(Helper::totalCartPrice(), 2) }}</span>
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


                                            {{-- <a href="{{ route('checkout') }}" class="btn btn-warning">Checkout</a> --}}
                                            <div class="col-md-2"> </div>
                                            @if ($availablePaymnMethod)
                                            <div class="col-md-8">
                                                @if ($paypal = $availablePaymnMethod->where('method','paypal')->first())
                                                <div id="smart-button-container">
                                                    <div style="text-align: center;">
                                                        <div id="paypal-button-container"></div>
                                                    </div>
                                                </div>

                                                @if ($paypal->type == 'live')
                                                {{-- <script src="https://www.paypal.com/sdk/js?client-id={{$paypal->secret_key ?? ''}}&disable-funding=venmo&currency=USD" data-sdk-integration-source="integrationbuilder"></script> --}}
                                                <script src="https://www.paypal.com/sdk/js?client-id={{$paypal->secret_key ?? 'sb'}}&currency=USD&intent=capture" data-sdk-integration-source="integrationbuilder"></script>
                                                @else
                                                <script src="https://www.paypal.com/sdk/js?client-id={{$paypal->secret_key ?? 'sb'}}&currency=USD&intent=capture" data-sdk-integration-source="integrationbuilder"></script>
                                                @endif


                                                <script>
                                                const fundingSources = [
                                                    paypal.FUNDING.PAYPAL,
                                                    paypal.FUNDING.CARD
                                                    ]

                                                for (const fundingSource of fundingSources) {
                                                    const paypalButtonsComponent = paypal.Buttons({
                                                    fundingSource: fundingSource,

                                                    // optional styling for buttons
                                                    // https://developer.paypal.com/docs/checkout/standard/customize/buttons-style-guide/
                                                    style: {
                                                        shape: 'rect',
                                                        height: 40,
                                                    },

                                                    // set up the transaction
                                                    createOrder: (data, actions) => {
                                                        // pass in any options from the v2 orders create call:
                                                        // https://developer.paypal.com/api/orders/v2/#orders-create-request-body
                                                        const createOrderPayload = {
                                                            purchase_units: [
                                                                {
                                                                    amount: {
                                                                        value: {{ number_format($total_amount + $carts->total_shipping, 2) }},
                                                                    },

                                                                },
                                                            ],
                                                        }

                                                        return actions.order.create(createOrderPayload)
                                                    },

                                                    // finalize the transaction
                                                    onApprove: (data, actions) => {
                                                        const captureOrderHandler = (details) => {
                                                        const payerName = details.payer.name.given_name
                                                            console.log(details)

                                                            $.ajax({
                                                                url: "{{route('cart.order')}}",
                                                                dataType: "json",
                                                                type: "Post",
                                                                async: true,
                                                                data: {
                                                                    _token: "{{csrf_token()}}",
                                                                    user_id: "{{request()->ip()}}",
                                                                    shipping: "{{$carts->shipping_id}}",
                                                                    payment_method: 'paypal'
                                                                },
                                                                success: function (data) {

                                                                },
                                                                error: function (xhr, exception) {
                                                                    var msg = "";
                                                                    if (xhr.status === 0) {
                                                                        msg = "Not connect.\n Verify Network." + xhr.responseText;
                                                                    } else if (xhr.status == 404) {
                                                                        msg = "Requested page not found. [404]" + xhr.responseText;
                                                                    } else if (xhr.status == 500) {
                                                                        msg = "Internal Server Error [500]." +  xhr.responseText;
                                                                    } else if (exception === "parsererror") {
                                                                        msg = "Requested JSON parse failed.";
                                                                    } else if (exception === "timeout") {
                                                                        msg = "Time out error." + xhr.responseText;
                                                                    } else if (exception === "abort") {
                                                                        msg = "Ajax request aborted.";
                                                                    } else {
                                                                        msg = "Error:" + xhr.status + " " + xhr.responseText;
                                                                    }

                                                                }
                                                            });
                                                        }

                                                        return actions.order.capture().then(captureOrderHandler)
                                                    },

                                                    // handle unrecoverable errors
                                                    onError: (err) => {
                                                        console.error(
                                                        'An error prevented the buyer from checking out with PayPal',
                                                        )
                                                    },
                                                    })

                                                    if (paypalButtonsComponent.isEligible()) {
                                                    paypalButtonsComponent
                                                        .render('#paypal-button-container')
                                                        .catch((err) => {
                                                        console.error('PayPal Buttons failed to render')
                                                        })
                                                    } else {
                                                    console.log('The funding source is ineligible')
                                                    }
                                                }
                                                </script>
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
                                                @endif

                                                <a href="{{ route('product-lists') }}" class="btn btn-warning w-100 py-2">Continue
                                                    shopping</a>
                                            </div>

                                            @endif

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
