@extends('frontend.layouts.master')



@section('title', 'Login Page')



@section('main-content')

    <!-- Breadcrumbs -->

    <div class="breadcrumbs">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <div class="bread-inner">

                        <ul class="bread-list">

                            <li><a href="{{ route('home') }}">Home<i class="ti-arrow-right"></i></a></li>

                            <li class="active"><a href="javascript:void(0);">Login</a></li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <section>

        <div class="login_section">

            <div class="container">

                <div class="user signinBx">

                    <div class="imgBx"><img src="{{ asset('assets/images/img_grid2.png') }}" alt="" /></div>

                    <div class="formBx">





                        <form class="formStyle2"method="post" action="{{ route('login.submit') }}">

                            @csrf

                            <h2 class="mdTitle pt-2">Sign In</h2>



                            <div class="row gy-1">

                                <div class="col-12">
                                    @if (Session::has('error'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{Session::get('error')}}</strong>
                                        </span>
                                    @endif

                                    <input id="email" name="email" type="email" placeholder="Email"
                                        class="form-control" required />

                                </div>

                                <div class="col-12">

                                    <input name="password" id="password" type="password" placeholder="Password"
                                        class="form-control" required />

                                </div>

                                <div class="col">
                                    @error('error')
                                    <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>
                                    @enderror
                                    @if (Route::has('password.request'))
                                        <a class="lost-pass" href="{{ route('password_reset') }}" class="forgotPwd">

                                            Lost your password?

                                        </a>
                                    @endif



                                </div>

                                <div class="col-auto">

                                    <label for="remember">

                                        <input class="form-check-input" type="checkbox" name="remember" id="2"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        Remember me

                                    </label>

                                </div>

                                <div class="col-12">

                                    <button class="btn btnDark w-100"> Login </button>

                                </div>



                                <div class="col-12 text-center">

                                    <span class="or">OR</span>

                                </div>

                                <div class="col-12">

                                    <a href="{{ route('login.redirect', 'google') }}" class="btn googleBtn">

                                        <span><img src="{{ asset('assets/images/google-icon.svg') }}" alt="..."
                                                width="18"></span>

                                        <span>Login with Google</span>

                                    </a>

                                </div>

                                <div class="col-12">

                                    <a href="{{ route('login.redirect', 'facebook') }}" class="btn fbBtn">

                                        <span><img src="{{ asset('assets/images/fb-icon.svg') }}" alt="..."
                                                width="16"></span>

                                        <span>Login with Facebook</span>

                                    </a>

                                </div>



                            </div>

                            <p class="signup">

                                Don't have an account ?

                                <a href="{{ route('register.form') }}" class="sTrigger" onclick="toggleForm();">Sign
                                    Up.</a>

                            </p>

                        </form>

                    </div>

                </div>

                <div class="user signupBx">

                    <div class="formBx">

                        <form method="POST" action="" class="formStyle2">

                            @csrf

                            <h2 class="mdTitle pb-2">Create an account</h2>

                            <div class="row gy-2">

                                <div class="col-12">

                                    <input type="text" name="name" placeholder="Username" class="form-control" />

                                    @error('name')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="col-12">

                                    <input id="email" type="email" name="email" placeholder="Email Address"
                                        class="form-control" />

                                    @error('email')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="col-12">

                                    <input id="password" type="password" name="password" placeholder="Create Password"
                                        class="form-control" />

                                    @error('password')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="col-12">

                                    <input id="password-confirm" type="password" name="password_confirmation"
                                        placeholder="Confirm Password" class="form-control" />

                                    @error('password_confirmation')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="col-12">

                                    <button class="btn btnDark w-100" type="submit"> Sign Up </button>

                                </div>

                                <div class="col-12">

                                    <p class="signup">

                                        Already have an account ?

                                        <a href="{{ route('login') }}" class="sTrigger">Sign in.</a>

                                    </p>

                                </div>

                            </div>

                        </form>

                    </div>

                    <div class="imgBx"><img src="{{ asset('assets/images/img_grid2.png') }}" alt="" /></div>

                </div>

            </div>

        </div>

    </section>









    <!-- End Breadcrumbs -->





@endsection
