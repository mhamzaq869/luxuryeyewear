  <div class="row g-4">

      @foreach ($female_eyeglasses as $product)
          <div class="col-md-6 col-xl-4">

            <div class="cardStyle1">

                {{-- <span class="discountCol" id="female_eyeglass_pro_discount_{{ $product->id }}">{{$product->discount}}% off</span> --}}

                <div class="productImg">
                    <a href="{{ route('product-detail', $product->slug) }}">
                        <div class="imgCol">
                            @if (!isValidUrl($product->photo))
                            <img src="{{ asset(insertAtPosition($product->photo,'med')) }}" id="female_eyeglass_pro_img_{{ $product->id }}" alt="Product " >
                            @else
                            <img src="{{ $product->photo }}" id="female_eyeglass_pro_img_{{ $product->id }}" alt="Product " >
                            @endif
                        </div>
                    </a>

                    <div class="color_builts">

                        <ul>
                            @if ($active = $product)
                                <li>
                                    <a href="javascript:void(0)" onclick="changeProDetail({{ $active->id }},'female_eyeglass_',{{ $product->id }})" onmouseover="changeProDetail({{ $active->id }},'female_eyeglass_',{{ $product->id }})">
                                        @if (!isValidUrl($active->photo))
                                        <img src="{{ asset(insertAtPosition($active->photo)) }}" class="p-2 hover-product active-product last-product last-product-{{$product->id}}" id="href_female_eyeglass_{{$product->id}}_{{ $active->id }}">
                                        @else
                                        <img src="{{ $active->photo }}" class="p-2 hover-product active-product last-product last-product-{{$product->id}}" id="href_female_eyeglass_{{$product->id}}_{{ $active->id }}">
                                        @endif
                                    </a>
                                </li>
                            @endif


                            @foreach ($product_variant->where('cat_id',$product->cat_id)->where('id','!=',$product->id)->whereIn('product_for',[28,30])->flatten() as $i => $variant)
                                {{-- @if ($variant->id != $product->id) --}}

                                    @if ($i <= 2)
                                    <li>
                                        <a href="javascript:void(0)" onclick="changeProDetail({{ $variant->id }},'female_eyeglass_',{{ $product->id }})" onmouseover="changeProDetail({{ $variant->id }},'female_eyeglass_',{{ $product->id }})">
                                            @if (!isValidUrl($variant->photo))
                                            <img src="{{ asset(insertAtPosition($variant->photo)) }}" alt="" class="p-2 hover-product last-product-{{$product->id}}" id="href_female_eyeglass_{{$product->id}}_{{ $variant->id }}">
                                            @else
                                            <img src="{{ $variant->photo }}" alt="" class="p-2 hover-product last-product-{{$product->id}}" id="href_female_eyeglass_{{$product->id}}_{{ $variant->id }}">
                                            @endif
                                        </a>
                                    </li>
                                    @endif
                                {{-- @endif --}}
                            @endforeach

                            @if (isset($i) && $i > 2)
                                @if((count($product_variant->where('cat_id',$product->cat_id)->whereIn('product_for',[28,30])) - 4) != 0)
                                <li style="padding: 0px">
                                    <a href="{{route('product-detail',[$product->slug])}}" style="padding: 14px" target="_blank" class="text-danger m-2">
                                        +{{count($product_variant->where('cat_id',$product->cat_id)->whereIn('product_for', [28,30])) - 4}}
                                    </a>
                                </li>
                                @endif
                            @endif
                        </ul>

                    </div>

                </div>

                <div class="contentCol">

                    <h4 class="brandCol" id="female_eyeglass_brand_name_{{ $product->id }}">{{ $product->brandName }} </h4>
                    <a href="{{ route('product-detail', $product->slug) }}" class="text-dark" target="_blank">
                        <p id="female_eyeglass_pro_model_{{ $product->id }}" class="text-dark link-primary">{{ $product->title }}</p>
                    </a>
                    <span class="priceCol" id="female_eyeglass_pro_price_{{ $product->id }}"> ${{ number_format($product->price,2) }}</span>


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
