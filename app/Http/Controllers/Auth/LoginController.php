<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Traits\CaptchaTrait;
use App\Traits\CaptureIpTrait;
use App\Http\Controllers\Auth\Request;

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
    use CaptchaTrait;
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectAfterLogout = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function username(){
        return 'username';
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateLogin(\Illuminate\Http\Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'username'              => 'required',
                'password'              => 'required|min:6|max:30',
                'captcha'               => 'required|captcha',
            ],
            [
                'username.required'             => trans('auth.userNameRequired'),
                'password.required'             => trans('auth.passwordRequired'),
                'password.min'                  => trans('auth.PasswordMin'),
                'password.max'                  => trans('auth.PasswordMax'),
                'captcha.captcha'               => trans('auth.CaptchaWrong'),
            ]
        )->validate();
    }

    /**
     * Logout, Clear Session, and Return.
     *
     * @return void
     */
    public function logout()
    {
        $user = Auth::user();
        Log::info('User Logged Out. ', [$user]);
        Auth::logout();
        Session::flush();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }
}
