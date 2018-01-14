<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
/**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
public function username()
    {
        return 'email';
    }
    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
/*    protected function attemptLogin(Request $request)
    {
        $active_user = DB::table('User')->where($this->username(), $request[$this->username()])
            ->where('manager', User::STATUS_ACTIVE)->first();
        if ($active_user != null) {
            return $this->guard()->attempt(
                $this->credentials($request), $request->has('remember')
            );
        }
        return false;
    }*/
}
