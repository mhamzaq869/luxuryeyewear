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
            height: 150px;
            /* object-fit: scale-down; */
        }

        .border-black{
            border: 1px solid black;
            border-radius: 0 !important;
        }


        @media only screen and (max-width: 600px){
            .card-img-top {
                width: 100%;
                height: 30vw;
                /* object-fit: scale-down; */
            }
        }
        @media only screen and (max-width: 425px){
            .card-img-top {
                width: 100%;
                height: 30vw;
                /* object-fit: scale-down; */
            }
        }
    </style>
    <section>

        <div class="brand_logo_section ">

            <div class="container">
                <b> Total Brand:<span class="">{{ count($brand_img) }}</span></b>
                <div class="brand_logo_list">
                    <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-2 justify-content-center">
                        @foreach ($brand_img as $brand)
                            <div class="col">
                                {{-- <div class="card border-black">
                                    <a href="{{ route('product-brand',[$brand->slug]) }}" target="_blank" title="{{ $brand->title }}">
                                        <img class="card-img-top px-5 py-4" src="{{ asset($brand->brand_image) }}"
                                            alt="Card image cap">
                                    </a>

                                </div> --}}

                                <div class="brand_logo_link">
                                    <a href="{{ route('product-brand',[$brand->slug]) }}" target="_blank" title="{{ $brand->title }}" class="blankLink"></a>
                                    <img src="{{ asset($brand->brand_image) }}" alt="...">
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection
