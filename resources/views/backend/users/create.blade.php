@extends('backend.layouts.master')
@section('title', 'Add User')
@section('main-content')

    <div class="p-3">

        <h5 class="m-0 font-weight-bold text-dark mb-3">Add User</h5>
        <form method="post" action="{{ route('users.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputTitle" class="col-form-label">Name</label>
                <input id="inputTitle" type="text" name="name" placeholder="Enter name" value="{{ old('name') }}"
                    class="form-control">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputEmail" class="col-form-label">Email</label>
                <input id="inputEmail" type="email" name="email" placeholder="Enter email" value="{{ old('email') }}"
                    class="form-control">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-form-label">Password</label>
                <input id="inputPassword" type="password" name="password" placeholder="Enter password"
                    value="{{ old('password') }}" class="form-control">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputPhoto" class="col-form-label">Photo</label>
                <div class="input-group">

                    <input class="form-control" type="file" name="photo" value="{{ old('photo') }}">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;">
                @error('photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @php
                $roles = DB::table('users')
                    ->select('role')
                    ->get()
                    ->unique();
            @endphp
            <div class="form-group">
                <label for="role" class="col-form-label">Role</label>
                <select name="role" class="form-control">
                    <option value="">-----Select Role-----</option>
                    <option value="admin">Admin</option>
                    <option value="superadmin">Super Admin</option>
                    <option value="user">User</option>
                </select>
                @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="status" class="col-form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <button type="reset" class="btn btn-warning">Reset</button>
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
@endpush
