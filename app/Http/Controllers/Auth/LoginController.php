<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use App\Http\Controllers\Auth\Request;
use Illuminate\Http\Request;
use App\Traits\reCaptchaTrait;

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
    use reCaptchaTrait;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {

        
        // call the verifyCaptcha method to see if Google approves
        $request['captcha-verified'] = $this->verifyCaptcha($request['g-recaptcha-response']);

        //flash error message for recaptcha error
        //if($request['captcha-verified'] === false)
        //{

        //    \Session::flash('flash_error', 'Please verify that you are not a robot!');
        //}
        
        //$this->validate($request, [
        //    $this->username() => 'required', 'password' => 'required', 'g-recaptcha-response' => 'required'
        //]);
        $this->validate($request, [
            $this->username() => 'required', 'password' => 'required'
        ]);
        


    }
}
