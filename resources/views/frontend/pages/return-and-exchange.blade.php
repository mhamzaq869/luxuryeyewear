@extends('frontend.layouts.master')

@section('title','Return And Exchange')

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
                      <li class="breadcrumb-item"><a href=" {{url('/')}}">Home</a></li>
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
                        <div class="entry-content pt-5">

                            <h1>&nbsp;</h1>

                            <p><strong>Returned items must comply with our returns policy:</strong></p>

                            <ul>
                                <li>
                                <p>Items must be returned unworn, undamaged, and unused, with all tags attached and the original packaging included.</p>
                                </li>
                                <li>
                                <p>Items must be returned with the original branded boxes and dust bags, where provided, and placed inside a protective outer box for shipping.</p>
                                </li>
                            </ul>

                            <p>Please take care when trying on your purchases and return them in the same condition you received them. Any returns that do not meet our policy will not be accepted.</p>

                            <p>For any return request just contact us at info@luxuryeyewear.in&nbsp;or using the chatbox.</p>

                            <p>Your returned item must arrive no later than 14 days after your delivery date.</p>

                            <p>&nbsp;</p>

                            <p><strong>Refunds</strong></p>

                            <p>&#xFEFF;Once your return has been received and accepted, your refund will be completed via the original payment method, excluding the delivery costs, in 3-7 working days.</p>

                            <h3>&nbsp;</h3>

                            <p><strong>Criteria for a return:</strong></p>

                            <ul>
                                <li>Item must be unused and unworn.</li>
                                <li>Single vision&nbsp;no later than 7&nbsp;days after your delivery date.</li>
                                <li>Multifocal vision no later than 14 days after your delivery date.&nbsp;</li>
                                <li>Returned frames with added custom or prescription lenses are eligible for a 50% refund of the original lens price paid.</li>
                                <li>We do not offer returns on frames that have had custom or prescription lenses attempted to be installed by another optician.</li>
                                <li>We do not offer returns on frames custom-tailored for patients (i.e. Gold &amp; Wood PRESTIGE - Gold Pieces).</li>
                                <li>We do not offer returns on&nbsp;Sale Frames,&nbsp;Discontinued Frames, or Special Edition Frames.</li>
                            </ul>

                            <h3>&nbsp;</h3>

                            </div>
                    </div>
				</div>
			</div>
	</section>
	<!-- End About Us -->

@endsection
