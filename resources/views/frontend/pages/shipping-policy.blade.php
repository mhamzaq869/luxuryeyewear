@extends('frontend.layouts.master')

@section('title', 'Shipping Policy')

@section('main-content')

    <!-- Breadcrumbs -->
    <section>
        <div class="brand_banner">
            <div class="container">
                <div class="brand_banner_content">
                    <div class="brand_banner_content_text text-center">
                        <h1 class="brand_bannner_head">@yield('title')</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumbStyle justify-content-center">
                                <li class="breadcrumb-item"><a href=" {{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->


    <!-- About Us -->
    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <b>
                        <h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                        </h1>

                        <p>&nbsp;</p>

                        <ul>
                            <li>
                                <p>We offer Free worldwide shipping</p>
                            </li>
                            <li>
                                <p>All orders are insured through DHL, UPS, Or&nbsp;FedEx.</p>
                            </li>
                            <li>
                                <p>You will receive a tracking number from DHL, UPS, Or&nbsp;FedEx. once your order has been
                                    shipped.</p>
                            </li>
                        </ul>

                        <ul>
                            <li>
                                <p><strong>INTERNATIONAL ORDERS:</strong>&nbsp;Please note that a large part of our customer
                                    base is international. To accommodate our customers, we do everything we can to expedite
                                    your shipment through customs and reduce the chance of any import fees being incurred.
                                    Depending on your country's policies you may incur shipping delays and/or import
                                    duties/fees. This is not regulated by us and Luxuryeyewear is not responsible for any
                                    additional import fees that are applied by your country. Please do your research with
                                    your country's import policies to see if this even applies to you.</p>
                            </li>
                        </ul>
                    </b>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us -->

@endsection
