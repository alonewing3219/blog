<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\User;

class AuthController extends Controller
{

protected $redirectTo = '/dashboard';

protected $guard = 'admin';

    public function showLoginForm(){
	if (Auth::guard($this->guard)->check()){
	    return redirect('/home');
	}
	return view('admin.login');
    }

    public function login(Request $request)
    {
	$this->validate($request, [
	    'email' => 'required',
	    'password' => 'required',
	]);
	//return  'ccc';
//	return $request->input('email').' => '.$request->input('password');
	//return false;
	if(Auth::attempt([
	    'email' => $request->input('email'),
	    'password' => $request->input('password')]))

	{
	    return redirect()->intended($this->redirectTo);
	}
	return redirect('/login');
    }

     public function logout()
    {
	Auth::guard($this->guard)->logout();
	return redirect('/login');
    }



}
