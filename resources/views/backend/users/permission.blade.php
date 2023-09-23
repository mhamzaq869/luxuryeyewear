@extends('backend.layouts.master')
@section('title', 'Add User')
@section('main-content')

    <div class="p-3">
        <h5 class="m-0 font-weight-bold text-dark mb-3">Manage Permission</h5>
        @if (count($permissions) > 0)

        <form method="post" action="{{ route('users.update.permissions') }}">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="role" class="col-form-label">Role</label>
                        <select name="role" class="form-control" required>
                            <option value="" selected disabled>-----Select Role-----</option>
                            <option value="superadmin" selected>Super Admin</option>
                        </select>
                    </div>
                </div>
            </div>


            <h2 class="mt-3">Assign Permissions to Role</h2>
            <div class="row my-4">
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" {{ in_array('dashboard',$permissions) == true ? 'checked' : ''}} name="permission[]" value="dashboard"
                            id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Dashboard</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('manager_banners',$permissions) == true ? 'checked' : ''}} value="manager_banners"
                            id="banner">
                        <label class="form-check-label" for="banner">Manager Banners</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('product_color',$permissions) == true ? 'checked' : ''}} value="product_color"
                            id="product_color">
                        <label class="form-check-label" for="product_color">Product Color</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('attribute',$permissions) == true ? 'checked' : ''}} value="attribute"
                            id="attribute">
                        <label class="form-check-label" for="attribute">Attribute</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('category',$permissions) == true ? 'checked' : ''}} value="category"
                            id="category">
                        <label class="form-check-label" for="category">Category</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('product',$permissions) == true ? 'checked' : ''}} value="product"
                            id="product">
                        <label class="form-check-label" for="product">Product</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('brand',$permissions) == true ? 'checked' : ''}} value="brand"
                            id="brand">
                        <label class="form-check-label" for="brand">Brand</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('shipping',$permissions) == true ? 'checked' : ''}} value="shipping"
                            id="shipping">
                        <label class="form-check-label" for="shipping">Shipping</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('order',$permissions) == true ? 'checked' : ''}} value="order"
                            id="order">
                        <label class="form-check-label" for="order">Order</label>
                    </div>

                </div>


                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('reviews',$permissions) == true ? 'checked' : ''}} value="reviews"
                            id="order">
                        <label class="form-check-label" for="order">Reviews</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('post',$permissions) == true ? 'checked' : ''}} value="post"
                            id="post">
                        <label class="form-check-label" for="post">Post</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('post_category',$permissions) == true ? 'checked' : ''}}
                            value="post_category" id="post_category">
                        <label class="form-check-label" for="post_category">Post Category</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('tags',$permissions) == true ? 'checked' : ''}} value="tags"
                            id="tags">
                        <label class="form-check-label" for="tags">Tags</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('comment',$permissions) == true ? 'checked' : ''}} value="comment"
                            id="comment">
                        <label class="form-check-label" for="comment">Comment</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('coupon',$permissions) == true ? 'checked' : ''}} value="coupon"
                            id="coupon">
                        <label class="form-check-label" for="coupon">Coupon</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('users',$permissions) == true ? 'checked' : ''}} value="users"
                            id="users">
                        <label class="form-check-label" for="users">Users</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('setting',$permissions) == true ? 'checked' : ''}} value="setting"
                            id="setting">
                        <label class="form-check-label" for="setting">Setting</label>
                    </div>

                </div>
            </div>



            <div class="form-group mb-3">
                <button type="reset" class="btn btn-warning">Reset</button>
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
        @else

            <form method="post" action="{{ route('users.update.permissions') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="role" class="col-form-label">Role</label>
                            <select name="role" class="form-control" required>
                                <option value="" selected disabled>-----Select Role-----</option>
                                <option value="superadmin">Super Admin</option>
                            </select>
                        </div>
                    </div>
                </div>


                <h2 class="mt-3">Assign Permissions to Role</h2>
                <div class="row my-4">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('dashboard',$permissions) == true ? 'checked' : ''}} value="dashboard"
                                id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Dashboard</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('dashboard',$permissions) == true ? 'checked' : ''}} value="manager_banners"
                                id="banner">
                            <label class="form-check-label" for="banner">Manager Banners</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="product_color"
                                id="product_color">
                            <label class="form-check-label" for="product_color">Product Color</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="attribute"
                                id="attribute">
                            <label class="form-check-label" for="attribute">Attribute</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="category"
                                id="category">
                            <label class="form-check-label" for="category">Category</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="product"
                                id="product">
                            <label class="form-check-label" for="product">Product</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="brand"
                                id="brand">
                            <label class="form-check-label" for="brand">Brand</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="shipping"
                                id="shipping">
                            <label class="form-check-label" for="shipping">Shipping</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="order"
                                id="order">
                            <label class="form-check-label" for="order">Order</label>
                        </div>

                    </div>


                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="reviews"
                                id="order">
                            <label class="form-check-label" for="order">Reviews</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="post"
                                id="post">
                            <label class="form-check-label" for="post">Post</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]"
                                value="post_category" id="post_category">
                            <label class="form-check-label" for="post_category">Post Category</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="tags"
                                id="tags">
                            <label class="form-check-label" for="tags">Tags</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="comment"
                                id="comment">
                            <label class="form-check-label" for="comment">Comment</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="coupon"
                                id="coupon">
                            <label class="form-check-label" for="coupon">Coupon</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="users"
                                id="users">
                            <label class="form-check-label" for="users">Users</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="setting"
                                id="setting">
                            <label class="form-check-label" for="setting">Setting</label>
                        </div>

                    </div>
                </div>



                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        @endif

    </div>

@endsection

@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
@endpush
