@extends('user.layouts.master')

@section('main-content')

<section class="py-12">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

          <!-- Icon -->
          <div class="mb-7 fs-1">❤️</div>

          <!-- Heading -->
          <h2 class="mb-5">Your Order has been Placed!</h2>

          <!-- Text -->
          <p class="mb-7 text-gray-500">
            Your order <span class="text-body text-decoration-underline">{{\App\Models\Order::find($order_number)->order_number}}</span> has been received. Your order details
            are shown for your personal accont.
          </p>

          <!-- Button -->
          <a class="btn btn-dark" href="{{route('user.order.show',[$order_number])}}">
            View My Orders
          </a>

        </div>
      </div>
    </div>
  </section>
@endsection
