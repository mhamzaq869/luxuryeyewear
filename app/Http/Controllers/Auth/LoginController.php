<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function credentials(Request $request){

        $user = User::where('email',$request->email)->first();
        if($user && $user->role == 'admin'){
            return ['email'=>$request->email,'password'=>$request->password,'status'=>'active','role'=>'admin'];
        }elseif($user && $user->role == 'superadmin'){
            return ['email'=>$request->email,'password'=>$request->password,'status'=>'active','role'=>'superadmin'];
        }else{
            return ['email'=>$request->email,'password'=>$request->password,'status'=>'active','role'=>'user'];
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirect($provider)
    {
     return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users      =   User::where(['email' => $userSocial->getEmail()])->first();
        // dd($users);
        if($users){
            Auth::login($users);
            return redirect('/')->with('success','You are login from '.$provider);
        }else{
            $user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'image'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);
         return redirect()->route('home');
        }
    }
}
