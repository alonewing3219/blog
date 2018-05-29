<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Http\Requests;

class OrderController extends Controller
{
    
public function __construct(){
 $this->middleware('admin.check');
}

public function index(){

return view('test');
}

public function getOrderList(Request $request){

    return view('orderlist');

}
public function getOrder(Request $request){
$input = $request;
$store = DB::table('store')->select('name')->where('name', '=', $input['store']);
if ($store == Null){ 
 DB::table('store')->insert([
    'name' => $input['store'],
    'address' => $input['address'],
    'phone' => $input['phone'],

]);
}
//print_r($input['food'][0]);
//return $input['food'][0];
$i = 0;
foreach($input['food'] as $food){
    if ($food != NULL){
        DB::table('food')->insert([
	    'name' => $input['store'],
       	    'thing' => $food,
	    'price' => $input['price'][$i],
        ]);
    }
$i++;
    }
        return redirect('/orderlist');
}

public function getRecord(Request $request){
$user = DB::table('record')->select('*');
 return view('record',['users' => $user->get()]);

}
}
