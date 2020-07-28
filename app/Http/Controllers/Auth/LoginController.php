<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


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
<<<<<<< HEAD
//    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        dd('helo');


        $user = Auth::user();
        dd($user);


//        if($user->hasRole('user')){
//            return 'website/home';
//        }else{
//            return 'controlpanel/home';
//        }
    }
=======
    protected $redirectTo = '/home';
>>>>>>> 52ee958ba0985ae7a8462a62cc03fc6d9eda1d40

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
