<div class="bannerCol">
  <div class="container-fluid p-0">
    <div class="bannerSlider">
      <div class="swiper bannerSlider swiperStyle">
        <div class="swiper-wrapper">
          @foreach($banners->where('type','slider')->flatten() as $key=>$banner)
          <div class="swiper-slide {{(($key==0)? 'active' : '')}}">
            <div class="swiper_bg_img" style="background-image: url({{asset($banner->photo)}});">
              <div class="container">
                <div class="bannerImgCnt">
                  <a href="javascript:void(0)"><img src="{{asset('assets/images/banner-content.png')}}" alt="..." class="saleImg"></a>
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
