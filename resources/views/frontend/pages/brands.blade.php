@extends('frontend.layouts.master')

@section('title', ' Brands')



@section('description', 'Brands Description ')

@section('keywords', ' Brands Keywords')

@section('robots', 'index, follow')

@section('revisit-after', 'content="3 days')



@section('main-content')

    <section>

        @include('frontend.layouts.breadcrumb')

    </section>

    <style>
        .card-img-top {
            width: 100%;
            height: 11vw;
            object-fit: scale-down;
        }
    </style>
    <section>

        <div class="brand_logo_section ">

            <div class="container">
                <b> Total Brand:<span class="">{{ count($brand_img) }}</span></b>
                <div class="brand_logo_list">
                    <div class="row g-2">
                        @foreach ($brand_img as $brand)
                            <div class="col-md-3 col-12">
                                <div class="card" style="height: 140px">
                                    <a href="{{ route('product-brand',[$brand->slug]) }}" target="_blank" title="{{ $brand->title }}">
                                        <img class="card-img-top p-5" src="{{ asset($brand->brand_image) }}"
                                            alt="Card image cap">
                                    </a>

                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection
