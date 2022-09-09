@extends('frontend.layouts.master')

@section('title','Order Track Page')

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
    <section class="tracking_box_area section_gap py-5">
        <div class="container">
            <div class="tracking_box_inner">
                <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given
                    to you on your receipt and in the confirmation email you should have received.</p>
                <form class="row tracking_form my-4" action="{{route('product.track.order')}}" method="post" novalidate="novalidate">
                @csrf
                    <div class="col-md-8 form-group">
                        <input type="text" class="form-control p-2"  name="order_number" placeholder="Enter your order number">
                    </div>
                    <div class="col-md-8 mt-2 form-group">
                        <button type="submit" value="submit" class="btn btn-dark btn-lg">Track Order</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
