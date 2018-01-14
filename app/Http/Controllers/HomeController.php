<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.check');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
$store = DB::table('store')->select('id','name','address','phone');
$foods = DB::table('food')->select('id','name','thing','price');
        return view('home', ['storelist' => $store->get(),
                         'foods' => $foods->get()]);
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
