@extends('frontend.layouts.master')

@section('title', 'Checkout')

@section('main-content')

    <style>
        /*======================================
           Start Checkout Form CSS
        ========================================*/
        .shop.checkout {
            padding: 0;
            background: #fff;
            padding-top: 20px;
            padding-bottom: 50px;
        }

        .shop.checkout .checkout-form {
            margin-top: 30px;
        }

        .shop.checkout .checkout-form h2 {
            font-size: 25px;
            color: #333;
            font-weight: 700;
            line-height: 27px;
        }

        .shop.checkout .checkout-form p {
            font-size: 16px;
            color: #333;
            font-weight: 400;
            margin-top: 12px;
            margin-bottom: 30px;
        }

        .shop.checkout .form {}

        .shop.checkout .form .form-group {
            margin-bottom: 25px;
        }

        .shop.checkout .form .form-group label {
            color: #333;
            position: relative;
        }

        .shop.checkout .form .form-group label span {
            color: #ff2c18;
            display: inline-block;
            position: absolute;
            right: -12px;
            top: 4px;
            font-size: 16px;
        }

        .shop.checkout .form .form-group input {
            width: 100%;
            height: 45px;
            line-height: 50px;
            padding: 0 20px;
            border-radius: 3px;
            border-radius: 0px;
            color: #333 !important;
            border: none;
            background: #F6F7FB;
        }

        .shop.checkout .form .form-group input:hover {}

        .shop.checkout .nice-select {
            width: 100%;
            height: 45px;
            line-height: 50px;
            margin-bottom: 25px;
            background: #F6F7FB;
            border-radius: 0px;
            border: none;
        }

        .shop.checkout .nice-select .list {
            width: 100%;
            height: 300px;
            overflow: scroll;
        }

        .shop.checkout .nice-select .list li {}

        .shop.checkout .nice-select .list li.option {
            color: #333;
        }

        .shop.checkout .nice-select .list li.option:hover {
            background: #F6F7FB;
            color: #333;
        }

        .shop.checkout .form .address input {
            margin-bottom: 15px;
        }

        .shop.checkout .form .address input:last-child {
            margin: 0;
        }

        .shop.checkout .form .create-account {
            margin: 0;
        }

        .shop.checkout .form .create-account input {
            width: auto;
            display: inline-block;
            height: auto;
            border-radius: 100%;
            margin-right: 3px;
        }

        .shop.checkout .form .create-account label {
            display: inline-block;
            margin: 0;
        }

        .shop.checkout .order-details {
            margin-top: 30px;
            background: #fff;
            padding: 15px 0 30px 0;
            border: 1px solid #eee;
        }

        .shop.checkout .single-widget {
            margin-bottom: 30px;
        }

        .shop.checkout .single-widget:last-child {
            margin: 0;
        }

        .shop.checkout .single-widget h2 {
            position: relative;
            font-size: 15px;
            font-weight: 600;
            padding: 10px 30px;
            line-height: 24px;
            text-transform: uppercase;
            color: #333;
            padding-bottom: 5px;
        }

        .shop.checkout .single-widget h2:before {
            position: absolute;
            content: "";
            left: 30px;
            bottom: 0;
            height: 2px;
            width: 50px;
            background: #F7941D;
        }

        .shop.checkout .single-widget .content ul {
            margin-top: 30px;
        }

        .shop.checkout .single-widget .content ul li {
            display: block;
            padding: 0px 30px;
            font-size: 15px;
            font-weight: 400;
            color: #333;
            margin-bottom: 12px;
        }

        .shop.checkout .single-widget .content ul li span {
            display: inline-block;
            float: right;
        }

        .shop.checkout .single-widget .content ul li.last {
            padding-top: 12px;
            border-top: 1px solid #ebebeb;
            display: block;
            font-size: 15px;
            font-weight: 400;
            color: #333;
        }

        .shop.checkout .single-widget .checkbox {
            text-align: left;
            margin: 0;
            padding: 0px 30px;
            margin-top: 30px;
        }

        .shop.checkout .single-widget.payement {
            padding: 0px 38px;
            text-align: center;
            margin-top: 30px;
        }

        .shop.checkout .single-widget.get-button {
            text-align: center;
            padding: 0px 35px;
        }

        .shop.checkout .single-widget.get-button .btn {
            height: 46px;
            width: 100%;
            line-height: 19px;
            text-align: center;
            border-radius: 0;
            text-transform: uppercase;
            color: #fff;
        }

        /*======================================
           End Checkout Form CSS
        ========================================*/


        /*======================================
           Start Shop Services CSS
        ========================================*/
        .shop-services.section {
            padding: 80px 0 0px 0;
            background: #fff;
        }

        .shop-services.home {
            padding: 60px 0;
            background: #F6F7FB;
        }

        .shop-services .single-service {
            position: relative;
            padding-left: 65px;
        }

        .shop-services .single-service i {
            height: 50px;
            width: 50px;
            line-height: 50px;
            text-align: center;
            color: #333;
            background: transparent;
            border-radius: 100%;
            display: block;
            font-size: 32px;
            position: absolute;
            left: 0;
            top: 0;
        }

        .shop-services .single-service h4 {
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            line-height: 22px;
            color: #333;
        }

        .shop-services .single-service p {
            color: #898989;
            line-height: 28px;
            font-size: 14px;
        }

        /*======================================
           End Shop Services CSS
        ========================================*/


        .card {

            border: none;
        }

        .card-header {
            padding: .5rem 1rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, .03);
            border-bottom: none;
        }

        .btn-light:focus {
            color: #212529;
            background-color: #e2e6ea;
            border-color: #dae0e5;
            box-shadow: 0 0 0 0.2rem rgba(216, 217, 219, .5);
        }

        .form-control {

            height: 50px;
            border: 2px solid #eee;
            border-radius: 6px;
            font-size: 14px;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #039be5;
            outline: 0;
            box-shadow: none;

        }

        .input {

            position: relative;
        }

        .input i {

            position: absolute;
            top: 16px;
            left: 11px;
            color: #989898;
        }

        .input input {

            text-indent: 25px;
        }

        .card-text {

            font-size: 13px;
            margin-left: 6px;
        }

        .certificate-text {

            font-size: 12px;
        }


        .billing {
            font-size: 11px;
        }

        .super-price {

            top: 0px;
            font-size: 22px;
        }

        .super-month {

            font-size: 11px;
        }


        .line {
            color: #bfbdbd;
        }

        .free-button {

            background: #1565c0;
            height: 52px;
            font-size: 15px;
            border-radius: 8px;
        }


        .payment-card-body {

            flex: 1 1 auto;
            padding: 24px 1rem !important;

        }

                /*--thank you pop starts here--*/
        .thank-you-pop{
            width:100%;
            padding:20px;
            text-align:center;
        }
        .thank-you-pop img{
            width:76px;
            height:auto;
            margin:0 auto;
            display:block;
            margin-bottom:25px;
        }

        .thank-you-pop h1{
            font-size: 42px;
            margin-bottom: 25px;
            color:#5C5C5C;
        }
        .thank-you-pop p{
            font-size: 20px;
            margin-bottom: 27px;
            color:#5C5C5C;
        }
        .thank-you-pop h3.cupon-pop{
            font-size: 25px;
            margin-bottom: 40px;
            color:#222;
            display:inline-block;
            text-align:center;
            padding:10px 20px;
            border:2px dashed #222;
            clear:both;
            font-weight:normal;
        }
        .thank-you-pop h3.cupon-pop span{
            color:#03A9F4;
        }
        .thank-you-pop a{
            display: inline-block;
            margin: 0 auto;
            padding: 9px 20px;
            color: #fff;
            text-transform: uppercase;
            font-size: 34px;
            background-color: #8BC34A;
            border-radius: 17px;
        }
        .thank-you-pop a i{
            margin-right:5px;
            color:#fff;
        }
        #thankyou .modal-header{
            border:0px;
            display: inline !important;
            padding: 0.5rem 1rem;
        }

        #thankyou .modal-header button{
            border: none;
            background: none;
            font-size: 14px;
            float: right;
        }
        /*--thank you pop ends here--*/
        .shop.checkout .form .form-group select {
            width: 100%;
            height: 45px;
            line-height: 50px;
            padding: 0 20px;
            border-radius: 3px;
            border-radius: 0px;
            color: #333 !important;
            border: none;
            background: #F6F7FB;
        }

        .select2-container{
            display: block !important;
        }
    </style>
    <section>
        @include('frontend.layouts.breadcrumb')
    </section>

    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <form class="form" method="POST" id="checkoutForm" action="{{ route('cart.order') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2>Make Your Checkout Here</h2>
                            <p>Please register in order to checkout more quickly</p>
                            <!-- Form -->
                            @php
                                $carts = Helper::getAllProductFromCart() ;

                                $total_amount = (float) str_replace( ',', '', Helper::totalCartPrice()) + $carts->total_shipping;
                                if (session('coupon')) {
                                    $total_amount = $total_amount - session('coupon')['value'];
                                }
                            @endphp
                            <div class="row no-gutters">
                                <div class="alert alert-danger" style="display: none" id="error" role="alert"></div>
                                @auth
                                <div class="col-lg-12 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <label>Saved Adresses<span>*</span></label>
                                        <select id="addresses" class="form-control">
                                            @foreach ($address as $ship)
                                                <option value="{{$ship->id}}">
                                                    {{$ship->address_1 != null ? $ship->address_1.',' : ''}}
                                                    {{$ship->address_2 != null ? $ship->address_2.',' : ''}}
                                                    {{$ship->zipcode != null ? $ship->zipcode.',' : ''}}
                                                    {{$ship->city != null ? $ship->city.',' : '' }}
                                                    {{!empty($ship->country) == true ? $ship->country->name : ''}}
                                                    ({{!empty($ship->user) == true ? $ship->user->first_name : ''}})
                                                </option>
                                            @endforeach
                                            <option value="0">Use Custome Address</option>
                                        </select>
                                    </div>
                                </div>
                                @else
                                <div class="col-lg-12 col-12">
                                    <div class="form-group m-0 my-2">
                                        <span>If you already have an account? <a href="{{route('login.form')}}">Login Here</a></span>
                                    </div>
                                </div>
                                @endauth
                                <div class="col-lg-12 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <select name="country" id="country" class="form-control select2">
                                            @foreach ($countries as $country)
                                                <option value="{{$country->shortname}}">
                                                    {{$country->name ?? ''}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group m-0 mt-2">

                                        <input type="text" name="first_name" placeholder="First Name"
                                            value="{{ old('first_name') }}" class="validation"
                                            value="{{ old('first_name') }}">
                                        @error('first_name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group m-0 mt-2">
                                         <input type="text" name="last_name" class="validation" placeholder="Last Name" value="{{ old('lat_name') }}">
                                        @error('last_name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <input type="text" name="company" class="validation" placeholder="Company (Optional)"
                                            value="{{ old('company') }}">
                                        @error('company')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-group m-0 mt-2"> <input type="text" name="address1" class="validation" placeholder="Address Line" value="{{ old('address1') }}">
                                        @error('address1')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <input type="text" name="address2" placeholder="Address Line 2"
                                            value="{{ old('address2') }}">
                                        @error('address2')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <input type="text" name="city" class="validation" placeholder="City" value="{{ old('city') }}" required>
                                        @error('city')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group m-0 mt-2">

                                        <select name="state" id="state" class="form-control select2">
                                            @foreach ($states as $state)
                                                <option value="{{$state->name}}">
                                                    {{$state->name ?? ''}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <input type="text" name="post_code" class="validation" placeholder="Postal Code "
                                            value="{{ old('post_code') }}" required>
                                        @error('post_code')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <input type="email" name="email" class="validation" placeholder="Email Address"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <input type="number" name="phone" class="validation" placeholder="Phone Number" required
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!--/ End Form -->
                        </div>

                        <div class="card credit_card d-none">
                            <div class="card-header p-0">
                                <h2 class="mb-0">
                                    <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="d-flex align-items-center justify-content-between">

                                            <span>Credit card</span>
                                            <div class="icons">
                                                <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                                <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                                                <img src="https://i.imgur.com/35tC99g.png" width="30">
                                                <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                            </div>

                                        </div>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body payment-card-body">

                                    <span class="font-weight-normal card-text">Card Number</span>
                                    <div class="input">

                                        <i class="fa fa-credit-card"></i>
                                        <input type="text" class="form-control" placeholder="0000 0000 0000 0000">

                                    </div>

                                    <div class="row mt-3 mb-3">

                                        <div class="col-md-6">

                                            <span class="font-weight-normal card-text">Expiry Date</span>
                                            <div class="input">

                                                <i class="fa fa-calendar"></i>
                                                <input type="text" class="form-control" placeholder="MM/YY">

                                            </div>

                                        </div>


                                        <div class="col-md-6">

                                            <span class="font-weight-normal card-text">CVC/CVV</span>
                                            <div class="input">

                                                <i class="fa fa-lock"></i>
                                                <input type="text" class="form-control" placeholder="000">

                                            </div>

                                        </div>


                                    </div>

                                    <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction
                                        is secured with ssl certificate</span>

                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-6 mt-2">
                            <input type="radio" name="bill_shipp" value="same" id="billing_shipping_same">
                            <label class="form-check-label" for="billing_shipping_same">Is shipping and billing same?</label>
                        </div> --}}

                        <div class="col-6 mt-2">
                            <input type="checkbox" name="bill_shipp"  value="diff" id="billing_different">
                            <label class="form-check-label" for="billing_different">Is billing different?</label>
                        </div>

                        <div class="billing_address_diff d-none mt-4">

                            @php
                                $carts = Helper::getAllProductFromCart() ;

                                $total_amount = (float) str_replace( ',', '', Helper::totalCartPrice()) + $carts->total_shipping;
                                if (session('coupon')) {
                                    $total_amount = $total_amount - session('coupon')['value'];
                                }
                            @endphp
                            <div class="row">
                                <div class="alert alert-danger" style="display: none" id="error" role="alert"></div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-group">
                                        <label>Saved Adresses<span>*</span></label>
                                        <select id="bill_addresses" class="form-control">
                                            @foreach ($address as $ship)
                                                <option value="{{$ship->id}}">
                                                    {{$ship->address_1 != null ? $ship->address_1.',' : ''}}
                                                    {{$ship->address_2 != null ? $ship->address_2.',' : ''}}
                                                    {{$ship->zipcode != null ? $ship->zipcode.',' : ''}}
                                                    {{$ship->city != null ? $ship->city.',' : '' }}
                                                    {{!empty($ship->country) == true ? $ship->country->name : ''}}
                                                    ({{!empty($ship->user) == true ? $ship->user->first_name : ''}})
                                                </option>
                                            @endforeach
                                            <option value="0">Use Custome Address</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-group m-0 mt-2">

                                        <select name="bill_country" id="bill_country" class="form-control select2">
                                            @foreach ($countries as $country)
                                                <option value="{{$country->name}}">
                                                    {{$country->name ?? ''}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <input type="text" name="bill_first_name" placeholder="First Name"
                                            value="{{ old('first_name') }}"
                                            value="{{ old('first_name') }}">
                                        @error('first_name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <input type="text" name="bill_last_name" placeholder="Last Name"
                                            value="{{ old('lat_name') }}">
                                        @error('last_name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <input type="text" name="bill_company"  placeholder="Company (Optional)"
                                            value="{{ old('company') }}">
                                        @error('company')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <input type="text" name="bill_address1"  placeholder="Address Line 1"
                                            value="{{ old('address1') }}">
                                        @error('address1')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <input type="text" name="bill_address2" placeholder="Address Line 2"
                                            value="{{ old('address2') }}">
                                        @error('address2')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <input type="text" name="bill_city"  placeholder="City" value="{{ old('city') }}" required>
                                        @error('city')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <select name="bill_state" id="bill_state" class="form-select select2">
                                            @foreach ($states as $state)
                                                <option value="{{$state->name}}">
                                                    {{$state->name ?? ''}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <input type="text" name="bill_post_code"  placeholder="Postal Code"
                                            value="{{ old('post_code') }}" required>
                                        @error('post_code')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <input type="email" name="bill_email"  placeholder="Email Address"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group m-0 mt-2">
                                        <input type="number" name="bill_phone"  placeholder="Phone Number" required
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!--/ End Form -->
                        </div>

                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>CART TOTALS</h2>
                                <div class="content">
                                    <ul>
                                        <li data-price="{{ Helper::totalCartPrice() }}">
                                            Cart Subtotal<span id="order_subtotal"></span></li>
                                        <li class="shipping"> Shipping Cost <span id="cart_shipping"></span>

                                        </li>

                                        @if (session()->has('coupon'))
                                            <li class="coupon_price" >
                                                You Save<span id="coupon_price">${{ number_format(Session::get('coupon')['value'], 2) }}</span></li>
                                        @endif

                                        @if (session('coupon'))
                                            <li class="last">
                                                Total <span id="order_total_price"></span></li>
                                        @else
                                            <li class="last">
                                                Total <span id="order_total_price"></span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Payments</h2>
                                <div class="content">
                                    <div class="checkbox">
                                         <form-group>

                                            @if ( $availablePaymnMethod->where('method', 'stripe')->first())
                                                <div id="smart-button-container">
                                                    <div style="text-align: center;">
                                                        <button type="button" id="stripe" class="btn btn-primary btn-lg btn-block w-100 mb-2 py-0">
                                                            <i class="fa-brands fa-stripe fa-3x"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($paypal = $availablePaymnMethod->where('method', 'paypal')->first())
                                                <div id="smart-button-container">
                                                    <div style="text-align: center;">
                                                        <div id="paypal-button-container"></div>
                                                    </div>
                                                </div>

                                                @if ($paypal->type == 'live')
                                                    <script src="https://www.paypal.com/sdk/js?client-id={{$paypal->secret_key ?? ''}}&disable-funding=venmo&currency=USD" data-sdk-integration-source="integrationbuilder"></script>

                                                @else
                                                    <script src="https://www.paypal.com/sdk/js?client-id={{ $paypal->secret_key ?? 'sb' }}&currency=USD&intent=capture"
                                                        data-sdk-integration-source="integrationbuilder"></script>
                                                @endif

                                            @endif
                                        </form-group>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </form>
        </div>
    </section>
    <!--/ End Checkout -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Services -->
    <div class="modal fade" id="thankyou" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                </div>

                <div class="modal-body">

                    <div class="thank-you-pop">
                        <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
                        <h1>Thank You!</h1>
                        <p>Your submission is received and we will contact you soon</p>
                        <h3 class="cupon-pop">Your Id: <span>12345</span></h3>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
@push('styles')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <style>
        li.shipping {
            display: inline-flex;
            width: 100%;
            font-size: 14px;
        }

        li.shipping .input-group-icon {
            width: 100%;
            margin-left: 10px;
        }

        .input-group-icon .icon {
            position: absolute;
            left: 20px;
            top: 0;
            line-height: 40px;
            z-index: 3;
        }

        .form-select {
            height: 30px;
            width: 100%;
        }

        .form-select .nice-select {
            border: none;
            border-radius: 0px;
            height: 40px;
            background: #f6f6f6 !important;
            padding-left: 45px;
            padding-right: 40px;
            width: 100%;
        }

        .list li {
            margin-bottom: 0 !important;
        }

        .list li:hover {
            background: #F7941D !important;
            color: white !important;
        }

        .form-select .nice-select::after {
            top: 14px;
        }


    </style>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="{{ asset('frontend/js/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        var addresses = @json($address)

        var countries = @json($countries)

        var states = @json($states)

        total_cart = {{ $total_amount }}
        total_shipping = {{ $carts->total_shipping }}
        cart_subtotal = {{ (float) str_replace( ',', '', Helper::totalCartPrice()) }}
        session_coupon = {{ isset(Session::get('coupon')['value']) ? 1 : 0 }};
        if (session_coupon) {
            session_coupon_value = {{ isset(Session::get('coupon')['value']) ? Session::get('coupon')['value'] : 0 }}
        } else {
            session_coupon_value = 0
        }

        $(document).ready(function() {
            $(".select2").select2();
        });


        function paymentMetod(type) {
            if (type == 'card') {
                $(".credit_card").removeClass('d-none')
            } else {
                $(".credit_card").addClass('d-none')
            }
        }

         //Stripe
        $("#stripe").on('click', function(){
            if (!validateForm()) {
                $("#error").text("All (*) Fields are required!")
                $("#error").show()
                setTimeout(() => {
                    $("#error").hide()
                }, 3000);
            }else{

                const data = {
                    user_id: "{{ request()->ip() }}",
                    conversion_rate: convertPriceVal,
                    coupon: session_coupon_value,
                    shipping_id: "{{ $carts->shipping_id ?? 0 }}",
                    payment_method: 'stripe',
                    bill_shipp: $("#bill_shipp option:checked").val(),
                    first_name: $("input[name=first_name]").val(),
                    last_name: $("input[name=last_name]").val(),
                    email: $("input[name=email]").val(),
                    company: $("input[name=company]").val(),
                    address1: $("input[name=address1]").val(),
                    address2: $("input[name=address2]").val(),
                    phone: $("input[name=phone]").val(),
                    country: $("#country option:selected").val(),
                    state: $("#state option:selected").val(),
                    city: $("input[name=city]").val(),
                    post_code: $("input[name=post_code]").val(),
                    bill_first_name: $("input[name=bill_first_name]").val(),
                    bill_last_name: $("input[name=bill_last_name]").val(),
                    bill_email: $("input[name=bill_email]").val(),
                    bill_company: $("input[name=bill_company]").val(),
                    bill_address1: $("input[name=bill_address1]").val(),
                    bill_address2: $("input[name=bill_address2]").val(),
                    bill_phone: $("input[name=bill_phone]").val(),
                    bill_country: $("#bill_country option:selected").val(),
                    bill_state: $("#bill_state option:selected").val(),
                    bill_city: $("input[name=bill_city]").val(),
                    bill_post_code: $("input[name=bill_post_code]").val(),
                }

                setCookie('data', JSON.stringify(data) ,30);
                const stripe = Stripe("{{$integerations->public_key ?? ''}}");
                stripe.redirectToCheckout({ sessionId: "{{ $session->id ?? '' }}" });
            }
        });

        //Paypal
        const fundingSources = [
            paypal.FUNDING.PAYPAL,
            paypal.FUNDING.CARD
        ]

        for (const fundingSource of fundingSources) {
            const paypalButtonsComponent = paypal.Buttons({
                onInit: function(data, actions) {
                    actions.disable();
                    document.querySelectorAll("input").forEach(i => {
                        i.addEventListener("change", () => {
                            if (validateForm()) {
                                actions.enable();
                            } else {
                                actions.disable()
                            }
                        });
                    });

                    actionStatus = actions;


                },
                onClick: function() {
                    if (!validateForm()) {
                        $("#error").text("All (*) Fields are required!")
                        $("#error").show()
                        setTimeout(() => {
                            $("#error").hide()
                        }, 3000);
                    }


                },
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
                        purchase_units: [{
                            amount: {
                                value: total_cart,
                            },

                        }, ],
                    }


                    return actions.order.create(createOrderPayload)
                },

                // finalize the transaction
                onApprove: (data, actions) => {
                    const captureOrderHandler = (details) => {
                        const payerName = details.payer.name.given_name

                        $.ajax({
                            url: "{{ route('cart.order') }}",
                            dataType: "json",
                            type: "Post",
                            async: true,
                            data: {
                                _token: "{{ csrf_token() }}",
                                user_id: "{{ request()->ip() }}",
                                conversion_rate: convertPriceVal,
                                coupon: session_coupon_value,
                                shipping_id: "{{ $carts->shipping_id ?? 0 }}",
                                payment_method: 'paypal',
                                bill_shipp: $("#bill_shipp option:checked").val(),
                                first_name: $("input[name=first_name]").val(),
                                last_name: $("input[name=last_name]").val(),
                                email: $("input[name=email]").val(),
                                company: $("input[name=company]").val(),
                                address1: $("input[name=address1]").val(),
                                address2: $("input[name=address2]").val(),
                                phone: $("input[name=phone]").val(),
                                country: $("#country option:selected").val(),
                                state: $("#state option:selected").val(),
                                city: $("input[name=city]").val(),
                                post_code: $("input[name=post_code]").val(),
                                bill_first_name: $("input[name=bill_first_name]").val(),
                                bill_last_name: $("input[name=bill_last_name]").val(),
                                bill_email: $("input[name=bill_email]").val(),
                                bill_company: $("input[name=bill_company]").val(),
                                bill_address1: $("input[name=bill_address1]").val(),
                                bill_address2: $("input[name=bill_address2]").val(),
                                bill_phone: $("input[name=bill_phone]").val(),
                                bill_country: $("#bill_country option:selected").val(),
                                bill_state: $("#bill_state option:selected").val(),
                                bill_city: $("input[name=bill_city]").val(),
                                bill_post_code: $("input[name=bill_post_code]").val(),
                            },
                            success: function(data) {
                                if(data.success == true){
                                    $("#thankyou").modal('show')
                                    window.location = "{{url('/user/order')}}"
                                }
                            },
                            error: function(xhr, exception) {
                                var msg = "";
                                if (xhr.status === 0) {
                                    msg = "Not connect.\n Verify Network." + xhr.responseText;
                                } else if (xhr.status == 404) {
                                    msg = "Requested page not found. [404]" + xhr.responseText;
                                } else if (xhr.status == 500) {
                                    msg = "Internal Server Error [500]." + xhr.responseText;
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


        function validateForm() {
            var validate = $('.validation').map(function(idx, elem) {
                if ($(elem).val() !== '') {
                    return true
                }
            }).get();

            if (validate.length >= 7) {
                return true;
            } else {
                return false;
            }
        }

        $("#addresses").on('change', function(){
            if(this.value == 0){

                $("#checkoutForm")[0].reset()

            }else{

                var address = addresses.find(item => item.id == this.value);

                $("#country").val(address != null ? address.country.name : '')
                $("#country").trigger('change')
                $("input[name=first_name]").val(address != null ? address.first_name : '')
                $("input[name=last_name]").val(address != null ? address.last_name : '')
                $("input[name=company]").val(address != null ? address.company : '')
                $("input[name=address1]").val(address != null ? address.address_1 : '')
                $("input[name=address2]").val(address != null ? address.address_2 : '')
                $("input[name=city]").val(address != null ? address.city : '')
                $("#state").val(address != null ? address.state.id : '')
                $("#state").trigger('change')
                $("input[name=post_code]").val(address != null ? address.zipcode : '')
                $("input[name=email]").val(address != null ? address.email : '')
                $("input[name=phone]").val(address != null ? address.phone : '')
            }
        });

        $("#bill_addresses").on('change', function(){
            if(this.value == 0){

                $("#checkoutForm")[0].reset()

            }else{

                var address = addresses.find(item => item.id == this.value);

                $("#bill_country").val(address != null ? address.country.name : '')
                $("#bill_country").trigger('change')
                $("input[name=bill_first_name]").val(address != null ? address.first_name : '')
                $("input[name=bill_last_name]").val(address != null ? address.last_name : '')
                $("input[name=bill_company]").val(address != null ? address.company : '')
                $("input[name=bill_ddress1]").val(address != null ? address.address_1 : '')
                $("input[name=bill_address2]").val(address != null ? address.address_2 : '')
                $("input[name=bill_city]").val(address != null ? address.city : '')
                $("#bill_state").val(address != null ? address.state.id : '')
                $("#bill_state").trigger('change')
                $("input[name=bill_post_code]").val(address != null ? address.zipcode : '')
                $("input[name=bill_email]").val(address != null ? address.email : '')
                $("input[name=bill_phone]").val(address != null ? address.phone : '')
            }
        });

        $("#country").on('change', function(){

            var country = countries.find(item => item.shortname == this.value);
            var state = states.filter(item => item.country_id == country.id);
            var html = '';
            $.each(state , function(index, val) {
                html += '<option value="'+val.id+'">'+val.name+'</option>'
            });

            $("#state").html(html)
            $("#state").trigger('change')
        });

        $("#country").val(localStorage.getItem('countryShortName')).trigger('change')

        $('input[name=bill_shipp]').click(function() {
            if($(this).is(":checked")){
                $(".billing_address_diff").removeClass('d-none')
            }
            else if($(this).is(":not(:checked)")){
                $(".billing_address_diff").addClass('d-none')
            }

        });

        function setCookie(name,value,days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        }
    </script>
@endpush
