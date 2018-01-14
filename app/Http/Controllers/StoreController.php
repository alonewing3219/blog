<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;


class StoreController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin.check');
    }


public function index(){

return view('test');
}

public function getStoreList(Request $request){

$store = DB::table('store')->select('id','name','address','phone');
$foods = DB::table('food')->select('id','name','thing','price');
if ($store->count()>0)
{
//print_r($store);
    return view('user',['storelist' => $store->get(),
			 'foods' => $foods->get()]
		);
}

else {
    return 'nothing';
}

}
public function getFoodList(Request $request){

$foods = DB::table('food')
->select('id','name','thing','price')
->where('name','=',$request->input('text1'));

$arr_foods = [];

$f = $foods->get();
//print_r($arr_foods);
//return true;
//foreach($f as $food)
//{
//   echo $food->name;
//   $arr_foods[] = $food->thing;
//}
$arr_foods = json_decode( json_encode( $f ), true );

return $arr_foods;

}
}
