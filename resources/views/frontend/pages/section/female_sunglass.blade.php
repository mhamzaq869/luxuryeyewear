  <div class="row g-4">

      @foreach ($female_sunglasses as $product)
          <div class="col-md-6 col-xl-4">
              <div class="card h-100">
                  <div class="card-body">

                      <div class="productImg">
                          <a href="{{ route('product-detail', $product->slug) }}">
                              <div class="imgCol">
                                  @if (!isValidUrl($product->photo))
                                      <img src="{{ asset(insertAtPosition($product->photo, 'med')) }}"
                                          id="female_sunglass_pro_img_{{ $product->id }}" alt="Product ">
                                  @else
                                      <img src="{{ $product->photo }}" id="female_sunglass_pro_img_{{ $product->id }}"
                                          alt="Product ">
                                  @endif
                              </div>
                          </a>
                      </div>

                      <div class="color_builts">
                          <ul class="text-center">

                              @if ($active = $product)
                                  <li>
                                      <a href="javascript:void(0)"
                                          onclick="changeProDetail({{ $active->id }},'female_sunglass_',{{ $product->id }})">
                                          @if (!isValidUrl($active->photo))
                                              <img src="{{ asset(insertAtPosition($active->photo)) }}" alt=""
                                                  class="p-2 hover-product active-product last-product last-product-{{ $product->id }}"
                                                  id="href_female_sunglass_{{ $product->id }}_{{ $active->id }}"
                                                  onmouseover="changeProDetail({{ $product->id }},'female_sunglass_',{{ $product->id }})"
                                                  @if ($product_variant->where('id', '!=', $product->id)->where('cat_id', $product->cat_id)->count() === 0) style="margin-left:-20px" @endif>
                                          @else
                                              <img src="{{ $active->photo }}" alt=""
                                                  class="p-2 hover-product active-product last-product last-product-{{ $product->id }}"
                                                  id="href_female_sunglass_{{ $product->id }}_{{ $active->id }}"
                                                  onmouseover="changeProDetail({{ $product->id }},'female_sunglass_',{{ $product->id }})"
                                                  @if ($product_variant->where('id', '!=', $product->id)->where('cat_id', $product->cat_id)->count() === 0) style="margin-left:-20px" @endif>
                                          @endif
                                      </a>
                                  </li>
                              @endif

                              @foreach ($product_variant->where('id', '!=', $product->id)->where('cat_id', $product->cat_id)->flatten() as $i => $variant)
                                  @if ($i <= 2)
                                      <li>
                                          <a href="javascript:void(0)"
                                              onclick="changeProDetail({{ $variant->id }},'female_sunglass_',{{ $product->id }})"
                                              onmouseover="changeProDetail({{ $variant->id }},'female_sunglass_',{{ $product->id }})">
                                              @if (!isValidUrl($variant->photo))
                                                  <img src="{{ asset(insertAtPosition($variant->photo)) }}"
                                                      class="p-2 hover-product last-product-{{ $product->id }}"
                                                      id="href_female_sunglass_{{ $product->id }}_{{ $variant->id }}">
                                              @else
                                                  <img src="{{ asset(insertAtPosition($variant->photo)) }}"
                                                      class="p-2 hover-product last-product-{{ $product->id }}"
                                                      id="href_female_sunglass_{{ $product->id }}_{{ $variant->id }}">
                                              @endif
                                          </a>
                                      </li>
                                  @endif
                              @endforeach

                              @if (isset($i) && $i > 2)
                                  @if (count($product_variant->where('cat_id', $product->cat_id)) - 4 > 0)
                                      <li> <a href="{{ route('product-detail', [$product->slug]) }}"
                                              class="text-danger m-2">
                                              <p> +{{ count($product_variant->where('cat_id', $product->cat_id)) - 4 }}
                                              </p>
                                          </a>
                                      </li>
                                  @endif
                              @endif

                          </ul>

                      </div>

                      <div class="contentCol">

                          <h4 class="brandCol" id="female_sunglass_brand_name_{{ $product->id }}">
                              {{ $product->brandName }} </h4>
                          <a href="{{ route('product-detail', $product->slug) }}" target="_blank" class="text-dark">
                              <p id="female_sunglass_pro_model_{{ $product->id }}" class="text-dark link-primary">
                                  {{ $product->title }}</p>
                          </a>
                          <span class="priceCol" id="female_sunglass_pro_price_{{ $product->id }}"></span>


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
          </div>
      @endforeach


  </div>
