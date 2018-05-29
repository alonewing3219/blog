<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\User;
use Socialite;
use Redirect;
use Exception;

use Google\Cloud\Speech\SpeechClient;


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
 public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

public function GoogleCallback()
    {
try{ 
 $google = Socialite::driver('google')->user(); 
}catch(Exception $e){ 
 return redirect('/login'); 
} 
$user = DB::table('User')->select('*')->where('google_id','=', $google->getId())->first();
if(!$user){ 
 DB::table('User')->insert([ 
 'google_id' => $google->getId(), 
 'name' => $google->getName(), 
 'email' => $google->getEmail(), 
 'phone' => NULL,
 'password' => hash('sha512',$google->getId()), 
]); 
} 
    if(Auth::attempt([
            'email' => $google->getEmail(),
            'password' => $google->getId() ]))
        {   
            return redirect()->intended($this->redirectTo);
        }
        return redirect('/login');

    }
public function check($google_user){


}


}
