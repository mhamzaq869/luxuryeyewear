@extends('frontend.layouts.master')



@section('title','Register')



@section('main-content')

    <!-- Breadcrumbs -->

    <div class="breadcrumbs">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <div class="bread-inner">

                        <ul class="bread-list">

                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>

                            <li class="active"><a href="javascript:void(0);">@yield('title')</a></li>

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

          <div class="imgBx"><img src="{{asset('assets/images/img_grid2.png')}}" alt="" /></div>

          <div class="formBx">

 



    <form method="POST" action="{{route('register.submit')}}" class="formStyle2">

              @csrf

        <h2 class="mdTitle pb-2">Create an account</h2>

        <div class="row gy-2">

          <div class="col-12">

            <input  type="text" name="name" placeholder="User name" required="required"   class="form-control" />



            @error('name')

            <span class="text-danger"> {{$message}}</span>

            @enderror

          </div>

          <div class="col-12">

            <input type="text" name="email" placeholder="Email" required="required"  class="form-control" />

            @error('email')

            <span class="text-danger"> {{$message}}</span>

            @enderror

          </div>

          <div class="col-12">

            <input type="password" name="password" placeholder="Password" required="required"  class="form-control" />

            @error('password')

            <span class="text-danger"> {{$message}}</span>

            @enderror

          </div>

          <div class="col-12">

            <input   type="password" name="password_confirmation" placeholder="Password Confirmation" required="required"  class="form-control" />

            @error('password_confirmation')

            <span class="text-danger"> {{$message}}</span>

            @enderror

          </div>

          <div class="col-12">

            <button class="btn btnDark w-100" type="submit"> Sign Up </button>

          </div>

          <div class="col-12">

            <p class="signup">

              Already have an account ?

              <a href="{{route('login.form')}}" class="sTrigger">Sign in.</a>

            </p>

          </div>

        </div>

    </form>

          </div>

        </div>

        <div class="user signupBx">

          <div class="formBx">

    <form method="POST" action="{{route('register.submit')}}" class="formStyle2">

              @csrf

        <h2 class="mdTitle pb-2">Create an account</h2>

        <div class="row gy-2">

          <div class="col-12">

            <input  type="text" name="name" placeholder="Username" required="required"   class="form-control" />
            @error('name')
            <span class="text-danger"> {{$message}}</span>
            @enderror

          </div>

          <div class="col-12">

            <input type="text" name="email" placeholder="email" required="required"  class="form-control" />
            @error('email')
            <span class="text-danger"> {{$message}}</span>
            @enderror

          </div>

          <div class="col-12">
            <input type="password" name="password" placeholder="password" required="required"   class="form-control" />
            @error('password')
            <span class="text-danger"> {{$message}}</span>
            @enderror

          </div>

          <div class="col-12">

            <input   type="password" name="password_confirmation" placeholder="Password Confirmation" required="required"   class="form-control" />
            @error('password_confirmation')
            <span class="text-danger"> {{$message}}</span>

            @enderror

          </div>

          <div class="col-12">

            <button class="btn btnDark w-100" type="submit"> Sign Up </button>

          </div>

          <div class="col-12">

            <p class="signup">

              Already have an account ?

              <a href="{{route('login.form')}}" class="sTrigger">Sign in.</a>

            </p>

          </div>

        </div>

    </form>

          </div>

          <div class="imgBx"><img src="{{asset('assets/images/img_grid2.png')}}" alt="" /></div>

        </div>

      </div>

    </div>

  </section>

  







    <!-- End Breadcrumbs -->

            



@endsection