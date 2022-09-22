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
                                $carts = Helper::getAllProductFromCart();

                                $total_amount = Helper::totalCartPrice();
                                if (session('coupon')) {
                                    $total_amount = $total_amount - session('coupon')['value'];
                                }
                            @endphp
                            <div class="row">
                                <div class="alert alert-danger" style="display: none" id="error" role="alert"></div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>First Name<span>*</span></label>
                                        <input type="text" name="first_name" placeholder=""
                                            value="{{ old('first_name') }}" class="validation"
                                            value="{{ old('first_name') }}">
                                        @error('first_name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Last Name<span>*</span></label>
                                        <input type="text" name="last_name" class="validation" placeholder=""
                                            value="{{ old('lat_name') }}">
                                        @error('last_name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Email Address<span>*</span></label>
                                        <input type="email" name="email" class="validation" placeholder=""
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Phone Number <span>*</span></label>
                                        <input type="number" name="phone" class="validation" placeholder="" required
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Country<span>*</span></label>
                                        <select name="country" id="country" class="form-control validation">
                                            <option value="AF">Afghanistan</option>
                                            <option value="AX">Åland Islands</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="VG">British Virgin Islands</option>
                                            <option value="BN">Brunei</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos [Keeling] Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo - Brazzaville</option>
                                            <option value="CD">Congo - Kinshasa</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Côte d’Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island and McDonald Islands</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong SAR China</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Laos</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macau SAR China</option>
                                            <option value="MK">Macedonia</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia</option>
                                            <option value="MD">Moldova</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar [Burma]</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP" selected="selected">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="AN">Netherlands Antilles</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="KP">North Korea</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PS">Palestinian Territories</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn Islands</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Réunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russia</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="BL">Saint Barthélemy</option>
                                            <option value="SH">Saint Helena</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="MF">Saint Martin</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">São Tomé and Príncipe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia</option>
                                            <option value="KR">South Korea</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syria</option>
                                            <option value="TW">Taiwan</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="Uk">United Kingdom</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UM">U.S. Minor Outlying Islands</option>
                                            <option value="VI">U.S. Virgin Islands</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VA">Vatican City</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Vietnam</option>
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Address Line 1<span>*</span></label>
                                        <input type="text" name="address1" class="validation" placeholder=""
                                            value="{{ old('address1') }}">
                                        @error('address1')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Address Line 2</label>
                                        <input type="text" name="address2" placeholder=""
                                            value="{{ old('address2') }}">
                                        @error('address2')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Postal Code <span>*</span></label>
                                        <input type="text" name="post_code" class="validation" placeholder=""
                                            value="{{ old('post_code') }}" required>
                                        @error('post_code')
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
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>CART TOTALS</h2>
                                <div class="content">
                                    <ul>
                                        <li class="order_subtotal" data-price="{{ Helper::totalCartPrice() }}">Cart
                                            Subtotal<span>${{ number_format(Helper::totalCartPrice(), 2) }}</span></li>
                                        <li class="shipping">
                                            Shipping Cost

                                            <span>${{ $carts->total_shipping }}</span>

                                        </li>

                                        @if (session('coupon'))
                                            <li class="coupon_price" data-price="{{ session('coupon')['value'] }}">You
                                                Save<span>${{ number_format(session('coupon')['value'], 2) }}</span></li>
                                        @endif

                                        @if (session('coupon'))
                                            <li class="last" id="order_total_price">
                                                Total<span>${{ number_format($total_amount, 2) }}</span></li>
                                        @else
                                            <li class="last" id="order_total_price">
                                                Total<span>${{ number_format($total_amount, 2) }}</span></li>
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
                                        {{-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label> --}}
                                        <form-group>
                                            {{-- <input name="method" onclick="paymentMetod('card')" class="form-check-input"  type="radio" value="card"> <label> Debit/Credit Card</label><br>
                                            <input name="method" onclick="paymentMetod('paypal')"  class="form-check-input" type="radio" value="paypal"> <label> PayPal</label> --}}
                                            @if ($paypal = $availablePaymnMethod->where('method', 'paypal')->first())
                                                <div id="smart-button-container">
                                                    <div style="text-align: center;">
                                                        <div id="paypal-button-container"></div>
                                                    </div>
                                                </div>

                                                @if ($paypal->type == 'live')
                                                    <script src="https://www.paypal.com/sdk/js?client-id={{$paypal->secret_key ?? ''}}&disable-funding=venmo&currency=USD" data-sdk-integration-source="integrationbuilder"></script>
                                                    {{-- <script src="https://www.paypal.com/sdk/js?client-id={{ $paypal->secret_key ?? 'sb' }}&currency=USD&intent=capture"
                                                        data-sdk-integration-source="integrationbuilder"></script> --}}
                                                @else
                                                    <script src="https://www.paypal.com/sdk/js?client-id={{ $paypal->secret_key ?? 'sb' }}&currency=USD&intent=capture"
                                                        data-sdk-integration-source="integrationbuilder"></script>
                                                @endif


                                            @endif
                                        </form-group>


                                    </div>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Payment Method Widget -->
                            {{-- <div class="single-widget payement">
                                <div class="content">
                                    <img src="{{ 'backend/img/payment-method.png' }}" alt="#">
                                </div>
                            </div> --}}
                            <!--/ End Payment Method Widget -->
                            <!-- Button Widget -->
                            {{-- <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button type="submit" class="btn btn-dark">proceed to checkout</button>
                                    </div>
                                </div>
                            </div> --}}
                            <!--/ End Button Widget -->
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
    <!--Model Popup starts-->
    {{-- <div class="container">
        <div class="row">
            <a class="btn btn-primary" data-toggle="modal" href="#thankyou">open Popup</a>

        </div>
    </div> --}}
    <!--Model Popup ends-->
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
    <script>
        $(document).ready(function() {
            $("select.select2").select2();
        });
        $('select.nice-select').niceSelect();

        function paymentMetod(type) {
            if (type == 'card') {
                $(".credit_card").removeClass('d-none')
            } else {
                $(".credit_card").addClass('d-none')
            }
        }


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
                                value: {{ number_format($total_amount + $carts->total_shipping, 2) }},
                            },

                        }, ],
                    }


                    return actions.order.create(createOrderPayload)
                },

                // finalize the transaction
                onApprove: (data, actions) => {
                    const captureOrderHandler = (details) => {
                        const payerName = details.payer.name.given_name
                        console.log(details)

                        $.ajax({
                            url: "{{ route('cart.order') }}",
                            dataType: "json",
                            type: "Post",
                            async: true,
                            data: {
                                _token: "{{ csrf_token() }}",
                                user_id: "{{ request()->ip() }}",
                                shipping: "{{ $carts->shipping_id }}",
                                payment_method: 'paypal',
                                first_name: $("input[name=first_name]").val(),
                                last_name: $("input[name=last_name]").val(),
                                email: $("input[name=email]").val(),
                                address1: $("input[name=address1]").val(),
                                address2: $("input[name=address2]").val(),
                                phone: $("input[name=phone]").val(),
                                country: $("#country option:selected").val(),
                            },
                            success: function(data) {
                                if(data.status == true){
                                    $("#thankyou").modal('show')
                                    window.location = "{{url('/')}}"
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
    </script>
@endpush
