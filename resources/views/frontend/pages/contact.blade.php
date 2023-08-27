@extends('frontend.layouts.master')

@section('title','Contact Us')

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



	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
                    <div class="title mt-4">
                        @php $settings = DB::table('settings')->get(); @endphp
                        <h4>Get in touch</h4>
                        <h3>Write us a message @auth @else<span style="font-size:12px;" class="text-danger">[You need to login first]</span>@endauth</h3>
                    </div>

					<div class="row py-3">
						<div class="col-lg-8 col-12">
							<div class="form-main">

								<form class="form-contact form contact_form" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
									@csrf
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Name<span>*</span></label>
												<input name="name" id="name" class="form-control" type="text" placeholder="Enter your name">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Subjects<span>*</span></label>
												<input name="subject" type="text" class="form-control" id="subject" placeholder="Enter Subject">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Email<span>*</span></label>
												<input name="email" type="email" class="form-control" id="email" placeholder="Enter email address">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Phone<span>*</span></label>
												<input id="phone" name="phone" class="form-control" class="form-control" type="number" placeholder="Enter your phone">
											</div>
										</div>
										<div class="col-12">
											<div class="form-group message">
												<label>your message<span>*</span></label>
												<textarea name="message" class="form-control" id="message" cols="30" rows="9" placeholder="Enter Message"></textarea>
											</div>
										</div>
										<div class="col-12 py-3">
											<div class="form-group button">
												<button type="submit" class="btn btn-dark btn-lg">Send Message</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="single-head mt-4">
								<div class="single-info my-3">
                                    <div class="d-flex">
                                        <i class="fa fa-phone mt-2" style="margin-right: 10px"></i>
                                        <h4 class="title">Call us Now:</h4>
                                    </div>
									<ul>
										<li>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
									</ul>
								</div>
								<div class="single-info my-3">
                                    <div class="d-flex">
                                        <i class="fa fa-envelope-open mt-2" style="margin-right: 10px"></i>
                                        <h4 class="title"> Email:</h4>
                                    </div>
									<ul>
										<li><a href="mailto:info@yourwebsite.com">@foreach($settings as $data) {{$data->email}} @endforeach</a></li>
									</ul>
								</div>
								<div class="single-info">
                                    <div class="d-flex ">
                                        <i class="fa fa-location-arrow mt-2" style="margin-right: 10px"></i>
                                        <h4 class="title">Our Address:</h4>
                                    </div>
									<ul>
										<li>@foreach($settings as $data) {{$data->address}} @endforeach</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->

	<!-- Map Section -->
	<div class="map-section">
		<div id="myMap">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14130.857353934944!2d85.36529494999999!3d27.6952226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sne!2snp!4v1595323330171!5m2!1sne!2snp" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	</div>
	<!--/ End Map Section -->

	<!-- Start Shop Newsletter  -->
	{{-- @include('frontend.layouts.newsletter') --}}
	<!-- End Shop Newsletter -->
	<!--================Contact Success  =================-->
	<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<h2 class="text-success">Thank you!</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-success">Your message is successfully sent...</p>
			</div>
		  </div>
		</div>
	</div>

	<!-- Modals error -->
	<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<h2 class="text-warning">Sorry!</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-warning">Something went wrong.</p>
			</div>
		  </div>
		</div>
	</div>
@endsection

@push('styles')
<style>
	.modal-dialog .modal-content .modal-header{
		position:initial;
		padding: 10px 20px;
		border-bottom: 1px solid #e9ecef;
	}
	.modal-dialog .modal-content .modal-body{
		height:100px;
		padding:10px 20px;
	}
	.modal-dialog .modal-content {
		width: 50%;
		border-radius: 0;
		margin: auto;
	}
</style>
@endpush
@push('scripts')
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush
