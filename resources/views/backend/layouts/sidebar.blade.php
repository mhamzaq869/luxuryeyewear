<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>
    <hr class="sidebar-divider my-0" />

    @php
        $user_permissions = \App\Models\Permmission::where('user_id',Auth::id())->pluck('permission')->toArray() ?? [];
    @endphp

    @if (Auth::user()->role == 'admin')
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin') }}"><i
                    class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}" target="_blank"><i class="fa fa-globe"
                    aria-hidden="true"></i> <span> Website</span></a>
        </li>
        <hr class="sidebar-divider" />
        <div class="sidebar-heading">Manage Home Page</div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo"><i class="fas fa-image"></i><span>Manage Home
                    Page</span></a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Banner Options:</h6>
                    <a class="collapse-item" href="{{ route('banner.index') }}">Banners</a><a class="collapse-item"
                        href="{{ route('banner.create') }}">Add Banners</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.pages')}}"><i class="fas fa-folder"></i>
                <span>Pages</span></a>
        </li>

        <hr class="sidebar-divider" />
        <div class="sidebar-heading">Shop</div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productColor"
                aria-expanded="true" aria-controls="productColor"><i class="fas fa-sitemap"></i><span>Product
                    Color</span></a>
            <div id="productColor" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Product Color Options:</h6>
                    <a class="collapse-item" href="{{ route('product-color.index') }}">Product Color</a><a
                        class="collapse-item" href="{{ route('product-color.create') }}">Add Product Color</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#attributeCollapse"
                aria-expanded="true" aria-controls="attributeCollapse"><i
                    class="fas fa-sitemap"></i><span>Attributes</span></a>
            <div id="attributeCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Attribute Options:</h6>
                    <a class="collapse-item" href="{{ route('attribute.index') }}">Attribute</a><a class="collapse-item"
                        href="{{ route('attribute.create') }}">Add Attribute</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse"
                aria-expanded="true" aria-controls="categoryCollapse"><i
                    class="fas fa-sitemap"></i><span>Category</span></a>
            <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Category Options:</h6>
                    <a class="collapse-item" href="{{ route('category.index') }}">Category</a><a class="collapse-item"
                        href="{{ route('category.create') }}">Add Category</a>
                </div>
            </div>
        </li>
        {{-- Products --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse"
                aria-expanded="true" aria-controls="productCollapse"><i
                    class="fas fa-cubes"></i><span>Products</span></a>
            <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Product Options:</h6>
                    <a class="collapse-item" href="{{ route('product.index') }}">Products</a>
                    <a class="collapse-item" href="{{ route('product.create') }}">Add Product</a>
                    <a class="collapse-item" href="{{ route('product.out.of.stock') }}">Product Request</a>
                </div>
            </div>
        </li>
        {{-- Brands --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brandCollapse"
                aria-expanded="true" aria-controls="brandCollapse"><i class="fas fa-table"></i><span>Brands</span>
                {{-- <span class="text-danger"><img src="{{ asset('images/new.gif') }}" width="50"></span></a> --}}
            <div id="brandCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Brand Options:</h6>
                    <a class="collapse-item" href="{{ route('brand.index') }}">Brands</a><a class="collapse-item"
                        href="{{ route('brand.create') }}">Add Brand</a>
                </div>
            </div>
        </li>
        {{-- Shipping --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shippingCollapse"
                aria-expanded="true" aria-controls="shippingCollapse"><i
                    class="fas fa-truck"></i><span>Shipping</span></a>
            <div id="shippingCollapse" class="collapse" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Shipping Options:</h6>
                    <a class="collapse-item" href="{{ route('shipping.index') }}">Shipping</a><a
                        class="collapse-item" href="{{ route('shipping.create') }}">Add Shipping</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#extraCollapse"
                aria-expanded="true" aria-controls="extraCollapse"><i
                    class="fas fa-truck"></i><span>Extra</span></a>
            <div id="extraCollapse" class="collapse" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Extra Options:</h6>
                    <a class="collapse-item" href="{{ route('extra.index') }}">Extra</a><a
                        class="collapse-item" href="{{ route('extra.create') }}">Add Extra</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('order.index') }}"><i
                    class="fas fa-hammer fa-chart-area"></i><span>Orders</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('review.index') }}"><i
                    class="fas fa-comments"></i><span>Reviews</span></a>
        </li>
        <hr class="sidebar-divider" />
        <div class="sidebar-heading">Posts</div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCollapse"
                aria-expanded="true" aria-controls="postCollapse"><i
                    class="fas fa-fw fa-folder"></i><span>Posts</span></a>
            <div id="postCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Post Options:</h6>
                    <a class="collapse-item" href="{{ route('post.index') }}">Posts</a><a class="collapse-item"
                        href="{{ route('post.create') }}">Add Post</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCategoryCollapse"
                aria-expanded="true" aria-controls="postCategoryCollapse"><i
                    class="fas fa-sitemap fa-folder"></i><span>Category</span></a>
            <div id="postCategoryCollapse" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Category Options:</h6>
                    <a class="collapse-item" href="{{ route('post-category.index') }}">Category</a><a
                        class="collapse-item" href="{{ route('post-category.create') }}">Add Category</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tagCollapse"
                aria-expanded="true" aria-controls="tagCollapse"><i
                    class="fas fa-tags fa-folder"></i><span>Tags</span></a>
            <div id="tagCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tag Options:</h6>
                    <a class="collapse-item" href="{{ route('post-tag.index') }}">Tag</a><a class="collapse-item"
                        href="{{ route('post-tag.create') }}">Add Tag</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('comment.index') }}"><i
                    class="fas fa-comments fa-chart-area"></i><span>Comments</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block" />
        <div class="sidebar-heading">General Settings</div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('coupon.index') }}"><i
                    class="fas fa-table"></i><span>Coupon</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users"></i><span>Users</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('settings') }}"><i class="fas fa-cog"></i><span>Settings</span></a>
        </li>
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    @else

        @if (in_array('dashboard',$permissions) || in_array('dashboard',$user_permissions))
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin') }}"><i
                    class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
        </li>
        @endif


        <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}" target="_blank"><i class="fa fa-globe"
                    aria-hidden="true"></i> <span> Website</span></a>
        </li>


        @if (in_array('manager_banners',$permissions) || in_array('manager_banners',$user_permissions))
        <hr class="sidebar-divider" />
        <div class="sidebar-heading">Manage Home Page</div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo"><i class="fas fa-image"></i><span>Manage Home
                    Page</span></a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Banner Options:</h6>
                    <a class="collapse-item" href="{{ route('banner.index') }}">Banners</a><a class="collapse-item"
                        href="{{ route('banner.create') }}">Add Banners</a>
                </div>
            </div>
        </li>
        @endif

        @if (in_array('product_color',$permissions) || in_array('product_color',$user_permissions))
        <hr class="sidebar-divider" />
        <div class="sidebar-heading">Shop</div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productColor"
                aria-expanded="true" aria-controls="productColor"><i class="fas fa-sitemap"></i><span>Product
                    Color</span></a>
            <div id="productColor" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Product Color Options:</h6>
                    <a class="collapse-item" href="{{ route('product-color.index') }}">Product Color</a><a
                        class="collapse-item" href="{{ route('product-color.create') }}">Add Product Color</a>
                </div>
            </div>
        </li>
        @endif

        @if (in_array('attribute',$permissions) || in_array('attribute',$user_permissions))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#attributeCollapse"
                aria-expanded="true" aria-controls="attributeCollapse"><i
                    class="fas fa-sitemap"></i><span>Attributes</span></a>
            <div id="attributeCollapse" class="collapse" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Attribute Options:</h6>
                    <a class="collapse-item" href="{{ route('attribute.index') }}">Attribute</a><a
                        class="collapse-item" href="{{ route('attribute.create') }}">Add Attribute</a>
                </div>
            </div>
        </li>
        @endif

        @if (in_array('category',$permissions) || in_array('category',$user_permissions))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse"
                aria-expanded="true" aria-controls="categoryCollapse"><i
                    class="fas fa-sitemap"></i><span>Category</span></a>
            <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Category Options:</h6>
                    <a class="collapse-item" href="{{ route('category.index') }}">Category</a><a
                        class="collapse-item" href="{{ route('category.create') }}">Add Category</a>
                </div>
            </div>
        </li>
        @endif

        @if (in_array('product',$permissions) || in_array('product',$user_permissions))
        {{-- Products --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse"
                aria-expanded="true" aria-controls="productCollapse"><i
                    class="fas fa-cubes"></i><span>Products</span></a>
            <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Product Options:</h6>
                    <a class="collapse-item" href="{{ route('product.index') }}">Products</a><a
                        class="collapse-item" href="{{ route('product.create') }}">Add Product</a>
                </div>
            </div>
        </li>

        @endif
        {{-- Brands --}}
        @if (in_array('brand',$permissions) || in_array('brand',$user_permissions))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brandCollapse"
                aria-expanded="true" aria-controls="brandCollapse"><i class="fas fa-table"></i><span>Brands</span>
                {{-- <span class="text-danger"><img src="{{ asset('images/new.gif') }}" width="50"></span> --}}
            </a>
            <div id="brandCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Brand Options:</h6>
                    <a class="collapse-item" href="{{ route('brand.index') }}">Brands</a><a class="collapse-item"
                        href="{{ route('brand.create') }}">Add Brand</a>
                </div>
            </div>
        </li>
        @endif
        {{-- Shipping --}}
        @if (in_array('shipping',$permissions) || in_array('shipping',$user_permissions))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shippingCollapse"
                aria-expanded="true" aria-controls="shippingCollapse"><i
                    class="fas fa-truck"></i><span>Shipping</span></a>
            <div id="shippingCollapse" class="collapse" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Shipping Options:</h6>
                    <a class="collapse-item" href="{{ route('shipping.index') }}">Shipping</a><a
                        class="collapse-item" href="{{ route('shipping.create') }}">Add Shipping</a>
                </div>
            </div>
        </li>
        @endif

        @if (in_array('order',$permissions) || in_array('order',$user_permissions))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('order.index') }}"><i
                    class="fas fa-hammer fa-chart-area"></i><span>Orders</span></a>
        </li>
        @endif

        @if (in_array('reviews',$permissions) || in_array('reviews',$user_permissions))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('review.index') }}"><i
                    class="fas fa-comments"></i><span>Reviews</span></a>
        </li>
        <hr class="sidebar-divider" />
        @endif

        @if (in_array('post',$permissions) || in_array('post',$user_permissions))
        <div class="sidebar-heading">Posts</div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCollapse"
                aria-expanded="true" aria-controls="postCollapse"><i
                    class="fas fa-fw fa-folder"></i><span>Posts</span></a>
            <div id="postCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Post Options:</h6>
                    <a class="collapse-item" href="{{ route('post.index') }}">Posts</a><a class="collapse-item"
                        href="{{ route('post.create') }}">Add Post</a>
                </div>
            </div>
        </li>
        @endif

        @if (in_array('post_category',$permissions) || in_array('post_category',$user_permissions))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCategoryCollapse"
                aria-expanded="true" aria-controls="postCategoryCollapse"><i
                    class="fas fa-sitemap fa-folder"></i><span>Category</span></a>
            <div id="postCategoryCollapse" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Category Options:</h6>
                    <a class="collapse-item" href="{{ route('post-category.index') }}">Category</a><a
                        class="collapse-item" href="{{ route('post-category.create') }}">Add Category</a>
                </div>
            </div>
        </li>
        @endif

        @if (in_array('tags',$permissions) || in_array('tags',$user_permissions))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tagCollapse"
                aria-expanded="true" aria-controls="tagCollapse"><i
                    class="fas fa-tags fa-folder"></i><span>Tags</span></a>
            <div id="tagCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tag Options:</h6>
                    <a class="collapse-item" href="{{ route('post-tag.index') }}">Tag</a><a class="collapse-item"
                        href="{{ route('post-tag.create') }}">Add Tag</a>
                </div>
            </div>
        </li>
        @endif

        @if (in_array('comment',$permissions) || in_array('comment',$user_permissions))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('comment.index') }}"><i
                    class="fas fa-comments fa-chart-area"></i><span>Comments</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block" />
        @endif
        @if (in_array('coupon',$permissions) || in_array('coupon',$user_permissions))
        <div class="sidebar-heading">General Settings</div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('coupon.index') }}"><i
                    class="fas fa-table"></i><span>Coupon</span></a>
        </li>
        @endif
        @if (in_array('users',$permissions) || in_array('users',$user_permissions))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users"></i><span>Users</span></a>
        </li>
        @endif
        @if (in_array('setting',$permissions) || in_array('setting',$user_permissions))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('settings') }}"><i class="fas fa-cog"></i><span>Settings</span></a>
        </li>
        @endif

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    @endif
</ul>
