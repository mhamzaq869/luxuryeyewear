@extends('frontend.layouts.master')
@section('title', ' Home')
@section('description', 'luxuryeyewear Description ')
@section('keywords', ' luxuryeyewear Keywords')
@section('robots', 'index, follow')
@section('revisit-after', 'content="3 days')
@section('main-content')
<section>
          {{-- slider  --}}
          @include('frontend.layouts.slider')
          {{-- slider  --}}
</section>
<section>
  <div class="brand_logo_section">
    <div class="container">
      <div class="brand_swiper_img">
        <div class="swiper logoSwiper">
          <div class="swiper-wrapper">
          @foreach($brand_img  as $brands)
            <div class="swiper-slide">
              <a href="{{route('product-brand',[$brands->slug])}}">
                <img src="{{asset($brands->brand_image)}}" alt="{{$brands->title}}"  title="{{$brands->title}}">
              </a></div>
              @endforeach
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <!-- <div class="swiper-pagination"></div> -->
        </div>
      </div>
    </div>
  </div>
</section>

    @php
     $female_eyeglass_banner = $banners->where('type','female_eyeglass')->where('status','active')->first();
     $man_eyeglass_banner = $banners->where('type','man_eyeglass')->where('status','active')->first();
     $female_sunglass_banner = $banners->where('type','female_sunglass')->where('status','active')->first();
     $man_sunglass_banner = $banners->where('type','man_sunglass')->where('status','active')->first();
     $gallery = $banners->where('type','gallery')->where('status','active');
    @endphp

<!-- Female Eyeglasses COre Collection start  -->
<!-- Female Sunglasses COre Collection  start -->
<section>
    <div class="productsCol  pb-0">
      <div class="container">
        <div class="bgLight">
          <div class="row gx-0 align-items-center">
            <div class="col-sm-6">
              <div class="core_coll_img">
                @if ($female_eyeglass_banner)
                <img src="{{asset($female_eyeglass_banner->photo)}}" alt="Image Not Found">
                @else
                <img src="{{asset('assets/./images/female-product2.jpg')}}" alt="Image Not Found">
                @endif
              </div>
            </div>
            <div class="col-sm-6">
              <div class="collection_col whiteBGColor core_coll_block_padding">
                <h2 class="darkColor">
                    {{$female_eyeglass_banner->title ?? 'Female Sunglasses COre Collection'}}
                    </h2>
                  <div class="line"></div>
                  <div class="row text-end">
                    <div class="col">
                      <div class="core_coll_shop_btn">
                        <a href="{{route('front.sunglass.page',['women'])}}" class="btn btnShop darkBGColor whiteColor whiteColor" href="#">SHOP</a>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="productColMain">
         <!-- female sun glass start   -->
        @include('frontend.pages.section.female_sunglass')
         <!-- female sun glass end  -->
          <div class="btnCol text-center">
            <a href="{{route('front.sunglass.page',['women'])}}" class="btn btnPrimary minWdBtn btnNew">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- Male Sunglasses COre Collection -->
<section>
    <div class="productsCol section_space pb-0">
      <div class="container">
        <div class="bgLight">
          <div class="row gx-0 align-items-center">
            <div class="col-sm-6 order-lg-last">
              <div class="core_coll_img">
                @if ($man_sunglass_banner)
                <img src="{{asset($man_sunglass_banner->photo)}}" alt="Image Not Found">
                @else
                <img src="{{asset('assets/./images/male-product.jpg')}}" alt="Image Not Found">
                @endif
              </div>
            </div>
            <div class="col-sm-6">
              <div class="collection_col whiteBGColor core_coll_block_padding collection_col_right">
                <h2 class="darkColor"> {{$man_sunglass_banner->title ?? 'Male Sunglasses Core Collection'}} </h2>
                  <div class="line"></div>
                  <div class="row text-end">
                    <div class="col">
                      <div class="core_coll_shop_btn">
                        <a href="{{route('front.sunglass.page',['men'])}}" class="btn btnShop darkBGColor whiteColor whiteColor">SHOP</a>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="productColMain">
        <!-- male sun glass  -->
        @include('frontend.pages.section.men_sunglass')
        <!-- male sun glass  -->
          <div class="btnCol text-center">
            <a href="{{route('front.sunglass.page',['men'])}}" class="btn btnPrimary minWdBtn btnNew">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Male Sunglasses COre Collection end  -->

  <!-- $ card images  start  -->
<section>
    <div class="image_grid_col section_space image_grid_content overflow-hidden">
      <div class="row g-2">
        @foreach ($gallery as $gl)
        <div class="col-sm-6">
            <a href="#">
                <img src="{{asset($gl->photo)}}" alt="{{$gl->photo}}">
            </a>
        </div>
        @endforeach

        {{-- <div class="col-sm-6">
          <a href="#">  <img src="{{asset('assets/./images/img_grid2.png')}}" alt="Image Not Found"> </a>
        </div>
        <div class="col-sm-6">
          <a href="#">  <img src="{{asset('assets/./images/img_grid3.png')}}" alt="Image Not Found"> </a>
        </div>
        <div class="col-sm-6">
          <a href="#">  <img src="{{asset('assets/./images/img_grid4.png')}}" alt="Image Not Found"> </a>
        </div> --}}
      </div>
    </div>
  </section>
  <!-- $ card images end   -->

<section>
  <div class="productsCol section_space pt-0">
    <div class="container">
      <div class="bgLight">
        <div class="row gx-0 align-items-center">
          <div class="col-sm-6">
            <div class="core_coll_img">
                @if ($female_eyeglass_banner)
                <img src="{{asset($female_eyeglass_banner->photo)}}" alt="Image Not Found">
                @else
                <img src="{{asset('assets/./images/female_eye_glass.png')}}" alt="Image of female eye glass ">
                @endif
            </div>
          </div>
          <div class="col-sm-6">
            <div class="collection_col whiteBGColor core_coll_block_padding">
              <h2 class="darkColor">
                {{$female_eyeglass_banner->title ?? 'Female Eyeglasses COre Collection'}}</h2>
                <div class="line"></div>
                <div class="row text-end">
                  <div class="col">
                    <div class="core_coll_shop_btn">
                      <a href="{{route('front.eyeglass.page',['women'])}}" class="btn btnShop darkBGColor whiteColor whiteColor" href="#">SHOP</a>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="productColMain">
      <!-- female eye glass row  -->
      @include('frontend.pages.section.female_eyeglass')
      <!-- female eye glass end  -->
        <div class="btnCol text-center">
          <a href="{{route('front.eyeglass.page',['women'])}}" class="btn btnPrimary minWdBtn btnNew">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Female Eyeglasses COre Collection end   -->
<!-- Male Eyeglasses COre Collection start  -->
<section>
  <div class="productsCol section_space pt-0">
    <div class="container">
      <div class="bgLight">
        <div class="row gx-0 align-items-center">
          <div class="col-sm-6 order-lg-last">
            <div class="core_coll_img">
                @if ($man_eyeglass_banner)
                <img src="{{asset($man_eyeglass_banner->photo)}}" alt="Image Not Found">
                @else
                <img src="{{asset('assets/./images/male-product1.jpg')}}" alt="Image Not Found">
                @endif
            </div>
          </div>
          <div class="col-sm-6">
            <div class="collection_col whiteBGColor core_coll_block_padding collection_col_right">
              <h2 class="darkColor">{{$man_eyeglass_banner->title ?? ' Eyeglasses Core Collection'}} </h2>
                <div class="line"></div>
                <div class="row text-end">
                  <div class="col">
                    <div class="core_coll_shop_btn">
                      <a href="{{route('front.eyeglass.page',['men'])}}" class="btn btnShop darkBGColor whiteColor whiteColor">SHOP</a>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="productColMain">
      <!-- male sun glass  -->
      @include('frontend.pages.section.men_eyeglass')
      <!-- male sunglass  -->
        <div class="btnCol text-center">
          <a href="{{route('front.eyeglass.page',['men'])}}" class="btn btnPrimary minWdBtn btnNew">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Male Eyeglasses COre Collection end  -->


<!-- Female Sunglasses COre Collection end -->

@endsection

@push('scripts')

<script>
     var root = "{{asset('')}}";
     var product = @json($product_variant)

     function changeProDetail(id,type,parent_id) {
        var data = product.find(item => item.id == id)
        if(data.length != 0){
            $('.last-product-'+parent_id).removeClass('active-product last-product')
            $("#href_"+type+parent_id+"_"+id).addClass('active-product last-product')
            if(data.id != id){$("#href_"+type+parent_id+"_"+current_prod_id).removeClass('active-product')}
            if(!isValidURL(data.photo)){
                $("#" + type + "pro_img_" + parent_id).attr('src', root + insertAtPosition(data.photo,'med'))
            }else{
                $("#" + type + "pro_img_" + parent_id).attr('src', data.photo)
            }
            $("#"+type+"brand_name_"+parent_id).html(data.brand_name)
            $("#"+type+"pro_model_"+parent_id).html("<a class='text-dark link-primary' href='{{url('product-detail')}}/"+data.slug+"'>"+data.title+"</a>")
            $("#"+type+"pro_price_"+parent_id).html("$"+data.price)
            $("#"+type+"pro_discount_"+parent_id).html("%"+data.discount)
        }

    }
</script>

@endpush
