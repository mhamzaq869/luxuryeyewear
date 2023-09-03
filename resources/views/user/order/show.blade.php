@extends('user.layouts.master')

@section('title', 'Order Detail')

@section('main-content')
    <div class="card">
        <h5 class="card-header">Order <a href="{{ route('order.pdf', $order->id) }}"
                class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i>
                Generate PDF</a>
        </h5>
        <div class="card-body p-3">
            @if ($order)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            {{-- <th>S.N.</th> --}}
                            <th>Order No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            {{-- <th>Quantity</th>
            <th>Charge</th> --}}
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- <td>{{$order->id}}</td> --}}
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                            <td>{{ $order->email }}</td>
                            {{-- <td>{{$order->quantity}}</td> --}}
                            {{-- <td>${{$order->shipping->price ?? 0}}</td> --}}
                            <td><span id="user_order_price_{{ $order->id }}"></span></td>
                            <td>
                                @if ($order->status == 'new')
                                    <span class="badge badge-primary">{{ $order->status }}</span>
                                @elseif($order->status == 'process')
                                    <span class="badge badge-warning">{{ $order->status }}</span>
                                @elseif($order->status == 'delivered')
                                    <span class="badge badge-success">{{ $order->status }}</span>
                                @else
                                    <span class="badge badge-danger">{{ $order->status }}</span>
                                @endif
                            </td>
                            <td>
                                <form method="POST" action="{{ route('order.destroy', [$order->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn-danger btn-sm dltBtn" data-id={{ $order->id }}
                                        style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                        data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>

                        </tr>
                    </tbody>
                </table>

                <section class="confirmation_part py-3 section_padding">
                    <div class="order_boxes">
                        <div class="row p-3">
                            <div class="col-lg-12 col-lx-12 p-3">
                                <h4 class="ml-2">Order Items ({{ $order->cart_info->count() }})</h4>
                                <ul class="list-group list-group-lg list-group-flush-y list-group-flush-x">

                                    @foreach ($order->cart_info as $cart)
                                        <hr>
                                        <li class="list-group-item" style="border:none">
                                            <div class="row align-items-center">
                                                <div class="col-4 col-md-3 col-xl-2">

                                                    <!-- Image -->
                                                    <a href="{{ url('product-detail/' . $cart->product->slug) }}"><img
                                                            src="{{ asset(insertAtPosition($cart->product->photo)) }}"
                                                            alt="..." class="img-fluid"></a>

                                                </div>
                                                <div class="col">

                                                    <!-- Title -->
                                                    <p class="mb-4 fs-sm fw-bold">
                                                        <a class="text-body"
                                                            href="product.html">{{ $cart->product->title }}</a> <br>
                                                        <span class="text-muted"
                                                            id="user_order_cart_price_{{ $cart->id }}"></span>
                                                    </p>

                                                    <!-- Text -->
                                                    <div class="fs-sm text-muted">
                                                        Color: {{ $cart->product->size }}
                                                        {{ $cart->product->color_description }}
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>



                <section class="confirmation_part section_padding mt-2">
                    <div class="order_boxes">
                        <div class="row p-3">
                            <div class="col-lg-6 col-lx-4">
                                <div class="order-info">
                                    <h4 class="ml-2 pb-4">ORDER INFORMATION</h4>
                                    <table class="table">
                                        <tr class="">
                                            <td>Order Number </td>
                                            <td>: {{ $order->order_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>Order Date </td>
                                            <td>: {{ $order->created_at->format('D d M, Y') }} at
                                                {{ $order->created_at->format('g:i A') }} </td>
                                        </tr>
                                        {{-- <tr>
                        <td>Quantity </td>
                        <td>: {{$order->quantity}}</td>
                    </tr> --}}
                                        <tr>
                                            <td>Order Status </td>
                                            <td>: {{ $order->status }}</td>
                                        </tr>
                                        <tr>
                                            @php
                                                $shipping_charge = DB::table('shippings')
                                                    ->where('id', $order->shipping_id)
                                                    ->pluck('price');
                                            @endphp
                                            <td>Shipping Charge</td>
                                            <td>: <span id="user_order_shipping_price_{{ $order->id }}"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Total Amount</td>
                                            <td> : <span id="user_order_total_price_{{ $order->id }}"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Payment Method</td>
                                            <td> : @if ($order->payment_method == 'paypal')
                                                    Paypal
                                                @else
                                                    Stripe
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Payment Status</td>
                                            <td> : <svg xmlns="http://www.w3.org/2000/svg" class="text-success"
                                                    style="width:15px; fill:green;" viewBox="0 0 512 512">
                                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                                </svg>
                                                Paid
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-6 col-lx-4">
                                <div class="shipping-info">
                                    <h4 class="text-center pb-4">SHIPPING INFORMATION</h4>
                                    <table class="table">
                                        <tr class="">
                                            <td>Full Name</td>
                                            <td> : {{ $order->first_name }} {{ $order->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td> : {{ $order->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone </td>
                                            <td> : {{ $order->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td> : {{ $order->address1 }}, {{ $order->address2 }}</td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td> : {{ $order->country }}</td>
                                        </tr>
                                        <tr>
                                            <td>ZipCode</td>
                                            <td> : {{ $order->post_code }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

        </div>
    </div>
@endsection

@push('styles')
    <style>
        .order-info,
        .shipping-info {
            background: #ECECEC;
            padding: 20px;
        }

        .order-info h4,
        .shipping-info h4 {
            text-decoration: underline;
        }
    </style>
@endpush


@push('scripts')
    <script>
        allproducts = [@json($order)]

        $.each(allproducts, function(index, value) {
            $("#user_order_price_" + value.id).html(new Intl.NumberFormat('en-us', {
                style: 'currency',
                currency: symbol
            }).format(value.total_amount))
            $("#user_order_shipping_price_" + value.id).html(new Intl.NumberFormat('en-us', {
                style: 'currency',
                currency: symbol
            }).format(value.shipping != null ? value.shipping : 0))
            $("#user_order_total_price_" + value.id).html(new Intl.NumberFormat('en-us', {
                style: 'currency',
                currency: symbol
            }).format(value.total_amount))
            $.each(value.cart_info, function(i, val) {
                $("#user_order_cart_price_" + val.id).html(new Intl.NumberFormat('en-us', {
                    style: 'currency',
                    currency: symbol
                }).format(val.price))
            });
        });
    </script>
@endpush
