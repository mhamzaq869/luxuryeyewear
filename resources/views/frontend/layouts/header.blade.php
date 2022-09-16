

    <header>
    <div class="headerCol">
      <div class="container">
        <div class="header_content">
          <div class="row align-items-center g-2">
            <div class="col-auto">
              <div class="header_logo">
                <a href="{{route('home')}}">
                  <img src="{{asset('assets/images/luxury_logo.png')}}" alt="">
                </a>
              </div>
            </div>
            <div class="col">
              <div class="header_nav_links">
                <ul class="header_nav_links_style ">
                  <li class="mDropdownCol">
                    <a href="{{route('front.eyeglass.page')}}">Eyeglasses</a>
                    <div class="mDDCol">
                      <div class="row">
                        <div class="col-lg-4">
                        <div class="mDDContent brands_navbar d-none">
                            <h4 class="mDDTitle">Brands</h4>
                            <ul class="mDDList brands_list" style="height: 250px; overflow-y:scroll;">
                            @php
                                $brands = DB::table('brands')->select('*')->get();
                            @endphp
                            <ul class="mDDList brands_list" style="overflow:scroll; width:fit-content;  white-space: nowrap;">
                              <li><a href="javascript:void(0)">All Brands</a></li>
                              @foreach($brands as $brand)
                                <li><a href="{{url('product-brand/'.$brand->slug)}}">{{$brand->title}}</a></li>
                              @endforeach

                            </ul>
                          </div>
                          {{-- @php
                          $brands = DB::table('brands')->select('*')->get();
                          @endphp
                          <div class="bbb_viewed_slider_container">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($brands as $brand)
                                    <a href="{{url('product-brand/'.$brand->slug)}}">
                                        <div class="owl-item">
                                            <div class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                                {{$brand->title}}
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                          </div> --}}
                        </div>
                        <div class="col-lg-4">
                            <div class="mDDContent">
                            <h4 class="mDDTitle" onclick="redirect('{{route('front.eyeglass.page',['men'])}}')">Male Eyeglasses</h4>
                              <ul class="mDDList">
                                <li><a href="javascript:void(0)">All Brands</a></li>
                                <li><a href="javascript:redirect('{{route('front.eyeglass.page',['men','round'])}}')">Round</a></li>
                                <li><a href="javascript:redirect('{{route('front.eyeglass.page')}}')">Unisex</a></li>
                                <li><a href="javascript:redirect('{{route('front.eyeglass.page',['men','Square'])}}')">Square</a></li>
                                <li><a href="javascript:redirect('{{route('front.eyeglass.page',['men','Aviator'])}}')">Aviator</a></li>
                                <li><a href="javascript:redirect('{{route('front.eyeglass.page',['men','Sports'])}}')">Sports</a></li>
                                <li><a href="javascript:redirect('{{route('front.eyeglass.page',['men','Cat-Eye'])}}')">Cat-Eye</a></li>
                              </ul>
                            </div>
                          </div>
                        <div class="col-lg-4">
                          <div class="mDDContent">
                            <h4 class="mDDTitle" onclick="redirect('{{route('front.eyeglass.page',['women'])}}')"> Female Eyeglasses </h4>
                            <ul class="mDDList">
                              <li><a href="javascript:void(0)">All Brands</a></li>
                              <li><a href="javascript:redirect('{{route('front.eyeglass.page',['women','Round'])}}')">Round</a></li>
                              <li><a href="javascript:redirect('{{route('front.eyeglass.page')}}')">Unisex</a></li>
                              <li><a href="javascript:redirect('{{route('front.eyeglass.page',['women','Square'])}}')">Square</a></li>
                              <li><a href="javascript:redirect('{{route('front.eyeglass.page',['women','Aviator'])}}')">Aviator</a></li>
                              <li><a href="javascript:redirect('{{route('front.eyeglass.page',['women','Sports'])}}')">Sports</a></li>
                              <li><a href="javascript:redirect('{{route('front.eyeglass.page',['women','Cat-Eye'])}}')">Cat-Eye</a></li>
                            </ul>
                          </div>
                        </div>

                      </div>
                    </div>
                  </li>
                  <li class="mDropdownCol">
                    <a href="{{route('front.sunglass.page')}}">Sunglasses</a>
                    <div class="mDDCol">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="mDDContent brands_navbar d-none " >
                            <h4 class="mDDTitle">Brands</h4>
                            <ul class="mDDList brands_list" style="height: 250px; overflow-y:scroll;">
                            @php $brands = DB::table('brands')->select('*')->get(); @endphp
                            <ul class="mDDList brands_list" style="overflow-y:scroll;width:fit-content; white-space: nowrap;">
                              <li><a href="javascript:void(0)">All Brands</a></li>
                              @foreach($brands as $brand)
                                <li><a href="{{url('product-brand/'.$brand->slug)}}">{{$brand->title}}</a></li>
                              @endforeach
                            </ul>
                          </div>



                        </div>


                        <div class="col-lg-4">
                            <div class="mDDContent">
                              <h4 class="mDDTitle" onclick="redirect('{{route('front.sunglass.page',['men'])}}')">Male Sunglasses</h4>
                              <ul class="mDDList">
                                <li><a href="javascript:void(0)">All Brands</a></li>
                                <li><a href="javascript:redirect('{{route('front.sunglass.page',['men','Round'])}}')">Round</a></li>
                                <li><a href="javascript:redirect('{{route('front.sunglass.page')}}')">Unisex</a></li>
                                <li><a href="javascript:redirect('{{route('front.sunglass.page',['men','Square'])}}')">Square</a></li>
                                <li><a href="javascript:redirect('{{route('front.sunglass.page',['men','Aviator'])}}')">Aviator</a></li>
                                <li><a href="javascript:redirect('{{route('front.sunglass.page',['men','Sports'])}}')">Sports</a></li>
                                <li><a href="javascript:redirect('{{route('front.sunglass.page',['men','Cat-Eye'])}}')">Cat-Eye</a></li>
                              </ul>
                            </div>
                          </div>

                        <div class="col-lg-4">
                          <div class="mDDContent">
                            <h4 class="mDDTitle"  onclick="redirect('{{route('front.sunglass.page',['women'])}}')">Female Sunglasses</h4>
                            <ul class="mDDList">
                              <li><a href="javascript:void(0)">All Brands</a></li>
                              <li><a href="javascript:redirect('{{route('front.sunglass.page',['women','Round'])}}')">Round</a></li>
                              <li><a href="javascript:redirect('{{route('front.sunglass.page')}}')">Unisex</a></li>
                              <li><a href="javascript:redirect('{{route('front.sunglass.page',['women','Square'])}}')">Square</a></li>
                              <li><a href="javascript:redirect('{{route('front.sunglass.page',['women','Aviator'])}}')">Aviator</a></li>
                              <li><a href="javascript:redirect('{{route('front.sunglass.page',['women','Sports'])}}')">Sports</a></li>
                              <li><a href="javascript:redirect('{{route('front.sunglass.page',['women','Cat-Eye'])}}')">Cat-Eye</a></li>
                            </ul>
                          </div>
                        </div>

                      </div>
                    </div>
                  </li>
                  <li>
                    <a href="{{route('front.brands.page')}}">Brands</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-auto">
              <div class="header_right_link_icon">
                <ul class="header_right_link_icon_style">
                  <li>
                    <div class="headerSearchCol">
                      <a href="javascript:void(0)" class="searchTrigger">
                        <img  src="{{asset('assets/./images/search-icon.svg')}}" alt="Image Not Found"></a>
                      <div class="headerFldCol">
                        <div class="headerSearchFld">
                          <div class="container-fluid">
                            <div class="row g-2 align-items-center">
                              <div class="col">
                                <form action="{{route('product.search')}}" method="get" class="topmenusearch page_speed_1450106835">
                                  <input type="text" class="form-control" placeholder="Search Products..."
                                   name="search" id="search_keyword" required="">
                                </form>
                              </div>
                              <div class="col-auto">
                                <span class="searchCloseTrigger">
                                  <img src="{{asset('assets/images/close-icon.svg')}}" alt="...">
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="dropchoose">

                    @auth
                    <a href="{{route('user')}}"><img src="{{asset('assets/./images/login.png')}}"
                       alt="Image Not Found"></a>
                    @else
                       <a href="{{route('login.form')}}"><img src="{{asset('assets/./images/login.png')}}"
                       alt="Image Not Found"></a>
                    @endauth
                       {{-- @auth --}}
                       {{-- <ul class="dropdownCol" style="margin-top:1rem; width:2rem"> --}}

                        {{-- <li style="padding:0.500rem;"><a href="{{route('user.logout')}}">logout</a></li> --}}



                       {{-- </ul> --}}

                    {{-- @endauth --}}
                  </li>
                  <li>
                    <a href="{{route('wishlist')}}"><img src="{{asset('assets/./images/like-icon.svg')}}"
                       alt="Image Not Found"></a>

                       @auth
                       {{DB::table('wishlists')->where('user_id',request()->ip())->count()}}
                       @else
                       0
                       @endauth
                  </li>
                  <li>
                    <a href="{{route('cart')}}"><img src="{{asset('assets/./images/cart-icon.svg')}}"
                       alt="Image Not Found"></a>
                       {{-- @auth --}}
                       {{DB::table('carts')->where('user_id',request()->ip())->count()}}
                       {{-- @else
                       0
                       @endauth --}}

                  </li>
                  <li class="d-lg-none">
                    <a href="javascript:void(0)" class="navTrigger"><img src="{{asset('assets/images/nav-toggle.svg')}}"
                      alt="Image Not Found"></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
