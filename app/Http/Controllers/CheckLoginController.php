<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckLoginController extends Controller
{
    public function show()
    {
	return view('admin.login');
	//return 'Hello Laravel';
    }

    public function login(Request $request){
	$this->validate($request, [
	    'email' => 'required|email',
	    'password' => 'required'
	]);

	print_r($request);
	return false;
	if(Auth::attempt([
	    'email' => $request->input('email'),
            'password' => $request->input('password'),
	]))
	{
	    return redirect('home');
	}
	return view('admin.login');
    }

    public function logout()
    {
	Auth::logout();
	return view('admin.login');
    }
}
