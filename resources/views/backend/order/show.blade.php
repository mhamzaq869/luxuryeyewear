@extends('backend.layouts.master')
@section('title', 'Order Detail')
@section('title', 'Order Detail')

@section('main-content')
    <div class="card">
        <h5 class="card-header">Order <a href="{{ route('order.pdf', $order->id) }}"
                class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i>
                Generate PDF</a>
        </h5>
        <div class="card-body">
            @if ($order)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Order No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>${{ $order->price ?? 0 }}</td>
                            <td>${{ number_format($order->total_amount, 2) }}</td>
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
                                <a href="{{ route('order.edit', $order->id) }}"
                                    class="btn btn-primary btn-sm float-left mr-1"
                                    style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit"
                                    data-placement="bottom"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{ route('order.destroy', [$order->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm dltBtn" data-id={{ $order->id }}
                                        style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                        data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>

                        </tr>
                    </tbody>
                </table>

                <section class="confirmation_part section_padding">
                    <div class="order_boxes">
                        <div class="row">
                            <div class="col-lg-4 col-lx-4">
                                <div class="order-info">
                                    <h4 class="text-center pb-4">Customer</h4>

                                    <ul>
                                        <li><b> fullname:</b> {{ $order->user->fullname }}</li>
                                        <li><b> Email:</b> {{ $order->user->email }}</li>
                                        <li><b> Phone No:</b> {{ $order->user->phone }}</li>
                                        <li><b> Address 1:</b> {{ $order->user->address_1 }}</li>
                                        <li><b> Address 2:</b> {{ $order->user->address_2 }}</li>
                                        <li><b> City:</b> {{ $order->user->city }}</li>
                                        <li><b> State:</b> {{ $order->user->state->name }}</li>
                                        <li><b> Country:</b> {{ $order->user->country->name }}</li>
                                        <li><b> Post Code:</b> {{ $order->user->zipcode }}</li>

                                    </ul>

                                </div>
                            </div>
                            <div class="col-lg-4 col-lx-4">
                                <div class="order-info">
                                    <h4 class="text-center pb-4">ORDER INFORMATION</h4>
                                    <ul>
                                        <li><b> Number:</b> {{ $order->order_number }}</li>
                                        <li><b> Order Date:</b> {{ $order->created_at->format('d M, Y') }} at {{ $order->created_at->format('g:i a') }}</li>
                                        <li><b> Payment Method:</b> {{ $order->payment_method == 'paypal' ? 'Paypal': '' }}</li>
                                        <li><b> Location:</b> {{ $order->country }}</li>
                                        <li><b> Payment Status:</b> {{ $order->payment_status }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-lx-4">
                                <div class="order-info">
                                    <h4 class="text-center pb-4">Total: ${{ number_format($order->total_amount,2) }}</h4>
                                    <ul>
                                        <li><b> Order Subtotal:</b> ${{ number_format($order->sub_total,2)}}</li>
                                        <li><b> Shipping:</b> ${{ number_format($order->shipping,2)}}</li>
                                        <li><b> Coupon:</b> ${{ number_format($order->coupon,2)}}</li>
                                        <li><b> Order Total:</b> ${{ number_format($order->total_amount,2)}}</li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-4 col-lx-4 pt-2">
                                <div class="shipping-info">
                                    <h4 class="text-center pb-4">SHIPPING INFORMATION</h4>
                                    <li><b> Full Name:</b> {{ $order->first_name }} {{ $order->last_name }}</li>
                                    <li><b> Email:</b> {{ $order->email }}</li>
                                    <li><b> Phone No:</b> {{ $order->phone }}</li>
                                    <li><b> Address:</b> {{ $order->address1 }}, {{ $order->address2 }}</li>
                                    <li><b> Country:</b> {{ $order->country }}</li>
                                    <li><b> State:</b> {{ $order->state }}</li>
                                    <li><b> Post Code:</b> {{ $order->post_code }}</li>

                                </div>
                            </div>
                            <div class="col-lg-8 col-lx-4 pt-2">
                                <div class="shipping-info">
                                    <h4 class="text-center pb-4">Products </h4>
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Product </th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->cart as $cart)

                                            <tr>
                                                <td>
                                                    <img src="{{ asset(insertAtPosition($cart->first()->product->p_f)) }}" width="60px" />
                                                    <a href="{{url('product-detail',[$cart->first()->product->slug])}}" class="ml-3">{{$cart->first()->product->title}}</a>
                                                </td>
                                                <td>{{ $cart->quantity ?? 0 }}</td>
                                                <td>${{ number_format($cart->price,2) ?? 0.00 }}</td>
                                                <td>${{ number_format($cart->amount, 2) ?? 0.00 }}</td>
                                                <td>
                                                    @if ($cart->first()->product->quantity > 0)
                                                        <span class="text-success">In Stock</span>
                                                    @else
                                                        <span class="text-danger">Out Of Stock</span>
                                                    @endif
                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
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
