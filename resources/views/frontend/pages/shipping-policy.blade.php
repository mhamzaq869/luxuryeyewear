@extends('frontend.layouts.master')

@section('title', 'Shipping Policy')

@section('main-content')
    @php
        $page = \App\Models\Page::find(2);
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


    <!-- About Us -->
    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $page->content ?? '' !!}
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us -->

@endsection
