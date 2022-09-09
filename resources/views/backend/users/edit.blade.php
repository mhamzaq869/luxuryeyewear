@extends('backend.layouts.master')
@section('title','Edit User')
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit User</h5>
    <div class="card-body">
      <form method="post" action="{{route('users.update',$user->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Name</label>
        <input id="inputTitle" type="text" name="name" placeholder="Enter name"  value="{{$user->name}}" class="form-control">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="inputEmail" class="col-form-label">Email</label>
          <input id="inputEmail" type="email" name="email" placeholder="Enter email"  value="{{$user->email}}" class="form-control">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        {{-- <div class="form-group">
            <label for="inputPassword" class="col-form-label">Password</label>
          <input id="inputPassword" type="password" name="password" placeholder="Enter password"  value="{{$user->password}}" class="form-control">
          @error('password')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div> --}}

        <div class="form-group">
        <label for="inputPhoto" class="col-form-label">Photo</label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                <i class="fa fa-picture-o"></i> Choose
                </a>
            </span>
            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$user->photo}}">
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;">
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        @php
        $roles=DB::table('users')->select('role')->where('id',$user->id)->get();
        // dd($roles);
        @endphp
        <div class="form-group">
            <label for="role" class="col-form-label">Role</label>
            <select name="role" class="form-control">
                <option value="">-----Select Role-----</option>

                <option value="admin" {{(($user->role=='admin') ? 'selected' : '')}}>Admin</option>
                <option value="superadmin" {{(($user->role=='superadmin') ? 'selected' : '')}}>Super Admin</option>
                <option value="user" {{(($user->role=='user') ? 'selected' : '')}}>User</option>
            </select>
          @error('role')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
          <div class="form-group">
            <label for="status" class="col-form-label">Status</label>
            <select name="status" class="form-control">
                <option value="active" {{(($user->status=='active') ? 'selected' : '')}}>Active</option>
                <option value="inactive" {{(($user->status=='inactive') ? 'selected' : '')}}>Inactive</option>
            </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>


        @if (count($userBackendPermsion) > 0)
        <div class="card-body">
                <h2 class="mt-3">Assign Permissions to User</h2>
                <div class="row my-4">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" {{ in_array('dashboard',$userBackendPermsion) == true ? 'checked' : ''}} name="permission[]" value="dashboard"
                                id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Dashboard</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('manager_banners',$userBackendPermsion) == true ? 'checked' : ''}} value="manager_banners"
                                id="banner">
                            <label class="form-check-label" for="banner">Manager Banners</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('product_color',$userBackendPermsion) == true ? 'checked' : ''}} value="product_color"
                                id="product_color">
                            <label class="form-check-label" for="product_color">Product Color</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('attribute',$userBackendPermsion) == true ? 'checked' : ''}} value="attribute"
                                id="attribute">
                            <label class="form-check-label" for="attribute">Attribute</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('category',$userBackendPermsion) == true ? 'checked' : ''}} value="category"
                                id="category">
                            <label class="form-check-label" for="category">Category</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('product',$userBackendPermsion) == true ? 'checked' : ''}} value="product"
                                id="product">
                            <label class="form-check-label" for="product">Product</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('brand',$userBackendPermsion) == true ? 'checked' : ''}} value="brand"
                                id="brand">
                            <label class="form-check-label" for="brand">Brand</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('shipping',$userBackendPermsion) == true ? 'checked' : ''}} value="shipping"
                                id="shipping">
                            <label class="form-check-label" for="shipping">Shipping</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('order',$userBackendPermsion) == true ? 'checked' : ''}} value="order"
                                id="order">
                            <label class="form-check-label" for="order">Order</label>
                        </div>

                    </div>


                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('reviews',$userBackendPermsion) == true ? 'checked' : ''}} value="reviews"
                                id="order">
                            <label class="form-check-label" for="order">Reviews</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('post',$userBackendPermsion) == true ? 'checked' : ''}} value="post"
                                id="post">
                            <label class="form-check-label" for="post">Post</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('post_category',$userBackendPermsion) == true ? 'checked' : ''}}
                                value="post_category" id="post_category">
                            <label class="form-check-label" for="post_category">Post Category</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('tags',$userBackendPermsion) == true ? 'checked' : ''}} value="tags"
                                id="tags">
                            <label class="form-check-label" for="tags">Tags</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('comment',$userBackendPermsion) == true ? 'checked' : ''}} value="comment"
                                id="comment">
                            <label class="form-check-label" for="comment">Comment</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('coupon',$userBackendPermsion) == true ? 'checked' : ''}} value="coupon"
                                id="coupon">
                            <label class="form-check-label" for="coupon">Coupon</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('users',$userBackendPermsion) == true ? 'checked' : ''}} value="users"
                                id="users">
                            <label class="form-check-label" for="users">Users</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('setting',$userBackendPermsion) == true ? 'checked' : ''}} value="setting"
                                id="setting">
                            <label class="form-check-label" for="setting">Setting</label>
                        </div>

                    </div>
                </div>

        </div>
        @else
            <div class="card-body">

                    <h2 class="mt-3">Assign Permissions to User</h2>
                    <div class="row my-4">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('dashboard',$userBackendPermsion) == true ? 'checked' : ''}} value="dashboard"
                                    id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Dashboard</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permission[]" {{ in_array('dashboard',$userBackendPermsion) == true ? 'checked' : ''}} value="manager_banners"
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



            </div>
        @endif

        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>



      </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endpush
