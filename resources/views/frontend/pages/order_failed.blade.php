@extends('frontend.layouts.master')

@section('main-content')
<!-- Breadcrumbs -->
<section>
    <div class="brand_banner">
        <div class="container">
          <div class="brand_banner_content">
            <div class="brand_banner_content_text text-center">
              <h1 class="brand_bannner_head">Payment</h1>

            </div>
          </div>
        </div>
      </div>
</section>
<!-- End Breadcrumbs -->
<section class="p-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

          <!-- Icon -->
          <div class="mb-7 fs-1">🙁</div>

          <!-- Heading -->
          <h2 class="mb-5">Payment Not Completed!</h2>

          <!-- Text -->
          <p class="mb-7 text-gray-500">
            You have failed to purchase. Please come back and try again when you are ready to purchase.
          </p>

          <!-- Button -->
          <a class="btn btn-dark" href="{{route('checkout')}}">
            View Checkout
          </a>

        </div>
      </div>
    </div>
  </section>
@endsection
