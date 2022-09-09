@extends('frontend.layouts.master')

@section('title', ' Product-detail ')



@section('description', 'Product-detail Description ')

@section('keywords', ' Product-detail Keywords')

@section('robots', 'index, follow')

@section('revisit-after', 'content="3 days')



@section('main-content')









  <section>

    <div class="productDetailPage">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="swiper_COl">

              <div class="swiper mySwiper2" itemscope itemtype="http://schema.org/ImageGallery">

                <ul class="swiper-wrapper my-gallery">

                  <li id="1" class="swiper-slide" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">

                    <a id="first" title="click to zoom-in" href="https://www.luxuryeyewear.in/uploaded_files/product/179341254.jpeg" itemprop="contentUrl" data-size="2400x1200">

                      <img src="https://www.luxuryeyewear.in/uploaded_files/product/179341254.jpeg" class="proSlideImg">

                    </a>

                  </li>

                  <li id="2" class="swiper-slide" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">

                    <a title="click to zoom-in" href="https://www.luxuryeyewear.in/uploaded_files/product/359271150.jpeg"

                       itemprop="contentUrl" data-size="2400x1200">

                      <img src="https://www.luxuryeyewear.in/uploaded_files/product/359271150.jpeg" class="proSlideImg" itemprop="thumbnail" alt="Image description" />

                    </a>

                  </li>

                </ul>

                <div class="swiper-button-next"></div>

                <div class="swiper-button-prev"></div>

              </div>

              <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                <div class="pswp__bg"></div>

                <div class="pswp__scroll-wrap">

                  <div class="pswp__container">

                    <div class="pswp__item"></div>

                    <div class="pswp__item"></div>

                    <div class="pswp__item"></div>

                  </div>

                  <div class="pswp__ui pswp__ui--hidden">

                    <div class="pswp__top-bar">

                      <div class="pswp__counter"></div>

                      <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                      <button class="pswp__button pswp__button--share" title="Share"></button>

                      <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                      <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                      <div class="pswp__preloader">

                        <div class="pswp__preloader__icn">

                          <div class="pswp__preloader__cut">

                            <div class="pswp__preloader__donut"></div>

                          </div>

                        </div>

                      </div>

                    </div>

                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">

                      <div class="pswp__share-tooltip"></div>

                    </div>

                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>

                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>

                    <div class="pswp__caption">

                      <div class="pswp__caption__center"></div>

                    </div>

                  </div>

                </div>

              </div>

              <div thumbsSlider="" class="swiper mySwiper">

                <div class="swiper-wrapper">

                  <div class="swiper-slide">

                    <img src="https://www.luxuryeyewear.in/uploaded_files/product/179341254.jpeg" />

                  </div>

                  <div class="swiper-slide">

                    <img src="https://www.luxuryeyewear.in/uploaded_files/product/359271150.jpeg" />

                  </div>

                </div>

              </div>

            </div>

          </div>

          <div class="col-lg-6">

            <div class="proDetailRightCol">

              <div class="zoom">

              </div>

              <div class="topBrandCol">

                <span class="text-secondary">Brand:</span>

                <a href="javascript:void(0)" class="text-dark"><small>Carrera</small></a>

              </div>

              <h4 class="proTitle pt-2 pb-1">CARRERA 242/G 010</h4>

              <p class="uan_no">4822 PALLADIUM</p>



              <div class="row gy-2">

                <div class="col-12">

                  <div class="row align-items-center">

                    <div class="col-auto">

                      <span class="productPrice">₹7900</span>

                    </div>

                    <div class="col-auto mt-2 text-end">

                      <div class="product_quantity">

                        <div class="qtySelector row g-0">

                          <div class="col-auto">

                            <span class="qtyTrigger decreaseQty">-</span>

                          </div>

                          <div class="col">

                            <input type="text" class="form-control qtyValue" value="1" />

                          </div>

                          <div class="col-auto">

                            <span class="qtyTrigger increaseQty">+</span>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

                <div class="col-12">

                  <div class="row align-items-center mt-2">

                    <div class="col-auto">

                      <span class="detailLblCol">Color</span>

                    </div>

                    <div class="col-auto">

                      <div class="img_COL">

                        <a href="javascript:void(0)">

                          <img class="proColor" src="https://www.luxuryeyewear.in/uploaded_files/color_image/389523835.jpg">

                        </a>

                        <a href="javascript:void(0)">

                          <img class="proColor" src="https://www.luxuryeyewear.in/uploaded_files/color_image/275697943.jpg">

                        </a>

                        <a href="javascript:void(0)">

                          <img class="proColor" src="https://www.luxuryeyewear.in/uploaded_files/color_image/357545370.jpg">

                        </a>

                        <a href="javascript:void(0)">

                          <img class="proColor" src="https://www.luxuryeyewear.in/uploaded_files/color_image/480551827.jpg">

                        </a>

                      </div>

                    </div>

                  </div>

                </div>

                <div class="col-12">

                  <div class="row align-items-center mt-2">

                    <div class="col-auto">

                      <span class="detailLblCol">Size</span>

                    </div>

                    <div class="col-auto">

                      <span class="dtlTextCol">48-22-145-43</span>

                    </div>

                  </div>

                </div>

                <div class="col-12">

                  <div class="row g-3 align-items-center">

                    <div class="col-sm-auto col-12">

                      <div class="class_Btn">

                        <button href="#" class="btn1-- btn minWdBtn btnDark text-uppercase">add to cart</button>

                      </div>

                    </div>

                    <div class="col">

                      <div class="class_Btn_new ">

                        <a href="javascript:void(0)" class="btn add_to_wishlist btnDark_outline w-100">Add to Wishlist</a>

                      </div>

                    </div>

                    <div class="col-auto">

                      <div class="shareCol">


                      <div class="shareTrigger">
                        <a href="javascript:void(0)">
                          <img src="{{asset('assets/images/share-icon.svg')}}" alt="Share icon"></a></div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

        <div class="proBtmDetailCol">

          <div class="proCard">

            <div class="row align-items-center">



              <div class="col-lg">

                <h4 class="detailTitle">Frame Measurement</h4>

                <div class="lense_imgs">

                  <div class="row">

                    <div class="col-6 col-sm-2">

                      <img src="https://www.luxuryeyewear.in/img/sizechart01.png" alt="">

                      <h6 class="page_speed_1600560138">LENS WIDTH<br> 48</h6>

                    </div>

                    <div class="col-6 col-sm-2">

                      <img src="https://www.luxuryeyewear.in/img/sizechart02.png" alt="">

                      <h6 class="page_speed_1600560138">BRIDGE WIDTH<br> 22</h6>

                    </div>

                    <div class="col-6 col-sm-2">

                      <img src="https://www.luxuryeyewear.in/img/sizechart03.png" alt="">

                      <h6 class="page_speed_1600560138">TEMPLE LENGTH<br> 145</h6>

                    </div>

                    <div class="col-6 col-sm-2">

                      <img src="https://www.luxuryeyewear.in/img/sizechart04.png" alt="">

                      <h6 class="page_speed_542998610">LENS HEIGHT<br> 43</h6>

                    </div>

					<div class="col-6 col-sm-2">

                      <img src="https://www.luxuryeyewear.in/img/sizechart04.png" alt="">

                      <h6 class="page_speed_542998610">LENS HEIGHT<br> 43</h6>

                    </div>



                  </div>

                </div>

              </div>

            </div>



          </div>





          <div class="proCard">

            <h4 class="detailTitle">Product Detail</h4>

            <div class="row product_row ">

              <div class="col-md-4">

                <ul class="detailList">

                  <li><span class="detailListLbl">Frmae Type :</span> <span class="detailListText"> Full Frame</span></li>

                  <li><span class="detailListLbl">Type :</span> <span class="detailListText"> Eyeglasses</span></li>

                  <li><span class="detailListLbl">Gender :</span> <span class="detailListText"> Unisex</span></li>

                </ul>

              </div>

              <div class="col-md-4">

                <ul class="detailList">

                  <li><span class="detailListLbl">Frmae Shape :</span> <span class="detailListText">Round</span></li>

                  <li><span class="detailListLbl">EAN Code :</span> <span class="detailListText">716736307480</span></li>

                </ul>

              </div>

              <div class="col-md-4">

                <ul class="detailList">

                  <li><span class="detailListLbl">Material :</span> <span class="detailListText"> Acetate And Metal </span></li>

                  <li><span class="detailListLbl">Warranty :</span> <span class="detailListText">2 Years International Warranty.</span></li>

                </ul>

              </div>

            </div>

          </div>



          <div class="proCard">

            <h4 class="detailTitle">Description</h4>

            <p>Classic elegance reinterpreted for today – these men’s sunglasses update the timeless round-frame silhouette with a bold acetate construction. Notice Carrera’s subtle yet unmistakable metal logo plaque positioned on the temples, as

              well as the metal wire core that remains subtly visible on the inner arms.</p>

            <ul>

              <li>Round frames</li>

              <li>Dark havana acetate</li>

              <li>Brown lenses</li>

              <li>Rx-able: can be fitted with prescription lenses</li>

            </ul>

          </div>



        </div>

      </div>

    </div>

  </section>







  <div class="product_detail pb-0">

   <div class="container">

    <div class="product_deatail_list">



  <div class="product_deatail_list_text">

            <div class="lineTitleCol">

              <h6 class="lineTitle">Explore Our Products</h6>

            </div>

            <h2 class="product_detail_head lgTitle darkColor">YOU MIGHT ALSO LIKE</h2>

          </div>



  <div class="productColMain">

          <div class="row g-4">

            <div class="col-md-6 col-xl-3">

              <div class="cardStyle1">

                <span class="discountCol">20% off</span>

                <div class="productImg">

                  <div class="imgCol">

                    <img src="images/product-img-1.png" alt="...">

                  </div>

                  <div class="color_builts">

                    <ul>

                      <li>

                        <a href="javascript:void(0)"></a>

                      </li>

                    </ul>

                  </div>

                </div>

                <div class="contentCol">

                  <h4 class="brandCol">HUGO BOSS</h4>

                  <p>HUGO BOSS HG 0328 086</p>

                  <span class="priceCol">₹8900 </span>

                  <div class="row gx-2">

                    <div class="col-auto">

                      <a href="javascript:void(0)" class="btn btnDark w-100 addCartBtn btn_explore">ADD TO CART</a>

                    </div>

                    <div class="col">

                      <a href="javascript:void(0)" class="btn btnDark_outline w-100 btn_explore">ADD TO WISHLIST</a>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="col-md-6 col-xl-3">

              <div class="cardStyle1">

                <div class="productImg">

                  <div class="imgCol">

                    <img src="images/product-img-2.png" alt="...">

                  </div>

                  <div class="color_builts">

                    <ul>

                      <li>

                        <a href="javascript:void(0)" class=""></a>

                      </li>

                      <li>

                        <a href="javascript:void(0)" class=""></a>

                      </li>

                      <li>

                        <a href="javascript:void(0)" class=""></a>

                      </li>

                    </ul>

                  </div>

                </div>

                <div class="contentCol">

                  <h4 class="brandCol">TOMMY HILFIGER</h4>

                  <p>TOMMY HILFIGER TH 1689 086</p>

                  <span class="priceCol">₹9900 </span>

                  <div class="row gx-2">

                    <div class="col-auto">

                      <a href="javascript:void(0)" class="btn btnDark w-100 addCartBtn btn_explore">ADD TO CART</a>

                    </div>

                    <div class="col">

                      <a href="javascript:void(0)" class="btn btnDark_outline w-100 btn_explore">ADD TO WISHLIST</a>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="col-md-6 col-xl-3">

              <div class="cardStyle1">

                <span class="discountCol">20% off</span>

                <div class="productImg">

                  <div class="imgCol">

                    <img src="images/product-img-3.png" alt="...">

                  </div>

                  <div class="color_builts">

                    <ul>

                      <li>

                        <a href="javascript:void(0)"></a>

                      </li>

                    </ul>

                  </div>

                </div>

                <div class="contentCol">

                  <h4 class="brandCol">TOMMY HILFIGER</h4>

                  <p>TOMMY HILFIGER TH 1689 086</p>

                  <span class="priceCol">₹9900 </span>

                  <div class="row gx-2">

                    <div class="col-auto">

                      <a href="javascript:void(0)" class="btn btnDark w-100 addCartBtn btn_explore">ADD TO CART</a>

                    </div>

                    <div class="col">

                      <a href="javascript:void(0)" class="btn btnDark_outline w-100 btn_explore">ADD TO WISHLIST</a>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="col-md-6 col-xl-3">

              <div class="cardStyle1">

                <span class="discountCol">20% off</span>

                <div class="productImg">

                  <div class="imgCol">

                    <img src="images/product-img-4.png" alt="...">

                  </div>

                  <div class="color_builts">

                    <ul>

                      <li>

                        <a href="javascript:void(0)"></a>

                      </li>

                    </ul>

                  </div>

                </div>

                <div class="contentCol">

                  <h4 class="brandCol">ELIE SAAB</h4>

                  <p>ELIE SAAB ES 061/G/S MVU</p>

                  <span class="priceCol">₹41800</span>

                  <div class="row gx-2">

                    <div class="col-auto">

                      <a href="javascript:void(0)" class="btn btnDark w-100 addCartBtn btn_explore">ADD TO CART</a>

                    </div>

                    <div class="col">

                      <a href="javascript:void(0)" class="btn btnDark_outline w-100 btn_explore">ADD TO WISHLIST</a>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="col-md-6 col-xl-3">

              <div class="cardStyle1">

                <div class="productImg">

                  <div class="imgCol">

                    <img src="images/product-img-5.png" alt="...">

                  </div>

                  <div class="color_builts">

                    <ul>

                      <li>

                        <a href="javascript:void(0)" class=""></a>

                      </li>

                      <li>

                        <a href="javascript:void(0)" class=""></a>

                      </li>

                      <li>

                        <a href="javascript:void(0)" class=""></a>

                      </li>

                    </ul>

                  </div>

                </div>

                <div class="contentCol">

                  <h4 class="brandCol">JIMMY CHOO</h4>

                  <p>JIMMY CHOO VINA/G/SK J5G</p>

                  <span class="priceCol">₹19900</span>

                  <div class="row gx-2">

                    <div class="col-auto">

                      <a href="javascript:void(0)" class="btn btnDark w-100 addCartBtn btn_explore">ADD TO CART</a>

                    </div>

                    <div class="col">

                      <a href="javascript:void(0)" class="btn btnDark_outline w-100 btn_explore">ADD TO WISHLIST</a>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="col-md-6 col-xl-3">

              <div class="cardStyle1">

                <span class="discountCol">20% off</span>

                <div class="productImg">

                  <div class="imgCol">

                    <img src="images/product-img-6.png" alt="...">

                  </div>

                  <div class="color_builts">

                    <ul>

                      <li>

                        <a href="javascript:void(0)"></a>

                      </li>

                    </ul>

                  </div>

                </div>

                <div class="contentCol">

                  <h4 class="brandCol">ELIE SAAB</h4>

                  <p>ELIE SAAB ES 087/S OGA</p>

                  <span class="priceCol">₹36000</span>

                  <div class="row gx-2">

                    <div class="col-auto">

                      <a href="javascript:void(0)" class="btn btnDark w-100 addCartBtn btn_explore">ADD TO CART</a>

                    </div>

                    <div class="col">

                      <a href="javascript:void(0)" class="btn btnDark_outline w-100 btn_explore">ADD TO WISHLIST</a>

                    </div>

                  </div>

                </div>

              </div>

            </div>

			<div class="col-md-6 col-xl-3">

              <div class="cardStyle1">

                <span class="discountCol">20% off</span>

                <div class="productImg">

                  <div class="imgCol">

                    <img src="images/product-img-6.png" alt="...">

                  </div>

                  <div class="color_builts">

                    <ul>

                      <li>

                        <a href="javascript:void(0)"></a>

                      </li>

                    </ul>

                  </div>

                </div>

                <div class="contentCol">

                  <h4 class="brandCol">ELIE SAAB</h4>

                  <p>ELIE SAAB ES 087/S OGA</p>

                  <span class="priceCol">₹36000</span>

                  <div class="row gx-2">

                    <div class="col-auto">

                      <a href="javascript:void(0)" class="btn btnDark w-100 addCartBtn btn_explore">ADD TO CART</a>

                    </div>

                    <div class="col">

                      <a href="javascript:void(0)" class="btn btnDark_outline w-100 btn_explore">ADD TO WISHLIST</a>

                    </div>

                  </div>

                </div>

              </div>

            </div>

			<div class="col-md-6 col-xl-3">

              <div class="cardStyle1">

                <span class="discountCol">20% off</span>

                <div class="productImg">

                  <div class="imgCol">

                    <img src="images/product-img-6.png" alt="...">

                  </div>

                  <div class="color_builts">

                    <ul>

                      <li>

                        <a href="javascript:void(0)"></a>

                      </li>

                    </ul>

                  </div>

                </div>

                <div class="contentCol">

                  <h4 class="brandCol">ELIE SAAB</h4>

                  <p>ELIE SAAB ES 087/S OGA</p>

                  <span class="priceCol">₹36000</span>

                  <div class="row gx-2">

                    <div class="col-auto">

                      <a href="javascript:void(0)" class="btn btnDark w-100 addCartBtn btn_explore">ADD TO CART</a>

                    </div>

                    <div class="col">

                      <a href="javascript:void(0)" class="btn btnDark_outline w-100  btn_explore">ADD TO WISHLIST</a>

                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

</div>

          </div>

        </div>



@endsection
