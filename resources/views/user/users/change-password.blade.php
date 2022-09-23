@extends('user.layouts.master')

@section('title', 'Admin Profile')

@section('main-content')
    <h1 class="side-title"> Change password</h1>
    <form action="{{route('change.password')}}" method="Post" class="form">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-6">
                <label class="label">Old Password</label>
                <input type="text" name="current_password" id="name" placeholder="Old Password" class="form-control form-field"
                    value="">
            </div>
            <div class="col-12 col-lg-6">
                <label class="label">New Password</label>
                <input type="text" name="new_password" id="name" placeholder="New Password"
                    class="form-control form-field" value="">
            </div>
        </div>


        <div class="row">
            <div class="col-12 col-lg-12">
                <label class="label">Confirm Password</label>
                <input type="text" name="new_confirm_password" id="phone" placeholder="Confirm Password"
                    class="form-control form-field " value="">
            </div>
        </div>

        <div class="row submit_line">
            <div class="col-12 col-lg-6 text-end">
                <button type="submit" class="btn btn-primary btn_left">

                    Update Password</button>
            </div>


        </div>

    </form>

@endsection
