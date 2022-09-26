@extends('frontend.layouts.master')

@section('title','About Us')

@section('main-content')
    @php
        $page = \App\Models\Page::find(4);
    @endphp
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
			<div class="container mt-3">
				<div class="row">
					<div class="col-lg-12 col-12">
                        {!! $page->content ?? '' !!}
					</div>
				</div>
			</div>
	</section>
	<!-- End About Us -->


	<!-- Start Shop Services Area -->
	{{-- <section class="shop-services section">
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
	</section> --}}
	<!-- End Shop Services Area -->

@endsection
