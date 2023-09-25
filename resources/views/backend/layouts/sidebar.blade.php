@php $user_permissions = \App\Models\Permmission::where('user_id', Auth::id())->pluck('permission')->toArray() ?? []; @endphp

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            @if (Auth::user()->role == 'admin')
            <div class="nav">
                <a class="nav-link" href="{{ route('admin') }}">
                    <div class="sb-nav-link-icon">

                        <svg class="svg-inline--fa fa-gauge-high" aria-hidden="true"
                            focusable="false" data-prefix="fas" data-icon="gauge-high" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM288 96a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM256 416c35.3 0 64-28.7 64-64c0-17.4-6.9-33.1-18.1-44.6L366 161.7c5.3-12.1-.2-26.3-12.3-31.6s-26.3 .2-31.6 12.3L257.9 288c-.6 0-1.3 0-1.9 0c-35.3 0-64 28.7-64 64s28.7 64 64 64zM176 144a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM96 288a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm352-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z">
                            </path>
                        </svg><!-- <i class="fas fa-tachometer-alt"></i> Font Awesome fontawesome.com -->

                    </div>
                    Dashboard
                </a>

                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-link"></i>
                    </div>
                    Website
                </a>

                <div class="sb-sidenav-menu-heading">Manage Home Page</div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-images"></i>
                    </div>
                    Manage Home Page
                    <div class="sb-sidenav-collapse-arrow">
                        <svg class="svg-inline--fa fa-angle-down"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                    </div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('banner.index') }}">Banners</a>
                        <a class="nav-link" href="{{ route('banner.create') }}">Add Banners</a>
                    </nav>
                </div>

                <a class="nav-link" href="{{ route('admin.pages') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-pager"></i>
                    </div>
                    Pages
                </a>


                <div class="sb-sidenav-menu-heading">Products & Orders</div>

                <!-- Brands -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBrands" aria-expanded="false" aria-controls="collapseBrands">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-bold"></i>
                    </div>
                    Brands
                    <div class="sb-sidenav-collapse-arrow">
                        <svg class="svg-inline--fa fa-angle-down"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                    </div>
                </a>
                <div class="collapse" id="collapseBrands" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('brand.index') }}">Brands</a>
                        <a class="nav-link" href="{{ route('brand.create') }}">Add Brand</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseattribute" aria-expanded="false" aria-controls="collapseattribute">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-sitemap"></i>
                    </div>
                    Attributes
                    <div class="sb-sidenav-collapse-arrow">
                        <svg class="svg-inline--fa fa-angle-down"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                    </div>
                </a>
                <div class="collapse" id="collapseattribute" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('attribute.index') }}">Attribute</a>
                        <a class="nav-link" href="{{ route('attribute.create') }}">Add Attribute</a>
                    </nav>
                </div>


                <!--Category -->
                {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-server"></i>
                    </div>
                    Category
                    <div class="sb-sidenav-collapse-arrow">
                        <svg class="svg-inline--fa fa-angle-down"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                    </div>
                </a>
                <div class="collapse" id="collapseCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('category.index') }}">category</a>
                        <a class="nav-link" href="{{ route('category.create') }}">Add category</a>
                    </nav>
                </div> --}}

                <!-- Products -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProduct" aria-expanded="false" aria-controls="collapseProduct">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    Products
                    <div class="sb-sidenav-collapse-arrow">
                        <svg class="svg-inline--fa fa-angle-down"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                    </div>
                </a>
                <div class="collapse" id="collapseProduct" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('product.index') }}">Products</a>
                        <a class="nav-link" href="{{ route('product.create') }}">Add Product</a>
                        <a class="nav-link" href="{{ route('product.out.of.stock') }}">Product Requests</a>
                    </nav>
                </div>

                <!-- Shipping -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseShipping" aria-expanded="false" aria-controls="collapseShipping">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    Shipping
                    <div class="sb-sidenav-collapse-arrow">
                        <svg class="svg-inline--fa fa-angle-down"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                    </div>
                </a>
                <div class="collapse" id="collapseShipping" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('shipping.index') }}">Shippings</a>
                        <a class="nav-link" href="{{ route('shipping.create') }}">Add Shipping</a>
                    </nav>
                </div>

                <!-- Extra -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseExtra" aria-expanded="false" aria-controls="collapseExtra">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-etsy"></i>
                    </div>
                    Extras
                    <div class="sb-sidenav-collapse-arrow">
                        <svg class="svg-inline--fa fa-angle-down"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                    </div>
                </a>
                <div class="collapse" id="collapseExtra" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('extra.index') }}">Extra</a>
                        <a class="nav-link" href="{{ route('extra.create') }}">Add Extra</a>
                    </nav>
                </div>

                <!-- Coupon -->
                <a class="nav-link" href="{{ route('coupon.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    Coupon
                </a>

                <!-- Order -->
                <a class="nav-link" href="{{ route('order.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    Orders
                </a>

                <div class="sb-sidenav-menu-heading">General Settings</div>

                <!-- Users -->
                <a class="nav-link" href="{{ route('users.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    Users
                </a>


                <!-- Settings -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseSettings" aria-expanded="false" aria-controls="collapseSettings">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    Setting
                    <div class="sb-sidenav-collapse-arrow"><svg class="svg-inline--fa fa-angle-down"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com --></div>
                </a>
                <div class="collapse" id="collapseSettings" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('settings') }}">General Setting</a>
                        <a class="nav-link" href="{{ route('integeration') }}">Integerations Setting</a>
                    </nav>
                </div>

            </div>
            @else
            <div class="nav">

                @if (in_array('dashboard', $permissions) || in_array('dashboard', $user_permissions))
                    <a class="nav-link" href="{{ route('admin') }}">
                        <div class="sb-nav-link-icon">

                            <svg class="svg-inline--fa fa-gauge-high" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="gauge-high" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM288 96a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM256 416c35.3 0 64-28.7 64-64c0-17.4-6.9-33.1-18.1-44.6L366 161.7c5.3-12.1-.2-26.3-12.3-31.6s-26.3 .2-31.6 12.3L257.9 288c-.6 0-1.3 0-1.9 0c-35.3 0-64 28.7-64 64s28.7 64 64 64zM176 144a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM96 288a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm352-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z">
                                </path>
                            </svg><!-- <i class="fas fa-tachometer-alt"></i> Font Awesome fontawesome.com -->

                        </div>
                        Dashboard
                    </a>
                @endif

                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-link"></i>
                    </div>
                    Website
                </a>

                <div class="sb-sidenav-menu-heading">Manage Home Page</div>

                @if (in_array('manager_banners', $permissions) || in_array('manager_banners', $user_permissions))
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-images"></i>
                        </div>
                        Manage Home Page
                        <div class="sb-sidenav-collapse-arrow">
                            <svg class="svg-inline--fa fa-angle-down"
                                aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                                </path>
                            </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                        </div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('banner.index') }}">Banners</a>
                            <a class="nav-link" href="{{ route('banner.create') }}">Add Banners</a>
                        </nav>
                    </div>
                @endif

                <a class="nav-link" href="{{ route('admin.pages') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-pager"></i>
                    </div>
                    Pages
                </a>


                <div class="sb-sidenav-menu-heading">Products & Orders</div>

                @if (in_array('brand', $permissions) || in_array('brand', $user_permissions))
                <!-- Brands -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBrands" aria-expanded="false" aria-controls="collapseBrands">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-bold"></i>
                    </div>
                    Brands
                    <div class="sb-sidenav-collapse-arrow">
                        <svg class="svg-inline--fa fa-angle-down"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                    </div>
                </a>
                <div class="collapse" id="collapseBrands" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('brand.index') }}">Brands</a>
                        <a class="nav-link" href="{{ route('brand.create') }}">Add Brand</a>
                    </nav>
                </div>
                @endif

                <!--Category -->
                @if (in_array('category', $permissions) || in_array('category', $user_permissions))
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-server"></i>
                    </div>
                    Category
                    <div class="sb-sidenav-collapse-arrow">
                        <svg class="svg-inline--fa fa-angle-down"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                    </div>
                </a>
                <div class="collapse" id="collapseCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('category.index') }}">category</a>
                        <a class="nav-link" href="{{ route('category.create') }}">Add category</a>
                    </nav>
                </div>
                @endif

                <!-- Products -->
                @if (in_array('product', $permissions) || in_array('product', $user_permissions))
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProduct" aria-expanded="false" aria-controls="collapseProduct">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    Products
                    <div class="sb-sidenav-collapse-arrow">
                        <svg class="svg-inline--fa fa-angle-down"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                    </div>
                </a>
                <div class="collapse" id="collapseProduct" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('product.index') }}">Products</a>
                        <a class="nav-link" href="{{ route('product.create') }}">Add Product</a>
                        <a class="nav-link" href="{{ route('product.out.of.stock') }}">Product Requests</a>
                    </nav>
                </div>
                @endif

                <!-- Shipping -->
                @if (in_array('shipping', $permissions) || in_array('shipping', $user_permissions))
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseShipping" aria-expanded="false" aria-controls="collapseShipping">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    Shipping
                    <div class="sb-sidenav-collapse-arrow">
                        <svg class="svg-inline--fa fa-angle-down"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                    </div>
                </a>
                <div class="collapse" id="collapseShipping" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('shipping.index') }}">Shippings</a>
                        <a class="nav-link" href="{{ route('shipping.create') }}">Add Shipping</a>
                    </nav>
                </div>
                @endif

                <!-- Extra -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseExtra" aria-expanded="false" aria-controls="collapseExtra">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-etsy"></i>
                    </div>
                    Extras
                    <div class="sb-sidenav-collapse-arrow">
                        <svg class="svg-inline--fa fa-angle-down"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                    </div>
                </a>
                <div class="collapse" id="collapseExtra" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('extra.index') }}">Extra</a>
                        <a class="nav-link" href="{{ route('extra.create') }}">Add Extra</a>
                    </nav>
                </div>

                <!-- Coupon -->
                @if (in_array('coupon', $permissions) || in_array('coupon', $user_permissions))
                <a class="nav-link" href="{{ route('coupon.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    Coupon
                </a>
                @endif

                <!-- Order -->
                @if (in_array('order', $permissions) || in_array('order', $user_permissions))
                <a class="nav-link" href="{{ route('order.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    Orders
                </a>
                @endif

                <div class="sb-sidenav-menu-heading">General Settings</div>

                <!-- Users -->
                @if (in_array('users', $permissions) || in_array('users', $user_permissions))
                <a class="nav-link" href="{{ route('users.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    Users
                </a>
                @endif

                <!-- Settings -->
                @if (in_array('setting', $permissions) || in_array('setting', $user_permissions))
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseSettings" aria-expanded="false" aria-controls="collapseSettings">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    Setting
                    <div class="sb-sidenav-collapse-arrow"><svg class="svg-inline--fa fa-angle-down"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com --></div>
                </a>
                <div class="collapse" id="collapseSettings" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('settings') }}">General Setting</a>
                        <a class="nav-link" href="{{ route('integeration') }}">Integerations Setting</a>
                    </nav>
                </div>
                @endif


                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </div>
            @endif
        </div>

    </nav>
</div>
