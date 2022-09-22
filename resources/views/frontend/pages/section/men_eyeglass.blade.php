  <div class="row g-4">

      @foreach ($male_eyeglasses as $product)
          <div class="col-md-6 col-xl-4">


            <div class="cardStyle1">

                {{-- <span class="discountCol" id="female_eyeglass_pro_discount_{{ $product->id }}">{{$product->discount}}% off</span> --}}

                <div class="productImg">
                    <a href="{{ route('product-detail', $product->slug) }}">
                        <div class="imgCol">
                            <img src="{{ asset($product->photo) }}" id="men_eyeglass_pro_img_{{ $product->id }}" alt="Product ">
                        </div>
                    </a>

                    <div class="color_builts">
                        <ul>
                            @if ($active = $product)
                                <li>
                                    <a href="javascript:void(0)" onclick="changeProDetail({{ $active->id }},'men_eyeglass_',{{ $product->id }})" >
                                        @if (!isValidUrl($active->photo))
                                        <img src="{{ asset(insertAtPosition($active->photo)) }}" alt="" class="p-2 hover-product active-product last-product last-product-{{$product->id}}" id="href_men_eyeglass_{{$product->id}}_{{ $active->id }}" onmouseover="changeProDetail({{ $product->id }},'men_eyeglass_',{{ $product->id }})">
                                        @else
                                        <img src="{{ $active->photo }}" alt="" class="p-2 hover-product active-product last-product last-product-{{$product->id}}" id="href_men_eyeglass_{{$product->id}}_{{ $active->id }}" onmouseover="changeProDetail({{ $product->id }},'men_eyeglass_',{{ $product->id }})">
                                        @endif
                                    </a>
                                </li>
                            @endif

                            @foreach ($product_variant->where('id','!=',$product->id)->whereIn('product_for',[27,30])->flatten() as $i => $variant)
                                @if ($i <= 2)
                                <li>
                                    <a href="javascript:void(0)"  onclick="changeProDetail({{ $variant->id }},'men_eyeglass_',{{ $product->id }})" onmouseover="changeProDetail({{ $variant->id }},'men_eyeglass_',{{ $product->id }})">
                                        @if (!isValidUrl($variant->photo))
                                        <img src="{{ asset(insertAtPosition($variant->photo)) }}" class="p-2 hover-product last-product-{{$product->id}}" id="href_men_eyeglass_{{$product->id}}_{{ $variant->id }}">
                                        @else
                                        <img src="{{ $variant->photo }}" class="p-2 hover-product last-product-{{$product->id}}" id="href_men_eyeglass_{{$product->id}}_{{ $variant->id }}">
                                        @endif
                                    </a>
                                </li>
                                @endif
                            @endforeach

                            @if (isset($i) && $i >= 2)
                                @if((count($product_variant->whereIn('product_for',[27,30])) - 4) != 0)
                                <li>
                                    <a href="{{route('product-detail',[$product->slug])}}" class="text-danger m-2">
                                        +{{count($product_variant->whereIn('product_for',[27,30])) - 4}}
                                    </a>
                                </li>
                                @endif
                            @endif

                        </ul>

                    </div>

                </div>

                <div class="contentCol">

                    <h4 class="brandCol" id="men_eyeglass_brand_name_{{ $product->id }}"">{{ $product->brand->title }} </h4>
                    <a href="{{ route('product-detail', $product->slug) }}" target="_blank" class="text-dark">
                        <p id="men_eyeglass_pro_model_{{ $product->id }}" class="text-dark link-primary">{{ $product->title }}</p>
                    </a>
                    <span class="priceCol" id="men_eyeglass_pro_price_{{ $product->id }}""> ${{ $product->price }}</span>


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
