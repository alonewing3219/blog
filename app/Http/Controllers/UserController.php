<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin.check');
    }


public function index(){

return view('test');
}

public function getStoreList(Request $request){

$store = DB::table('Select_Store')->select('*')->orderby('id', 'desc')->limit('1');
$foods = DB::table('food')->select('id','name','thing','price');

//print_r($store);
    return view('user',['storelist' => $store->get(),
			 'foods' => $foods->get()]);

}
public function getUserOrder(Request $request){
$input = $request;
DB::table('record')->insert([
        'name' => Auth::user()->name,
'food' => $input['food'],
'price' => $input['price'],
]);
return  redirect('/user'); 

}
}
