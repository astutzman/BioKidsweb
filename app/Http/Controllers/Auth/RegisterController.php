<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Traits\reCaptchaTrait;

use App\Programs;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use reCaptchaTrait;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        // call the verifyCaptcha method to see if Google approves
        $data['captcha-verified'] = $this->verifyCaptcha($data['g-recaptcha-response']);

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'program_id' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|same:password',
            'g-recaptcha-response'  => 'required'
        ]

    );
        //flash error message for recaptcha error
        if(!$data['captcha-verified'])
        {
            \Session::flash('flash_error', 'Please verify that you are not a robot!');
        }

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        \Session::flash('flash_message', 'Success! Your account has been created.');

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'program_id' => $data['program_id'],
            'password' => bcrypt($data['password']),
        ]);

    }

    /* Login get post methods */
    protected function showRegistrationForm()
    {
        $programs = Programs::orderBy('program', 'asc')->get();

        //$departments = Department::orderBy('department_name', 'asc')->get();
        
        return view('auth.register', compact('programs','user'));

    }
}
