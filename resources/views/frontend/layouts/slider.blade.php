<div class="bannerCol">
    <div class="container-fluid p-0">
        <div class="bannerSlider">
            <div class="swiper bannerSlider swiperStyle">
                <div class="swiper-wrapper">
                    @foreach ($banners->where('type', 'slider')->flatten() as $key => $banner)
                        <div class="swiper-slide {{ $key == 0 ? 'active' : '' }}">
                            <div class="swiper_bg_img" style="background-image: url({{ asset($banner->photo) }});">
                                <div class="container">
                                    <div class="bannerImgCnt">
                                        <h1 style="color:{{ $banner->title_color }}">{{ $banner->title }}</h1>
                                        {!! $banner->description !!}
                                        <a href="/product-brand/{{ strtolower($banner->brandTitle) ?? '' }}"
                                            type="button" class="btn btn-dark btn-lg">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>
