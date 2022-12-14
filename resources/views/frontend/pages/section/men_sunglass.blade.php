  <div class="row g-4">

      @foreach ($male_sunglasses as $product)
          <div class="col-md-6 col-xl-4">

            <div class="cardStyle1">

                {{-- <span class="discountCol" id="female_eyeglass_pro_discount_{{ $product->id }}">{{$product->discount}}% off</span> --}}

                <div class="productImg">
                    <a href="{{ route('product-detail', $product->slug) }}" target="_blank">
                        <div class="imgCol">
                            <img src="{{ asset(insertAtPosition($product->photo,'med')) }}" id="men_sunglass_pro_img_{{ $product->id }}" alt="Product ">
                        </div>
                    </a>

                    <div class="color_builts">

                        <ul>

                            @if ($active = $product->variant->where('id',$product->id)->first())
                                <li>
                                    <a href="javascript:void(0)" target="_blank" onclick="changeProDetail({{ $active->id }},'men_sunglass_',{{ $product->id }})" onmouseover="changeProDetail({{ $product->id }},'men_sunglass_',{{ $product->id }})">
                                        @if (!isValidUrl($active->photo))
                                        <img src="{{ asset(insertAtPosition($active->photo)) }}" alt="" class="p-2 hover-product active-product last-product last-product-{{$product->id}}" id="href_men_sunglass_{{$product->id}}_{{ $active->id }}">
                                        @else
                                        <img src="{{ asset(insertAtPosition($active->photo)) }}" alt="" class="p-2 hover-product active-product last-product last-product-{{$product->id}}" id="href_men_sunglass_{{$product->id}}_{{ $active->id }}">
                                        @endif
                                    </a>
                                </li>
                            @endif

                            @foreach ($product->variant->where('id','!=',$product->id)->flatten() as $i => $variant)
                                    @if ($i <= 2)
                                        <li>
                                            <a href="javascript:void(0)" target="_blank" onclick="changeProDetail({{ $variant->id }},'men_sunglass_',{{ $product->id }})"  onmouseover="changeProDetail({{ $variant->id }},'men_sunglass_',{{ $product->id }})">
                                                @if (!isValidUrl($variant->photo))
                                                <img src="{{ asset(insertAtPosition($variant->photo)) }}" alt="" class="p-2 hover-product last-product-{{$product->id}}" id="href_men_sunglass_{{$product->id}}_{{ $variant->id }}">
                                                @else
                                                <img src="{{ $variant->photo }}" alt="" class="p-2 hover-product last-product-{{$product->id}}" id="href_men_sunglass_{{$product->id}}_{{ $variant->id }}">
                                                @endif
                                            </a>
                                        </li>
                                    @endif

                            @endforeach

                            @if (isset($i) && $i >= 2)
                                @if((count($product->variant) - 4) != 0)
                                <li style="padding: 0px">
                                    <a href="{{route('product-detail',[$product->slug])}}" target="_blank" style="padding: 14px" class="text-danger m-2">
                                        +{{count($product->variant) - 4}}
                                    </a>
                                </li>
                                @endif
                            @endif
                        </ul>

                    </div>

                </div>

                <div class="contentCol">

                    <h4 class="brandCol" id="men_sunglass_brand_name_{{ $product->id }}">{{ $product->brandName }} </h4>
                    <a href="{{ route('product-detail', $product->slug) }}" target="_blank">
                        <p id="men_sunglass_pro_model_{{ $product->id }}" class="text-dark link-primary">{{ $product->title }}</p>
                    </a>
                    <span class="priceCol" id="men_sunglass_pro_price_{{ $product->id }}"></span>


                    <div class="row gx-2">

                        <div class="col-auto">

                            <a href="{{ route('single-add-to-cart', $product->slug) }}"
                                class="btn btnDark w-100 addCartBtn">ADD TO CART</a>

                        </div>

                        <div class="col">

                            <a href="{{ route('add-to-wishlist', $product->slug) }}"
                                class="btn btnDark_outline w-100">ADD TO WISHLIST</a>

                        </div>

                    </div>

                </div>

            </div>

          </div>
      @endforeach


  </div>
